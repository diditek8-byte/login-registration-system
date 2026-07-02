<!DOCTYPE html>

<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $checkEmail = $conn->query("SELECT email FROM user WHERE email = '$email'");

  if ($checkEmail->num_rows > 0) {
    $_SESSION['error'] = "Email already exists";

    header("Location: register.php");
    exit();
  } else {
    $conn->query("INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')");
  
    header("Location: login.php");
    exit();
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ad7d45dd90.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="validation.js" defer></script>
</head>
<body>
   <div class="wrapper">
    <h1>Registration</h1>
    <?php
    if (isset($_SESSION['error'])) {
    echo "<p style='color:#ac1634;'>" . $_SESSION['error'] ."</p>";
    unset($_SESSION['error']);
   }
   ?>
    
    <form action="register.php" id="form" method="POST">
      <div>
        <label for="name-input">
            <i class="fa-solid fa-user"></i>
        </label>
        <input type="text" name="name" id="name-input" placeholder="Name">
      </div>
      <div>
        <label for="email-input">
            <span>@</span>
        </label>
        <input type="email" name="email" id="email-input" placeholder="Email">
      </div>
      <div>
        <label for="password">
            <i class="fa-solid fa-lock"></i>
        </label>
        <input type="password" name="password" id="password-input" placeholder="Password">
      </div>
      <div>
        <label for="repeat-password">
            <i class="fa-solid fa-lock"></i>
        </label>
        <input type="password" name="repeat-password" id="repeat-password-input" placeholder="Repeat Password">
      </div>
      <button type="submit" name="register">Signup</button>
     </form>
     <p>Already have an Account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>