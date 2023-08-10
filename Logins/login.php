

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="estyle.css">

</head>
<body>
   
<div class="form-container" style="background-color: wheat;">

   <form method="post" action="login_action.php" style="border: solid;">
   <img src="Ebook.png" style="width:460px;height:300px;">
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="email" required placeholder="Enter your Email:">
      <input type="password" name="password" required placeholder="Enter your Password:">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register.php">Register now</a></p>
   </form>

</div>

</body>
</html>