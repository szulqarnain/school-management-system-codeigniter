<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_sms')){
   function send_sms($mob=null, $msg=null){

$mobile = $mob;///Recepient Mobile Number
$sender = "SenderID";
$message = $msg;

////sending sms

$post = "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."";
$url = "http://bsms.hostechpk.com/web_distributor/api/sms.php?username=kpndod&password=kpndod123789";
$ch = curl_init();
$timeout = 30; // set to zero for no timeout
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$result = curl_exec($ch); 
       return $result;
   }
}
