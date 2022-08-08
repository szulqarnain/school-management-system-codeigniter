<?php

class ModAttendance extends CI_Model {

    public function Add($data){
        $this->db->insert('bz_attendance', $data);
    }
    

    

    
}