<?php

class EmailSender
{

	/**
	 * HTML EMAIL VERSTUREN
	 * @param string $recipient The email address of the recipient
	 * @param string $subject The subject of the message
	 * @param string $message The message text
	 * @param string $from The email address of the sender
	 * @return bool Whether the email has been successfully sent
	 */
	public function send($recipient, $subject, $message, $from)
	{
		/*
    $header = "From: " . $from;
		$header .= "\nMIME-Version: 1.0\n";
		$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
		return mb_send_mail($recipient, $subject, $message, $header);
    */
	}

  public function sendToUser($recipient, $subject, $message, $from)
	{
		/*
    $header = "From: " . $from;
		$header .= "\nMIME-Version: 1.0\n";
		$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
		return mb_send_mail($recipient, $subject, $message, $header);
    */


	 	$_SESSION["send_mail_to_user"] = true;

	}

}
