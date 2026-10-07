<?php session_start(); ?>
<nav class="navbar">
 <div class="logo">
    <a href="admin/index.php">🏠 HostelEase</a>
</div>

  <ul class="nav-links">
    <li><a href="index.php?page=home" class="<?= ($_GET['page'] ?? 'home') == 'home' ? 'active' : '' ?>">Home</a></li>
    <li><a href="index.php?page=booking1" class="<?= ($_GET['page'] ?? '') == 'booking1' ? 'active' : '' ?>">Booking</a></li>
    <li><a href="index.php?page=contact" class="<?= ($_GET['page'] ?? '') == 'contact' ? 'active' : '' ?>">Contact</a></li>

    <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
        echo "<li><a href='index.php?page=mybooking' class='".(($_GET['page'] ?? '') == 'mybooking' ? 'active' : '')."'>My Booking</a></li>";
        echo "<li><a href='index.php?page=myaccount' class='".(($_GET['page'] ?? '') == 'myaccount' ? 'active' : '')."'>My Profile</a></li>";
        echo "<li><a href='logout.php'>Logout (".$_SESSION['username'].")</a></li>";
      } else {
        echo "<li><a href='login.php'>Login</a></li>"; 
		echo "<li><a href='register.php'>Register</a></li>";
	  }
    ?>
  </ul>
</nav>
