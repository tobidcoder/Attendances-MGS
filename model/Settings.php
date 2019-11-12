<?php 
class Settings {
    public $resumption_time;
    public $closing_time;

    public function setResumption($resumption_time, $closing_time){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql ="UPDATE settings SET resumption_time=:resumption_time, closing_time=:closing_time WHERE id=1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':resumption_time', $resumption_time);
            $stmt->bindParam(':closing_time', $closing_time);
            $result = $stmt->execute();
                return $result;
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }

    public function getResumption(){
        $db= new Database;
        $conn =$db->connect();
        try{
            $sql="SELECT * FROM settings";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt != ''){
                return $stmt;
            }
            return false;
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }   
}

