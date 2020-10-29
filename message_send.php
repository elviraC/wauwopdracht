<?php
      include "includes.php";
      include "view/header.php";
      session_start();
      $message = $_SESSION['message'];
      $email = $_SESSION['email'];
      $name = $_SESSION['name'];
      $subscription = $_SESSION['subscription'];
      $sendMailToUser = $_SESSION['send_mail_to_user'];

      // if sessio email exist and emails haven't been send yet
      if(isset($_SESSION['email']) && !$sendMailToUser){
        // send email to domain owner and form user
        $contactController = new ContactController();
        $contactController->sendMail();
        $contactController->sendMailToUser();
      }
      else{
          // email has been send already (do not send again)
      }
?>

   <div class="form-template rounded">
    <div class="form-text text-center">
     <h1 class="form-text__title">Message received</h1>
     <div class="form-text__description">Thank you for reaching out to us. We will try to reply to you within 48 hours.</div>
    </div>
    <div class="message-confirmed">
      <div class="message-confirmed__row">
        <span class="confirmed-field">Name:</span>
        <div class="confirmed-text"> <?php echo $name; ?>  </div>
      </div>
      <div class="message-confirmed__row">
        <span class="confirmed-field">Email:</span>
        <div class="confirmed-text"> <?php echo $email; ?>  </div>
      </div>
      <div class="message-confirmed__row">
        <span class="confirmed-field">Subscription:</span>
        <div class="confirmed-text"> <?php echo $subscription; ?>  </div>
      </div>
      <div class="message-confirmed__row">
        <span class="confirmed-field">Your message:</span>
        <div class="confirmed-text"> <?php echo $message; ?>  </div>
      </div>
    </div>
  </div>


<?php

include "view/footer.php";
