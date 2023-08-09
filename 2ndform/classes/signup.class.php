<?php 

class Signup extends Dbh{

    protected function setUser($fname, $lname, $uid, $dob, $gender, $country, $email, $phone, $pwd, $pwdRepeat){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_fname, users_lname, users_uid, users_dob, users_gender, users_country, users_email, users_phone, users_pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?); ');

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($fname, $lname, $uid, $dob, $gender, $country, $email, $phone, $hashedpwd))){
            $stmt = null;
            header("location: ../signup-page.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ? OR users_email = ? OR users_phone = ?;');

        if(!$stmt->execute(array($uid, $email, $phone))){
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