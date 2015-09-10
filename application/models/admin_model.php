<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends XT_Model {

	
	protected $mTable = 'admin'; 
	protected $tb_role = 'role';

	public function getByUsername($username,$field='*') {
		if(trim($username)=='') return null;
		if(empty($field))  $field='*';
		$sql = "SELECT ".$field." FROM ".$this->table()." WHERE username='".$username."'";
		$result =$this->db->query($sql)->row_array();
		return $result ? $result : NULL;
	}

	public function getById($adminId) {
		if(trim($adminId)=='') return null;
		$adminId = intval($adminId);
		$sql = "SELECT * FROM ".$this->table()." WHERE id=".$adminId;
		$result =$this->db->query($sql)->row_array();
		return $result ? $result : NULL;
	}

	public function add($fieldsData){
		if (!is_array($fieldsData) || !isset($fieldsData['username']) || !isset($fieldsData['password'])) return 0;
		if ('' == $fieldsData['password'] || '' == $fieldsData['username']) return 0;

		$sql = $this->db->insert_string($this->mTable, $fieldsData);
		$this->db->query($sql);
		return $this->db->insert_id();
	}

	public function findAll() {
		$sql = "SELECT * FROM ".$this->table()." ORDER BY lastlogintime DESC";
		$result =$this->db->query($sql)->result_array();
		return $result;
	}

	public function updateById($adminId, $fieldsData) {
		$adminId = intval($adminId);
		if ($adminId <= 0 || !is_array($fieldsData) || !count($fieldsData)) return 0;

		$where = array('id'=> $adminId);
		$sql = $this->db->update_string($this->mTable, $fieldsData, $where);
		return $this->db->query($sql);
	}

	public function deleteById($adminId) {
		$adminId = intval($adminId);
		if ($adminId <= 0) return 0;
		return $this->db->delete($this->mTable, array('id' => $adminId));
	}


	public function findAllAdminRole() {
		$sql = "SELECT r.rolename, a.* FROM ".$this->table()." AS a LEFT JOIN ".$this->table($this->tb_role)." AS r ON r.roleid=a.roleid ORDER BY a.lastlogintime DESC";
		$result =$this->db->query($sql)->result_array();
		return $result;
	}

	public function findAllAdminByRole($roleid) {
		if(empty($roleid)){
			$sql = "SELECT r.rolename, a.* FROM ".$this->table()." AS a LEFT JOIN ".$this->table($this->tb_role)." AS r ON r.roleid=a.roleid ORDER BY a.lastlogintime DESC";
		}else{
			$roleid=(int)$roleid;
			$sql = "SELECT r.rolename, a.* FROM ".$this->table()." AS a LEFT JOIN ".$this->table($this->tb_role)." AS r ON r.roleid=a.roleid where a.roleid=".$roleid." ORDER BY a.lastlogintime DESC";
		}
		$result =$this->db->query($sql)->result_array();
		return $result;
	}


	/**
    *根据角色id,取会员人数
    */
	public function getNumByRoleid($roleid){
		$roleid = intval($roleid);
		if ($roleid <= 0) return 0;

		$result = array();
		$sql     = 'SELECT COUNT(*) AS num FROM '.$this->table().' WHERE roleid='.$roleid;
		$query     = $this->db->query($sql);
		$result = $query->row_array();
		return $result['num'];

	}

	public function get_username_by_id($username){

		$result	= $this->db->select("id")
		-> from($this->mTable)
		-> where('username',$username)
		->get()
		->row_array();

		return $result;
	}

}