<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends XT_Model {

	protected $mTable = 'user';
	protected $tb_user = 'user';
	protected $tb_userinfo = 'user_info';

	public function get_info_by_id($id, $fields='*')
	{
		$aUser = $this->get_by_id($id, $fields);
		
		$this->set_table($this->tb_userinfo);
		$aUserInfo = $this->get_by_where("userid=$id",'*');
		if($aUserInfo)
			$aUser = array_merge($aUserInfo, $aUser);
		
		$this->set_table($this->tb_user);
		return $aUser;
	}


	public function get_user_by_username($username, $fields='*')
	{
		$db_temp = $this->db->select($fields)
		->from($this->mTable)
		->where('username', $username)
		->get()
		->row_array();

		return $db_temp;
	}

	public function get_user_by_nickname($nickname, $fields='*')
	{
		$db_temp = $this->db->select($fields)
		->from($this->mTable)
		->where('nickname', $username)
		->get()
		->row_array();
		return $db_temp;
	}

	public function get_user_by_mobile($mobile, $fields='*')
	{
		$db_temp = $this->db->select($fields)
		->from($this->mTable)
		->where('mobile', $mobile)
		->get()
		->row_array();
		return $db_temp;
	}

	public function get_user_by_email($email, $fields='*')
	{
		$db_temp = $this->db->select($fields)
		->from($this->tb_userinfo)
		->where('email', $email)
		->get()
		->row_array();
		return $db_temp;
	}

	

	public function login_update($id, $last_datetime, $last_ip)
	{
		$this->db->set('lastlogintime', $last_datetime, FALSE);
		$this->db->set('lastip', $last_ip, FALSE);
		//$this->db->set('login_num', 'login_num+1', FALSE);
		//$this->db->set('security_code', $this->security_code);
		$this->db->where('userid', $id);
		return $this->db->update($this->tb_userinfo);
	}

	/**
	*更新email
	*/
	public function email_update($id, $email, $email_true){
		if(empty($id)) return 0;

		$email_true=($email_true==1)?1:0;
		if($email){
			$this->db->set('email', $email);
		}
		//$this->db->set('email_true', $email_true, FALSE);
		$this->db->where('id', $id);
		return $this->db->update($this->tb_userinfo);
	}

	/**
	*通过用户表id更新
	*/
	public function update_info_by_id($id, $data, $data_info=array()){
		$where = array('id'=> $id);
		if(!empty($data_info))
		{
			$this->set_table($this->tb_userinfo);
			$this->update_by_where(array('userid'=>$id), $data_info, $this->tb_userinfo);
		}
		$this->set_table($this->tb_user);

		return $this->update_by_id($id, $data);
	}

	public function get_user_by_ids($id, $fields = "*")
	{
		$db_temp = $this->db->select($fields)
		->from($this->mTable)
		->where_in('id', $id)
		->get()
		->result_array();
		return $db_temp;
	}

	public function user_nickname_check($val)
	{
		$db_temp = $this->db->select('count(1) as num ',false)
		->from($this->tb_userinfo)
		->where('nickname', $val)
		->get()
		->row_array();
		return $db_temp['num'];
	}

	public function user_mobile_check($val)
	{
		$db_temp = $this->db->select('count(1) as num ',false)
		->from($this->tb_userinfo)
		->where('mobile', $val)
		->get()
		->row_array();
		return $db_temp['num'];
	}

	public function user_email_check($val)
	{
		$db_temp = $this->db->select('count(1) as num ',false)
		->from($this->tb_userinfo)
		->where('email', $val)
		->get()
		->row_array();
		return $db_temp['num'];
	}

	public function user_username_check($val)
	{
		$db_temp = $this->db->select('count(1) as num ',false)
		->from($this->mTable)
		->where('username', $val)
		->get()
		->row_array();
		return $db_temp['num'];
	}

	

}
