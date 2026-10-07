<?php
session_start();
include 'connect.php';
include 'navbar.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_name = $_POST['room_name'];
    $room_type = $_POST['room_type'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload
       $image = $_FILES['image']['name'];          // filename
    $tmp_name = $_FILES['image']['tmp_name'];   // temp file path
    $folder = $image; // store in the same folder as this PHP file
    // $folder = "img/" . $image; // store in img/ folder



    if (move_uploaded_file($tmp_name, $folder)) {
        $sql = "INSERT INTO room (room_name, room_type, description, price, image) 
                VALUES ('$room_name', '$room_type', '$description', '$price', '$folder')";
        if ($conn->query($sql) === TRUE) {
            $msg = "Room added successfully!";
        } else {
            $msg = "Error: " . $conn->error;
        }
    } else {
        $msg = "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Room</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
<body>

<div class="add-room-wrapper">

    <div class="add-room-container">

        <h2 class="add-room-title">Add New Room</h2>
        <?php if(isset($msg)) echo "<p class='add-room-message'>$msg</p>"; ?>

        <form class="add-room-form" action="" method="POST" enctype="multipart/form-data">
            <label>Room Name:</label>
            <input type="text" name="room_name" required>

            <label>Room Type:</label>
            <select name="room_type" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="deluxe">Deluxe</option>
            </select>

            <label>Description:</label>
            <textarea name="description" required></textarea>

            <label>Price (Rs.):</label>
            <input type="number" name="price" required>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required>

            <button type="submit">Add Room</button>
        </form>

    </div>

</div>

</body>

</body>
</html>
