<?php
require_once('dbcon.php'); 
require_once('userdetails.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    if ($password != $cpassword) {
        
        echo "<script> alert('Passwords do not match!');
        window.location.href ='index.php';
        </script>";
        exit();
    }

    $userObj = new User();
    $result = $userObj->addUser($name,$email,$password,$user_type);
        if ($result) {
            echo "Registration successful!";
            header("Location: login.php");
            exit();
        } else {
            echo "Error during registration!";
        }
    } 

?>
