<?php
require_once('userdetails.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $userObj = new User();
    $result = $userObj->getUser($name);


    if (is_array($result) && count($result) > 0) {
        $user = $result[0];

      
        if (password_verify($password, $user['password'])) {
          
            if ($user['user_type'] === 'student') {
                header("Location: mainpage.php");
                exit();
            } elseif ($user['user_type'] === 'admin') {
                header("Location: mainpage.php?user_type=admin");
                exit();
            } else {
                echo "<script>
                    alert('Invalid user type.');
                    window.location.href = 'login.php';
                </script>";
                exit();
            }
        } else {
           
            echo "<script>
                alert('Invalid username or password');
                window.location.href = 'login.php';
            </script>";
            exit();
        }
    } else {
       
        echo "<script>
            alert('Invalid username or password');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
}
?>
