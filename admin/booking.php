<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
<?php include 'connect.php'; ?>

<div class="main">
    <div class="topbar">
        <h2>Bookings</h2>
    </div>

    <a href="booked.php" class="btn-add">+ Add Booking</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usernam</th>
                    <th>Room Name</th>
                    <th>Booking Date</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM bookings ORDER BY booking_id DESC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['booking_id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['room_name']}</td>
                        <td>{$row['booking_date']}</td>
                        <td>{$row['check_in']}</td>
                         <td>{$row['check_out']}</td>
                        <td>
                            <a href='edit_booking.php?id={$row['booking_id']}' class='btn-edit'>Edit</a>
                            <a href='delete_booking.php?id={$row['booking_id']}' class='btn-delete'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>