<?php 

class Signup extends Dbh{

    protected function setUser($fname, $lname, $email, $uid, $pwd){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_fname, users_lname, users_email, users_uid, users_pwd) VALUES (?, ?, ?, ?, ?); ');

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($fname, $lname, $email, $uid, $hashedpwd))){
            $stmt = null;
            header("location: ../signup-page.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_id = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("location: ../signup-page.php?error=stmtfailed");
            exit();
        }

        $resultCheck;    
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        } else 
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}

?>