<?php 
/**
 * user : WMI 
 * date : 20/08/2022
 */
    
    
    define('ACCESS', true); define('ABSPATH', "/".basename(__DIR__)."/");
     // this is a root file handling all inputs and class to server gives rensponse 
    require_once getcwd() . '/router/root.php';
