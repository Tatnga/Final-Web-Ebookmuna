<?php
include("config.php");
include("firebaseRDB.php");

$email = $_POST['email'];
$password = $_POST['password'];

if($email == ""){
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Email Required.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('login.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
}else if($password == ""){
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Password Required.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('login.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
}else{
   $rdb = new firebaseRDB($databaseURL);
   $retrieve  = $rdb->retrieve("users");
   $data = json_decode($retrieve, 1);

   $user = null;
   foreach($data as $key => $value){
      if($value['email'] == $email){
         $user = $value;
         break;
      }
   }
   
   if($user == null){
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Your Your Email not yet Registered.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('login.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
   }else{
       if($user['password'] == $password){
           if($user['status'] == 'pending'){
    
               echo "<script>";
               echo "var left = (screen.width / 2) - (400 / 2);";
               echo "var top = (screen.height / 2) - (200 / 2);";
               echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
               echo "popup.document.write('<h1>Failed!</h1><p>Your registration is still pending. Please wait for approval.</p>');";
               echo "setTimeout(function() {";
               echo "window.location.replace('login.php');";
               echo "popup.close();";
               echo "}, 3000);";
               echo "</script>";
     
           } else if($user['user_type'] == 'admin'){
               $_SESSION['user'] = $user;
               header("location: Admin/home.php");
           } else if($user['user_type'] == 'librarian'){
               $_SESSION['user'] = $user;
               header("location: librarian/home.php");
           } else {
      


               echo "<script>";
               echo "var left = (screen.width / 2) - (400 / 2);";
               echo "var top = (screen.height / 2) - (200 / 2);";
               echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
               echo "popup.document.write('<h1>Failed!</h1><p>Invalid User Type.</p>');";
               echo "setTimeout(function() {";
               echo "window.location.replace('login.php');";
               echo "popup.close();";
               echo "}, 3000);";
               echo "</script>";
               
           }
       }else{

    

           echo "<script>";
           echo "var left = (screen.width / 2) - (400 / 2);";
           echo "var top = (screen.height / 2) - (200 / 2);";
           echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
           echo "popup.document.write('<h1>Failed!</h1><p>Check your Credentials.</p>');";
           echo "setTimeout(function() {";
           echo "window.location.replace('login.php');";
           echo "popup.close();";
           echo "}, 3000);";
           echo "</script>";
       }
   }    
}
?>
