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
//Mthods to eco Holiday
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

    //Delete holidayy
    public function deleteHoliday($id){
        $db =new Database;
        $conn =$db->connect();
        try{
            $sql="DELETE FROM holiday WHERE id=:id";
            $stmt =$conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
        }catch(PDOExeption $e){
            $e->getMessage();
        }
        }
        //Edit Holiday 
        public function editHolidays($id,$holiday_date, $holiday_description){

            $db = new Database();
            $conn = $db->connect();
            try{
                $sql ="UPDATE holiday SET  holiday_date=:holiday_date, holiday_description=:holiday_description WHERE id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam("id", $id);
                $stmt->bindParam("holiday_date", $holiday_date);
                $stmt->bindParam("holiday_description",   $holiday_description, PDO::PARAM_STR);
                $result = $stmt->execute()  or die(print_r($stmt->errorInfo(), true));
                    return $result;
            }catch(PDOExeption $e){
                echo $e->getMessage();
            }
        }
    //Mthods to get one Holiday
    public function getHolidaysone($id){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql = "SELECT * FROM holiday WHERE id=:id";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
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