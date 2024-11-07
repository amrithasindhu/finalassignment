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
        echo "<script>
            alert('Passwords do not match!');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    $userObj = new User();
    $result = $userObj->addUser($name, $email, $hashedPassword, $user_type);

    if ($result) {
      
        echo "<script>
            alert('Registration successful!');
            window.location.href = 'login.php';
        </script>";
        exit();
    } else {
      
        echo "<script>
            alert('Error during registration!');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
}
?>
