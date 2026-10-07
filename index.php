<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HostelEase</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php include('navbar.php'); ?>

  <main>
    <?php
      $page = $_GET['page'] ?? 'home';
      $allowed_pages = ['home', 'room', 'booking1', 'contact','mybooking','myaccount','about'];

      if (in_array($page, $allowed_pages)) {
        include("$page.php");
      } else {
        include("home.php");
      }
    ?>
  </main>
<?php include('footer.php'); ?>
  <script src="script.js"></script>
</body>
</html>
