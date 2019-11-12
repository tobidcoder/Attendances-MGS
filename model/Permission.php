<?php
class Permission {
    public $staff_id;
    public $status;
    public $recuring_status;
    public $start_date;
    public $end_date;
    public $recurring_day;
    public $comment;

    //Methods to set halfday for a staff
    public function setHalfday($staff_id, $status, $recurring_status, $start_date, $end_date, $recurring_day, $comment){
        $db =new Database;
        $conn =$db->connect();
        try{
            $sql ="INSERT INTO permission (staff_id, status, recurring_status, start_date, end_date,recurring_day, comment) VALUES(:staff_id, :status, :recurring_status, :start_date, :end_date, :recurring_day, :comment)";
            $stmt=$conn->prepare($sql);
            //BINDING THE PARAMENTER
            $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':recurring_status', $recurring_status, PDO::PARAM_STR);
            $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
            $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
            $stmt->bindParam(':recurring_day', $recurring_day, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
                if($result != ''){
                    return $result;
                }
        }catch(PDOExeption $e){
            $e->getMessage();
        }
    }
    //Methods for getting all staff halfday permission
    public function getAllStaffHalfday(){
        $db =new Database;
        $conn =$db->connect();
        $thismonth= date('m');
        // $thismonth2 = 'strftime('%m', CURRENT_TIMESTAMP)';
    try{
        $sql="SELECT * FROM permission
         INNER JOIN staff ON permission.staff_id=staff.staff_id 
         WHERE permission.status='halfday'";
        //  AND DAYOFMONTH(permission.start_date) = :thismonth AND DAYOFMONTH(permission.end_date)=:thismonth";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($array != ''){
                // var_dump($array);
                 return $array;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
}

//Methods for getting all staff absent permission
public function getAllStaffAbsent(){
    $db =new Database;
    $conn =$db->connect();
  
try{
    $sql="SELECT * FROM permission INNER JOIN staff ON permission.staff_id=staff.staff_id WHERE permission.status='absent'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($array != ''){
           return $array;
        }
}catch(PDOExeption $e){
    $e->getMessage();
}
}
public function setAbsentPermission($staff_id, $status, $recurring_status, $start_date, $end_date, $recurring_day, $comment){
    $db =new Database;
    $conn =$db->connect();
    try{
        $sql ="INSERT INTO permission (staff_id, status, recurring_status, start_date, end_date,recurring_day, comment) VALUES(:staff_id, :status, :recurring_status, :start_date, :end_date, :recurring_day, :comment)";
        $stmt=$conn->prepare($sql);
        //BINDING THE PARAMENTER
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':recurring_status', $recurring_status, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $stmt->bindParam(':recurring_day', $recurring_day, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
}
//methods to edit halfday  permission for staff
public function updateHalfday($start_date, $end_date, $recurring_day, $id){
    $db =new Database;
    $conn =$db->connect();
    try{
        $sql="UPDATE permission SET start_date=:start_date, end_date=:end_date, recurring_day=:recurring_day WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $stmt->bindParam(':recurring_day', $recurring_day, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
    }   
//methods to edit absent with permission for staff
public function updatePermission($start_date, $end_date, $comment, $id){
    $db =new Database;
    $conn =$db->connect();
    try{
        $sql="UPDATE permission SET start_date=:start_date, end_date=:end_date, comment=:comment WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
    }
public function deleteAbsent($id){
    $db =new Database;
    $conn =$db->connect();
    try{
        $sql="DELETE FROM permission WHERE id=:id";
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
    public function deleteHalfday($id){
        $db =new Database;
        $conn =$db->connect();
        try{
            $sql="DELETE FROM permission WHERE id=:id";
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
//Get number of absent with permission for staff
public function getNumberofAbsent(){
    $db = new Database;
    $conn =$db->connect();
    $staff_id=$_SESSION['staff_id'];
    try{
        $sql="SELECT * FROM permission WHERE staff_id=:staff_id AND status='absent'";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->rowCount();
            return $row;
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

    }

//Get number of halfday for staff
public function getNumberofhalfDay(){
    $db = new Database;
    $conn =$db->connect();
    $staff_id=$_SESSION['staff_id'];
    try{
        $sql="SELECT * FROM permission WHERE staff_id=:staff_id AND status='halfday'";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->rowCount();
            return $row;
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

    }

//Get number of halfday for All staff (All half day)
public function getNumhalfDay(){
    $db = new Database;
    $conn =$db->connect();
    // $staff_id=$_SESSION['staff_id'];
    try{
        $sql="SELECT * FROM permission WHERE status='halfday'";
        $stmt=$conn->prepare($sql);
        // $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->rowCount();
            return $row;
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

    }

//Get number of Absent for All staff (All Absent)
public function getNumAbsent(){
    $db = new Database;
    $conn =$db->connect();
    // $staff_id=$_SESSION['staff_id'];
    try{
        $sql="SELECT * FROM permission WHERE status='absent'";
        $stmt=$conn->prepare($sql);
        // $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->rowCount();
            return $row;
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

    }
}
?>