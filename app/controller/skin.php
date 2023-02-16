<?php
defined('ACCESS') || header("location:../");
/**
 *  compoent class
 *  function
 *  create, update, delete, save, menus of templates
 */
class skin
{
    private $filename;
    private $dir = 'asset/css/skin/';

    public function __construct($filename = '') {
       $this->filename = $filename ?? '';
        //if((!$this->filename)) return;
 
    }
    function create()
    {

        $return = array('code'=> null,'name'=>'');

        if (!isset($_POST['templatename']) || strlen($_POST['templatename']) > 255 || !preg_match('/^[a-zA-Z-1-9]+$/', $_POST['templatename']))
        {
            $return['code'] = 1;
        }

        if ($return['code'] === null):
            if (isset($_POST['templatename']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
                $name = $_POST['templatename'];
                $compoent = "asset/css/skin/{$name}.css";
                if (!file_exists($compoent)):
                    fopen($compoent, "w") or die("Unable to open file!");
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
        file_put_contents($this->dir.$this->filename.'.css',($content));
    }

    public function load() {
        $content = @file_get_contents($this->dir.$this->filename.'.css');
        return $content;
    }

    private function delete() {
        unlink($this->dir.$this->filename);
    }


    private function menus(){
        $arrFiles = scandir('asset/css/skin/');
        print_r($arrFiles);
    }

}

