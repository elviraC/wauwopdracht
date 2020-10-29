<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wauw";
$conn = '';

try {
  // PDO dsn
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

class Database{

  private $pdo;
  private $bConnected = false;

    public function __construct($hostname, $database, $username, $password)
    {

      $this->Connect($hostname, $database, $username, $password);
      $this->parameters = array();
    }

    private function Connect($hostname, $database, $username, $password)
    {
      global $settings;
      $dsn = 'mysql:dbname='.$database.';host='.$hostname;

      try
      {
        $this->pdo = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->bConnected = true;

      }
      catch(PDOException $e){
        echo $this->ExceptionLog($e->getMessage());
        die();
      }
    }

    public function Insert($sql){
      try{

      }
      catch(PDOException $e){
        echo $this->ExceptionLog($e->getMessage());
        die();
      }
    }
    public function CloseConnection(){
      $this->pdo = null;
    }
}

?>
