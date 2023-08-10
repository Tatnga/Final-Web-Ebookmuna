<?php
   include("../config.php");
   include("../firebaseRDB.php");
   $db = new firebaseRDB($databaseURL);

if(isset($_GET['id'])){
   $id = urldecode($_GET['id']);
   $data = $db->retrieve("users/$id");
   $data = json_decode($data, true);
}
?>
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
<form action="action_edit_user.php" method="post" enctype="multipart/form-data" style="border: solid;">
      <img src="Ebook.png" width="150px">
      <h3 style="color:white;">ADD NEW BOOKS</h3>
      <?php
        if(isset($error)){
          foreach($error as $error){
             echo '<span class="error-msg">'.$error.'</span>';
          };
       };
       ?>
     
     
     <p style="text-align:left;font-weight:bold;">ID Number</p> 
      <input type="number" name="useridno" required placeholder="Enter your ID Number :"  value="<?php echo $data['useridno']; ?>">

      <p style="text-align:left;font-weight:bold;">Name</p>
      <input type="text" name="name" required placeholder="Enter your Name :"  value="<?php echo $data['name']; ?>">

      <p style="text-align:left;font-weight:bold;">Contact</p>
      <input type="text" name="contact" required placeholder="Enter your Contact Number :"  value="<?php echo $data['contact']; ?>">

      <p style="text-align:left;font-weight:bold;">Email</p>
      <input type="email" name="email" required placeholder="Enter your Email :"  value="<?php echo $data['email']; ?>">

      <p style="text-align:left;font-weight:bold;">Address</p>
      <input type="address" name="address" required placeholder="Enter your Address :" value="<?php echo $data['address']; ?>">
      <p style="text-align:left;font-weight:bold;">YEAR</p>
      <select name="useryear">
         <option value="1" <?php if($data['useryear'] == "1") echo "selected" ?>>FIRST YEAR</option>  
         <option value="2" <?php if($data['useryear'] == "2") echo "selected" ?>>SECOND YEAR</option>
         <option value="3" <?php if($data['useryear'] == "3") echo "selected" ?>>THIRD YEAR</option>
         <option value="4" <?php if($data['useryear'] == "4") echo "selected" ?>>FOURTH YEAR</option>
         <option value="5" <?php if($data['useryear'] == "5") echo "selected" ?>>IRREGULAR</option>
      </select>
      <p style="text-align:left;font-weight:bold;">STUDENT COURSE</p>
      <select name="usercourse">
      <option value="bsit" <?php if($data['bookcourse'] == "bsit") echo "selected" ?>>BSIT</option>  
           <option value="beed"  <?php if($data['bookcourse'] == "beed") echo "selected" ?> >BEEd</option>  
           <option value="bsed"  <?php if($data['bookcourse'] == "bsed") echo "selected" ?> >BSEd</option>
           <option value="bsa"  <?php if($data['bookcourse'] == "bsa") echo "selected" ?>>BSA</option>
           <option value="bsba"  <?php if($data['bookcourse'] == "bsba") echo "selected" ?>>BSBA</option>
           <option value="bscpe" <?php if($data['bookcourse'] == "bscpe") echo "selected" ?>>BSCpE</option>
           <option value="bsee"  <?php if($data['bookcourse'] == "bsee") echo "selected" ?>>BSEE</option>
           <option value="bsece"  <?php if($data['bookcourse'] == "bsece") echo "selected" ?>>BSECE</option>
           <option value="bsie"  <?php if($data['bookcourse'] == "bsie ") echo "selected" ?>>BSIE</option>
           <option value="bsme"  <?php if($data['bookcourse'] == "bsme") echo "selected" ?>>BSME</option>
           <option value="bscrim"  <?php if($data['bookcourse'] == "bscrim") echo "selected" ?>>BS Crim</option>
           <option value="bsca"  <?php if($data['bookcourse'] == "bsca") echo "selected" ?>>BSCA</option>
           <option value="bscs"  <?php if($data['bookcourse'] == "bscs") echo "selected" ?>>BSCS</option>
           <option value="bshm"  <?php if($data['bookcourse'] == "bshm") echo "selected" ?>>BSHM</option>
           <option value="bstm"  <?php if($data['bookcourse'] == "bstm") echo "selected" ?>>BSTM</option>
                <option value="bstmarengg"  <?php if($data['bookcourse'] == "bstmarengg") echo "selected" ?>>BS Mar Engg</option>
           <option value="act" <?php if($data['bookcourse'] == "act") echo "selected" ?>>ACT</option>
           <option value="basiceducation" <?php if($data['bookcourse'] == "basiceducation") echo "selected" ?>>BASIC EDUCATION</option>
    



      
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
      <input type="hidden" name="id" value="<?php echo $id?>">
              <input type="submit" name="submit" value="SAVE" class="form-btn" >
        <a href="Home.php" style="font-size:20px;font-weight:bold;">Go Back</a>
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
textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
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