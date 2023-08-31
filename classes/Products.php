<?php

include("Sql.php");

class Products{

    private $product;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }


    public function getById($id){

        $params = [':uid' => $id                
    
    ];

 
        $query = $this->sql->query('SELECT * FROM products WHERE id = :uid',  $params);

        return $query;

    }



    public function getAllProducts(){

 
        $query = $this->sql->query('SELECT * FROM products');

        return $query;

    }



    public function create($name, $price, $quantity, $description, $cod, $imagePath) {

        $params = [
            ':uname' => $name,
            ':uprice'=> $price,
            ':uquantity'=> $quantity,
            ':udescription' => $description,
            ':ucod' => $cod,
            ':uimage' => $imagePath
        ];

        if ($this->isDuplicatedCodArtigo($cod)) {
            return false;
        }

        return $this->sql->query("INSERT INTO products (name, price, quantidade, description, cod_artigo, image_path) VALUES (:uname, :uprice, :uquantity, :udescription, :ucod, :uimage)", $params, true);

    }

    public function update($id, $name, $price,$quantity, $description, $cod, $imagePath) {
        $params = [
            ':uid' => $id,
            ':uname' => $name,
            ':uprice' => $price,
            ':uquantity'=> $quantity,
            ':udescription' => $description,
            ':ucod' => $cod,
            ':uimage' => $imagePath
        ];

        if ($this->isDuplicatedCodArtigo($cod, $id)) {
            return false;
        }
    
        return $this->sql->query("UPDATE products SET name = :uname, price = :uprice, quantidade = :uquantity,description = :udescription, cod_artigo = :ucod, image_path = :uimage WHERE id = :uid", $params, true);
    }

    public function delete($id) {
        $params = [
            ':uid' => $id
        ];
    
        return $this->sql->query("DELETE FROM products WHERE id = :uid", $params, true);
    }



    private function isDuplicatedCodArtigo($cod, $id = 0) {
        $params = [
            ':ucod' => $cod
        ];
        if ($id != 0) {
            
            $params = [
                ':ucod' => $cod,
                ':uid' => $id
            ];
            $query = $this->sql->query("SELECT * FROM products WHERE cod_artigo = :ucod AND id != :uid", $params);
        } else {
            
            $params = [
                ':ucod' => $cod
            ];
            $query = $this->sql->query("SELECT * FROM products WHERE cod_artigo = :ucod", $params);
        }

        if ( ! empty($query)) {
            return true;
        }

        return false;
    }

}

?>

