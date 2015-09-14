<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {

	public function index()
	{
		if ($this->input->is_post())
		{
			$this->is_call_back = true;
			 $config = array(
			 	 array(
			 	 	'field'=>'username',
			 	 	'label'=>'用户名',
			 	 	'rules'=>'trim|required',
			 	 ),
			 	 array(
			 	 	'field'=>'password',
			 	 	'label'=>'密码',
			 	 	'rules'=>'trim|required',
			 	 ),
			 	 array(
			 	 	'field'=>'result',
			 	 	'label'=>'',
			 	 	'rules'=>'callback_user_login_check',
			 	 ),
			 	 
			 );
			
			 $this->form_validation->set_rules($config);
			 $res = array();
			 $res['code'] = 'EMTPY';
				

			 if ($this->form_validation->run() === TRUE){
			 	 $res['code'] = 'SUCCESS';
			 	 $res['message'] = site_url('/admin');
			 	 //redirect('/welcome');
			 }
			 else
			 	$res['message'] = _get_array_str($this->form_validation->getErrors());


			 $this->view->json($res);
		}
		
		//////保存自动登陆，自动登陆后台////////
		$xt_loginID = 0;
		$xt_loginUser = $this->input->cookie('admin_loginUser');
		if ($xt_loginUser)
		{
			$this->load->library('encrypt');
			$strmd5 = substr($xt_loginUser, 0, 32);
			$str = substr($xt_loginUser,32);
			
			if (md5($this->config->item('encryption_key').$str) == $strmd5){
				$xt_loginID = (int)$this->encrypt->decode($str);
			}
			
		}
		if($xt_loginID>0){
			$this->load->model('Admin_model');
			$admins_info = $this->Admin_model->getById($xt_loginID);
			if(empty($admins_info) || $admins_info['status']!=1){//账号无效
				$this->input->set_cookie('admin_loginUser', '');
				redirect('/login');
			}

			$this->load->model('Role_model');
			$role_info =$this->Role_model->getById($admins_info['roleid']);
			if($role_info['isuse']!='1'){//账号所在角色组停用
				$this->input->set_cookie('admin_loginUser', '');
				redirect('/login');
			}
			
			$data = array('loginUser'=>$admins_info);
			$this->session->set_userdata($data);//生成session
			
			//更新管理员登陆时间
			$this->Admin_model->updateById($xt_loginID, array('lastlogintime'=>time()));
			unset($admins_info);
			unset($role_info);
			header('location:/admin');
			exit;
		}

		$result = array(
			'isCode'=>$this->isCode(),
			);

		$this->load->view('admin/login',$result);
		/////////自动登陆结束////////////////////////////
	}

	private function isCode()
	{
		if(in_array( $this->input->ip_address(), array('115.236.65.109','115.236.65.106') ))
		{
		    return false;
		}
		return true;
	}
	
	public function user_login_check(){
		if (!$this->is_call_back)exit;

		if($this->isCode())
        {
            $this->load->helper('captcha');
            if (!check_captcha($_POST['code'], 'verify_adm'))
            {
                $this->form_validation->set_message('user_login_check', '验证码输入不正确');
                return false;
            }
        }

		$username = $this->input->post('username');
		
		$this->load->model('Admin_model');
		$user_info = $this->Admin_model->getByUsername($username,'*');

		if(empty($user_info)){
			$this->form_validation->set_message('user_login_check', '用户名或密码错误！');
			return false;
		}

		if($user_info['status']!='1'){
			$this->form_validation->set_message('user_login_check', '对不起，该账号已停止使用！');
			return false;
		}

		if ($user_info && $user_info['password'] == md5($this->input->post('password'))){
			
			//取会员角色是否启用
			$this->load->model('Role_model');
			$role_info =$this->Role_model->getById($user_info['roleid']);
			if($role_info['isuse']!='1'){
				$this->form_validation->set_message('user_login_check', '对不起，该账号所在权限组已停止使用！');
				return false;
			}

			//////////自动登陆，保留一周///
			$expire = 0;
            if ($this->input->post('is_auto_login') == 'true'){
                $expire = 3600*24*7;            
            }
            
            $this->load->library('encrypt');
            $str = $this->encrypt->encode($user_info['id']);
            $str = md5($this->config->item('encryption_key').$str).$str;
            $this->input->set_cookie('admin_loginUser', $str, $expire);
			//////////////////////////////
			
			$data = array('loginUser'=>$user_info);
			$this->session->set_userdata($data);//生成session
			
			//更新管理员登陆时间
			$fieldsData = array('lastlogintime'=>time());
			$this->Admin_model->updateById($user_info['id'], $fieldsData);
			
			$this->loginAccount = $user_info['username'];
			$this->loginID = $user_info['id'];
			add_member_option('login',$user_info['id'],$expire);
			
			return true;
		}
		
		$this->form_validation->set_message('user_login_check', '用户名或密码错误！');
		return false;
	}

	public function logout(){
//		$this->session->sess_destroy();
		$this->input->set_cookie('admin_loginUser', '');
		$this->session->set_userdata('loginUser');
		unset($this->current_Admin);
		redirect('/admin/login');
	}

	/**
	*找回密码
	*/
	public function findpwd(){
		if ($this->input->is_post()){
			$res = array();
			$res['code'] = 0;

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$this->load->model('Admin_model');
			$admins_info = $this->Admin_model->getByUsername($username,'id,username,email');

			if(empty($admins_info)){
				$res['data']['error_messages']['result'] = '输入的用户名不存在！';
				$this->view->json($res);
				exit;
			}

			if(!is_email($email)){
				$res['data']['error_messages']['result'] = 'email格式不正确！';
				$this->view->json($res);
				exit;
			}

			if($email!=$admins_info['email']){
				$res['data']['error_messages']['result'] = '该用户的email不正确！';
				$this->view->json($res);
				exit;
			}


			//发邮件
			$this->load->helper('MY_email');
			$this->load->library('encrypt');
			$code = $admins_info['username'].'|'.$admins_info['id'].'|'.$email.'|'.$this->timestamp;
			$code .= md5('!#%&)'.$code.'!#%&)');
			$code = $this->encrypt->encode($code);

			$param = array('username'=>$admins_info['username'], 'content'=>'您的重新找回密码地址：<a href="http://'.$_SERVER['HTTP_HOST'].'/login/reset_pwd?code='.$code.'" target=_blank>点此重新修改密码</a>' );
			$this->view->assign('email', $param);
			$html = $this->view->fetch('admin/findpwd_email');
			$res['data']['flag'] = send_email($email, '找回密码', $html, '投融界内容管理系统找回密码');


			$res['code']=200;
			$this->view->json($res);
			exit;
		}
		$this->view->display('admin/findpwd');
	}

	/**
	*通过邮箱找回密码,重新修改密码
	*/
	public function reset_pwd(){

		$valid=false;//邮件是否有效
		$this->load->model('Admin_model');
		$code = $this->input->get('code');
        if ($code)
		{
            $code = str_replace(' ','+', $code);
            $this->load->library('encrypt');
            $code = $this->encrypt->decode($code);
            if($code)
            {
                $md5 = substr($code, -32); 
                $code = substr($code,0,-32);
                if ($md5 == md5('!#%&)'.$code.'!#%&)'))
                {
                    list($username,$user_id, $email, $time) = explode('|', $code);

					$admins_info = $this->Admin_model->getByUsername($username,'id,username,email');
					if(empty($admins_info)){
						echo '链接地址无效，找不到对应系统会员账号！';exit;
					}

                    $user_id     = (int)$user_id;
 
                    if($user_id && $username && $email && is_email($email) && ($this->timestamp-$time < 3600)){
						$valid=true;
                    }
                }    
            }   
        }
		if($valid==false){
			echo '验证已失效！';exit;
		}

		if ($this->input->is_post()){
			$res = array();
			$res['code'] = 0;
			$res['data'] = array();

			$pwd=trim($this->input->post('pasword'));
			if(empty($pwd)){
				$res['code']='201';
				$res['data']['error_messages'] = '新密码不能为空!';
				$this->view->json($res);
				exit;
			}
			$pwd=md5($pwd);

			$succ=$this->Admin_model->updateById($admins_info['id'],array('password'=>$pwd));
			if($succ){
				$res['code']='200';
			}else{
				$res['code']='201';
				$res['data']['error_messages'] = '对不起，密码修改失败!';
			}
			$this->view->json($res);
			exit;
			
		}
		
		$this->view->assign('code',$this->input->get('code'));
		$this->view->display('admin/reset_pwd');

	}

	public function captcha()
    {
        $this->load->helper('captcha');
        create_captcha();
    }
		
}

