<?php 
/**
 * 
 * this is business Details page 
 * 
 */
 
 defined('ACCESS') || header("location:../");
 
 class business{
         
         protected $table ='business_details';
         protected static $stable ='business_details';
         
         function __construct($pram = []){
             
             $this->userId              = isset($pram['userId']) ? $pram['userId'] : user()->id??0; 
             $this->busnissName         = isset($pram['businessName']) ? $pram['businessName'] : (isset($_POST['businessName']) ? $_POST['businessName'] :'');
             $this->busnissEmail        = isset($pram['businessEmail']) ? $pram['businessEmail'] :(isset($_POST['businessEmail']) ? $_POST['businessEmail']:'');
             $this->businessBio         = isset($pram['businessBio']) ? $pram['businessBio'] :(isset($_POST['businessBio']) ? $_POST['businessBio']:'');
             $this->facebook            = isset($pram['facebook']) ? $pram['facebook'] :(isset($_POST['facebook']) ? $_POST['facebook'] :'');
             $this->Businessday         = isset($pram['Businessday']) ? $pram['Businessday'] :(isset($_POST['Businessday']) ? $_POST['Businessday'] :'');
             $this->Businesshours       = isset($pram['businesshours']) ? $pram['businesshours'] :(isset($_POST['businesshours']) ? $_POST['businesshours'] :'');
             $this->Service_area        = isset($pram['Service_area']) ? $pram['Service_area'] :(isset($_POST['Service_area']) ? $_POST['Service_area'] :'');
             $this->firstname           = isset($pram['Firstname']) ? $pram['Firstname'] :(isset($_POST['Firstname']) ? $_POST['Firstname'] :null);
             $this->lastname            = isset($pram['Lastname']) ? $pram['Lastname'] :(isset($_POST['Lastname']) ? $_POST['Lastname'] :null);
             $this->contactNo           = isset($pram['contactNo']) ? $pram['contactNo'] :(isset($_POST['contactNo']) ? $_POST['contactNo'] :0);
             $this->AlternateContactNo  = isset($pram['AlternateContactNo']) ? $pram['AlternateContactNo'] :(isset($_POST['AlternateContactNo']) ? $_POST['AlternateContactNo'] :0);
             $this->BusinessPhoto       = isset($pram['BusinessPhoto']) ? $pram['BusinessPhoto'] :(isset($_FILES['BusinessPhoto']) ? $_FILES['BusinessPhoto'] :'');
             $this->ServicesType        = isset($pram['ServicesType']) ? $pram['ServicesType'] :(isset($_POST['ServicesType']) ? $_POST['ServicesType'] :0);
             $this->Services            = isset($pram['Services']) ? $pram['Services'] :(isset($_POST['Services']) ? $_POST['Services'] :0);
             $this->is_active           = isset($pram['is_active']) ? $pram['is_active'] :(isset($_POST['is_active']) ? $_POST['is_active'] :1);
             $this->experience          = isset($pram['experience']) ? $pram['experience'] :(isset($_POST['experience']) ? $_POST['experience'] :'');
             $this->expDescription      = isset($pram['experienceDescription']) ? $pram['experienceDescription'] :(isset($_POST['experienceDescription']) ? $_POST['experienceDescription'] :'');
             $this->aboutMe            = isset($pram['aboutMe']) ? $pram['aboutMe'] :(isset($_POST['aboutMe']) ? $_POST['aboutMe'] :'');
            // $this->Services            = isset($pram['Services']) ? $pram['Services'] :(isset($_POST['Services']) ? $_POST['Services'] :0);
            // $this->Services            = isset($pram['Services']) ? $pram['Services'] :(isset($_POST['Services']) ? $_POST['Services'] :0);
            // $this->Services            = isset($pram['Services']) ? $pram['Services'] :(isset($_POST['Services']) ? $_POST['Services'] :0);
            // $this->Services            = isset($pram['Services']) ? $pram['Services'] :(isset($_POST['Services']) ? $_POST['Services'] :0);

         }
         
         private function create(){
             
             $checkData   = json_decode($this->businessById())->data[0]??'';          
             $imagesUrl   = media::imageUpload($this->BusinessPhoto)??'';
             $imagesUrl   = isset($imagesUrl['url']) ? $imagesUrl['url'] :'';
             $imagesUrl   =  $imagesUrl ? $imagesUrl : $checkData->BusinessPhoto??'';
             
             
             
             /// start dayb and time value get //
             $bhr =  isset($this->Businesshours) ? $this->Businesshours: '';
             $Businessday = isset($this->Businessday) ? $this->Businessday : array();
             
             
             
             if(!empty($Businessday)):
             
             $TimeJson = array();
             
              foreach($Businessday as $day):

                 $time     = isset($_POST[$day]) ? $_POST[$day] :'';
                 $timeTo   = isset($_POST[$day.'to']) ? $_POST[$day.'to'] :'';
                 $TimeJson = array_merge($TimeJson,[ $day => $time.'-'.$timeTo] );
                 
              endforeach;
              
                 $bhr =  json_encode($TimeJson);
             endif;
             
             $Businessday = isset($this->Businessday) ? array() : '';
            /// end dayb and time value get ///
              
             $Businessday = join(',',$Businessday);
              
             //start service geting service value //
             $ServicesType = $this->ServicesType ??array();
             
              $json = array();
              
              foreach($ServicesType as $type):
                 
               $childID  = isset($_POST['Services'.$type]) ? $_POST['Services'.$type] :array();
              
               if(!empty($childID)):
                   
                   $childID = join(',',$childID);
             
                   $json = array_merge($json,array('type_'.$type => $childID));
                   
                endif;
                
              endforeach;
             
             $sevice =  json_encode($json);
             
             
             $ServicesType = join(',',$ServicesType);
             
            //end service geting service value //

 
             $value = [
                      
                      $this->userId,
                      $this->busnissName,
                      $this->busnissEmail,
                      $this->businessBio,
                      $this->facebook,
                      $Businessday,
                      $bhr,
                      $this->Service_area,
                      $this->contactNo,
                      $this->AlternateContactNo,
                      $imagesUrl,
                      $ServicesType,
                      $sevice,
                      0,
                      $this->aboutMe
                      
                     ];
           
             $update = false;
             
             if($this->firstname != null): $name = "name = '{$this->firstname}'";  $update = true; else: $name = ''; endif;
             
             if($this->lastname != null): $lastname = "lastname='$this->lastname'"; $update = true; else: $lastname = ''; endif;
             
              $comma = '';  if($name != '' && $lastname != '') $comma = ',';
             
             if($update) query()->update("update users set $name $comma $lastname  where id = {$this->userId}");
             
             return query()->insert("insert into {$this->table}
             
             (userId,busnissName,BusinessEmail,businessBio,facebook,Businessday,Businesshours,Service_area,contactNo,AlternateContactNo,BusinessPhoto,ServicesType,Services,is_active,aboutMe)
             
             values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$value);
             
         }
         
         private function update(){
                         
             $checkData   = json_decode($this->businessById())->data[0];          
             $imagesUrl   = media::imageUpload($this->BusinessPhoto)??'';
             $imagesUrl   = isset($imagesUrl['url']) ? $imagesUrl['url'] :'';
             $imagesUrl   =  $imagesUrl ? $imagesUrl : $checkData->BusinessPhoto;
             
             
             
             /// start dayb and time value get //
             $bhr =  isset($this->Businesshours) ? $this->Businesshours: '';
             $Businessday = isset($this->Businessday) ? $this->Businessday : array();
             
             
             
             if(!empty($Businessday)):
             
             $TimeJson = array();
             
              foreach($Businessday as $day):

                 $time     = isset($_POST[$day]) ? $_POST[$day] :'';
                 $timeTo   = isset($_POST[$day.'to']) ? $_POST[$day.'to'] :'';
                 $TimeJson = array_merge($TimeJson,[ $day => $time.' - '.$timeTo] );
                 
              endforeach;
              
                 $bhr =  json_encode($TimeJson);
             endif;
             
             $Businessday = join(',',$this->Businessday);
            /// end dayb and time value get ///
              
              
              
             //start service geting service value //
             $ServicesType = $this->ServicesType ??array();
             
              $json = array();
              
              foreach($ServicesType as $type):
                 
               $childID  = isset($_POST['Services'.$type]) ? $_POST['Services'.$type] :array();
              
               if(!empty($childID)):
                   
                   $childID = join(',',$childID);
   
                   $json = array_merge($json,array('type_'.$type => $childID));
                   
                endif;
                
              endforeach;
             
             $sevice =  json_encode($json);
             
             
             $ServicesType = join(',',$ServicesType);
             
            //end service geting service value //

             $value = [
                      
                     
                    ':busnissName'   => $this->busnissName,
                    ':BusinessEmail' => $this->busnissEmail,
                    ':businessBio'   => $this->businessBio,
                    ':facebook'      => $this->facebook,
                    ':Businessday'   => $Businessday,
                    ':Businesshours' => $bhr,
                    ':Service_area'  => $this->Service_area,
                    ':contactNo'     => $this->contactNo,
                    ':AlternateContactNo'  => $this->AlternateContactNo,
                    ':BusinessPhoto' => $imagesUrl,
                    ':ServicesType'  => $ServicesType,
                    ':Services'      => $sevice,
                    ':userId'        => $this->userId
                     ];
    
          $valueSet =  
            "busnissName =:busnissName,
             BusinessEmail =:BusinessEmail,
             businessBio = :businessBio,
             facebook =:facebook,
             Businessday =:Businessday,
             Businesshours =:Businesshours,
             Service_area =:Service_area,
             contactNo = :contactNo,
             AlternateContactNo =:AlternateContactNo,
             BusinessPhoto =:BusinessPhoto,
             ServicesType = :ServicesType,
             Services = :Services";
             
              $update = false;
             
             if($this->firstname != null): $name = "name = '{$this->firstname}'";  $update = true; else: $name = ''; endif;
             
             if($this->lastname != null): $lastname = "lastname='$this->lastname'"; $update = true; else: $lastname = ''; endif;
             
              $comma = '';  if($name != '' && $lastname != '') $comma = ',';
             
             if($update) query()->update("update users set $name $comma $lastname  where id = {$this->userId}");
             
             return query()->insert("update {$this->table} set {$valueSet} where userId = :userId ",$value);
             
             
         }
         public function businessById($id = null){
             $ids = isset($id) ? $id:$this->userId;

             return query()->select("select * from {$this->table} where userId IN({$ids}) and is_active = 1");
             
             
         }
        
        public function userDetails($id = null,$name= null, $for = false){
            
              $return  = array();
              
              $filter_options = array( 
                      'options' => array( 'min_range' => 1) 
                   );
            
             if($id !== null):  
             
             $ids = $id??0;
             
             if( filter_var( $ids, FILTER_VALIDATE_INT, $filter_options ) !== FALSE ):
                $pram = array(':id'=>$ids);
                 if($for && $name !==null):   $nameS = "AND u.name = :name"; $pram[':name'] = filter_var($name,FILTER_SANITIZE_STRING); else: $name = ''; endif; 
             return query()->select("select b.id as busnissId,u.id as userId,b.busnissName as businessName,b.BusinessEmail,businessBio,b.Facebook as facebookLink,b.Businessday,b.Businesshours,b.Service_area,b.ServicesType as serviceType,b.Services as service,b.created_at as time,u.name as userName, u.lastname as UserLastName,contactNo,AlternateContactNo,BusinessPhoto from {$this->table} b JOIN users u on u.id = b.userId  where  b.userId = :id  {$nameS} AND is_active = 1 and u.verified = 1", $pram);
             
             
             else:
                 
                 return $return['msg'] = "Ids shulde be interger and name in string";
                 
             
             endif;
             
                 return  $return['msg'] = "Please pass the user id for get the value";
              
            endif;
            
        }
        public function businessByCategoryId($pram,$prime = false){
            
               $Pfilter  =  isset($pram['id']) ? join(',',$pram['id']) :'';
               $cfilter  =  isset($pram['Cid']) ? join(',',$pram['Cid']) :'';
               
               $is_prime = 0;
               if($prime) $is_prime = 1;
               
             return query()->select("select b.id as busnissId,u.id as userId,b.busnissName,b.BusinessEmail,businessBio,b.Facebook as facebookLink,b.Businessday,b.Businesshours,b.Service_area,b.ServicesType as serviceType,b.Services as service,b.created_at as time,u.name as userName, u.lastname as UserLastName,contactNo,AlternateContactNo,BusinessPhoto
             from {$this->table} b JOIN users u on u.id =b.userId  where FIND_IN_SET(:id,b.ServicesType) AND is_active = 1 and u.verified = 1 and b.is_prime = :prime",
             array(':id'=>$Pfilter,":prime" =>$is_prime));
             
         }
        
         public static function result($pram= null,$tram = 'or'){
             
             $id     =  isset($pram['id']) ? "{$tram} b.id = {$pram['id']}":'';
             $C_name =  isset($pram['categoryName']) ? "{$tram} name = {$pram['categoryName']}" :'';
             $C_id   =  isset($pram['ServiceType']) ? "{$tram} FIND_IN_SET({$pram['ServiceType']},b.ServicesType)" : '';
             $loc    =  isset($pram['location']) ? "{$tram} FIND_IN_SET('{$pram['location']}',b.Service_area)" : '';
             $CP_id  =  $pram['service']??'';
             $limit =  isset($pram['limit']) ? "LIMIT {$pram['limit']}":'';
             $offset  =  isset($pram['offset']) ? "OFFSET {$pram['offset']}":'';
             $order  =  isset($pram['orderBy']) ? "ORDER BY {$pram['orderBy']}":'';

             $table = self::$stable;
             
             return query()->select("select b.id as busnissId,u.id as userId,b.busnissName,b.BusinessEmail,businessBio,b.Facebook as facebookLink,b.Businessday,b.Businesshours,b.Service_area,b.ServicesType as serviceType,b.Services as service,b.created_at as time,u.name as userName, u.lastname as UserLastName,contactNo,AlternateContactNo,BusinessPhoto
             from {$table} b JOIN users u on u.id = b.userId where is_active = 1 $id $C_name $C_id $loc $order $limit $offset");
             
             
         }
        public function init(){
            
        $response = [];
          if(!empty($this->userId) && $this->userId != 0 && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
              
              if(!empty($this->ServicesType) && $this->ServicesType != ''):

              if(json_decode($this->businessById())->count > 0):
              
 
                 $this->update();
                 $response['msg'] = "Your busniss Profile updated"; 

               else:
                   
                 $this->create();
                 $response['msg'] = "Your busniss Profile created"; 
                 
               endif;
               
               else:
                   $response['msg'] =  'Please Select a service 1 and more';
               endif;
          else:
              
             $response['msg'] = "Auth not valid! out side request not be consider and api not provided"; 
          
         
         endif;
             print_r(json_encode($response));
         
        }
         
 }