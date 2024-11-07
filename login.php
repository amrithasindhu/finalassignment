

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login Page</title>
</head>
<body>

    <div class="login-form">
        <h2 class="text-center mb-4">Login</h2>
        <form action="loginform.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Enter Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary login-btn">Login</button>
            <P>Don't have an account ? <a href="index.php">Register</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFY4luDap2pCwDh0G9MOmGAJeXh3voI4SUF4LgimV0nN0H9smE5b6dd" crossorigin="anonymous"></script>
</body>
</html>
