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
    public function add($name, $email, $password, $type, $file){
       if($this->existEmail($email)==false){
            $sql = "INSERT INTO users (name, email, password, type, file) VALUES (:name, :email, :password, :type, :file)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", $password);
            $sql->bindValue(":type", $type);
            $sql->bindValue(":file", $file);
            $sql->execute();
            return true;
        }
       else{
            return false;
        }
    }

    public function edit($name, $email, $type, $file, $id){
            $sql = "UPDATE users SET name = :name, email = :email, type = :type, file = :file  WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":type", $type);
            $sql->bindValue(":file", $file);
            $sql->bindValue(":id", $id);
            $sql->execute();
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

    public function getEmail($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
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

    public function alterPassword($new_password, $id){
        $sql = ("UPDATE users SET password = :new_password WHERE id = :id");
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':new_password', $new_password);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function del($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}