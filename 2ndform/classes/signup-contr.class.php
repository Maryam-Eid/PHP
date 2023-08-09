<?php 

class SignupContr extends Signup {

    private $fname;
    private $lname;
    private $uid;
    private $dob;
    private $gender;
    private $country;
    private $email;
    private $phone;
    private $pwd;
    private $pwdRepeat;

    public function __construct($fname, $lname, $uid, $dob, $gender, $country, $email, $phone, $pwd, $pwdRepeat){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->uid = $uid;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->country = $country;
        $this->email = $email;
        $this->phone = $phone;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
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
            header("location: ../signup-page.php?error=useroremailorphonetaken");
            exit();
        }
        if($this->pwdMatch() == false){
            header("location: ../signup-page.php?error=passwordmatch");
            exit();
        }


        $this->setUser($this->fname, $this->lname, $this->uid, $this->dob, $this->gender, $this->country, $this->email, $this->phone, $this->pwd, $this->pwdRepeat);
    }

    private function emptyInput(){
        $result;
        if(empty($this->fname) || empty($this->lname) ||empty($this->uid) ||empty($this->dob) ||empty($this->gender || empty($this->country) || empty($this->email) ||empty($this->phone) ||empty($this->pwd) ||empty($this->pwdRepeat))){
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
        if(!$this->checkUser($this->uid, $this->email, $this->phone)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        if($this->pwd !== $this->pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}

?>