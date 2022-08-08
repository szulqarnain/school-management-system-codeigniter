<?php

class ModNotfication extends CI_Model {

    public function Add($data){
        $this->db->insert('bz_notifications', $data);
    }
    

    

    
}