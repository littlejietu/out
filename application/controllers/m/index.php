<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    { 
        parent::__construct();
        $this->load->model('User_model');
    }
	

	public function index()
	{


		$result = array(
			//'o' => $o,
			);

		$this->load->view('m/index',$result);
	}

}