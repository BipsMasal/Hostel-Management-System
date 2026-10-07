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

    <a href="addroom.php" class="btn-add">+ Add Room</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM room ORDER BY room_id DESC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['room_id']}</td>
                        <td>{$row['room_name']}</td>
                        <td>{$row['room_type']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['price']}</td>
                         <td>{$row['image']}</td>
                        <td>
                            <a href='edit_room.php?id={$row['room_id']}' class='btn-edit'>Edit</a>
                            <a href='delete_room.php?id={$row['room_id']}' class='btn-delete'>Delete</a>
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