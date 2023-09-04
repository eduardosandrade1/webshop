<?php

include("Sql.php");
include("ProductsCart.php");

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

    public function create($userID)
    {
        $params = [
            ':uuserid' => $userID
        ];

        $this->sql->query("INSERT INTO cart (user_id) VALUES (:uuserid)", $params, true);

        $queryIdCart = $this->sql->query("SELECT id FROM cart WHERE user_id = :uuserid AND date_deleted IS NULL", $params);

        return $queryIdCart[0]['id'];
    }


    public function addItem($cartId, $productId)
    {
        $productsCart = new ProductsCart();
        return $productsCart->create($cartId, $productId);
    }

}

?>

