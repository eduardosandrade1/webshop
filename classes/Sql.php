<?php 

class Sql{
    // private $mysqli;
    // const PARAM_host='localhost';
    // const PARAM_port='3306';
    // const PARAM_db_name='webshop';
    // const PARAM_user='root';
    // const PARAM_db_pass='root';

    // public function __construct()
    // {
    //     $this->mysqli = new mysqli(Sql::PARAM_host, Sql::PARAM_user, Sql::PARAM_db_pass, Sql::PARAM_db_name);
    // }


    // public function query($query, $params = []) {
    //     // preparando a query
    //     $queryPrepare = $this->mysqli->prepare($query);

    //     // se tiver valor no where na query
    //     if ( ! empty($params) ) {
    //         // substituindo valor do
    //         foreach ($params as $column => $value ) {
    //             $queryPrepare->bind_param($column, $value);
    //         }
    //     }

    //     $queryPrepare->execute();

    //     return $queryPrepare->get_result()->fetch_all();

    // }



    private $pdo;
    const PARAM_host='localhost';
    const PARAM_port='3306';
    const PARAM_db_name='webshop';
    const PARAM_user='root';
    const PARAM_db_pass='root';

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".Sql::PARAM_host.';port='.Sql::PARAM_port.';dbname='.Sql::PARAM_db_name, Sql::PARAM_user, Sql::PARAM_db_pass);
    }


    public function query($query, $params = [], $insert = false) {
        // preparando a query
        $queryPrepare = $this->pdo->prepare($query);

        // se tiver valor no where na query
        if ( ! empty($params) ) {
            // substituindo valor do
            foreach ($params as $column => $value ) {
                $queryPrepare->bindValue($column, $value);
            }
        }

        $exec = $queryPrepare->execute();

        if ($insert) {
            return $exec;
        }
        return $queryPrepare->fetchAll(PDO::FETCH_ASSOC);

    }

}

// $user = "";
// $password = "";
// $host = "";
// $port = "";

// try {

//     $connection = new PDO("mysql:host=$host;$port", $user, $password);

// } catch (PDOException $e) {
//     // retornar para pagina de erro
// }