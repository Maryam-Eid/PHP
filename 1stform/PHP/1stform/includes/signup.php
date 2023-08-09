<?php

if(isset($_POST["submit"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";

    $signup = new SignupContr($fname, $lname, $email, $uid, $pwd);

    $signup->signupUser();

    header("location: ../signup-page.php?error=none");
}

?>