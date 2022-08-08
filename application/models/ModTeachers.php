<?php

class ModTeachers extends CI_Model {

    public function AddTeacher($data){
        $this->db->insert('bz_users', $data);
    }
    
    public function AddTeacher2($data){
        $this->db->insert('bz_teachers', $data);
    }
    

    
}