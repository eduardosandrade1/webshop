<?php

class Orders{

    private $order;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }


    public function getAllProductsid($id){

        $params = [':uid' => $id                
    
    ];

 
        $query = $this->sql->query('SELECT * FROM orders WHERE id = :uid',  $params);

        return $query;

    }

    public function getAllOrders(){

 
        $query = $this->sql->query('SELECT * FROM orders');

        return $query;

    }

}

?>

