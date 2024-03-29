<?php 

class LoginContr extends Login{

    private $email; 
    private $pwd; 

    public function __construct($email, $pwd){
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header("location: ../login-page.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->pwd);
    }

    private function emptyInput(){
        $result;
        if(empty($this->email) || empty($this->pwd)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}

?>