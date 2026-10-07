<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            // Redirect with GET parameter to show error on login page
            header('Location: login.php?error=Enter+Username');
            exit();
        } else if (empty($password)) {
            header('Location: login.php?error=Enter+Password');
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE fullname='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;

                if ($row['isAdmin'] == 1) {
                    // Admin login
                    header('Location: addroom.php');
                    exit();
                } else {
                    // Regular user login
                    header('Location: index.php');
                    exit();
                }
            } else {
                header('Location: login.php?error=User+not+found');
                exit();
            }
        }
    }
}
?>
