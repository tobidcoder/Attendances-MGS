<?php
class Admin {
    public function loginAdmin($username, $password){
      $db = new Database;
      $conn = $db->connect();
      try{
          $sql = "SELECT * FROM admin WHERE (username=:username OR email=:username) AND password=:password";
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



}
