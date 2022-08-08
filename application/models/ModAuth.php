<?php

class ModAuth extends CI_Model {

	public function Verify($data) {
	    
	    
        
        $email = $data['email'];
        $pass = $data['password'];

		$condition = "use_username =" . "'" . $data['email'] . "' AND " . "use_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('bz_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			
			$sql = "
			SELECT 
				bz_users.use_id,
				bz_users.use_fname,
				bz_users.use_email,
				bz_users.use_username,
				bz_users_types.ust_id,
				bz_users_types.ust_base,
				bz_users_types.ust_name,
				bz_users.use_image
				
			FROM bz_users 
			
			INNER 
				JOIN bz_users_types
				  ON bz_users.ust_id=bz_users_types.ust_id
			
			WHERE 
				bz_users.use_username ='" .  $email . "'";
		
			$query = $this->db->query($sql);
				
			foreach ($query->result() as $row){
				
				$session_data = array(
                    
                    'use_id' => $row->use_id,
                    'use_fname' => $row->use_fname,
                    'use_email' => $row->use_email,
                    'use_username' => $row->use_username,
                    'ust_id' => $row->ust_id,
                    'ust_base' => $row->ust_base,
                    'ust_name' => $row->ust_name,
                    'use_image' => $row->use_image
                    
                );

				if($row->ust_id != 1){
					$sch_id =$this->db->get_where($row->ust_base, array('use_id' => $row->use_id))->row()->sch_id;
					$school_set = array('sch_id' => $sch_id);
				}
				else
					$school_set = array('sch_id' => 0);

                $this->session->set_userdata($school_set);

                $this->session->set_userdata($session_data);
                $this->session->set_userdata('logged_in', $session_data);
                
                return true;
			}

		}else{
			
			$condition2 = "use_email =" . "'" . $email . "' AND " . "use_password =" . "'" . $pass . "'";
			$this->db->select('*');
			$this->db->from('bz_users');
			$this->db->where($condition2);
			$this->db->limit(1);
			$query2 = $this->db->get();
	
			if($query2->num_rows() == 1){
				
				$sql = "
				SELECT 
					bz_users.use_id,
					bz_users.use_fname,
					bz_users.use_email,
					bz_users.use_username,
					bz_users_types.ust_id,
					bz_users_types.ust_base,
					bz_users_types.ust_name,
					bz_users.use_image
					
				FROM bz_users 
				
				INNER 
					JOIN bz_users_types
					  ON bz_users.ust_id=bz_users_types.ust_id
				
				WHERE 
					bz_users.use_email ='" .  $email . "'";
			
			$query = $this->db->query($sql);
				
			foreach ($query->result() as $row){
				
					$session_data = array(
						
						'use_id' => $row->use_id,
						'use_fname' => $row->use_fname,
						'use_email' => $row->use_email,
						'use_username' => $row->use_username,
						'ust_id' => $row->ust_id,
						'ust_base' => $row->ust_base,
						'ust_name' => $row->ust_name,
						'use_image' => $row->use_image
						
					);
									
					if($row->ust_id != 1)
						$school_set = array('sch_id' => $this->db->get_where($row->ust_base, array('use_id' => $row->use_id))->row()->sch_id);
					else
						$school_set = array('sch_id' => 0);

					$this->session->set_userdata($school_set);
					

					$this->session->set_userdata($session_data);
					$this->session->set_userdata('logged_in', $session_data);
					
					return true;
				}
	
			}else{
				
				return "error";
				
			}
			
		}
	}

}



?>