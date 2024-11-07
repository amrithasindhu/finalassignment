<?php

require_once("dbcon.php"); 
require_once("student.php");


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $class = $_POST['class'];
    $email = $_POST["email"];
    $graduation_year = $_POST['graduation_year'];

    $errors = [];


    if (empty($name)) {
        $errors[] = 'Name is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (empty($class)) {
        $errors[] = 'Class is required.';
    }

    if (empty($errors)) {

        $updatedData = [
            'name' => $name,
            'age' => $age,
            'class' => $class,
            'email' => $email,
            'graduation_year' => $graduation_year,
        ];

     
        $studentObj = new Student();
        if ($studentObj->updateStudent($id, $updatedData)) {
            header("Location: mainpage.php?success=updated");
        } else {
            header("Location: mainpage.php?error=update");
        }
    } else {
        echo '<script>alert("' . implode('\\n', $errors) . '"); window.history.back();</script>';
    }
} else {
    header("Location: index.php");
    exit();
}

