<?php
// session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Booking Table Styles */
    .booking-table-container {
      padding: 60px 10%;
    }

    .booking-table-container h2 {
      color: #0072ff;
      margin-bottom: 30px;
      text-align: center;
      font-size: 2rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background-color: #0072ff;
      color: white;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f8f8f8;
    }

    tr:hover {
      background-color: #e0f0ff;
      transition: 0.3s;
    }

    /* Responsive */
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      th {
        text-align: right;
        padding-right: 50%;
      }

      td {
        text-align: right;
        padding-left: 50%;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 45%;
        padding-left: 15px;
        font-weight: 600;
        text-align: left;
      }
    }
  </style>
</head>
<body>

<section class="booking-table-container">
  <h2>My Bookings</h2>
  <table>
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Username</th>
        <th>Room ID</th>
        <th>Booking Date</th>
        <th>Check In</th>
        <th>Check Out</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Fetch bookings from database
      $username = $_SESSION['username']; // show only logged-in user bookings
      $sql = "SELECT * FROM bookings WHERE username='$username' ORDER BY booking_date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td data-label='Booking ID'>{$row['booking_id']}</td>
                      <td data-label='Username'>{$row['username']}</td>
                      <td data-label='Room Name'>{$row['room_name']}</td>
                      <td data-label='Booking Date'>{$row['booking_date']}</td>
                      <td data-label='Check In'>{$row['check_in']}</td>
                      <td data-label='Check Out'>{$row['check_out']}</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No bookings found.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
</section>

</body>
</html>
