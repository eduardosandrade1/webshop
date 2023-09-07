<?php 

include_once("Sql.php");

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

    // novo 07/09/2023 - CRIAR UMA FUNÇÃO PARA LISTAR QUANTOS DO MESMO PRODUTO TEM DENTRO DE DETERMINADO CARRINHO
    public function getQttProductInCart($idCart, $idProduct) {
        $params = [
            ':ucartid' => $idCart,
            ':uproduct_id' => $idProduct
        ];

        return $this->sql->query("SELECT count(*) as qtt FROM products_cart WHERE cart_id = :ucartid AND product_id = :uproduct_id", $params);
    }

}

?>