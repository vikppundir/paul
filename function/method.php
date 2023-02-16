<?php
/**
 * 
 * norm function 
 * 
 */
 
 defined('ACCESS') || header("location:../");

 function is_login(){
    if(isset($_SESSION['IntrbologinEmail'])):
        return true;
        else:
        return false;
    endif;
 }
 
 function user(){
 
      $emailUser = isset($_SESSION['IntrbologinEmail']) ? $_SESSION['IntrbologinEmail'] : null;
      $user = sql("select id,name,lastname as last,email,roll from users where email='{$emailUser}'");
      return isset($user->data[0]) ? $user->data[0] : ((object)array('id' =>0 ,'name'=>'guest','last'=>'user','email'=>"",'roll'=>""));
     
 }
 
 function is_trader($data = false){
     
     if(is_login()):
         
         $trader =  sql("select * from business_details where userId = ?",[user()->id]);
         
       if($data):
           
           return isset($trader->data[0]) ? $trader->data[0] : null;
           
         else:
             
          if($trader->count == 1) return true;
        
       endif;
       
     endif;  
    
    return false;
 }

 function is_roll(){
     if(is_login()):
         if(user()->roll == 'admin'): return 'admin' ;
         elseif(user()->roll == 'sadmin'): return 'supperAdmin' ;
         else: return 'user';
         endif;

     endif;
     
 }
 
 function is_supper_admin(){
     
     if(is_roll() == 'supperAdmin') return true;
     
     return false;
     
 }
 
  function is_admin(){
      
     if(is_roll() == 'admin') return true;
     
     return false;
     
 }
 

 function requestPrameter($name){
     
     $name = isset($_REQUEST[$name]) ? $_REQUEST[$name] :'';
     $name = htmlSpecialChar($name);
     
     return $name;
    }
 
 
 function htmlSpecialChar($name){
     $name = trim($name);
     $name = stripslashes($name);
     $name = htmlspecialchars($name);
     return $name;
 }
 
    
    function query(){return $query = new query();}
    function sql($sql, $pram = array(), $formet = false)
    {
      $query = new query(); 
      return json_decode($query->select($sql,$pram,$formet));
    }
    
    function viewD($name){ 
        if(!empty($name)): 
             if (file_exists("view/dashboad/{$name}.php")):
                   include("view/dashboad/{$name}.php"); 
              else:
                  echo "this DashBoad name {$name} is not found ";
             endif;
        else:
            echo "File Name is Required";
        endif;
    }
    
  if (!function_exists('str_contains')) {
    function str_contains( $haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
  
    }
   }
   
    if (!function_exists('before')) {
     function  before($data,$for){

       if (($pos = strpos($data,$for)) !== FALSE):
             
             return substr($data,0,$pos); 
                     
        endif;
       return $data;
     }             
    }
    
    
  if (!function_exists('after')) {
     function  after($data,$for){

       if (($pos = strpos($data,$for)) !== FALSE):
             
             return substr($data,$pos+1); 
                     
        endif;
        return $data;
     }             
    }
    
    
  function TimeList($tag,$minutes,$start,$end){

      $startDate = DateTime::createFromFormat("H:i", $start);
      $endDate = DateTime::createFromFormat("H:i", $end);
      $interval = new DateInterval("PT".$minutes."M");
      $dateRange = new DatePeriod($startDate, $interval, $endDate);
      
      $return = '';
      foreach ($dateRange as $date):
          
        $return .= "<$tag>". $date->format("H:i")."</$tag>";
        
      endforeach;
      
      return $return;
      
  }
                
    function component($name){ 
    
        if(!empty($name)): 
            
            if(!str_contains($name,'@')):
               $name = str_replace('@','',$name);
                 if (file_exists("view/component/{$name}.php")):
                   include("view/component/{$name}.php"); 
                 else:
                  echo "this component name {$name} is not found ";
                  
                 endif;
             
             else:
                   $name = str_replace('@','',$name);
                   if (file_exists("view/preComponent/{$name}.php")):
                   include("view/preComponent/{$name}.php"); 
              else:
                  echo "this preComponent name {$name} is not found ";
                  
             endif;
           endif;
        else:
            echo "File Name is Required";
        endif;
    }
    
    function view($name){ 
        if(!empty($name)): 
             if (file_exists("view/template/{$name}.php")):
                   include("view/template/{$name}.php"); 
              else:
                  echo "This Template name {$name} is not found ";
             endif;
        else:
            echo "File Name is Required";
        endif;
    }
    
 
 
function skin($name){ 
        if(!empty($name)): 
             if (file_exists("asset/css/skin/{$name}.css")):
          echo "<link rel='stylesheet' href='".ABSPATH."asset/css/skin/{$name}.css'>";
              else:
                  echo "this Skin name {$name} is not found ";
             endif;
        else:
            echo "Skin Name is Required";
        endif;
    }


function hook($hook='',$name=''){
   
}

function head(){
    echo hook();
}