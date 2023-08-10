


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
      <input type="text" id="name" name="name" required pattern="[A-Za-z .]+" title="Letters, spaces, and dots only" placeholder="Enter your name">

<script>
const nameInput = document.getElementById('name');

nameInput.addEventListener('input', function(event) {
  const input = event.target.value;
  const regex = /^[A-Za-z .]+$/; // regular expression to match only letters, spaces, and dots

  if (!regex.test(input)) {
    event.preventDefault(); // prevent the input from being entered
    nameInput.setCustomValidity('Please enter only letters, spaces, and dots'); // set a custom validation message
  } else {
    nameInput.setCustomValidity(''); // clear any validation message
  }
});
</script>


      <p style="text-align:left;font-weight:bold;">Contact</p>
      <input type="number" name="contact" required placeholder="Enter your Contact Number :">

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
include("config.php");
include("firebaseRDB.php");
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
      <input type="submit" name="submit" value="Register Now" class="form-btn" >
      <p>Already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>