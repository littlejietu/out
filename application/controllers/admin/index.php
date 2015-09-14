<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Admin_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
    //默认执行index
	public function index()
	{
		$data = array(
			'page_title'=>'首页',
			);

		$this->load->view('admin/index',$data);
		
	}

	
}
