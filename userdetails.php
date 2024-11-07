<?php
require_once("crud.php");

class User {
    private $crud;
    private $tableName = 'registrtaion';

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

        return $this->crud->insert('registrtaion', $data);
    }



    public function getUser($name) {
      
        return $this->crud->read('registrtaion', ['*'], 'name', $name);
    }

 
}
?>


