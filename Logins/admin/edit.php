<?php
include("../config.php");
include("../firebaseRDB.php");
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require_once 'phpmailer/src/Exception.php';
   require_once 'phpmailer/src/PHPMailer.php';
   require_once 'phpmailer/src/SMTP.php';
$db = new firebaseRDB($databaseURL);

if(isset($_GET['id'])){
   $id = urldecode($_GET['id']);
}
$update_book = $db->update("users", $id, [
  "status" => "accepted",
]);

$data1 = $db->retrieve("users/$id");
      $data1 = json_decode($data1, true);
      $email = $data1['email'];

     
          try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alfoncabonilla@gmail.com';//your gmail
            $mail->Password = 'v y l j u k u x f o o n r i n l';// your gmail password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('alfoncabonilla@gmail.com');//your gmail

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "Account Registration Approved";
            $mail->Body = "Your Account Registration is now Approved you can now login with your Account";

            $mail->send();

            $update_book = $db->update("users", $id, [
              "status" => "accepted",
            ]);
        
        
   
        
          } 
          catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
          }


echo "<script>";
echo "var left = (screen.width / 2) - (400 / 2);";
echo "var top = (screen.height / 2) - (200 / 2);";
echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
echo "popup.document.write('<h1>Successfull!</h1><p>User Successfully Accepted redirecting to View Pending User Page.</p>');";
echo "setTimeout(function() {";
echo "window.location.replace('ViewPending.php');";
echo "popup.close();";
echo "}, 3000);";
echo "</script>";
?>