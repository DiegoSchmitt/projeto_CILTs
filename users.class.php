<?php
class Users{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function getAll(){
        $sql = "SELECT * FROM users";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
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

    public function edit($name, $email, $type, $id){
        if($this->existEmail($email) == false){
            $sql = "UPDATE users SET name = :name, email = :email, type = :type  WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":type", $type);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } else{
            return false;
        }
}

    public function getId($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else{
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
}