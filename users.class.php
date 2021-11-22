<?php
class Users{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function add($name, $email, $password, $type){
       if($this->existEmail($email)==false){
            $sql = "INSERT INTO users (name, email, password, type) VALUES (:name, :email, :password, :type)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", $password);
            $sql->bindValue(":type", $type);
            $sql->execute();
            return true;
        }
       else{
            return false;
        }
    }

    public function existEmail($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }
    public function checkAdmin($type){
        $sql = "SELECT * FROM users WHERE type = :type";
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":type", $type);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }
}