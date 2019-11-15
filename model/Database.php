<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname ="atten";
        $this->charset ="utf8";
  
try{
    $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
    $conn = new PDO($dsn,$this->username,$this->password);
          // set the PDO error mode to exception
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     return $conn;   
     //echo "Connected successfully";
    } catch(PDOException $e)  {
    echo "Connection failed: " . $e->getMessage();
    }
  
 }
}

 $db = new Database();
 $xx = $db->connect();     
 
?>


