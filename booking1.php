

<?php

include 'connect.php';

?>

<section class="rooms">
  <h2>Available Rooms</h2>
  <div class="room-grid">
    <?php
    $sql = "SELECT * FROM room ORDER BY room_type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo '<div class="room-card" data-type="'.$row['room_type'].'">
        <img src="admin/img/'.$row['image'].'" alt="'.$row['room_name'].'">
        <div class="room-info">
          <h3>'.$row['room_name'].'</h3>
          <p>'.$row['description'].'</p>
          <div class="price">Rs. '.$row['price'].' / month</div>
          <button class="book-btn">
            <a href="booked.php?room_name=' . urlencode($row['room_name']) . '" class="book-btn">Book Now</a>
          </button>
        </div>
      </div>';

        }
    } else {
        echo '<p>No rooms available at the moment.</p>';
    }
    ?>
      
  </div>
</section>

