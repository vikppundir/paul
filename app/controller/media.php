<?php 
/**
 * 
 * this is hook class for head section to include class file meta tag title if available for page.
 * 
 */
 defined('ACCESS') || header("location:../");
 
  class media {
     
         private static $dir       = "/asset/uploads/";
         private static $returnUrl = ABSPATH."asset/uploads/";
         
         function __construct($pram){
             
             $this->pram = $pram;
         }

         static function imageUpload($request){
             
             
             $msg = "Please Upload a File";
             $file = $request;
             $url = '';
             $target_dir = getcwd().self::$dir;
             $target_file = '';
             $uploadOk = 1;
             $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
             
              if(isset($file["name"]) && isset($file["tmp_name"])):
              // Check if image file is a actual image or fake image
       
     /*         if(getimagesize($file["tmp_name"]) !== false):
               $check =  getimagesize($file["tmp_name"]);
               $msg = "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
              else:
              $msg = "File is not an image.";
              $uploadOk = 0;
              endif;
       */

             // Check file size
             if ($file["size"] > 500000):
             $msg = "Sorry, your file is too large.";
             $uploadOk = 0;
             endif;

             // Allow certain file formats
             if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ):
               $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
               $uploadOk = 0;
              else:
                $UpadteName = time().'-'.user()->id.'-'.basename($file["name"]);
                $target_file = $target_dir. $UpadteName ;
                
             endif;
             
             
             // Check if file already exists
             if (file_exists($target_file)):
               $msg = "Sorry, file already exists.";
               $uploadOk = 0;
             endif;

             // Check if $uploadOk is set to 0 by an error
             if ($uploadOk == 0):
             $msg = "Sorry, your file was not uploaded.";
             // if everything is ok, try to upload file
             else:
             if (move_uploaded_file($file["tmp_name"], $target_file)):
              $url =  self::$returnUrl.$UpadteName;
              $msg = "The file ". htmlspecialchars( basename($file["name"])). " has been uploaded.";
             else:
              $msg = "Sorry, there was an error uploading your file.";
             endif;
             endif;
             endif;
             
             return (array('msg' => $msg, 'url' => $url));
         }
 }