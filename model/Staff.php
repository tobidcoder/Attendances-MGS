<?php
class Staff {
//Variable for staff
   public $firstname;
   public $lastname;
   public $username;
   public $email;
   public $password;
   //Method for Create Staff
   Public function staffRegister($firstname, $lastname, $username, $email, $password){
        $db=new Database ;
        $conn =$db->connect();
        try{
            $sql ="INSERT INTO staff (firstname, lastname, username, email, password) VALUES(:firstname, :lastname, :username, :email, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $stmt->bindParam(':password', $enc_password, PDO::PARAM_STR);
            $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
                 return $conn->lastInsertId();
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }
//Methods to if username exist
    public function checkUsernameExit($username){
        $db=new Database ;
        $conn =$db->connect();
        try{
            $sql = "SELECT username FROM staff WHERE username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("username", $username, PDO::PARAM_STR);
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
//Methods to check if email exist
    public function checkEmailexit($email){
        $db=new Database ;
        $conn =$db->connect();
        try{
            $sql="SELECT email FROM staff WHERE email=:email";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
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
//methods login staff
    public function loginStaff($username, $password){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql = "SELECT * FROM staff WHERE (username=:username OR email=:username) AND password=:password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $stmt->bindParam(':password', $enc_password, PDO::PARAM_STR);
            $stmt->execute();
              if($stmt->rowCount() > 0){
                  $result = $stmt->fetch(PDO::FETCH_OBJ);
                  return $result;
              }else{
                  return false;
              }
        }catch(PDOExeption $e){
          echo $e->getMessage();
        }      
   }

//Methods to get one staff
    public function getOneStaff($staff_id){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql ="SELECT * FROM  staff WHERE staff_id=$staff_id";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt != ''){
                return $stmt;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    //Methods to get all staff
    public function getAllStaff(){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql = "SELECT * FROM staff";
            $stmt =$conn->prepare($sql);
            $stmt->execute();
            if($stmt != '') {
               return $stmt;
            }                
        }catch(PDEOExeption $e){
             echo $e->getMessage();
        }
    }
//methods to get number of staff
    public function getNumberofStaff(){
        $db = new Database;
        $conn = $db->connect();
        try{
            $sql ="SELECT * FROM staff";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $row=$stmt->rowCount();
            return $row;
        }catch(PDOExeption $e){
            echo $e->getMessage();
        }
    }

    public function deleteEmailpassreset(){
        $db = new Database;
        $conn = $db->connect();
    try{    
        $sql = "DELETE FROM resetpassword WHERE email=$email";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $result =$stmt->execute();
        return $esult;
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
}
    public function resetPassword(){
        $db = new Database;
        $conn = $db->connect();
    try{    
        $sql = "INSERT INTO resetpassword(email, selector, token, expires) VALUES(:email, :selector, :expires)";

        $stmt=$conn->prepare($sql);
        $tokenhash =password_hash($token, PASSWORD_DEFAULT);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->bindParam("selector", $selector, PDO::PARAM_STR);
        $stmt->bindParam("tokenhash", $tokenhash, PDO::PARAM_STR);
        $stmt->bindParam("expires", $expires, PDO::PARAM_STR);
        $result =$stmt->execute();
          return $esult;
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    }
    //Methods to update staff details
Public function staffUpdateProfile($staff_id, $firstname, $lastname, $username ){
    $db=new Database ;
    $conn =$db->connect();
    // $staff_id = $_SESSION['staff_id'];
    try{
        $sql ="UPDATE staff SET firstname=:firstname, lastname=:lastname, username=:username WHERE staff_id=$staff_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
       
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
                return $result;
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
}
public function deleteStaff($staff_id){
    $db=new Database ;
    $conn =$db->connect();

    try{
        $sql = "DELETE FROM staff WHERE staff_id=:staff_id";
        $stmt =$conn->prepare($sql);
        $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $result = $stmt->execute() or die(print_r($stmt->errorInfo(), true));
                return $result;
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
}
    
}
?>