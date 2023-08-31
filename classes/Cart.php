<?php

class Cart{

    private $cart;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }

    public function getAllProductsid($id){

        $params = [':uid' => $id                
    
    ];
        $query = $this->sql->query('SELECT * FROM cart WHERE id = :uid',  $params);

        return $query;

    }

    public function getAllCart(){

 
        $query = $this->sql->query('SELECT * FROM cart');

        return $query;

    }

}

?>

