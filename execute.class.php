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
    private function existNumberCilt($number_cilt){
        $sql = "SELECT * FROM cards WHERE number_cilt = :number_cilt";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":number_cilt", $number_cilt);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }

}