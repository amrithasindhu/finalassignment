<?php
require_once("crud.php");

class User {
    private $crud;
    private $tableName = 'form';

    public function __construct() {
        $this->crud = new Crud();
    }

    public function addUser($name, $email, $password, $user_type) {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password, 
            'user_type' => $user_type
        ];

        return $this->crud->insert($this->tableName, $data);
    }

    public function getUser($name) {
        return $this->crud->read($this->tableName, ['*'], 'name', $name);
    }
}
?>
