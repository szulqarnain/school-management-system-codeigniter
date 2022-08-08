<?php

class ModStudents extends CI_Model {

    public function AddStudent($data){
        $this->db->insert('bz_users', $data);
    }
    
    public function AddStudent2($data){
        $this->db->insert('bz_students', $data);
    }
     public function Attendance($data){
        $this->db->insert('bz_attendance', $data);
    }
    

    
}