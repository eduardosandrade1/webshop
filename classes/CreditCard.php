<?php 

include_once("Sql.php");

class CreditCard {

    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function create($utype, $uowner, $ucardnumber) {

        $params = [
            ':utype' => $utype,
            ':uowner'=> $uowner,
            ':ucardnumber'=> $ucardnumber,
        ];

        return $this->sql->query("
        INSERT INTO credit_card (card_type, card_number, card_owner) 
        VALUES (:utype, :uowner, :ucardnumber)", $params, true);

    }

}

?>