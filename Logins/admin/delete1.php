<?php 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require_once 'phpmailer/src/Exception.php';
   require_once 'phpmailer/src/PHPMailer.php';
   require_once 'phpmailer/src/SMTP.php';
    require_once("../config.php");
    require_once("../firebaseRDB.php");
    $id = $_POST['id'];
    $db = new firebaseRDB($databaseURL);

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

            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];

            $mail->send();

            $delete = $db->delete("users", $id);
         
            echo "<script>";
            echo "var left = (screen.width / 2) - (400 / 2);";
            echo "var top = (screen.height / 2) - (200 / 2);";
            echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
            echo "popup.document.write('<h1>Success!</h1><p>Deleted Successfully.</p>');";
            echo "setTimeout(function() {";
            echo "window.location.replace('ViewUser.php');";
            echo "popup.close();";
            echo "}, 3000);";
            echo "</script>";
          } 
          catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
          }
        
    ?>

</body>

<style>
body{
    background-color: wheat;
}
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.email-form {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  padding: 20px;
  width: 400px;
}

.email-form h2 {
  font-size: 24px;
  margin-bottom: 30px;
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 16px;
  font-weight: 700;
  margin-bottom: 10px;
}

.form-group input,
.form-group textarea {
  border: 1px solid #ddd;
  border-radius: 3px;
  font-size: 16px;
  padding: 5px;
  width: 100%;
}

button[type="submit"] {
  background-color: #4CAF50;
  border: none;
  color: #fff;
  font-size: 16px;
  font-weight: 700;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-top: 20px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

.back-link {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  color: #333;
  display: inline-block;
  font-size: 16px;
  font-weight: 700;
  margin-top: 20px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.2s ease-in-out;
}

.back-link:hover {
  background-color: #ddd;
}
</style>

