<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Follow_model');
    }
	

	public function index()
	{
		$userid = $this->loginUser['id'];
		
		$page     = _get_page();
		$pagesize = 3;
		$arrParam = array();
		$arrWhere = array('a.userid'=>$userid,'a.status'=>1);		//条件

		$tb = $this->Follow_model->table('follow').' a left join '.$this->Follow_model->table('live_room').' b on(a.itemid=b.id and b.status=1)';
		$list = $this->Follow_model->fetch_page($page, $pagesize, $arrWhere, 'b.*', 'a.addtime desc', $tb);
		//echo $this->db->last_query();die;
		

		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url('m/follow', $arrParam);
		$pagecfg['total_rows']   = $list['count'];
		$pagecfg['cur_page'] = $page;
		$pagecfg['per_page'] = $pagesize;
		//$this->load->library('pagination');
		$this->pagination->initialize($pagecfg);
		$list['pages'] = $this->pagination->create_links();

		$result = array(
			'list' => $list,
			);

		//print_r($list);
		$this->load->view('m/follow',$result);
	}

	public function detail($id){
		
		
		$o = $this->Follow_model->get_info_by_id($id);

		//修改为已读
		if($o['touserid']>0)
			$this->Follow_model->update_by_where(array('id'=>$id),array('readed'=>1));

		$result = array(
			'o' => $o,
			);
		
		$this->load->view('m/followdetail',$result);
	
	}

}