<?php
  class ContactController{
    	/**
    	 * Sending an e-mail to owner and user.
    	 */


   	public function __construct() {
   		$this->session_email = $_SESSION['email'];
      $this->session_message = $_SESSION['message'];
   	}

    public function sendMail(){
        // $email = $_SESSION['email'];
        // $message = $_SESSION['message'];

        $emailSender = new EmailSender();
        $emailSender->send("admin@domain.com", "Email from contact form", $this->session_email, $this->session_message);
    }

    public function sendMailToUser(){
      // $email = $_SESSION['email'];
      // $message = $_SESSION['message'];
      $emailSender = new EmailSender();
      $emailSender->sendToUser($this->session_email, "Email from contact form", "admin@domain.com", $this->session_message);
    }
  }
