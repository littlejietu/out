<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery_award extends MY_Admin_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Lottery_award_model');
    }
	
    //默认执行index
	public function index()
	{
		$lotteryid	= _get_key_val($this->input->get('lotteryid'), TRUE);

		$dbprefix = $this->Lottery_award_model->db->dbprefix;
		$page     = _get_page();
		$pagesize = 10;
		$arrParam = array();
		$arrWhere = array();

		if($lotteryid)
		{
			$arrParam['lotteryid'] = $lotteryid;
			$arrWhere["lotteryid"] = $lotteryid;
		}

		$strOrder = 'a.sort asc';

		$tb = $dbprefix.'lottery_award a';
		$list = $this->Lottery_award_model->fetch_page($page, $pagesize, $arrWhere, 'a.*', $strOrder,$tb);
		//echo $this->db->last_query();die;
		$oSysActType = _get_config('lottery_award');

		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url('admin/lottery_award', $arrParam);
		$pagecfg['total_rows']   = $list['count'];
		$pagecfg['cur_page'] = $page;
		$pagecfg['per_page'] = $pagesize;
		//$this->load->library('pagination');
		$this->pagination->initialize($pagecfg);
		$list['pages'] = $this->pagination->create_links();

		$result = array(
			'list' => $list,
			'oSysActType' => $oSysActType,
			'arrParam' => $arrParam,
			);


		$this->load->view('admin/lottery_award',$result);
	}

	public function add()
	{
		//需要修改
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$result = array();

		if(!empty($id))
		{
			$oSysActType = _get_config('lottery_award');
			$info = $this->Lottery_award_model->get_info_by_id($id);
			$result = array(
				'info'=>$info,
				'oSysActType' => $oSysActType,
				);
		}
		

		$this->load->view('admin/lottery_award_add', $result);
	}

	public function save()
	{
		
		if ($this->input->is_post())
		{
			//验证规则
			$config = array(
               array(
                     'field'   => 'title', 
                     'label'   => '奖品', 
                     'rules'   => 'trim|required'
                  ),
                array(
                     'field'   => 'docode', 
                     'label'   => '处理代码', 
                     'rules'   => 'trim|required'
                  ),
               	array(
                     'field'   => 'memo', 
                     'label'   => '奖品说明', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'sort', 
                     'label'   => '排序', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'num', 
                     'label'   => '奖品数量', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'winwords', 
                     'label'   => '中奖恭喜用词', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'rate', 
                     'label'   => '中奖概率', 
                     'rules'   => 'trim|required'
                  ), 
                  array(
                     'field'   => 'lotteryid', 
                     'label'   => '活动id', 
                     'rules'   => 'trim|required'
                  ),  
                  array(
                     'field'   => 'status', 
                     'label'   => '启用', 
                     'rules'   => 'trim|required'
                  ),   
                
            );

            $this->form_validation->set_rules($config);

			if ($this->form_validation->run() === TRUE)
  			{
  				$lotteryid = $this->input->post('lotteryid');
  				$data = array(
					'title'=>$this->input->post('title'),
					'docode'=>$this->input->post('docode'),
					'memo'=>$this->input->post('memo'),
					'sort'=>$this->input->post('sort'),
					'num'=>$this->input->post('num'),
					'winwords'=>$this->input->post('winwords'),
					'rate'=>$this->input->post('rate'),
					'lotteryid'=>$lotteryid,
					'status'=>$this->input->post('status'),
					/*'address'=>$this->input->post('address'),
					'actnum'=>(int)$this->input->post('actnum'),
					'innumfake'=>$this->input->post('innumfake'),
					'innum'=>$this->input->post('innum'),
					'display'=>$this->input->post('display'),
					'op_userid'=>$this->session->userdata['admin_id'],
					'op_username'=>$this->session->userdata['user_name'],
					'op_time'=>time(),*/
				);

  				$id	= _get_key_val($this->input->get('id'), TRUE);
  				if($id)
  					$data['id'] = $id;

  				$this->Lottery_award_model->insert($data);

				//echo '成功,<a href="/admin/aa">返回列表页</a>';
				redirect(base_url('/admin/lottery_award?lotteryid='._get_key_val($lotteryid)));
				exit;
  			}
  			else
  			{
  				$id	= _get_key_val($this->input->get('id'), TRUE);
				$result = array();

				if(!empty($id))
				{
					$info = $this->Lottery_award_model->get_info_by_id($id);
					$result = array(
						'info'=>$info,
						);
				}
  				$this->load->view('admin/lottery_award_add',$result);
  				//redirect('/admin/link/add?id='.$this->input->get('id'));
  			}
			



		}
	}

	function del(){
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$page = _get_page();

		$this->Lottery_award_model->delete_by_id($id);
		redirect( base_url('/admin/lottery_award?page='.$page) );

	}

	function recommend(){
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$page = _get_page();

		$this->load->model('Recommend_model');
		$this->Recommend_model->do_recommend(2,$id);

		redirect( base_url('/admin/lottery_award?page='.$page) );

	}
}
