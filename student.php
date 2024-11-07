<?php
require_once("crud.php");
class Student {
    private $crud;

    public function __construct() {
        $this->crud = new Crud();
    }

    public function addStudent($name, $age, $class, $email, $graduation_year) {
        $data = [
            'name' => $name,
            'age' => $age,
            'class' => $class,
            'email' => $email,
            'graduation_year' => $graduation_year
        ];

        return $this->crud->insert('students', $data);
    }

    public function getAllStudents() {
        return $this->crud->read('students');
    }

    public function getStudentById($id) {
        return $this->crud->read('students', ['*'], 'id', $id);
    }

    public function updateStudent($id, $data) {
        return $this->crud->update('students', $data, 'id', $id);
    }

    public function deleteStudent($id) {
        return $this->crud->delete('students', 'id', $id);
    }
}
?>
