<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="estyle.css">

</head>

<body>
   
<div class="form-container"style="background-color: wheat;">
<script>
    function validateForm() {
        var fileInput = document.getElementById('profile_image');
        if (fileInput.value === '') {
            alert('Please select an image');
            return false;
        }
        return true;
    }
</script>
   <form action="action_add_user.php" method="POST" enctype="multipart/form-data" style="border: solid;">
      <h3 style="color:white;">ACCOUNT REGISTRATION</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
    
    
      <p style="text-align:left;font-weight:bold;">ID Number</p> 
      <input type="number" name="useridno" required placeholder="Enter your ID Number :">

      <p style="text-align:left;font-weight:bold;">Name</p>
      <input type="text" name="name" required placeholder="Enter your Name :">

      <p style="text-align:left;font-weight:bold;">Contact</p>
      <input type="text" name="contact" required placeholder="Enter your Contact Number :">

      <p style="text-align:left;font-weight:bold;">Email</p>
      <input type="email" name="email" required placeholder="Enter your Email :">

      <p style="text-align:left;font-weight:bold;">Address</p>
      <input type="address" name="address" required placeholder="Enter your Address :">
      <p style="text-align:left;font-weight:bold;">YEAR</p>
      <select name="useryear">
         <option value="1">FIRST YEAR</option>  
         <option value="2">SECOND YEAR</option>
         <option value="3">THIRD YEAR</option>
         <option value="4">FOURTH YEAR</option>
         <option value="5">IRREGULAR</option>
      </select>
      <p style="text-align:left;font-weight:bold;">STUDENT COURSE</p>
      <select name="usercourse" id="usercourse">
      <?php
    include("../config.php");
    include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$data = $db->retrieve("course");
$data = json_decode($data, 1);

// Generate <option> elements for HTML <select> element
foreach ($data as $course) {
  if (!empty($course['name1'])) {
    echo "<option value='" . $course['name1'] . "'>" . $course['name1'] . "</option>";
  }
}
?>



      </select>

      <p style="text-align:left;font-weight:bold;">Password</p>
      <input type="password" name="password" required placeholder="Enter your Password :">

      <p style="text-align:left;font-weight:bold;">Confirm Password</p>
      <input type="password" name="cpassword" required placeholder="Confirm your Password :">
   
      <select name="user_type">
         <option value="librarian">User for Librarian</option>  
         <option value="admin">User for Admin</option>
         <option value="borrower">User for Borrower</option>
      </select>
      <input type="submit" name="submit" value="Register User" class="form-btn" >

   </form>

</div>

</body>
<style>
   @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
}

.container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 60px;
}
 
.container .content {
  text-align: center;
}

.container .content h3 {
  font-size: 30px;
  color: #333;
}

.container .content h3 span {
  background: crimson;
  color: #fff;
  border-radius: 5px;
  padding: 0 15px;
}

.container .content h1 {
  font-size: 50px;
  color: #333;
}

.container .content h1 span {
  color: crimson;
}

.container .content p {
  font-size: 25px;
  margin-bottom: 20px;
}

.container .content .btn {
  display: inline-block;
  padding: 10px 30px;
  font-size: 20px;
  background: #333;
  color: #fff;
  margin: 0 5px;
  text-transform: capitalize;
}

.container .content .btn:hover {
  background: crimson;
}

.form-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 60px;
  background: #eee;
  background-image: url("img/logo.png");
}

.form-container form {
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  background-color: #E77A02;
  text-align: center;
  width: 500px;
}

.form-container form h3 {
  font-size: 30px;
  text-transform: uppercase;
  margin-bottom: 10px;
  color: #333;
}

.form-container form input,
.form-container form select {
  width: 100%;
  padding: 10px 15px;
  font-size: 17px;
  margin: 8px 0;
  background: #eee;
  border-radius: 5px;
}

.form-container form select option {
  background: #fff;
}

.form-container form .form-btn {
  background: #271d1f;
  color: rgb(255, 255, 255);
  text-transform: capitalize;
  font-size: 20px;
  cursor: pointer;
}

.form-container form .form-btn:hover {
  background: rgb(15, 13, 14);
  color: #fff;
}

.form-container form p {
  margin-top: 10px;
  font-size: 20px;
  color: #333;
}

.form-container form p a {
  color: rgb(252, 233, 63);
}

.form-container form .error-msg {
  margin: 10px 0;
  display: block;
  background: crimson;
  color: #fff;
  border-radius: 5px;
  font-size: 20px;
  padding: 10px;
}

</style>
</html>