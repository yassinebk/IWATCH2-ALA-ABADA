<?php

// Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
public function getProductData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");
        if($result)
        {
        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    }
    // fetch cart data using getData Method
    public function getData($table = 'product',$user_id=null){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id='$user_id'");
        if($result)
        {
            var_dump("here");
        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        var_dump(count($resultArray));

        return $resultArray;
    }
    }
       // get product using item id
    public function getProduct($item_id = null, $table= 'product'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id} ");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    
}


