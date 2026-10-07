<?php 
// session_start();
include 'connect.php';
include 'navbar.php'; // keeps your existing navbar
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Booking</title>
  <link rel="stylesheet" href="style.css"> <!-- your existing CSS -->
  <style>
    /* ===============================
       BOOKING SECTION STYLES
    =============================== */
    .booking {
      padding: 60px 10%;
      text-align: center;
      background: #f8f8f8; /* subtle background for booking section */
    }

    .booking-container {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 450px;
      margin: 0 auto;
    }

    .booking h2 {
      color: #0072ff;
      margin-bottom: 25px;
      font-size: 2rem;
    }

    .booking form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    /* Labels and Inputs */
    .booking label {
      text-align: left;
      font-weight: 500;
      color: #333;
      font-size: 14px;
    }

    .booking input,
    .booking select {
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 15px;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .booking input:focus,
    .booking select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 5px rgba(37,117,252,0.3);
    }

    .booking input[readonly] {
      background-color: #f5f5f5;
      color: #555;
      cursor: not-allowed;
    }

    /* Submit Button */
    .booking button {
      background: #2575fc;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s ease, transform 0.2s;
    }

    .booking button:hover {
      background: #1a5ed8;
      transform: scale(1.03);
    }

    /* Responsive */
    @media (max-width: 480px) {
      .booking {
        padding: 40px 5%;
      }

      .booking-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
<?php
$roomName = isset($_GET['room_name']) ? $_GET['room_name'] : '';
?>
  <!-- Booking Section -->
  <section class="booking">
    <div class="booking-container">
      <h2>Add New Booking</h2>
      <form action="bookedprocess.php" method="POST">
        <!-- Username (readonly, from session) -->
        <label>Username:</label>
        <input type="text" name="username" 
               value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" 
               readonly>

        <!-- Room ID -->
        <label>Room name:</label>
        <input type="text" name="room_name"  value="<?php echo $roomName; ?>" readonly>

        <!-- Booking Date (readonly, auto today) -->
        <label>Booking Date:</label>
        <input type="date" name="booking_date" 
               value="<?php echo date('Y-m-d'); ?>" readonly>

        <!-- Check In -->
        <label>Check In:</label>
        <input type="date" name="check_in" required>

        <!-- Check Out -->
        <label>Check Out:</label>
        <input type="date" name="check_out" required>

        <!-- Submit button -->
        <button type="submit">Add Booking</button>
      </form>
    </div>
  </section>

</body>
</html>
