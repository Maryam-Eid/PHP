<?php
class Login extends Dbh {

    protected function getUser($email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../login-page.php?error=stmtfailed");
            exit();
        }

        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login-page.php?error=emailnotfound");
            exit();
        }

        if (!$pwdHashed || !password_verify($pwd, $pwdHashed["users_pwd"])) {
            $stmt = null;
            header("location: ../login-page.php?error=wrongpassword");
            exit();
        }

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email = ?;');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../login-page.php?error=stmtfailed");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['user'] = $user;

        $stmt = null;
    }
}
?>
