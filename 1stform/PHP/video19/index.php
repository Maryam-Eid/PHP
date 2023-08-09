<php?  
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<form action="includes/signup.php" method="post">
    <input type="text" placeholder="username" name="uid">
    <input type="password" placeholder="password" name="pwd" >
    <input type="password"  placeholder="repeat password" name="pwdRepeat">
    <input type="text"  placeholder="E-mail" name="email">
    <br>
    <button type="submit" name="submit">sign up</button>
</form> 
<br><br>
<form action="includes/login.php" method="post">
    <input type="text" placeholder="username" name="uid">
    <input type="password" placeholder="password" name="pwd">
    <br>
    <button type="submit" name="submit">login</button>
    </form>

</body>
</html>


<!-- 
    
    table query
    CREATE TABLE users (
        users_id INT NOT NULL AUTO_INCREMENT,
        users_uid VARCHAR(50) UNIQUE NOT NULL,
        users_pwd VARCHAR(255) NOT NULL,
        users_email VARCHAR(255) UNIQUE NOT NULL,
        PRIMARY KEY (users_id)
    ); 
-->