<?php

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    $login = new LoginContr($email, $pwd);

    $login->loginUser();

    header("location: ../login-page.php?error=none");
}

?>