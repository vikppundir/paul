<?php
defined('ACCESS') || header("location:../");
/**
 *  compoent class
 *  function
 *  create, update, delete, save, menus of templates
 */
class templates
{
    private $filename;
    private $dir = 'view/template/';

    public function __construct($filename = '') {
       // $action = isset($_POST['action']) ? $_POST['action'] : false;
       // $this->filename = isset($_POST['filename']) ? $_POST['filename'] : false;
       $this->filename = $filename ?? '';
        if((!$this->filename)) return;
 
    }
    function create()
    {

        $return = array('code'=> null,'name'=>'');

        if (!isset($_POST['templatename']) || strlen($_POST['templatename']) > 255 || !preg_match('/^[a-zA-Z- 0-9]+$/', $_POST['templatename']))
        {
            $return['code'] = 1;
        }

        if ($return['code'] === null):
            if (isset($_POST['templatename']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
                $name = $_POST['templatename'];
                $type = $_POST['type'];
                $compoent = "view/template/{$name}.php";
                if (!file_exists($compoent)):
                    fopen($compoent, "w") or die("Unable to open file!");
                    $return['name'] = $name;
                 query()->insert('INSERT into templates(id,name,type,created_at) VALUES(?,?,?,?)',array(null,$name,$type,time()));

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
        file_put_contents($this->dir.$this->filename.'.php', urldecode($content));
    }

    public function load() {
        $content = @file_get_contents($this->dir.$this->filename.'.php');
        return $content;
    }

    private function delete() {
        unlink($this->dir.$this->filename);
    }


    private function menus(){
        $arrFiles = scandir('view/template/');
        print_r($arrFiles);
    }

}

