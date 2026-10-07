<?php
include 'connect.php'; // Your database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="main">
    <div class="topbar">
        <h2>Dashboard Overview</h2>
    </div>

    <div class="cards">
        <?php
        // Total Bookings
        $totalBookingsResult = $conn->query("SELECT COUNT(*) AS total FROM bookings");
        $totalBookings = $totalBookingsResult->fetch_assoc()['total'];

        // // Available Rooms (assuming 'status' column, 0 = available, 1 = booked)
        // $availableRoomsResult = $conn->query("SELECT COUNT(*) AS total FROM room WHERE status = 0");
        // $availableRooms = $availableRoomsResult->fetch_assoc()['total'];

        // Total Students
        $totalStudentsResult = $conn->query("SELECT COUNT(*) AS total FROM user");
        $totalStudents = $totalStudentsResult->fetch_assoc()['total'];

        // // Pending Approvals (assuming 'approved' column, 0 = pending, 1 = approved)
        // $pendingApprovalsResult = $conn->query("SELECT COUNT(*) AS total FROM bookings WHERE approved = 0");
        // $pendingApprovals = $pendingApprovalsResult->fetch_assoc()['total'];
        ?>

        <div class="card"><h3>Total Bookings</h3><p><?php echo $totalBookings; ?></p></div>
        <!-- <div class="card"><h3>Available Rooms</h3><p><?php echo $availableRooms; ?></p></div> -->
        <div class="card"><h3>Students</h3><p><?php echo $totalStudents; ?></p></div>
        <!-- <div class="card"><h3>Pending Approvals</h3><p><?php echo $pendingApprovals; ?></p></div> -->
    </div>
</div>

</body>
</html>
