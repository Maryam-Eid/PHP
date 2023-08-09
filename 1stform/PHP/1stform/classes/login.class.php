<?php 
class Login extends Dbh{

    protected function getUser($email, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_email = ? AND users_pwd = ?;');

        if(!$stmt->execute(array($email, $pwd))){
            $stmt = null;
            header("location: ../login-page.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login-page.php?error=emailnotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false){
            $stmt = null;
            header("location: ../login-page.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email = ? AND users_pwd = ?;');
            if(!$stmt->execute(array($email, $pwd))){
                $stmt = null;
                header("location: ../login-page.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login-page.php?error=emailnotfound");
                exit();
            }
    
                $user = $stmt->fetchALL(PDO::FETCH_ASSOC);

                session_start();
                
                $stmt = null;
        }


        $stmt = null;
    }

}


?>