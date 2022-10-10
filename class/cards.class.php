<?php
class Cards{
    private $pdo;
    public function __construct(){
         $this->pdo = new pdo("mysql:dbname=projeto_cilts;host=localhost", "root", "");
    }
    public function add($type_card, $number_card, $title, $description, $time_expected, $img, $frequency, $status, $date){
        if($this->existNumberCard($number_card)==false){
            $sql = "INSERT INTO cards (type_card, number_card, title, description, time_expected, img, frequency, status, date) 
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

    public function edit($type_card, $number_card, $title, $description, $time_expected, $img, $frequency, $date){
                $sql = "UPDATE cards SET type_card = :type_card, title = :title, description = :description, 
                time_expected = :time_expected, img = :img, frequency = :frequency, date= :date WHERE number_card = :number_card ";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":type_card", $type_card);
                $sql->bindValue(":title", $title);
                $sql->bindValue(":description", $description);
                $sql->bindValue(":time_expected", $time_expected);
                $sql->bindValue(":img", $img);
                $sql->bindValue(":frequency", $frequency);
                $sql->bindValue(":date", $date);
                $sql->bindValue(":number_card", $number_card);

                $sql->execute();
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
    public function alterStatus($execution_date, $frequency, $number_card){
        $execution_date = strtotime($execution_date);
        $current_date = time();
        $frequency = $frequency * 86400; 
        $limit_date = ($execution_date + $frequency);
      if($current_date > $limit_date){
            $sql = "UPDATE cards SET status ='2' WHERE number_card = :number_card";
            $sql=$this->pdo->prepare($sql);
            $sql->bindValue(':number_card', $number_card);
            $sql->execute();
            return true;
        }else{
            $sql = "UPDATE cards SET status ='1' WHERE number_card = :number_card";
            $sql=$this->pdo->prepare($sql);
            $sql->bindValue(':number_card', $number_card);
            $sql->execute();
            return true;
        }
    }

    public function executeCard($number_card, $execution_date, $execution_time, $comment, $name){
        $sql = "UPDATE cards SET execution_date = :execution_date, execution_time = :execution_time, 
        comment = :comment, name = :name WHERE number_card = :number_card";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':number_card', $number_card);
        $sql->bindValue(':execution_date', $execution_date);
        $sql->bindValue(':execution_time', $execution_time);
        $sql->bindValue(':comment', $comment);
        $sql->bindValue(':name', $name);        
        $sql->execute();
    }

    public function getDayly(){
        $sql = "SELECT * FROM cards WHERE frequency = 1";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getWeekly(){
        $sql = "SELECT * FROM cards WHERE frequency = 7";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getFortnightly(){
        $sql = "SELECT * FROM cards WHERE frequency = 15";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getMonthly(){
        $sql = "SELECT * FROM cards WHERE frequency = 30";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }


    public function getQuarterly(){
        $sql = "SELECT * FROM cards WHERE frequency = 90";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }

    public function getSemester(){
        $sql = "SELECT * FROM cards WHERE frequency = 180";
        $sql = $this->pdo->query($sql);
        if($sql -> rowCount() > 0){
            return $sql->fetchAll();
        }
        else{
            return array();
        }
    }


}