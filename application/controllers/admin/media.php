<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends MY_Admin_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
    
	public function index()
	{
		//$result =
		$this->load->view('admin/media');
	}

}