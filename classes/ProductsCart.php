<?php 

class ProductsCart {

    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function create($cartId, $productId) {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
        ];

        return $this->sql->query("INSERT INTO products_cart (cart_id, product_id) VALUES (:ucartid, :uproductid)", $params, true);
    }

}

?>