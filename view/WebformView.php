<?php
//View
class WebFormView {
 private $form;

 public function __construct(WebForm $form) {
   $this->form = $form;
 }

 public function printForm(){
   $fields = $this->form->formFields;

   //print Form Title, FormText,  Form action
   echo $this->printBeginForm();

   // loop through array to get input types
   foreach($fields as $i => $item){
     $labelText = $fields[$i][0];
     $name = $fields[$i][1];
     $required = $fields[$i][2];
     $inputType = $i;

     if($i == "text" || $i == "email"){
        echo $this->makeInputField($labelText, $name, $required, $inputType);
     }

     if($i == "textarea"){
       echo $this->makeTextarea($labelText, $name, $required);
     }

     if($i == "select"){
       $selectOptions =$fields[$i][3]["values"];
       echo $this->makeSelectlist($labelText, $name, $required, $selectOptions);
     }
   }

   // print submitbutton & end forms
   echo $this->printEndForm();
 }


public function printBeginForm(){
  $html = '
   <div class="form-template rounded">
    <div class="form-text text-center">
     <h1 class="form-text__title">'.$this->form->getFormTitle().'</h1>
     <div class="form-text__description">'.$this->form->getFormText().'</div>

     <div class="message">'.$this->form->message.'</div>
    </div>
    <form action="?action=submit" method="post" id="'.$this->form->formName.'" class="form">
  ';

  return $html;
}

public function printEndForm(){
  $html = '
        <div class="form-buttons">
        <input class="btn primary full-size rounded" type="submit"  name="submit" value="Send message" />
     </form>
  </div>
    ';
  return $html;
}

 public function makeInputField( $labelText, $name, $required, $inputType){
   $html = '<div class="form-field '.$required.'">'.
   '<label for="'.$name.'">'.$labelText.'</label>'.
   '<input name="'.$name.'" type="'.$inputType.'" '.$required.' />'.
   '</div>';

   return $html;
 }

public function makeTextarea($labelText, $name, $required){
  $html = '<div class="form-field '.$required.'">'.
  '<label for="'.$name.'">'.$labelText.'</label>'.
  '<textarea name="'.$name.'"'.$required.'></textarea>'.
  '</div>';

  return $html;
}

public function makeSelectlist($labelText, $name, $required, $selectOptions){
  $html = '<div class="form-field '.$required.'">
  <label for="'.$name.'">'.$labelText.'</label>
  <select name="'.$name.'"'.$required.'>';

  // loop through array to get select options
  foreach($selectOptions as $i => $item){
      $html .= '<option value="'.$item.'">'.$item.'</option>';
  }

  $html .= '</select>
  </div>
  ';

  return $html;
}

 public function output() {
   $html = '
    <div class="form-template">
      <h1>'.$this->form->getFormTitle().'</h1>
      <div>'.$this->form->getFormText().'</div>
      <form action="?action=submit" method="post" id="'.$this->form->formName.'" class="form">
            <div class="form-field">
              <label for="name">Your name</label>
              <input name="name" type="text" required/>
            </div>
            <div class="form-field">
              <label for="email">Your Email</label>
             <input name="email" type="email" required/>
            </div>
            <div class="form-field">
              <label for ="phone">Telephone</label>
              <input name="phone" type="tel"/>
            </div>
            <div class="form-field">
             <label>Message:</label>
             <textarea name="message" required/></textarea>
            </div>
           <input type="submit"  name="submit" value="Send" />
         </form>
      </div>
        ';

   return $html;
 }
}
