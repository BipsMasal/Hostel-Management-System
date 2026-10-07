<nav class="navbar">
  <div class="logo">🏠 HostelEase</div>
  <ul class="nav-links">
    <li><a href="index.php?page=home" class="<?= ($_GET['page'] ?? 'home') == 'home' ? 'active' : '' ?>">Home</a></li>
    <li><a href="index.php?page=room" class="<?= ($_GET['page'] ?? '') == 'room' ? 'active' : '' ?>">Room</a></li>
    <li><a href="index.php?page=booking" class="<?= ($_GET['page'] ?? '') == 'booking' ? 'active' : '' ?>">Booking</a></li>
    <li><a href="index.php?page=contact" class="<?= ($_GET['page'] ?? '') == 'contact' ? 'active' : '' ?>">Contact</a></li>
  </ul>
  <div class="nav-btns">
    <button class="login-btn">Login</button>
    <button class="signup-btn">Sign Up</button>
  </div>
</nav>
