<?php
//  session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
  .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .modal button {
        margin-top: 10px;
    }

.butt{
            width:50%;
        }
</style>
</head>
<body>  
<?php
// Start or resume a session
// session_start();

// Include header.php


// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Include connect.php
include 'connect.php';

// Step 2: Execute a query to retrieve the user account information
$user_username = $_SESSION['username'];
// Sanitize the input (if needed) to prevent SQL injection
$user_username = mysqli_real_escape_string($conn, $user_username);

$sql = "SELECT * FROM user WHERE fullname = '$user_username'";
$result = $conn->query($sql);

// Step 3: Fetch and display the results
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Display user account information
    
    // Assuming $row is an associative array with user data
    echo '<br><br><h1 style="text-align: left;">User Information</h1>';
    echo '<br><table class="user-table">';
    
    echo '<tr><td>Username:</td><td>' . $row["fullname"] . '</td></tr>';
    echo '<tr><td>Email:</td><td>' . $row["email"] . '</td></tr>';
    echo '</table>';
    echo '<br><br><br><br>';

    
    // Add more fields as needed
} else {
    echo "User not found";
}

// Close the database connection
$conn->close();
?>

<button class="butt" onclick="showPopup()">Change Password</button><br><br><br><br><br><br><br><br><br><br>
<script>
    function showPopup() {
        var modal = document.createElement('div');
        modal.classList.add('modal');
        modal.innerHTML = `
            <h2>Change Password</h2>
            <form id="changePasswordForm" action="updatepassword.php" method="post">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword" required><br><br>
                
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required><br><br>
                
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
                
                <button type="submit">Change Password</button>
            </form>
        `;
        document.body.appendChild(modal);

        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'updatepassword.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Password successfully updated
                    alert(xhr.responseText);
                    modal.remove(); // Remove the modal after password change
                } else {
                    // Error updating password
                    alert('Error updating password. Please try again.');
                }
            };
            xhr.send(formData);
        });

        var closeButton = document.createElement('button');
        closeButton.innerText = 'Close';
        closeButton.onclick = function() {
            modal.remove();
        };
        modal.appendChild(closeButton);
    }
</script>
		
      
</body>
</html>