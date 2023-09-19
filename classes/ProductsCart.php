<?php 

include_once("Sql.php");

class ProductsCart {

    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function create($cartId, $productId, $quantity) {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
            ':uquantity' => $quantity,
        ];

        return $this->sql->query("INSERT INTO products_cart (cart_id, product_id, quantity) VALUES (:ucartid, :uproductid, :uquantity)", $params, true);
    }

    public function update($cartId, $productId, $quantity) {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
            ':uquantity' => $quantity,
        ];

        return $this->sql->query("UPDATE products_cart SET quantity = :uquantity WHERE cart_id = :ucartid AND product_id = :uproductid", $params, true);
    }

    public function delete($productCartId) {
        $params = [
            ':uid' => $productCartId,
        ];
    
        return $this->sql->query("DELETE FROM products_cart WHERE id = :uid", $params, true);
    }

    public function getByCartId($idCart) {
        $params = [
            ':ucartid' => $idCart,
        ];
        // foi adicionado o GROUP BY - 07/09/2023
        return $this->sql->query("SELECT * FROM products_cart WHERE cart_id = :ucartid GROUP BY product_id", $params);
    }

    public function getByCartIdAndProductId($cartId, $productId)
    {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
        ];
        // foi adicionado o GROUP BY - 07/09/2023
        return $this->sql->query("SELECT * FROM products_cart WHERE cart_id = :ucartid AND product_id = :uproductid", $params);
    }


}

?>