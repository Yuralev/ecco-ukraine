<?php
/*********************************************
*                                            *
*             ДЛЯ ВЕБ-МАСТЕРА                *
*                                            * 
/*********************************************/

// Пиксель ставить на страницу спасибо - form-ok.php
 
// Ваш Ключ находится в разделе Инструменты->API 
$api_key = '0463ada2fd5fc36bb7bbdd16e57ec4b88fb06884';  
   
// Сабы (заполнять не обязательно) 
$sub_id1 = 'sub_id1';
$sub_id2 = 'sub_id2';
$sub_id3 = 'sub_id3';
$sub_id4 = 'sub_id4';
$sub_id5 = 'sub_id5';

// Параметры по умолчанию заполняются UTM метками (при желании можете изменить)
$aff_param1 = $_REQUEST['utm_source'];
$aff_param2 = $_REQUEST['utm_medium'];
$aff_param3 = $_REQUEST['utm_campaign'];
$aff_param4 = $_REQUEST['utm_term'];
$aff_param5 = $_REQUEST['utm_content'];





  


 


 


 

  
 
 
/*****************************************************
*                                                    *
*  ДАЛЕЕ ИДЕТ ИНТЕГРАЦИЯ, НИЧЕГО ИЗМЕНЯТЬ НЕ НУЖНО!  *
*                                                    *
/*****************************************************/
/**/
header('Location: form-ok.php?name=' . $_REQUEST['name'] . '&phone=' . $_REQUEST['phone']. '&comment=' . $_REQUEST['title']. '&utm_source=' . $_REQUEST['utm_source']. '&utm_medium=' . $_REQUEST['utm_medium']. '&utm_campaign=' . $_REQUEST['utm_campaign']. '&utm_term=' . $_REQUEST['utm_term']. '&utm_content=' . $_REQUEST['utm_content']);

if (!empty($_REQUEST['name']) && !empty($_REQUEST['phone'])) {

if(filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
  elseif(filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_CLIENT_IP'];
  elseif(filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  elseif(filter_var($_SERVER['HTTP_X_FORWARDED'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_X_FORWARDED'];
  elseif(filter_var($_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_FORWARDED_FOR'];
  elseif(filter_var($_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['HTTP_FORWARDED'];
  elseif(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) $ip = $_SERVER['REMOTE_ADDR'];
  else $ip = $remote; 
  if(strlen($ip)>16){$ip=long2ip(mt_rand());}   
 
  $data = array( 
  'goal_id' => '119',       
  'phone' => $_REQUEST['phone'],
  'firstname' => $_REQUEST['name'],
  'ip' => $ip,
  'custom1' => $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],
  'custom2' => $_SERVER["HTTP_USER_AGENT"],   
  'custom3' => $_REQUEST['comment'],  
  'custom4' => $_REQUEST['products'],     
  'custom5' => '', 
  'custom6' => '',
  'aff_param1' => $aff_param1,  
  'aff_param2' => $aff_param2,  
  'aff_param3' => $aff_param3,  
  'aff_param4' => $aff_param4,  
  'aff_param5' => $aff_param5,  
  'sub_id1' => $sub_id1,   
  'sub_id2' => $sub_id2,  
  'sub_id3' => $sub_id3,  
  'sub_id4' => $sub_id4,  
  'sub_id5' => $sub_id5,  
  ); 
       
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://track.skacpa.ru/api/v2/affiliate/leads?api-key=".$api_key,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));

  $response = curl_exec($curl);
   // echo "<pre>";
   // print_r($response);
   // echo "</pre>";
   
  curl_close($curl); 
 
}