<?php
class Cards{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function add($number_card, $title, $description, $img, $frequency){
        if($this->existNumberCard($number_card)==false){
            $sql = "INSERT INTO cards (number_card, title, description, file, frequency) VALUES (:number_card, :title, :description, :img, :frequency)";
            $sql=$this->pdo->prepare($sql);
            $sql->bindValue(':number_card', $number_card);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':img', $img);
            $sql->bindValue(':frequency', $frequency);
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
}