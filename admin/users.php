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
    <div class="topbar"><h2>Users Booking History</h2></div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Room</th>
                    <th>Booking Date</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                   
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT u.fullname, u.email, b.room_name, b.booking_date, b.check_in, b.check_out
                FROM user u
                INNER JOIN bookings b ON u.fullname = b.username
                ORDER BY b.booking_date DESC";


                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td>{$row['fullname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['room_name']}</td>
                        <td>{$row['booking_date']}</td>
                        <td>{$row['check_in']}</td>
                        <td>{$row['check_out']}</td>
                        
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>