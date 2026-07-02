<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="container">
    <h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
    <p>You are logged in.</p>
    <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>