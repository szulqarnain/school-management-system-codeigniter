<?php

class ModClasses extends CI_Model {

    public function AddClass($data){
        $this->db->insert('bz_classes', $data);
    }
    
    public function AddSec($data){
        $this->db->insert('bz_sections', $data);
    }
}