<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery_log extends MY_Admin_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Lottery_log_model');
    }
	
    //默认执行index
	public function index()
	{
		
		$field = $this->input->get_post('field');
		$cKey = $this->input->get_post('txtKey');
		$fieldDate = $this->input->get_post('fieldDate');
		$begtime = $this->input->get_post('begtime');
		$endtime = $this->input->get_post('endtime');
		$orderby = $this->input->get_post('orderby');
		$iswinning = $this->input->get_post('iswinning');
		$isgrant = $this->input->get_post('isgrant');

		if($field=='ti_tle')
			$field = 'title';

		$dbprefix = $this->Lottery_log_model->db->dbprefix;
		$page     = _get_page();
		$pagesize = 10;
		$arrParam = array();
		$arrWhere = array();

		
		
		if($cKey)
		{
			$arrParam['key'] = $cKey;
			if($field=='userid')
				$arrWhere[$field] = $cKey;
			else
				$arrWhere[$field.' like '] = "'%$cKey%'";
		}
		$arrParam['field'] = $field;
		$arrParam['fieldDate'] = $fieldDate;

		if($begtime)
		{
			$arrParam['begtime'] = $begtime;
			$arrWhere["a.$fieldDate >="] = strtotime($begtime);
		}
		if($endtime)
		{
			$arrParam['endtime'] = $endtime;
			$arrWhere["a.$fieldDate <="] = strtotime("$endtime 23:59:59");
		}
		$strOrder = 'a.id desc';
		if($orderby)
		{
			$arrParam['orderby'] = $orderby;
			$strOrder = $orderby;
		}

		if($iswinning)
		{
			$arrParam['iswinning'] = $iswinning;
			if($iswinning==-1)
				$iswinning = 0;
			$arrWhere["iswinning"] = $iswinning;
		}
		if($isgrant)
		{
			$arrParam['isgrant'] = $isgrant;
			if($isgrant==-1)
				$isgrant = 0;
			$arrWhere["isgrant"] = $isgrant;
		}

		$tb = $dbprefix.'lottery_log a';
		$list = $this->Lottery_log_model->fetch_page($page, $pagesize, $arrWhere, 'a.*', $strOrder,$tb);
		//echo $this->db->last_query();die;
		$oSysActType = _get_config('lottery_log');

		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url('admin/lottery_log', $arrParam);
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


		$this->load->view('admin/lottery_log',$result);
	}

	public function add()
	{
		//需要修改
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$result = array();

		if(!empty($id))
		{
			$oSysActType = _get_config('lottery_log');
			$info = $this->Lottery_log_model->get_info_by_id($id);
			$result = array(
				'info'=>$info,
				'oSysActType' => $oSysActType,
				);
		}
		

		$this->load->view('admin/lottery_log_add', $result);
	}

	public function save()
	{
		
		if ($this->input->is_post())
		{
			//验证规则
			$config = array(
               array(
                     'field'   => 'lotteryid', 
                     'label'   => '抽奖活动id', 
                     'rules'   => 'trim|required'
                  ),
                
               	array(
                     'field'   => 'userid', 
                     'label'   => '抽奖人id', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'username', 
                     'label'   => '用户名', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'realname', 
                     'label'   => '姓名', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'sex', 
                     'label'   => '性别', 
                     'rules'   => 'trim|required'
                  ),  
                array(
                     'field'   => 'lotterytime', 
                     'label'   => '抽奖时间', 
                     'rules'   => 'trim|required'
                  ),
                  array(
                     'field'   => 'iswinning', 
                     'label'   => '是否中奖', 
                     'rules'   => 'trim|required'
                  ),  
                  array(
                     'field'   => 'isgrant', 
                     'label'   => '是否发放', 
                     'rules'   => 'trim|required'
                  ),    
                
            );

            $this->form_validation->set_rules($config);

			if ($this->form_validation->run() === TRUE)
  			{

  				$data = array(
					'lotteryid'=>$this->input->post('lotteryid'),
					'userid'=>$this->input->post('userid'),
					'username'=>$this->input->post('username'),
					'realname'=>$this->input->post('realname'),
					'sex'=>$this->input->post('sex'),
					'lotterytime'=>strtotime($this->input->post('lotterytime')),
					'iswinning'=>1,
					'isgrant'=>1,
				);

  				$id	= _get_key_val($this->input->get('id'), TRUE);
  				if($id)
  					$data['id'] = $id;

  				$this->Lottery_log_model->insert($data);

				//echo '成功,<a href="/admin/aa">返回列表页</a>';
				redirect(base_url('/admin/lottery_log'));
				exit;
  			}
  			else
  			{
  				$id	= _get_key_val($this->input->get('id'), TRUE);
				$result = array();

				if(!empty($id))
				{
					$info = $this->Lottery_log_model->get_info_by_id($id);
					$result = array(
						'info'=>$info,
						);
				}
  				$this->load->view('admin/lottery_log_add',$result);
  				//redirect('/admin/link/add?id='.$this->input->get('id'));
  			}
			



		}
	}

	function del(){
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$page = _get_page();

		$this->Lottery_log_model->delete_by_id($id);
		redirect( base_url('/admin/lottery_log?page='.$page) );

	}

	function recommend(){
		$id	= _get_key_val($this->input->get('id'), TRUE);
		$page = _get_page();

		$this->load->model('Recommend_model');
		$this->Recommend_model->do_recommend(2,$id);

		redirect( base_url('/admin/lottery_log?page='.$page) );

	}
}
