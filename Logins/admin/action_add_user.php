<?php
require '/../__DIR__'. '/../vendor/autoload.php';
use Kreait\Firebase\Factory;
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

$data = $db->retrieve("users");
$data = json_decode($data, 1);

$factory = (new Factory)->withServiceAccount(__DIR__ . '/../appdt-2cc36-firebase-adminsdk-n62h1-8224af3d8f.json');
$database = $factory->createDatabase();
$auth = $factory->createAuth();
$email = $_POST['email'];
$emailExists = false;

// Check if the email already exists in Firebase Authentication
try {
    $user = $auth->getUserByEmail($email);
    if ($user !== null) {
        $emailExists = true;
    }
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    // User does not exist in Firebase Authentication, do nothing
}

if ($data === null) {
  // do nothing
} else if (count($data) > 0) {
    foreach ($data as $users) {
        if ($users['email'] === $_POST['email']) {
            $emailExists = true;
            break;
        }
    }
}

if ($data !== null && is_array($data)) {
    $count = count($data);
} else {
    $count = 0;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format')</script>";
    echo "<script>location.replace('register.php')</script>";
} else if ($emailExists) {
    echo "<script>alert('Email already exists in database or Firebase Authentication')</script>";
    echo "<script>location.replace('register.php')</script>";
} else {
   
                if (strlen($_POST['password']) >= 6) {
                        $penalty = "none";
                        $status = "pending";
                        $current_date = date("Y-m-d H:i:s");
                        $insert = $db->insert("users", $count, [
                        "name" => $_POST['name'],
                        "useridno" => $_POST['useridno'],
                        "contact" => $_POST['contact'],
                        "email" => $_POST['email'],
                        "address" => $_POST['address'],
                        "useryear" => $_POST['useryear'],
                        "usercourse" => $_POST['usercourse'],
                        "penalty" => $penalty,
                        "status" => $status,
                        "user_type" => $_POST['user_type'],
                        "password" => $_POST['password'],
                        "registration_date" => $current_date ,
                        "childno" => strval($count),
                        "totalbook" => "0",
                        "totalreview" => "0",
                        "totalpending" => "0",
                        "totalreturn" => "0",

                    ]);
             
                    $user = $auth->createUserWithEmailAndPassword($_POST['email'], $_POST['password']);
                    if($_POST['password'!= 'password']){
                        $error[] = 'password not matched!';
                     }

                    if ($insert) {
                  
         echo "<script>";
         echo "var left = (screen.width / 2) - (400 / 2);";
         echo "var top = (screen.height / 2) - (200 / 2);";
         echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
         echo "popup.document.write('<h1>Success!</h1><p>User has been accepted redirecting to Pending User Page .</p>');";
         echo "setTimeout(function() {";
         echo "window.location.replace('ViewPending.php');";
         echo "popup.close();";
         echo "}, 3000);";
         echo "</script>";

     
                    } else {
                        echo "<script>alert('Failed to add user')</script>";
                        echo "<script>location.replace('ViewPending.php')</script>";
                    }
                } else {
              

                    echo "<script>";
                    echo "var left = (screen.width / 2) - (400 / 2);";
                    echo "var top = (screen.height / 2) - (200 / 2);";
                    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
                    echo "popup.document.write('<h1>Failed!</h1><p>Password must be at least 6 characters long.</p>');";
                    echo "setTimeout(function() {";
                    echo "window.location.replace('ViewPending.php');";
                    echo "popup.close();";
                    echo "}, 3000);";
                    echo "</script>";
                }
            }


?>
