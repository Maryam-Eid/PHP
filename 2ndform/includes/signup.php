<?php

if(isset($_POST["submit"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uid = $_POST["uid"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";

    $signup = new SignupContr($fname, $lname, $uid, $dob, $gender, $country, $email, $phone, $pwd, $pwdRepeat);

    $signup->signupUser();

    header("location: ../signup-page.php?error=none");
}

?>