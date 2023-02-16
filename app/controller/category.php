<?php 
/**
 * 
 * this is hook class for head section to include class file meta tag title if available for page.
 * 
 */

 defined('ACCESS') || header("location:../");
 
 class category{
     
     protected $table = 'category';
     
    function __construct($id= null,$name=null,$pID = null,$url=null,$title = null ,$descrption =null,$json = null){
        
        $this->id      = $id??isset($_POST['id']) ? $_POST['id'] : null;
        $this->name    = $name??isset($_POST['category']) ? $_POST['category'] : null;
        $this->prentId = $pID??isset($_POST['prentCategory']) ? $_POST['prentCategory'] : null;
        $this->title   = $title??isset($_POST['title']) ? $_POST['title'] : null;
        $this->desc    = $descrption??isset($_POST['descrption']) ? $_POST['descrption'] : null;
        $this->json    = $json??isset($_POST['json'])? $_POST['json'] : null;
        if(isset($_POST['action']) && $_POST['action'] == 'create'): 
              $this->url  =strtolower(str_replace(' ','-',$this->name));
            else:
              $this->url  = $url??isset($_POST['url'])? $_POST['url'] : null;
              $this->url  = strtolower(str_replace(' ','-',$this->url));

        endif;
        

    }
    
    private function create(){
  
     query()->insert("insert into {$this->table} (name,parentId,url) VALUES(?,?,?)",[$this->name,$this->prentId,$this->url]);
        
    }
    
    public function ChildById($id = null){
        
        $ids = $id??$this->prentId;
        
        return query()->select("select id,name from {$this->table} where parentId = {$ids} and is_active = 1");
    }
    
    public function byId($ids = null){
       $ids = $ids??$this->id;
       return query()->select("select id,name from {$this->table} where id IN({$ids}) and is_active = 1");
    }
    
    public function categoryName($id = null){
        
        if($id == null):
            return "pass a category Id to get name";
        else:
            return json_decode(query()->select("select name from {$this->table} where id = ?  and is_active = 1 limit 1",[$id]))->data[0]->name??'This category delete or you try a wrong id';
        endif;
        
     
        
    }
    public function update(){
        
        if(isset($_POST['update'])):
        query()->update("update {$this->table} set name = '{$this->name}', parentId = '{$this->prentId}',url = '{$this->url}',title = '{$this->title}', deccription = '{$this->desc}' where id ='{$this->id}'");
        header('Location:'.ABSPATH.'admin/category?id='.$this->id.'&name='.$this->name);
        endif;
    }
    
    
    public function init(){
        
         $response = array();
         
       if( isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
           
          if(isset($_POST['action']) && $_POST['action'] == 'create'):
              
            if (!isset($_POST['category']) || strlen($_POST['category']) > 255 || !preg_match('/^[a-zA-Z-0-9 ]+$/', $_POST['category'])):
                
                 $response['errMsg'] = 'Only letter and number';
                 $response['code'] = 1;
                 
              elseif(isset($_POST['category']) && isset($_POST['prentCategory'])):
               
                $this->create();
                $response['name'] = $_POST['category'];
                $response['sucessMsg'] =  'Success added';
                $response['code'] = 0;
               else:
               $response['errMsg'] = 'Prameter Require';
               $response['code'] = 3;
              endif;
            
            
        endif;
        
          if(isset($_POST['action']) && $_POST['action'] == 'childCategory'):
              print_r($this->ChildById());
              return;
              
          endif;        
        
        else:
           $response['errMsg'] = 'bad Rquest';
           $response['code'] = 4;
        endif;

       print_r(json_encode($response));
    }
     
 }