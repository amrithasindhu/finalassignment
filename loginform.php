<?php
require_once("userdetails.php");

$name = $_POST['name'];
$password = $_POST['password'];

$userobj2 = new User();
$result = $userobj2->getUser($name);

if (is_array($result) && count($result) == 1) {
    $users = $result[0];
    if (password_verify($password, $users['password'])) {

    if ($users['user_type'] == 'student') {
            error_log("Redirecting to student page");
            header("Location: mainpage.php");
            exit();
        } elseif ($users['user_type'] == 'admin') {
            error_log("Redirecting to admin page");
            header("Location: mainpage.php?user_type=admin");
            exit();
        }
    }

}
echo "<script>
    alert('Invalid username or password');
    window.location.href='login.php';
    </script>";
exit();
?>