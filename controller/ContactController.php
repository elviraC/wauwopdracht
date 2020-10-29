<?php
  class ContactController{
    	/**
    	 * Sending an e-mail to owner and user.
    	 */
    public function sendMail(){
        $email = $_SESSION['email'];
        $message = $_SESSION['message'];

        $emailSender = new EmailSender();
        $emailSender->send("admin@domain.com", "Email from contact form", $email, $message);
    }

    public function sendMailToUser(){
      $emailSender = new EmailSender();
      $emailSender->sendToUser($email, "Email from contact form", "admin@domain.com", $message);
    }
  }
