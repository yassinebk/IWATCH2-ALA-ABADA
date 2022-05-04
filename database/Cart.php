<?php
// card class
Class Cart
{
      public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                print_r($params);
                // get table columns
                $columns = implode(',', array_keys($params));

                $value = implode(',' , array_values($params));
                
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $value);
                
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
 // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){

        if (isset($userid) && isset($itemid)){
            $req="INSERT INTO cart (user_id,item_id,quant) VALUES ($userid,$itemid,1);";
            $res=$this->db->con->query($req);
        }
    }
    public  function addQte($itemqte){
        if ($itemqte){
            $params = array(
                    
                "item_qte" => $itemqte
            );        }}
    //delete product using item id
    public function deleteCart($item_id = null, $table= 'cart'){
        if ($item_id!=null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            
            if($result)
            {
                header("Location:".$_SERVER['PHP_SELF']);
            }
            
            return $result;
        }
    }
    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }
        // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }
    
}