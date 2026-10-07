<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        // Redirect to the home page if logged in
        header("Location: index.php");
        exit();
    }
?>

    <div class="login-container">
        <form class="login-form" action="loginprocess.php" method="post">
            <h2>Login</h2>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit"name="submit"value="submit">Login</button>

            <p class="register-link" style="color: black;">Don't have an account? <a href="register.php">Register here</a></p>
            <a href="index.php">Back To Home</a></p>
        </form>
    </div>
    
</body>
</html>
