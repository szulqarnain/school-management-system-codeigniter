<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GetFood extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        error_reporting(0);
    }
    
    // Main Function


    public function Deliverable($slug1,$slug2,$slug3){
        
                        ?>

<table class="table" style="margin:0px;background: #fff9eb !important; ">
                        <thead>
                              <tr>
                                  <th>Sr</th>
                                  <th>Date</th>
                                  <th>Week</th>
                                  <th>Customer</th>
                                  <th>Action</th>
                                  <!--<th>Status</th>-->
                              </tr>
                          </thead>
                            <tbody>
                                
                        <?php  
                        
        $sr = 1;                        
        
        $date_x = $slug3 . "-" . $slug2 . "-" . $slug1;
        
        $sub = $this->db->get_where('cub_subscription', array('sub_status' => 1))->result_array();
        
        foreach ($sub as $s) {
        
            $sub_date_const = $s['sub_date'];
            
            $sub_date = $s['sub_date'];
            $sub_id = $s['sub_id'];
            $use_id = $s['use_id'];
            $week = 1;
            
            $i = 1;
            
            
            

                $ssi_stop_date = $this->db->get_where('cub_subscription_stop_interval', array('sub_id' => $sub_id , 'ssi_resume_date !=' => null))->row()->ssi_stop_date;
                $ssi_resume_date = $this->db->get_where('cub_subscription_stop_interval', array('sub_id' => $sub_id , 'ssi_resume_date !=' => null))->row()->ssi_resume_date;
                
                if($ssi_stop_date != null){
                    
                    $date1 = strtotime($ssi_stop_date);
                    $date2 = strtotime($ssi_resume_date);
                    $datediff = $date1 - $date2;
                    $diff = round($datediff / (60 * 60 * 24)); 
                    
                    $loop = 30 - $diff;
                    
                }else{
                    $loop = 30;
                }
                
            $j = 1;
            
            while($i <= $loop){
                
                
                if($j <=7) $week = 1;
                elseif($j <=14 && $j >= 8) $week = 2; 
                elseif($j <=21 && $j >= 15) $week = 3; 
                elseif($j <=28 && $j >= 22) $week = 4;
                elseif($j <=31 && $j >= 29) $week = 5;

                $ssi_stop_date = $this->db->get_where('cub_subscription_stop_interval', array('sub_id' => $sub_id , 'ssi_resume_date !=' => null))->row()->ssi_stop_date;
                $ssi_resume_date = $this->db->get_where('cub_subscription_stop_interval', array('sub_id' => $sub_id , 'ssi_resume_date !=' => null))->row()->ssi_resume_date;
                
                if($sub_date >= $ssi_stop_date && $sub_date <= $ssi_resume_date){ }else{ $j++;};  
                
                if($ssi_stop_date){
                    
                    if($date_x >= $ssi_stop_date && $date_x <= $ssi_resume_date) break;  
                    
                }else{
                    
                    $ssi_stop_date_2 = $this->db->get_where('cub_subscription_stop_interval', array('sub_id' => $sub_id , 'ssi_resume_date' => null))->row()->ssi_stop_date;
                    
                    if($ssi_stop_date_2){
                        if($date_x >= $ssi_stop_date_2) break;  
                    }
                
                }  
                   
                   
                   
                if($date_x == $sub_date){
                    
                    
                    
                    
                    ?>
                    
                             <tr>
                                     <td><?= $sr ?> </td>
                                     <td><?= $sub_date ?> </td>
                                     <td><?= $week ?> </td>
                                     <td><?=  $this->db->get_where('cub_users', array('use_id' => $use_id))->row()->use_fname . ' ' . $this->db->get_where('cub_users', array('use_id' => $use_id))->row()->use_lname; ?> </td>

                                     <td><a onclick="getitems(<?= $sub_id ?>,<?= $week ?>)" style="cursor:pointer"> Get Products  </a></td>
                                     <!--<td>-->
                                     <!--    <select class="form-control" >-->
                                     <!--        <option class="1"> Pending </option>-->
                                     <!--        <option class="2"> Delivered </option>-->
                                     <!--        <option class="3"> Cancel </option>-->
                                     <!--    </select>      -->
                                     <!--</td>-->
                              </tr>  
                                
                    
                    <?php  $sr ++;
                    
                    break;
                    
                }
                

                $i++; 
                
                $sub_date = date( "Y-m-d", strtotime( "$sub_date +1 day" ) ); 
            
            }
            
 
            
        }
        
        echo "</tbody></table>";
    }
    
    //Get Main Detail
    
    public function GetItem($slug,$slug1){

        
                $sql2 = "
           
                    SELECT 
                    *
                    FROM cub_items_array 
                      
                    WHERE
                    
                    sub_id = '$slug' 
                    &&
                    arc_week_no = '$slug1' 
                
                ";

                $food = $this->db->query($sql2)->result_array();
                
            
        
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
                                         <img src="../assets_frontend/products_photos/<?= $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_image;  ?>" style="height:30px;width:30px;border-radius:6px">
                                         
                                         <?php echo $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_name; ; ?> </td>
                                     <td><?php echo $this->db->get_where('cub_items', array('itm_id' => $itm_id))->row()->itm_price; ; ?> </td>
                                  </tr>  
                                
                                <?php  }  ?> 

                            </tbody>
                    </table>
        
        <?php
    }
    
}