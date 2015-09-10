<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends XT_Model {

    protected $mTable = 'role';
    
    public function add($fieldsData){
        if (!is_array($fieldsData) || !isset($fieldsData['rolename'])) return 0;
        $fieldsData['rolename'] = trim($fieldsData['rolename']);
        if ('' == $fieldsData['rolename']) return 0;

        $sql = $this->db->insert_string($this->table(), $fieldsData);
        $this->db->query($sql);
        return $this->db->insert_id();
    }
    
    public function deleteById($roleId) {
        $roleId = intval($roleId);
        if ($roleId <= 0) return 0;
        $sql = "DELETE FROM ".$this->table()." WHERE roleid=".$roleId;
        return $this->db->query($sql);
    }
    
    public function findAll() {
        $sql = "SELECT * FROM ".$this->table();
        $result =$this->db->query($sql)->result_array();
        return $result;
    }
    
    public function getById($roleId) {
        if(empty($roleId)) return null;
        $roleId = intval($roleId);

        $sql = "SELECT * FROM ".$this->table()." WHERE roleid=".$roleId;
        $result =$this->db->query($sql)->row_array();
        return $result ? $result : NULL;
    }
    
    public function updateById($roleId, $fieldsData) {
        $roleId = intval($roleId);
        if ($roleId <= 0 || !is_array($fieldsData) || !count($fieldsData)) return 0;

        $where = array('roleid'=> $roleId);
        $sql = $this->db->update_string($this->table(), $fieldsData, $where);
        return $this->db->query($sql);
    }


}
