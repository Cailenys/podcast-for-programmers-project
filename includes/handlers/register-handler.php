<?php

 function sanitizeFormPassword($inputText) {
     $inputText= strip_tags($inputText);   
     return $inputText;
 }

    function sanitizeFormUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText); //Restricting username without space
        return $inputText;
    }

    function sanitizeFormString($inputText) {
        $inputText= strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText); 
        $inputText= ucfirst(strtolower($inputText)); //First letter of username will be capitalized and the rest of the string will be lowercase
        return $inputText;
    }

    function validateUsername($un){

    }

    function validateFirstName($fn){
        
    }

    function validateLastName($ln){
        
    }

    function validateEmails($em, $em2){
        
    }

    function validatePassword($pw, $pw2){
        
    }

    if(isset($_POST['registerButton'])){ //Resgister button was pressed
      $username = sanitizeFormUsername($_POST['username']);
    
      $firstName = sanitizeFormString($_POST['firstName']);

      $lastName = sanitizeFormString($_POST['lastName']);

      $email = sanitizeFormString($_POST['email']); 

      $email2 = sanitizeFormString($_POST['email2']);  

      $password = sanitizeFormPassword($_POST['password']); 
      
      $password2 = sanitizeFormPassword($_POST['password2']);  

      validateUsername($username);
      validateUsername($firstName);
      validateUsername($lastName);
      validateUsername($email, $email2);
      validateUsername($password, $password2);
    }
?>