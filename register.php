<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="register-container">
        <form class="register-form" action="registerprocess.php" method="post">
            <h2>Register</h2>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phonenumber">Phone Number:</label>
            <input type="text" id="phonenumber" name="phonenumber" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit"value="submit"name="submit">Register</button>

            <p class="login-link" style="color: black;">Already have an account? <a href="login.php">Login here</a></p>
            <a href="index.php">Back To Home</a></p>
        </form>
        
    </div>
    
</body>
</html>
