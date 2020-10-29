<?php
include "./config/db.php";

//Controller
class WebFormController {
	private $model;

	public function __construct($model) {
		$this->model = $model;
	}


	/**
	*	When data has been inserted into DB, send an email to user and owner.
	**/
	public function send(){
		if($_SESSION['email']){
			$this->model->setMessage('Your message has been send');
			$contactController = new ContactController();
			$contactController->sendMail();
		}
	}

	/**
	*  User pressed submit button, call insert function to insert data in DB
	*	@param array $request  -> request data.
	**/
	public function submit($request) {
		if (isset($request['submit'])) {
     $this->insert($request);
		}
	}

	/**
	*	Redirect to URL.
	* @param string $url -> URL of destination.
	**/
	public function redirect($url){
		header("Location: /$url");
		header("Connection: open");
		exit;
	}

	/**
	* Set user session.
	* @param string $email -> Value of Emailaddress from form.
	* @param string $message -> Content of message from form.
	**/
	public function setSession($email, $message){
			$_SESSION["email"] = $email;
			$_SESSION["message"] = $message;
	}

	/**
	*  Connection to DB.
	*  PDO Query to insert data in DB.
	*  Redirect to send URL to trigger the send(Mail) function.
	**/
  public function insert($request){
    try{
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "wauw";
      $conn = '';

	    // insert values in database
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $dateToday = date('YYYY-mm-dd', time());

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("INSERT INTO contact_entry (name, email, subscription, message, date_created)
	    VALUES (?,?,?,?,?)");

	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $subscription = $_POST['subscribe'];
	    $message = $_POST['message'];

	    $stmt->execute([$name,$email, $subscription, $message, $dateToday]);
			$this->setSession($email, $message);

			if($stmt->rowCount()>0){
				$this->redirect("wauwtestcase/?action=send");
			}

    } catch(PDOException $e) {
			$conn->rollback();
      echo $stmt . "<br>" . $e->getMessage();
    }
  }
}
