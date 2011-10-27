<?php
include("include/session.php");

class Process
{

   function Process(){
      global $session;
 
      if(isset($_POST['sublogin'])){
         $this->procLogin();
      }
 
      else if(isset($_POST['subjoin'])){
         $this->procRegister();
      }

      else if(isset($_POST['subforgot'])){
         $this->procForgotPass();
      }

      else if(isset($_POST['subedit'])){
         $this->procEditAccount();
      }
    
      else if($session->logged_in){
         $this->procLogout();
      }
     
       else{
          header("Location: main.php");
       }
   }

  
   function procLogin(){
      global $session, $form;
  
      $retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
      

      if($retval){
         header("Location: ".$session->referrer);
      }
 
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
   
   
   function procLogout(){
      global $session;
      $retval = $session->logout();
      header("Location: main.php");
   }
   
   
   function procRegister(){
      global $session, $form;
      /* Convert username to all lowercase (by option) */
      if(ALL_LOWERCASE){
         $_POST['user'] = strtolower($_POST['user']);
      }
     
      $retval = $session->register($_POST['user'], $_POST['pass'], $_POST['email']);
      
     
      if($retval == 0){
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = true;
         header("Location: ".$session->referrer);
      }
     
      else if($retval == 1){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
      
      else if($retval == 2){
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = false;
         header("Location: ".$session->referrer);
      }
   }
 
   function procForgotPass(){
      global $database, $session, $mailer, $form;
     
      $subuser = $_POST['user'];
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered<br>");
      }
      else{
         
         $subuser = stripslashes($subuser);
         if(strlen($subuser) < 5 || strlen($subuser) > 30 ||
            !eregi("^([0-9a-z])+$", $subuser) ||
            (!$database->usernameTaken($subuser))){
            $form->setError($field, "* Username does not exist<br>");
         }
      }
      
      
      if($form->num_errors > 0){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
      }
     
      else{
        
         $newpass = $session->generateRandStr(8);
         
        
         $usrinf = $database->getUserInfo($subuser);
         $email  = $usrinf['email'];
         
        
         if($mailer->sendNewPass($subuser,$email,$newpass)){
            /* Email sent, update database */
            $database->updateUserField($subuser, "password", md5($newpass));
            $_SESSION['forgotpass'] = true;
         }
       
         else{
            $_SESSION['forgotpass'] = false;
         }
      }
      
      header("Location: ".$session->referrer);
   }
   
   
   function procEditAccount(){
      global $session, $form;
      
      $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['email']);

    
      if($retval){
         $_SESSION['useredit'] = true;
         header("Location: ".$session->referrer);
      }
    
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
};


$process = new Process;

?>
