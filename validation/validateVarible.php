<?php 
defined('ACCESS') || header("location:../");
/**
 * Validation for all inputs 
 */
class validateVarible
{
	private $input;
   function __construct($input){
		$this->input = $input;
	}

    function cleanInput($input=''){

      if(empty($input))

      $input = $this->input;
      
      
      $input = utf8_decode($input);

      $clean = strtolower( $input);
  
      $clean = preg_replace('/[^a-zA-Z0-9\']/','', $clean); 
  
      $clean = substr( $clean,0,50);
  
    return $clean;
   }

}