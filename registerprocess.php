<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    // $repassword = $_POST['repassword'];

    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill all required fields'); window.location.href='register.php';</script>";
        exit;
    }

    // if ($password !== $repassword) {
    //     echo "<script>alert('Passwords do not match'); window.location.href='register.php';</script>";
    //     exit;
    // }

    $sql = "INSERT INTO user(fullname, email, phone, gender, address, dob, password)
            VALUES ('$username', '$email', '$phonenumber', '$gender', '$address', '$dob', '$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Account Created, Please Login In'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='register.php';</script>";
    }
}
?>
