<?php
/**
 * this is a data base connction file 
 */

defined('ACCESS') || header("location:../");

Class db{

      private  $server   = "mysql:host=".dbSERVER.";dbname=".dbNAME;
      private  $user     = dbUSER;
      private  $pass     = dbPASSWORD;
      private  $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::                   ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,);      
      protected  $conn;

      public function openConnection(){

             try{

               $this->conn = new PDO($this->server, $this->user,$this->pass,$this->options);
              
               return $this->conn;

                }

             catch (PDOException $e)

                 {
                     echo "There is some problem in connection: " . $e->getMessage();
                 }

            }


     public function __destruct() {
        $this->conn = null;
        $this->openConnection = null;
    }

}

?>