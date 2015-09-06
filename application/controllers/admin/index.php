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
		$this->load->view('admin/inc/header');
		$this->load->view('admin/index');
		$this->load->view('admin/inc/footer');
	}

	
}
