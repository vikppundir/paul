<?php 

defined('ACCESS') || header("location:../");

class server{

   static function url(){

        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";    
         
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    
        $domin = $protocol . $_SERVER['SERVER_NAME'];
        return array('domin' => $domin,'url'=>$url,parse_url($url));


    }

   static function prameter(){

        $url = self::url();
   
        $prameter = $_SERVER['QUERY_STRING'];
   
        $url = parse_url($url['url']);

        $url = array_values(array_filter(explode('/',($url["path"]))));
        
        return $url;

    }
}

