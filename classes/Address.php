<?php

include_once("Sql.php");

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

    public function create($uuserid, $ustreet, $ustreetnumber, $uzipcode, $ucity, $utype) {

        $params = [
            ':uuserid' => $uuserid,
            ':ustreet'=> $ustreet,
            ':ustreetnumber' => $ustreetnumber,
            ':uzipcode'=> $uzipcode,
            ':ucity' => $ucity,
            ':utype' => $utype
        ];

        return $this->sql->query("
        INSERT INTO address (user_id, street, street_number, zip_code, city, type) 
        VALUES (:uuserid, :ustreet, :ustreetnumber, :uzipcode, :ucity, :utype)", $params, true);

    }

}

?>

