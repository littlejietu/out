<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery_model extends XT_Model {

	protected $mTable = 'lottery';

	public function get_info_by_id($id, $fields='*')
	{
		return $this->get_by_id($id, $fields);
	}

}