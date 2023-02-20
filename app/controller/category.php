<?php 
/**
 * 
 * this is hook class for head section to include class file meta tag title if available for page.
 * 
 */

 defined('ACCESS') || header("location:../");
 
 class category{
     
     protected $table = 'category';
     
    function __construct(array $pram=null){
        
        $this->id      = $pram['id']??isset($_POST['id']) ? $_POST['id'] : null;
        $this->name    = $pram['name']??isset($_POST['category']) ? $_POST['category'] : null;
        $this->prentId = $pram['pID']??isset($_POST['prentCategory']) ? $_POST['prentCategory'] : null;
        $this->title   = $pram['title']??isset($_POST['title']) ? $_POST['title'] : null;
        $this->desc    = $pram['descrption']??isset($_POST['descrption']) ? $_POST['descrption'] : null;
        $this->type    = $pram['type']??isset($_POST['type']) ? $_POST['type'] : 'main';
        $this->json    = $pram['json']??isset($_POST['json'])? $_POST['json'] : null;
        if(isset($_POST['action']) && $_POST['action'] == 'create'): 
              $this->url  =strtolower(str_replace(' ','-',$this->name));
            else:
              $this->url  = $url??isset($_POST['url'])? $_POST['url'] : null;
              $this->url  = strtolower(str_replace(' ','-',$this->url));

        endif;
        

    }
    
    private function create(){
  
     query()->insert("insert into {$this->table} (name,parentId,url,type) VALUES(?,?,?,?)",[$this->name,$this->prentId,$this->url,$this->type]);
        
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
    
    
    public function offSetPagination($limit,$pageNumber){
        
          $offset =  ($pageNumber -1) * $limit;
          return query()->select("SELECT c1.* FROM  {$this->table} c1 LEFT JOIN category c2 on c2.id = c1.parentId where c1.type ='{$this->type}' ORDER BY COALESCE(c2.id, c1.id), c1.id and c1.is_active = 1 limit {$limit} offset {$offset}");
        
    }
    
    private function HTML($response){
        
         foreach(json_decode($response)->data as $menu): ?>
                
                        <div class="allpages-cat-inner d-flex align-items-center">
                            <div class="page-name">
                                <h3><?php if($menu->parentId != 0 ) echo '--' ;  ?> <?php echo $menu->name ?></h3>
                                <div class="pagemeta">
                                    <ul>
                                        <li><a href="<?= ABSPATH ?>admin/category?id=<?php echo $menu->id ?>&name=<?php echo $menu->name ?>">Edit</a></li>
                                        <li><a href="">Delete</a></li>
                                        <li><a href="<?= ABSPATH ?>admin/category?id=<?php echo $menu->id ?>&name=<?php echo $menu->name ?>">View</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="page-author">
                                <h3><?php echo $menu->postCount ?></h3>
                            </div>
                            <div class="page-date">
                               <?php echo date('d-M-Y',strtotime($menu->created_at)) ?>
                            </div>
                        </div>
         <?php endforeach;
         
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
          
          
        if(isset($_POST['action']) && $_POST['action'] == 'pagination'):
            
             $limit = requestPrameter('limit');
             $pageNumber = requestPrameter('pageNumber');
              $response = $this->offSetPagination($limit,$pageNumber);
              $response = $this->HTML($response);
        
        endif;
        else:
            
           $response['errMsg'] = 'bad Rquest';
           $response['code'] = 4;
        endif;
      if( $_POST['action'] != 'pagination'):
       print_r(json_encode($response));
      endif;
    }
     
 }
    