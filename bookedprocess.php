<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $room_name = $_POST['room_name'];
    $booking_date = $_POST['booking_date'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

   $sql = "INSERT INTO bookings (username, room_name, booking_date, check_in, check_out)
        VALUES ('$username','$room_name', '$booking_date', '$check_in', '$check_out')";


    if ($conn->query($sql) === TRUE) {
        echo "✅ Booking added successfully!";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>