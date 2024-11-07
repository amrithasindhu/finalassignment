
<?php
require_once("student.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_students'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $graduation_year = $_POST['graduation_year'];
    $errors = [];  
    try {
      
        if (!filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => 5, "max_range" => 120)))) {
            $errors[] = 'Enter a valid age between 5 and 120.';
        } else {
            $studentage = $age;
        }
        if (empty($class)) {
            $errors[] = 'Enter the class.';
        } else {
            $studentclass = $class;
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Enter a valid email ID.';
        } else {
            $studentemail = $email;
        }
        $pattern = "/^[a-zA-Z\s']+$/";
        if (!preg_match($pattern, $name)) {
            $errors[] = 'Enter a valid name.';
        } else {
            $studentname = $name;
        }

        if (!empty($errors)) {
            echo '<script>alert("' . htmlspecialchars(implode( $errors)) . '");
            window.history.back();
            </script>';

            return;  
        }
        $studentObj = new Student();
        $result = $studentObj->addStudent($name, $age, $class, $email, $graduation_year);
        if ($result){
            header("Location: mainpage.php?success=1");
            exit();
        } else {
            header("Location: mainpage.php?error=1");
            exit();
        }
    } catch (Exception $e) {
        echo 'An unexpected error occurred: ' . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
if ($result) {
        header("Location: mainpage.php?user_type=admin");
    } else {
        echo "Failed to add student.";
    }

?>
