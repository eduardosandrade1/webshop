<?php

class Address{

    private $address;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }


    public function getAllProductsid($id){

        $params = [':uid' => $id                
    
    ];

 
        $query = $this->sql->query('SELECT * FROM address WHERE id = :uid',  $params);

        return $query;

    }



    public function getAllAdress(){

 
        $query = $this->sql->query('SELECT * FROM address');

        return $query;

    }

}

?>

