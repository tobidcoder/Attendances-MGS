<?php
class Holidays {

    public $holiday_description;
    public $holiday_date;
    
    public function setHolidays($holiday_date, $holiday_description){

        $this->holiday_date = $holiday_date;
        $this->holiday_description= $holiday_description;

        $db = new Database();
        $conn = $db->connect();
        try{
            $sql ="INSERT INTO holidays(holiday_date, holiday_descripion) VALUES (:holiday_date, :holiday_descripion)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("holiday_date", $this->holiday_date);
            $stmt->bindParam("holiday_descripion", $this->holiday_description, PDO::PARAM_STR);
            $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
                return $result;
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }
}
?>