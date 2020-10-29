<?php
      include "includes.php";
      include "view/header.php";
      session_start();
?>
<?php
// Declare form fields
$fields = array(
  "text" => array('Name', 'name','required'),
  "email" => array('Emailaddress', 'email', 'required'),
  "select" => array('Subscribe to', 'subscribe', 'required', array("values" => array("Newsletter", "Promotioncodes","None"))),
  "textarea" => array('Message', 'message','required')
);

/**
* Make webform
* param 1: String form Title
* param 2: String form description text
* param 3: String form name
* param 4: Array form fields
**/

$model = new WebForm(
  "Contact us"
  , "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget imperdiet augue. In vestibulum iaculis pharetra. Donec congue nunc vel ex sollicitudin, sit amet ullamcorper orci posuere. Sed vestibulum, mauris sed mattis ullamcorper, turpis diam semper elit, ac cursus ipsum nisi sit amet enim."
  , "Contact Form"
  , $fields);

// make a new controller for the form
$controller = new WebFormController($model);

// print the form
$newView = new WebFormView($model);
echo $newView->printForm();

//If one of the forms has been submitted, call the relevant controller action
if (isset($_GET['action'])) $controller->{$_GET['action']}($_POST);


include "view/footer.php";
