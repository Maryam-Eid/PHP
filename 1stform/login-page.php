<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">`
  </head>

<body>

<?php
  if (isset($_GET["error"]) && $_GET["error"] == "none") {
    echo "<div class='alert' style='top: 70px;'>You are now logged in!</div>";
  }
  ?>

  <div class="wrapper">
    <h2>Login</h2>
    <form action="includes/login.php" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter your password" name="pwd" required>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="text">
        <h3>Not a member yet? <a href="signup-page.php">Register now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>