<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Phpfunctions 

{

    

   private $CI;



   function __construct() {
        error_reporting(0);

   }

    

    public function notification($type,$title,$msg)

    {

       $this->CI->CI = & get_instance();

        

        $session_data = array(

                    

            'noti_type' => $type,

            'noti_title' => $title,

            'noti_msg' => $msg

                    

        );



        $this->CI->CI->session->set_userdata($session_data);

        

    }

    

    public function instalments($cli_id)

    {

        

$this->CI =& get_instance();

$this->CI->load->database();

        

$hx_discount = 0;

$hx_discount_per = 0;

$hx_extra = 0;

$hx_extra_per = 0;

$hx_down = 0;

$hx_down_per = 0;

$hx_instalments = 0;

$hx_instalment_no = 0;

$hx_payable = 0;

$hx_payable = 0;
$a_amount = 0;
$p_amount = 0;





   $uni_id_x = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->uni_id; 

   $ins_id_x = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->ins_id; 

                               

   $unit_price =  $this->CI->db->get_where('hx_units', array('uni_id' => $uni_id_x))->row()->uni_price;

    

   $down_per = $this->CI->db->get_where('hx_installments', array('ins_id' => $ins_id_x))->row()->ins_down_per;



   $hx_instalment_no = $this->CI->db->get_where('hx_installments', array('ins_id' => $ins_id_x))->row()->ins_total_ins;

    

   $dis_id = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->dis_id;

  

   $ext_id = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->ext_id;

    

      

   $dis_per = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->cli_discount;



   $ext_per = $this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->cli_extra;
$a_amount=$this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->a_amount;
$p_amount=$this->CI->db->get_where('hx_clients', array('cli_id' => $cli_id))->row()->p_amount;

  if($dis_id == 1){

      

       $down_pay = ($unit_price / 100) * $down_per;

       $dis_pay = ($down_pay / 100) * $dis_per;

       $down_pay = $down_pay - $dis_pay;
      $a_pay = $down_pay + $a_amount + $p_amount;
       

    $ins = $unit_price - $a_pay - $dis_pay;

       $payable = $a_pay + $ins;

      

      if($ext_id == 1){

          

           $down_pay = ($unit_price / 100) * $down_per;

          

           $dis_pay = ($down_pay / 100) * $dis_per;

      

           $down_pay = $down_pay - $dis_pay;
$a_pay = $down_pay + $a_amount + $p_amount;
     

           $ins = $unit_price - $a_pay;

      

           $payable = $a_pay + $ins;

          

           $ext_pay = ($payable / 100) * $ext_per;

         

           $ins = $unit_price - $a_pay + $ext_pay - $dis_pay;

      

           $payable = $a_pay + $ins;

          



          

      }else{

          

           $ext_pay = ($unit_price / 100) * $ext_per;

          

           $after_ext_p = $unit_price + $ext_pay;

      

           $down_pay = ($after_ext_p / 100) * $down_per;

         

           $dis_pay = ($down_pay / 100) * $dis_per;

          

           $down_pay = $down_pay - $dis_pay;
$a_pay = $down_pay + $a_amount + $p_amount;
          

           $ins = $after_ext_p - $a_pay - $dis_pay;

          

           $payable = $a_pay + $ins;

          

      }

      

  } else {



      

      if($ext_id == 1){

          

           $dis_pay = ($unit_price / 100) * $dis_per;

      

           $after_dis_unit = $unit_price  - $dis_pay;

          

           $ext_pay = ($after_dis_unit / 100) * $ext_per;

          

           $after_ext_dis_p = $after_dis_unit + $ext_pay;

          

           $down_pay = ($after_ext_dis_p / 100) * $down_per;

          $a_pay = $down_pay + $a_amount + $p_amount;

           $ins = $after_ext_dis_p - $a_pay;

          

           $payable = $a_pay + $ins;



          

      }else{

          

           $ext_pay = ($unit_price / 100) * $ext_per;

          

           $after_ext_p = $unit_price + $ext_pay;

      

           $dis_pay = ($after_ext_p / 100) * $dis_per;

          

           $after_dis_ext_p = $after_ext_p  - $dis_pay;

          

           $down_pay = ($after_dis_ext_p / 100) * $down_per;
$a_pay = $down_pay + $a_amount + $p_amount;
          

           $ins = $after_dis_ext_p - $a_pay;

          

           $payable = $a_pay + $ins;

          

      }

  }



        

    $out = array();  

    

    $out['hx_down_per'] = $down_per;

    $out['hx_down'] = $down_pay;

    $out['hx_discount_per'] = $dis_per;

    $out['hx_discount'] = $dis_pay;

    $out['hx_extra'] = $ext_pay;

    $out['hx_extra_per'] = $ext_per;

    $out['hx_instalments'] = $ins;

    $out['hx_instalments_no'] = $hx_instalment_no;

    $out['hx_payable'] = $payable;

        

    return $out;

        

        
}
    

    

}

?>