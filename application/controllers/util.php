<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util extends CI_Controller {
	function hello()
	{
	exit;
	}
	public function InternetShortcut()
	{
		$Shortcut = '[InternetShortcut]
URL=http://www.nm.com
IconFile=http://www.nm.com/favicon.ico
IDList=
[{000214A0-0000-0000-C000-000000000046}]
Prop3=19,2';

Header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=牛模网.url;");
echo $Shortcut;exit;
	}
	
	/**
	 * 错误页面
	 */
	public function error()
	{
		display_error('出错啦！喝杯茶休息一会！');
		exit;
	}

	
	
	
	/**
	 * 获取用户头像
	 * 
	 */
	public function get_user_logo()
	{
		$res = array();
		$res['code'] = 0;
		if($this->input->is_ajax_request())
		{
			$user_ids = $this->input->post('user_ids');
			if ($user_ids)
			{
				$user_ids = explode(',', $user_ids);
				$user_ids = array_unique( array_filter($user_ids, 'is_numeric') );
				if ($user_ids){
					$this->load->model('User_model');
					$tmp = $this->User_model->get_field_by_ids($user_ids, 'id,user_logo');
					$res['code'] = 200;
					$res['data']['list'] = array();
					foreach($tmp as $val)
					{
						$res['data']['list'][$val['id']] = '/'.$val['user_logo'];
					}
				}
			}
		}
		$this->view->json($res);
	}
	
	
	public function captcha()
	{

		$this->load->helper('captcha');
		create_captcha(4,95,40);
	}

	public function captcha_admin(){
		$this->load->helper('captcha');
		create_captcha(4,85,35,'verify_adm');
	}
	
	public function nokeywords()
	{    
		$cache = get_cache();
		$this->load->model('Non_keywords_model');
		$tmp = $this->Non_keywords_model->get_list();
		$result = array();
		foreach($tmp as $val)
		{
			$result['original'][] = $val['name'];
			$result['replace'][] = $val['replace'];
		}
		$cache->save('nokeyword', $result, 3600*24*300);
		print_r($result);exit;
	}
	
	public function test_email()
	{
//        echo $this->config->item('encryption_key');
//        echo send_email('25241189@qq.com', '投融界注册测试', '投融界测试投融界测试', '亲') ? '成功' : '失败';
	}
	public function area_cache()
	{
		$this->load->model('area_model');
		$this->area_model->set_cache();
	}
	public function area_cache2()
	{
		$this->load->model('area_model');
		$this->area_model->set_pc_cache();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
