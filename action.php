<?php

if(isset($_GET['singUp'])){
    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $confirmPassword = $_GET['cpassword'];
    if((empty($name||$email||$password||$confirmPassword))|| null){
        session_start();
        $n = 1;
       $_SESSION['data'] =  $data ;
       header('Location: singup.php');
exit;
      
    }
}