<?php
include("User/include/session.php");

class AdminProcess
{

   function AdminProcess(){
      global $session;
      if(!$session->isAdmin()){
         header("Location: ../main.php");
         return;
      }
        if(isset($_POST['subupdlevel'])){
         $this->procUpdateLevel();
      }
      else if(isset($_POST['subdeluser'])){
         $this->procDeleteUser();
      }
      else{
         header("Location: ../main.php");
      }
   }

   function procUpdateLevel(){
      global $session, $database, $form;
       $subuser = $this->checkUsername("upduser");
      
      if($form->num_errors > 0){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   
      else{
         $database->updateUserField($subuser, "userlevel", (int)$_POST['updlevel']);
         header("Location: ".$session->referrer);
      }
   }
   
   function procDeleteUser(){
      global $session, $database, $form;
  
      $subuser = $this->checkUsername("deluser");
      

      if($form->num_errors > 0){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }

      else{
         $q = "DELETE FROM ".TBL_USERS." WHERE username = '$subuser'";
         $database->query($q);
         header("Location: ".$session->referrer);
      } 
}
 function checkUsername($uname, $ban=false){
      global $database, $form;
      
      $subuser = $_POST[$uname];
      $field = $uname;  
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered<br>");
      }
      else{
        
         $subuser = stripslashes($subuser);
         if(strlen($subuser) < 5 || strlen($subuser) > 30 ||
            !eregi("^([0-9a-z])+$", $subuser) ||
            (!$ban && !$database->usernameTaken($subuser))){
            $form->setError($field, "* Username does not exist<br>");
         }
      }
      return $subuser;
   }
};

$adminprocess = new AdminProcess;

?>
