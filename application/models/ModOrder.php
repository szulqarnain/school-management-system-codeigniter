<?php

class ModOrder extends CI_Model {



    public function UpdatePayment($data){
        
		extract($data);
		$this->db->where('ord_id', $ord_id);
		$this->db->update('cub_orders', array('ord_delivery_status' => $ord_status));
		return true;
		
		
    }
    
}