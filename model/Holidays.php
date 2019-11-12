<?php
class Holidays {

    public $holiday_description;
    public $holiday_date;
    
    public function setHolidays($holiday_date, $holiday_description){

        $db = new Database();
        $conn = $db->connect();
        try{
            $sql ="INSERT INTO holiday(holiday_date, holiday_description) VALUES (:holiday_date, :holiday_description)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("holiday_date", $holiday_date);
            $stmt->bindParam("holiday_description",   $holiday_description, PDO::PARAM_STR);
            $result = $stmt->execute()  or die(print_r($stmt->errorInfo(), true));
                return $result;
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }

    public function getHolidays(){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql = "SELECT * FROM holiday";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            if($stmt) {
               return $stmt;
            }                
        }catch(PDEOExeption $e){
             echo $e->getMessage();
        }
    }
}
?>