 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"/>
	<title>Book Information</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <div class="container-fluid">
  <li class= "logo"> <img src="Ebook.png" style="max-width:30%;height:auto;background-color:#E77A02;"></li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2" style="font-size: 20px; font-weight: ; margin-left: 2rem; aria-current="page" href="v1books.php">Go Back</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
	<div class="container2">
		 <center><h1 style="color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">Book Information</h1></center>
		 <br>
		 <br>
		<!--?php
			if ($result->num_rows > 0) 
			{
				while ($row=$result->fetch_assoc()) 
				{
					?-->
					<div class="row">
						<div class="col-md-5">
						<img src="samplebook.png" style="width: 100%;padding:30px;"/>
						</div>
						<div class="col-md-7">
							<h4 style="color:black;">Book Name: </h4>
							<p class="font"><!--?php echo $row["equipmentname"];?--></p>
							<h4 class="card-text">Book Author: </h4>
							<p class="font"><!--?php echo $row['description']; ?--></p>
							<h4 style="color:black;">Book Catalog Genre:  </h4> 
							<p class="font"><!--?php echo $row["price"];?--></p>
							<h4 style="color:black;">Book Publish Date: </h4>
							<p class="font"><!--?php echo $row["specs"];?--></p>
							<h4 style="color:black;">Book Quantity: </h4>
							<p class="font"><!--?php echo $row["specs"];?--></p>
							<h4 style="color:black;">Number of Days can be Borrowed: </h4>
							<p class="font"><!--?php echo $row["specs"];?--></p>

				<br>
				<br>
				<br>
              <button type="button" name="button" class="btn btn-info" style="width: 80px; height: 40px;"><a href="editbook.php"><i class="fas fa-edit" style="font-weight:bold;color:lightgreen;">EDIT</i></a></button>

              <?php 
               if(isset($_GET['delete'])){
							    $id = $_GET['delete'];
							    mysqli_query($conn, "DELETE FROM karte_upload WHERE id = $id");
							    header('location:bookinfo.php');
							 };
              ?>

              <button type="button" class="btn btn-danger btn-sm" style="width: 80px; height: 40px;">DELETE<i class="fa fa-trash" aria-hidden="true"><a href="KarteUpload.php?delete=<?php echo $row['id']; ?>"</i></a></button>

					</div>
				</div>
					<!--?php
				}
			}
	?-->
</body> 
<style>
	<style>
 .container2 h1 {
 	font-size: 55px;
 	font-family: myFont;
 	font-weight: bold;
  }
  @font-face {
  	font-family: myFont;
  	src: url(font.otf);
  }
   @font-face {
    font-family: myFont2;
    src: url(c.ttf);
  }
   @font-face {
    font-family: myFont3;
    src: url(d.ttf);
  }
 .container2 h4 {
 	font-weight: normal;
 	font-size: 35px;
 	font-family: impact;
 }
 .font {
 	font-family: san serif;
 	font-weight: normal;
 	font-size: 25px;
 }
 .container2  img {
 	border: solid; 
 	margin: 10px;
    background-color: lightblue;
 }
 .container2 h6 { 
  margin: 45px;
  font-size: 30px;
  text-align: center;
  font-family: impact;
 }
</style>
</html>