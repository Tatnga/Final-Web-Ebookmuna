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

<form action="action_add_book.php" method="post" enctype="multipart/form-data" style="border: solid;">
      <img src="Ebook.png" width="150px">
      <h3 style="color:white;">ADD NEW BOOKS</h3>
      <?php
        if(isset($error)){
          foreach($error as $error){
             echo '<span class="error-msg">'.$error.'</span>';
          };
       };
       ?>
     
     
       <p style="text-align:left;font-weight:bold;">BOOK NAME</p> 
       <input type="text" name="bookname" required placeholder="Enter Book Name :">
 
       <p style="text-align:left;font-weight:bold;">BOOK AUTHOR</p>
       <input type="text" name="bookauthor" required placeholder="Enter Book Author :">
      
       <p style="text-align:left;font-weight:bold;">BOOK YEAR</p>
       <select name="bookyear">
         <option value="1">FIRST YEAR</option>  
         <option value="2">SECOND YEAR</option>
         <option value="3">THIRD YEAR</option>  
         <option value="4">FOURTH YEAR</option>
         <option value="5">IRREGULAR</option>
      </select>
  
      <p style="text-align:left;font-weight:bold;">BOOK COURSE</p>
       <select name="bookcourse">
       <?php

include("../config.php");
include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
  $data = $db->retrieve("course");
  $data = json_decode($data, 1);
$courseid = 0;
  // Generate <option> elements for HTML <select> element
  foreach ($data as $course) {
    if (!empty($course['name1'])) {
      echo "<option value='" . $course['childno'] . "'>" . $course['name1'] . "</option>";

    }
  }
  ?>
</select>


       <p style="text-align:left;font-weight:bold;">DATE PUBLISH</p>
       <input type="date" name="bookdatepublish">
 
       <p style="text-align:left;font-weight:bold;">BOOK CATALOG</p>
       <select name="bookcatalog">
       <option value="fiction">FICTION</option>  
         <option value="nonfiction">NON-FICTION</option>
         <option value="picturebook">PICTURE BOOK</option>  
         <option value="philosophy">PHILOSOPHY</option>
         <option value="poetry">POETRY</option>  
         <option value="prayer">PRAYER</option>
         <option value="politicaltriller">POLITICAL TRILLER</option>  
         <option value="religionspirituality">RELIGION SPIRITUALITY</option>
         <option value="newage">New Age</option>  
         <option value="romance">ROMANCE</option>
         <option value="textbook">TEXTBOOK</option>
      
      </select>
  
       <p style="text-align:left;font-weight:bold;">QUANTITY</p>
       <input type="number" name="bookquantity" required placeholder="Enter Book Quantity :">
 
     
       <p style="text-align:left;font-weight:bold;">BOOK IMAGE</p>
       <input type="file" name="book_image" accept="image/*">
     
        
       <label for="description">Description:</label>
<textarea name="description" id="description" rows="5"></textarea>
  
 
<p style="text-align:left;font-weight:bold;">Number of Days the Book can be Borrowed</p>
       <input type="number" name="totaldays" required placeholder="Enter Book Days can be Borrowed :">
       <input type="hidden" name="courseid" value="<?php echo $courseid?>">
       <input type="submit" name="submit" value="Register Now" class="form-btn" >
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