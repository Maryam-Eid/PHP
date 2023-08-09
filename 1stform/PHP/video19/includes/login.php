<?php

if(isset($_POST["submit"]))
{

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header("location: ../index.php?error=none");
}

?>