<?php

class Dbh{
    
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;port=3306;dbname=firstform', $username, $password); 
            return $dbh;

        } catch (PDOException $e) {
            print "error!" . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>