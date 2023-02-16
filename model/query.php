<?php
defined('ACCESS') || header("location:../");

/**
 * this sql Query class and function
 * includes select, insert , delete , update functions
 * this file working all app
 * just call query function and write function as you want.
 */
class query extends db
{

    private $array;

   

    public function select($query, $prameter = array(),$json =false)
    {
        
        $return = array(
            'rensponse' => 200,
            'message' => 'success',
            'count' => 0,
            'data' => (array())
        );

        if (empty($query))
        {
            $return['message'] = 'query prameter should not be empty';
            return false;
        }

        $stmt = $this->openConnection()->prepare($query);
        $stmt->execute($prameter);
        if($stmt->rowCount()):
        $return['count'] = $stmt->rowCount();
        $return['data'] = $stmt->fetchAll();
        if($json === 'json'):
        header("Content-Type: application/json; charset=UTF-8");
        endif;
        endif;
        return json_encode($return, JSON_PRETTY_PRINT);

    }

    public function insert($query, $prameter = array())
    {

        $this->openConnection()->prepare($query)->execute($prameter);

        return $this->openConnection()->lastInsertId()??0;
    }

    public function update($query, $prameter = array())
    {

        $stmt = $this->openConnection()->prepare($query);
        if($stmt->execute($prameter)): return true; else: return false; endif;

    }

    public function delete($query, $prameter = array())
    {

        $stmt = $this->openConnection()->prepare($query);
        $stmt->execute($prameter);

    }

}

