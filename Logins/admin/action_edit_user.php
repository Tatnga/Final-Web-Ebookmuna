<?php
require __DIR__ . '/../../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
error_reporting(E_ALL);
 include("../config.php");
 include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
$id = $_POST['id'];
  $data = $db->retrieve("users/$id");
  $data = json_decode($data, 1);


  // Initialize Firebase Authentication
  $factory = (new Factory)->withServiceAccount(__DIR__ . '/../appdt-2cc36-firebase-adminsdk-n62h1-8224af3d8f.json');
  $auth = $factory->createAuth();

  // Check if email is valid
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Invalid email format.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('register.php');";
    echo "popup.close();";
    echo "}, 3000);";
  } else {
    // Check if email already exists in Firebase Authentication
    try {
      $user = $auth->getUserByEmail($_POST['email']);
      if ($user !== null) {
    

        echo "<script>";
        echo "var left = (screen.width / 2) - (400 / 2);";
        echo "var top = (screen.height / 2) - (200 / 2);";
        echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
        echo "popup.document.write('<h1>Failed!</h1><p>Email already exists in Firebase Authentication.</p>');";
        echo "setTimeout(function() {";
        echo "window.location.replace('register.php');";
        echo "popup.close();";
        echo "}, 3000);";
        exit;
      }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
      // User does not exist in Firebase Authentication, continue
    }

    // Check if email already exists in Firebase database
    $emailExists = false;
    if ($data !== null && count($data) > 0) {
      foreach ($data as $user) {
        if ($user['email'] === $_POST['email']) {
          $emailExists = true;
          break;
        }
      }
    }
    if ($emailExists) {

      echo "<script>";
      echo "var left = (screen.width / 2) - (400 / 2);";
      echo "var top = (screen.height / 2) - (200 / 2);";
      echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
      echo "popup.document.write('<h1>Failed!</h1><p>Email already exists in database'.</p>');";
      echo "setTimeout(function() {";
      echo "window.location.replace('register.php');";
      echo "popup.close();";
      echo "}, 3000);";
      exit;
    }

    // Generate a unique childno by counting the number of existing users

    
    // Create new user
    $penalty = "none";
    $status = "pending";
    $current_date = date("Y-m-d H:i:s");
    $update = $db->update("users", $id, [
      "name" => $_POST['name'],
      "useridno" => $_POST['useridno'],
      "contact" => $_POST['contact'],
      "email" => $_POST['email'],
      "address" => $_POST['address'],
      "useryear" => $_POST['useryear'],
      "usercourse" => $_POST['usercourse'],
    
      "status" => $status,
      "user_type" => $_POST['user_type'],
      "password" => $_POST['password'],
    

    ]);
    echo "dwadwwada";    
    $user = $auth->getCurrentUser();

    if ($update) {


        echo "<script>";
        echo "var left = (screen.width / 2) - (400 / 2);";
        echo "var top = (screen.height / 2) - (200 / 2);";
        echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
        echo "popup.document.write('<h1>Success!</h1><p>Book added successfully'.</p>');";
        echo "setTimeout(function() {";
        echo "window.location.replace('ViewUser.php');";
        echo "popup.close();";
        echo "}, 3000);";
    } else {
  
      echo "<script>";
      echo "var left = (screen.width / 2) - (400 / 2);";
      echo "var top = (screen.height / 2) - (200 / 2);";
      echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
      echo "popup.document.write('<h1>Failed!</h1><p>Failed'.</p>');";
      echo "setTimeout(function() {";
      echo "window.location.replace('ViewUser.php');";
      echo "popup.close();";
      echo "}, 3000);";
    }  
}

   

       
?>
