<?php
class Execute{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function add($autor, $execution_date, $execution_time, $number_cilt){
        if($this->existNumberCilt($number_cilt)==false){
            $sql = "INSERT INTO execute (autor, execution_date, execution_time, number_cilt) 
            VALUES (:autor, :execution_date, :execution_time, :number_cilt)";
            $sql=$this->pdo->prepare($sql);
            $sql->bindValue(':autor', $autor);
            $sql->bindValue(':execution_date', $execution_date);
            $sql->bindValue(':execution_time', $execution_time);
            $sql->bindValue(':number_cilt', $number_cilt);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
    private function existNumberCilt($number_card){
        $sql = "SELECT * FROM cards WHERE number_card = :number_card";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":number_card", $number_card);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM execute";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getMonth($month){
        $sql = "SELECT * FROM execute WHERE MONTH(execution_date) = :month";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":month", $month);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } else{
            return array();
        }
    }

}