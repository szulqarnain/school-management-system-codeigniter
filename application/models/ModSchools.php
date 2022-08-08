<?php

class ModSchools extends CI_Model {

    public function AddUser($data){
        $this->db->insert('bz_users', $data);
    }
    
    public function AddSchool($data){
        $this->db->insert('bz_schools', $data);
    }
    
    public function AddAdmin($data){
        $this->db->insert('bz_admins', $data);
    }
    

    
}