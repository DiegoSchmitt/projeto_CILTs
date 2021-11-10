<?php
class Cards{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function add($type_card, $number_card, $title, $description, $time_expected, $img, $frequency, $status, $date){
        if($this->existNumberCard($number_card)==false){
            $sql = "INSERT INTO cards (type_card, number_card, title, description, time_expected, file, frequency, status, date) 
            VALUES (:type_card, :number_card, :title, :description, :time_expected, :img, :frequency, :status, :date)";
            $sql=$this->pdo->prepare($sql);
            $sql->bindValue(':type_card', $type_card);
            $sql->bindValue(':number_card', $number_card);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':time_expected', $time_expected);
            $sql->bindValue(':img', $img);
            $sql->bindValue(':frequency', $frequency);
            $sql->bindValue(':status', $status);
            $sql->bindValue(':date', $date);
            $sql->execute();
            return true;
        }else{
            return false;
        }
    }
    public function existNumberCard($number_card){
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
    public function getNumberCard($number_card){
        $sql = "SELECT * FROM cards WHERE number_card = :number_card";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':number_card', $number_card);
        $sql->execute();

        if($sql -> rowCount() > 0){
            return $sql->fetch();
        }
        else{
            return array();
        }
    }
    public function getType($type_card){
        $sql = "SELECT * FROM cards WHERE type_card = :type_card";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':type_card', $type_card);
        $sql->execute();

        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getStatus($status){
        $sql = "SELECT * FROM cards WHERE status = :status";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->execute();

        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM cards";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }
    public function alterStatus($date, $frequency){
        $date = strtotime($date);
        $current_date = time();
        $frequency = $frequency * 86400; 
        $limit_date = ($date + $frequency);
      if($current_date > $limit_date){
            $sql = "UPDATE cards (status) VALUE ('1')";
            $sql=$this->pdo->prepare($sql);
            $sql->execute();
            return true;
        }
    }
}