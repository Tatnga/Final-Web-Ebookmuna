<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Email</title>
</head>
<body>
    <div class="container">
  <form class="email-form" action="sendEmail.php" method="post">
    <center><img src="Ebook.png" width="180px"></center>
    <h2>Message</h2>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="">
    </div>
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" value="">
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea id="message" name="message"></textarea>
    </div>
    <button type="submit" name="send">Send</button>
    <a class="back-link" href="ViewBorrowBook.php">Go Back</a>
  </form>
</div>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alfoncabonilla@gmail.com';//your gmail
        $mail->Password = 'v y l j u k u x f o o n r i n l';// your gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('alfoncabonilla@gmail.com');//your gmail

        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);

        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();

        echo
        "
         <script>
         alert('Sent Successfully');
         document.location.href = 'ViewBorrowBook.php';
         </script>
        ";
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

</html>