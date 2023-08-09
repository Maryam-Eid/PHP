<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  </head>

<body>
  
<?php
  if (isset($_GET["error"]) && $_GET["error"] == "none") {
    echo "<div class='alert'>You have signed up successfully!</div>";
  }
  ?>

  <div class="wrapper">
    <h2>Registration</h2>
    <form action="includes/signup.php" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your first name" name="fname" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your last name" name="lname" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your username" name="uid" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="pwd" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login-page.php">Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>

<!-- 

  table query

  CREATE TABLE users (
    users_id INT NOT NULL AUTO_INCREMENT,
    users_fname VARCHAR(50) NOT NULL,
    users_lname VARCHAR(50) NOT NULL,
    users_email VARCHAR(255) UNIQUE NOT NULL,
    users_uid VARCHAR(50) UNIQUE NOT NULL,
    users_pwd VARCHAR(255) NOT NULL,
    PRIMARY KEY (users_id)
  );
-->
