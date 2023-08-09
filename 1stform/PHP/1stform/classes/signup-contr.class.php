<?php 

class SignupContr extends Signup {

    private $fname;
    private $lname;
    private $email;
    private $uid;
    private $pwd;

    public function __construct($fname, $lname, $email, $uid, $pwd){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../signup-page.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false){
            header("location: ../signup-page.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../signup-page.php?error=email");
            exit();
        }
        if($this->uidTakeCheck() == false){
            header("location: ../signup-page.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->fname, $this->lname, $this->email, $this->uid, $this->pwd);
    }

    private function emptyInput(){
        $result;
        if(empty($this->fname) || empty($this->lname) ||empty($this->email) ||empty($this->uid) ||empty($this->pwd)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
        if(!preg_match("/^[a-zA-z0-9]*$/", $this->uid)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function uidTakeCheck(){
        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}

?>