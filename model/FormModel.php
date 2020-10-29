<?php
//Model
class WebForm {
	private $forName;
  private $formTitle;

  public function __construct($formTitle, $formText, $formName, $formFields){
    $this->formTitle = $formTitle;
    $this->formText = $formText;
    $this->formName = $formName;
		$this->formFields = $formFields;
		$this->message = '';
  }

	/**
	* Setting the message of the model.
	* This message is being used to let the user notificate the user.
	**/
	public function setMessage($message){
		$this->message = $message;
	}

	/**
	* Get message of model (use for notification to user)
	**/
	public function getMessage(){
		$message = $this->message ? $this->message : '';
		return $message;
	}

	/**
	*  Get the Title of the form, to put this content into the H1 of the form.
	**/
  public function getFormTitle(){
    return $this->formTitle;
  }

	/**
	* Get the description text of the form. Displayed benead the Title of the form.
	**/
  public function getFormText(){
    return $this->formText;
  }
}
