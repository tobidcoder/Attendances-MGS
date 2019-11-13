<?php 
class Attendance{

    public $staff_id;
    public $clockin_date;
    public $day;
    public $clock_in;
    public $clock_out;
    public $work_status;
    public $comment;
//Methods for staff to clock in Half Day
public function clockinHalfDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment){
    $db = new Database;
    $conn =$db->connect();
    try{
        $sql ="INSERT INTO attendance(staff_id, clockin_date, day, clock_in, clockin_status, comment) VALUES(:staff_id, :clockin_date, :day, :clock_in, :clockin_status, :comment)";
        $stmt=$conn->prepare($sql);
        //BINDING THE PARAMENTER
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
        $stmt->bindParam(':day', $day, PDO::PARAM_STR);
        $stmt->bindParam(':clock_in', $clock_in, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_status', $clockin_status, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
}

//Methods for staff to clock in Full Day
public function clockinFullDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment){
    $db = new Database;
    $conn =$db->connect();
    try{
        $sql ="INSERT INTO attendance(staff_id, clockin_date, day, clock_in, clockin_status, comment) VALUES(:staff_id, :clockin_date, :day, :clock_in, :clockin_status, :comment)";
        $stmt=$conn->prepare($sql);
        //BINDING THE PARAMENTER
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
        $stmt->bindParam(':day', $day, PDO::PARAM_STR);
        $stmt->bindParam(':clock_in', $clock_in, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_status', $clockin_status, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result != ''){
                return $result;
            }
    }catch(PDOExeption $e){
        $e->getMessage();
    }
}
//Methods for staff clock out
public function clockOut($clockin_out){
    $db = new Database;
    $conn =$db->connect();
    $staff_id =$_SESSION['staff_id'];
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    $clock_out = date("H:i:s");
    
    try{
        $sql ="UPDATE attendance SET clock_out=:clock_out WHERE staff_id =:staff_id AND clockin_date=:clockin_date";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
        $stmt->bindParam(':clock_out', $clock_out, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
            if($result){
                return $result;
            }

    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

}
//Methods to Get staff clocked in time 
public function getClockinTime(){
    $db = new Database;
    $conn =$db->connect();
    $staff_id =$_SESSION['staff_id'];
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    try{
        $sql="SELECT * FROM attendance WHERE staff_id=:staff_id AND clockin_date=:clockin_date ORDER BY created_at LIMIT 1";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
        $stmt->execute() or die(print_r($stmt->errorInfo(), true));
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($array != ''){
           return $array;
        }
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }
}

//Methods to check if staff have already clock in.
public function checkIfClockIn(){
    $db = new Database;
    $conn =$db->connect();
    $staff_id =$_SESSION['staff_id'];
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    try{
        $sql="SELECT clockin_date FROM attendance WHERE staff_id=:staff_id AND clockin_date=:clockin_date";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $stmt->bindParam("clockin_date", $clockin_date, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

//Methods to check if staff have already clock Out.
public function checkIfClockOut(){
    $db = new Database;
    $conn =$db->connect();
    $staff_id =$_SESSION['staff_id'];
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    try{
        $sql="SELECT clock_out FROM attendance WHERE staff_id=:staff_id AND clockin_date=:clockin_date";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $stmt->bindParam("clockin_date", $clockin_date, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
//Get number of staff that have clocked in Today
public function getClockinTodayNumber(){
    $db = new Database;
    $conn =$db->connect();
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    try{
        $sql="SELECT * FROM attendance WHERE clockin_date=:clockin_date ORDER BY created_at LIMIT 1";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->rowCount();
            return $row;
    }catch(PDOExeption $e){
        echo  $e->getMessage();
    }

}
    


// //methods to get number of staff
// public function getNumberofStaff(){
//     $db = new Database;
//     $conn = $db->connect();
//     try{
//         $sql ="SELECT * FROM staff";
//         $stmt=$conn->prepare($sql);
//         $stmt->execute();
//         $row=$stmt->rowCount();
//             return $row;
//     }catch(PDOExeption $e){
//         echo $e->getMessage();
//     }
// }

//Methods for getting all staff that clocked in today
public function getAllClockedinToday(){
    $db =new Database;
    $conn =$db->connect();
    // $today= date('d');
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
try{
    $sql="SELECT * FROM attendance
     INNER JOIN staff ON attendance.staff_id=staff.staff_id 
     WHERE attendance.clockin_date=:clockin_date ORDER BY attendance.staff_id LIMIT 1";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':clockin_date', $clockin_date, PDO::PARAM_STR);
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

//Methods for getting a staff attendance report for a week
public function getStaffthisWeekReport($staff_id){
    $db =new Database;
    $conn =$db->connect();
    // $today= date('d');
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    $thisweek =date('W');
    $thisyear =date('Y');
try{
    $sql="SELECT * FROM attendance
     INNER JOIN staff ON attendance.staff_id=staff.staff_id 
     WHERE WEEKOFYEAR(attendance.clockin_date)=:thisweek AND attendance.staff_id=:staff_id
     AND YEAR(attendance.clockin_date) =:thisyear ORDER BY created_at LIMIT 1";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':thisweek', $thisweek, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':thisyear', $thisyear, PDO::PARAM_STR);
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

//Methods for getting a staff attendance report for a MONTH
public function getStaffthisMonthReport($staff_id){
    $db =new Database;
    $conn =$db->connect();
    // $today= date('d');
    $date = date("Y-m-d");
    $clockin_date = date('Y-m-d', strtotime($date));
    $thismonth =date('m');
    $thisyear =date('Y');
try{
    $sql="SELECT * FROM attendance
     INNER JOIN staff ON attendance.staff_id=staff.staff_id 
     WHERE MONTH(attendance.clockin_date)=:thismonth AND attendance.staff_id=:staff_id
     AND YEAR(attendance.clockin_date) =:thisyear";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':thismonth', $thismonth, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':thisyear', $thisyear, PDO::PARAM_STR);
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
//Methods for getting a staff attendance report between date range (more report)
public function getStaffMoreReport($staff_id, $from_date, $to_date){
    $db =new Database;
    $conn =$db->connect();
    // $today= date('d');
    // $date = date("Y-m-d");
    // $clockin_date = date('Y-m-d', strtotime($date));
    // $thisyear =date('Y');
   try{
        $sql="SELECT * FROM attendance
        -- INNER JOIN staff ON attendance.staff_id=staff.staff_id 
        WHERE staff_id=:staff_id 
        AND DATE(clockin_date) BETWEEN '2019-11-1' AND '2019-11-31'"; 
        // --  ORDER BY attendance.clockin_date DESC";
        $stmt=$conn->prepare($sql);
        // $stmt->bindParam(':from_date', $from_date, PDO::PARAM_STR);
        // $stmt->bindParam(':to_date', $to_date, PDO::PARAM_STR);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        // $stmt->bindParam(':thisyear', $thisyear, PDO::PARAM_STR);
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


}


?>