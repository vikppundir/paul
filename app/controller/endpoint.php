<?php
defined('ACCESS') || header("location:../");
/**
 *  compoent class
 *  function
 *  create, update, delete, save, menus of components
 */
class endpoint
{
    private $filename;
    private $dir = 'app/api/endpoint/';

    public function __construct($filename = '') {
        
        $this->filename = isset($_POST['endpoint']) ? $_POST['endpoint'] : false;
        if((!$this->filename))  $this->filename = $filename?? '' ;
        if((!$this->filename)) return;
 
    }
    function create()
    {

        $return = array('code'=> null,'name'=>'');

        if (!isset($this->filename) || strlen($this->filename) > 255 || !preg_match('/^[a-zA-Z- ]+$/', $this->filename))
        {
            $return['code'] = 1;
        }

        if ($return['code'] === null):
            if (isset($this->filename) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
                $name = $this->filename;
                $formet_type = $_POST['formet_type'];
                $random_id = $this->generateRandomString();
                $url = "v2/{$random_id}/plugin/endpoint/{$name}";
                $micro = $this->dir."{$name}.php";
                if (!file_exists($micro)):
                    fopen($micro, "w") or die("Unable to open file!");
                    query()->insert('INSERT into endpoint(id,name,href,formet_type,endpoint_id,created_at) VALUES(?,?,?,?,?,?)',array(null,$name,$url, $formet_type,$random_id,time()));
                    $return['name'] = $name;
                    $return['code'] = 0;
                else:
                    $return['code'] = 2;
                endif;
            else:
                $return['code'] = 4;
            endif;

        endif;

        echo json_encode($return);

    }

    public function save() {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        file_put_contents($this->dir.$this->filename.'.php', ($content));
    }

    public function load() {
        $content = @file_get_contents($this->dir.$this->filename.'.php');
        return $content;
    }

    private function delete() {
        unlink($this->dir.$this->filename);
    }


    private function menus(){
        $arrFiles = scandir($this->dir);
        print_r($arrFiles);
    }
    
    function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
      for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
    return $randomString;
    }

}

