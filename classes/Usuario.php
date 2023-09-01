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

        $query = $this->sql->query("SELECT * FROM user WHERE email = :uemail AND password = md5(:upassword) AND role = :urole", $params);

        return $query;

    }

    public function create($email, $nome, $sobrenome, $niver, $password) 
    {

        $params = [
            ':uemail' => $email,
            ':uname' => $nome,
            ':usobrenome' => $sobrenome,
            ':univer' => $niver,
            ':upassword' => md5($password),
            ':urole' => 2

        ];

        return $this->sql->query("INSERT INTO user (email, password, first_name, last_name, date_birthday, role)
         VALUES (:uemail, :upassword, :uname, :usobrenome, :univer, :urole)", $params, true);
    }

    public function checkRulePassword($password) 
    {
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            return false;
        } else {
            return true;
        }
    }

}