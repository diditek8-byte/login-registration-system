<!DOCTYPE html>
<?php

session_start();
require_once 'config.php';

  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM user WHERE email = '$email'");

    if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];

      header("Location: index.php");
      exit();
  } else {
      $_SESSION['login_error'] = 'Incorrect email or password';
      header("Location: login.php");
      exit();
  }
  } else {
      $_SESSION['login_error'] = 'Incorrect email or password';
      header("Location: login.php");
      exit();
 }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ad7d45dd90.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="validation.js" defer></script>
</head>
<body>
   <div class="wrapper">
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['login_error'])) {
      echo "<p style='color:#ac1634;'>" . $_SESSION['login_error'] . "</p>";
      unset($_SESSION['login_error']);
    }
      ?>
    <form action="login.php" id="form" method="POST">
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
      <button type="submit" name="login">Login</button>
    </form>
     <p>New here? <a href="register.php">Create an Account</a></p>
    </div>
</body>
</html>