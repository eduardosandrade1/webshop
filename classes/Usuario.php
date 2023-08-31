<?php

include("Role.php");
include("Sql.php");

class Usuario {

    private $user;
    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function getUserByLoginAndPassword($login, $password, $roleName)
    {
        $role = new Role();
        $role = $role->getByName($roleName);
        if (empty($role)) {
            return [];
        }
        
        $roleId = $role[0]['id'];
        $params = [
            ':uemail' => $login,
            ':upassword' => $password,
            ':urole' => $roleId
        ];

        $query = $this->sql->query("SELECT * FROM user WHERE email = :uemail AND password = :upassword AND role = :urole", $params);

        return $query;

    }

}