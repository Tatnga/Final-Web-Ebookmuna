<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add new Book</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="estyle.css">

</head>
<body>
   
<div class="form-container"style="background-color: wheat;">

   <form action="" method="post" style="border: solid;">
      <img src="Ebook.png" width="150px">
      <h3 style="color:white;">ADD NEW BOOKS</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="bookname" required placeholder="Enter Book Name :">
      <input type="text" name="bookauthor" required placeholder="Enter Book Author :">
      <input type="text" name="catalog" required placeholder="Enter Book Catalog genre :">
      <input type="text" name="date" required placeholder="Enter Book Publish Date :">
      <input type="number" name="quantity" required placeholder="Enter Book Quantity :">
      <p style="text-align:left;color:black;font-weight:bold;">Enter Book Image</p>
      <input type="file" name="image" required placeholder="Enter Book Image :">
      <input type="text" name="days" required placeholder="Enter No. of Days Book can be Borrowed :">
      <input type="submit" name="submit" value="SAVE" class="form-btn">
      <a href="v1books.php" style="font-size:20px;font-weight:bold;">Go Back</a>
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