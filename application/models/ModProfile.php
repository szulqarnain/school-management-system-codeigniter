<?php

class ModProfile extends CI_Model {

    public function Update($data){
                
		extract($data);
		$this->db->where('use_id', $use_id);
		$this->db->update('bz_users', array(
            'use_fname' => $use_fname,
            'use_mname' => $use_mname,
            'use_lname' => $use_lname,
            'use_email' => $use_email,
            'use_father_name' => $use_father_name,
            'use_mother_name' => $use_mother_name,
            'use_birthday' => $use_birthday,
            'use_gender' => $use_gender,
            'use_image' => $use_image,
            'use_address' => $use_address,
        ));
		return true;
		

    }
    
    
}