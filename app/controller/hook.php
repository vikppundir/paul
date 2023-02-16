<?php 
/**
 * 
 * this is hook class for head section to include class file meta tag title if available for page.
 * 
 */
 
 class hook{
     
    function __construct($hook,$name){
        $this->hook = $hook;
        $this->name = $name;
    }
    
    public function init(){
        
        if($this->hook == 'skin') return skin($this->name);
        
    }
     
 }