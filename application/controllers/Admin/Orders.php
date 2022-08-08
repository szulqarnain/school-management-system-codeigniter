<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('CheckAuth');
    }
    
	public function index()
	{
        $this->load->library('layouts');
        $this->layouts->set_title('Orders');
        $this->layouts->view('Admin/orders');
        
	}




    // Main Function


    public function Deliverable($slug1,$slug2,$slug3){
        
                        ?>

<table class="table" style="margin:0px;background: #fff9eb !important; ">
                        <thead>
                              <tr>
                                  <th>Sr</th>
                                  <th>Date</th>
                                  <th>Order Id</th>
                                  <th>Customer</th>
                                  <th>Phone</th>
                                  <th>Action</th>
                                  <th>Payment Status</th>
                                  <th>Delivery Status</th>
                              </tr>
                          </thead>
                            <tbody>
                                
                        <?php  
                        
        
        $sub = $this->db->get('cub_orders')->result_array();
        $sr = 1;
        
        foreach ($sub as $s) {
        

                    
                    ?>
                    
                             <tr>
                                     <td><?= $sr ?> </td>
                                     <td><?= $s['ord_date'] ?> </td>
                                     <td><?= $s['ord_id'] ?> </td>
                                     <td><?=  $this->db->get_where('cub_users', array('use_id' => $s['use_id']))->row()->use_fname . ' ' . $this->db->get_where('cub_users', array('use_id' =>  $s['use_id']))->row()->use_lname; ?> </td>

                                     <td><?=  $this->db->get_where('cub_users', array('use_id' => $s['use_id']))->row()->use_phone ?> </td>

                                     <td><a onclick="getitems(<?= $s['ord_token'] ?>)" style="cursor:pointer"> Get Products  </a></td>
                                     <td><?php if($s['ord_payment'] == 2){ echo "Decline"; }elseif($s['ord_payment'] == 2){ echo "Success";}else{ echo "Pending"; } ?> </td>
                                     <td>
                                         <select class="form-control" id="ord_status" onchange="update_status(<?= $s['ord_id']?>);">
                                             <option value="0" <?php if($s['ord_delivery_status'] == 0) { echo "Selected";} ?> > Pending </option>
                                             <option value="1" <?php if($s['ord_delivery_status'] == 1) { echo "Selected";} ?>> Delivered </option>
                                         </select>      
                                     </td>
                              </tr>  
                                
                    
                    <?php  

            
            $sr ++;
            
        }
        
        
        echo "</tbody></table>";
    }
    
    //Get Main Detail
    
    public function GetItem($slug){

        
                $sql2 = "
           
                    SELECT 
                    *
                    FROM cub_order_items 
                      
                    WHERE
                    
                    ord_token = '$slug' 
                
                ";

                $food = $this->db->query($sql2)->result_array();
                
                $i = 0;
            
        
        ?>
        
                    


                    <table class="table" style="margin:0px;background: white !important; ">
                        <thead>
                              <tr>
                                  <th>Sr</th>
                                  <th>Product</th>
                                  <th>Price</th>
                              </tr>
                          </thead>
                            <tbody>
                          
                                <?php 
                                       foreach ($food as $fod) {
                                           
                                          $i ++;       
                                          $itm_id = $fod['itm_id'];
                                    
                                    
                                ?>
                              
                                  <tr>
                                     <td><?= $i ?> </td>
                                     <td>
                                         <img src="https://iifym.cubikumtech.co/assets_frontend/products_photos/<?= $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_image;  ?>" style="height:30px;width:30px;border-radius:6px">
                                         
                                         <?php echo $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_name; ; ?> </td>
                                     <td><?php echo $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_price; ; ?> </td>
                                  </tr>  
                                
                                <?php  }  ?> 

                            </tbody>
                    </table>
        
        <?php
    }
    
    
    public function UpdateStatus($order_id, $order_status){
        
        
        $this->load->model("ModOrder");
        
        $data = array(
			  'ord_id'     => $order_id,
			  'ord_status'    => $order_status
		);
			
		$this->ModOrder->UpdatePayment($data);
		
		
		redirect(base_url() . 'orders');
			
        
        
    }
    
}