  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Dashboard</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

	<!--link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
</head>
<body>
	<div class="side-bar">
		<div>
			<center>
			<img src="Ebook.png" width="150px">
			</center>
		</div>	
		<ul>
			
			<li>
				<a href="Home.php" class="active">
				<i class="fa-solid fa-house"></i>
				<span class="links_name">&nbsp;Home Page</span>
				</a>
			</li>
		
			<li>
				<a href="ViewBooks.php" class="active">
				<i class="fa-solid fa-book"></i>
				<span class="links_name">&nbsp;View Books</span>
				</a>
			</li>
		
			<li>
				<a href="ViewBorrowBOok.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;View Borrow Book</span>
				</a>
			</li>
			
		
			<li>
				<a href="ViewNotification.php" class="active">
				<i class="fa-solid fa-message"></i>
				<span class="links_name">&nbsp;View Notification</span>
				</a>
			</li>
		
			<li>
				<a href="History.php" class="active">
				<i class="fa fa-history" aria-hidden="true"></i>
				<span class="links_name">&nbsp;View History</span>
				</a>
			</li>
      <li>
				<a href="ViewReview.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;View Review</span>
				</a>
			</li>
			<li>
				<a href="viewimport.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;Import Csv File</span>
				</a>
			</li>
			<li>
				<a href="viewyear.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;View Year Report</span>
				</a>
			</li>

			<li style="margin-top: 75px;">
				<a href="../login.php" class="active"> 
				<i class="fa-solid fa-right-from-bracket"></i>
				<span class="links_name">&nbsp;Log out</span>
				</a>
			</li>
			
		</ul>
	</div>

	<div class="container">
		<div class="header" style="width:78.8vw; z-index: 999999;">
			<div class="nav">
				<div class="search">
					<input type="text" placeholder="Search.." style="width:35.3vw;margin-left:5px;padding:15px;">
					<button type="submit" onclick="searchTable()" style="position:absolute;z-index:1;right:55%;background-color: wheat;"><i class="fas fa-search"></i></button>
				</div>
			</div>
			<div class="user">
				<a href="#" class="btn">Home Page</a>
					&nbsp;	&nbsp; &nbsp;	&nbsp;
			</div>
			<div class="user">
				<a href="addbook.php" class="btn">Add New Books</a>
					&nbsp;	&nbsp; &nbsp;	&nbsp;
			</div>
		</div>
		<br>
		<div class="Title" style="position: static;"> 
		<h1 style="margin-top:65px;text-align:center;color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">Welcome to EbookMoNa</h1>
		</div>
	
		
		<div class="add" style="position:static;">
		<!--div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
		    <div class="card border-left-primary shadow h-100 py-2">
		        <div class="card-body">
		            <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Super Admin</div>
		                    <div class="h5 mb-0 font-weight-bold text-gray-800">
		                        <!-?php
		                        require '../config.php';
		                        $query = "SELECT user_type FROM user_form WHERE user_type= 'admin'";  
		                        $query_run = mysqli_query($conn, $query);
		                        $row = mysqli_num_rows($query_run);
		                        echo '<h4>'.$row.'</h4>';
		                        ?>
		                    </div>
		                </div>
		                <div class="col-auto">
		                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
		    <div class="card border-left-primary shadow h-100 py-2">
		        <div class="card-body">
		            <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Librarian</div>
		                    <div class="h5 mb-0 font-weight-bold text-gray-800">
		                        <!?php
		                        require '../config.php';
		                        $query = "SELECT user_type FROM user_form WHERE user_type= 'trade'";  
		                        $query_run = mysqli_query($conn, $query);
		                        $row = mysqli_num_rows($query_run);
		                        echo '<h4>'.$row.'</h4>';
		                        ?>
		                    </div>
		                </div>
		                <div class="col-auto">
		                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
		                </div>
		            </div>
		        </div>
		    </div>
		</div> 
		</div-->
		</div>


		<!--div class="wrapper" style="position: static;"> 
		<h2 style="font-weight:bold;font-size:35px;">Library</h2>
		<div class="boxcontainer" style="position: static;">
		    <div class="box">
		    	<i class="fas fa-user-nurse"style="font-size: 35px;"></i>
		    	<h3>Nursing</h3>
		    		<p>This is the College of Nursing Books</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>
		    <div class="box">
		    	<i class="fa fa-desktop" aria-hidden="true"style="font-size: 35px;"></i>
		    	<h3>Computer Study</h3>
		    		<p>This is the College of Computer Studies Books</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>

		    <div class="box">
		    	<i class="fa-solid fa-handcuffs"style="font-size: 35px;"></i>
		    	<h3>Criminology</h3>
		    		<p>This is the College of Criminology Books</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>

		    <div class="box">
		    	<i class="fa-solid fa-anchor"style="font-size: 35px;"></i>
		    	<h3>Marine</h3>
		    		<p>This is the College of Marine Books</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>

		    <div class="box">
		    	<i class="fa-solid fa-user-graduate"style="font-size: 35px;"></i>
		    	<h3>Basic Education</h3>
		    		<p>This is the College of Education</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>

		    <div class="box">
		    	<i class='fas fa-drafting-compass'style="font-size: 35px;"></i>
		    	<h3>Engineering</h3>
		    		<p>This is the College of Engineering</p>
		    		<a href="ViewBooks.php" class="btn1">Show Books</a>
		    </div>

	      </div>
		
	</div>



	</div-->
	<div class="wrapper" style="position: static;"> 
		<br>
		<br>
		<h2 style="font-weight:bold;font-size:35px;">Year Report</h2>
    <br>
    <button onclick="generatePDF()">Generate PDF</button>
<br>
<br>
<div id="myDiv">
<h2 style="font-weight:bold;font-size:30px;">Books Borrowed per Month</h2>
<div class="boxcontainer" style="position: static;">
  <?php
   include("../config.php");
   include("../firebaseRDB.php");
   $db = new firebaseRDB($databaseURL);
  // Define months and days in the month
  $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
  $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

  // Retrieve data from the database
    $data = $db->retrieve("borrowbook");
    $data = json_decode($data, true);

  // Prepare data for the line charts
  $charts_data = array();
  foreach ($months as $i => $month) {
    $chart_data = array();
    for ($day = 1; $day <= $days_in_month[$i]; $day++) {
      $chart_data[$day] = 0;
    }
    $charts_data[$month] = $chart_data;
  }

  // Populate the data
  foreach ($data as $id => $book) {
    if (!isset($book['date']) || !isset($book['bookname'])) {
      continue;
    }
    $date_parts = explode('-', $book['date']);
    $month = intval($date_parts[1]);
    $day = intval($date_parts[2]);
    $bookname = $book['bookname'];
    if (isset($charts_data[$months[$month - 1]][$day])) {
      $charts_data[$months[$month - 1]][$day]++;
    }
  }
  ?>

  <?php foreach ($months as $i => $month) { ?>
    <div class="box">
      <div class="add" style="position:static;">
        <div class="row">
          <center>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart_<?php echo $i; ?>);

              function drawChart_<?php echo $i; ?>() {
                var data = google.visualization.arrayToDataTable([
                  ['Day', 'Number of Books'],
                  <?php
                  $chart_data = $charts_data[$month];
                  for ($day = 1; $day <= $days_in_month[$i]; $day++) {
                    echo "['$day', {$chart_data[$day]}],";
                  }
                  ?>
                ]);

                var options = {
                  title: 'Books Borrowed by Day in <?php echo $month; ?>',
                  curveType: 'function',
                  legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div_<?php echo $i; ?>'));
                chart.draw(data, options);
              }
            </script>
            <div id="chart_div_<?php echo $i; ?>" class="chart"></div>
          </center>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<br>

<br>
<h2 style="font-weight:bold;font-size:30px;"> Books Added per Month</h2>
<div class="boxcontainer" style="position: static;">
  <?php

  // Define months and days in the month
  $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
  $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

  // Retrieve data from the database
  $data = $db->retrieve("book");
  $data = json_decode($data, true);

  // Prepare data for the line charts
  $charts_data = array();
  foreach ($months as $i => $month) {
    $chart_data = array();
    for ($day = 1; $day <= $days_in_month[$i]; $day++) {
      $chart_data[$day] = 0;
    }
    $charts_data[$month] = $chart_data;
  }

  // Populate the data
  foreach ($data as $id => $book) {
    if (!isset($book['date']) || !isset($book['bookname'])) {
      continue;
    }
    $date_parts = explode('-', $book['date']);
    $month = intval($date_parts[1]);
    $day = intval($date_parts[2]);
    $bookname = $book['bookname'];
    if (isset($charts_data[$months[$month - 1]][$day])) {
      $charts_data[$months[$month - 1]][$day]++;
    }
  }
  ?>

  <?php foreach ($months as $i => $month) { ?>
    <div class="box">
      <div class="add" style="position:static;">
        <div class="row">
          <center>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart_<?php echo $i; ?>);

              function drawChart_<?php echo $i; ?>() {
                var data = google.visualization.arrayToDataTable([
                  ['Day', 'Number of Books'],
                  <?php
                  $chart_data = $charts_data[$month];
                  for ($day = 1; $day <= $days_in_month[$i]; $day++) {
                    echo "['$day', {$chart_data[$day]}],";
                  }
                  ?>
                ]);

                var options = {
                  title: 'Books Added by Day in <?php echo $month; ?>',
                  curveType: 'function',
                  legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div1_<?php echo $i; ?>'));
                chart.draw(data, options);
              }
            </script>
            <div id="chart_div1_<?php echo $i; ?>" class="chart1"></div>
          </center>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

</div>



  <script>
    function generatePDF() {
      // Get HTML content of div
      const div = document.getElementById("myDiv");
      html2canvas(div).then(function(canvas) {
        // Convert canvas to PDF
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF();
        pdf.addImage(imgData, 'PNG', 0, 0, 210, 297);
        pdf.save('myDiv.pdf');
      });
    }
  </script>
</body>
<style>
.container {
	position: absolute;
	right: 0;
	width: 75.8vw;
	height: 150vh;
	background: white;
}

.wrapper{
	margin: 10px auto;
	padding: 0 10%;
	padding-bottom: 10px;
	text-transform: capitalize;

}

.boxcontainer{
	display: grid;
	gap: 24px;
	grid-template-columns: repeat(auto-fit,minmax(270px, 1fr));
}
.box{
	height: 250px;
	padding: 20px;
	text-align: center;
	border: solid;
	border-radius: 0px;
	background: orange;
	}
.box img{
	height: 70px;
}
.box h3{
	color:black;
	padding: 10px 0;
	font-size: 20px;
}
.box p{
	color: #black;
	font-size: 14px;
	line-height: 1.6;
}
.btn1{
	color: #fff;
	border: none;
	outline: none;
	font-size: 15px;
	margin-top: 10px;
	padding: 8px 15px;
	background: #333;
	display: inline-block;
	text-decoration: none;
}
.btn1:hover{
	letter-spacing: 1px;
}
.btn1:hover{
	transform: scale(1.03);
}

/*------------------------------------------------------*/

.graph {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  height: 200px;
  width: 100%;
  border: solid;
  padding: 15px;
  z-index: 1;
}

.bar {
  width: 100px;
  height: 100px;
  background-color: orangered;
  transition: height 0.5s ease-in-out;
  border: solid red;
}

@media screen and (max-width: 768px) {
  .graph {
    height: 150px;
  }

  .bar {
    width: 20%;
  }
}

@media screen and (max-width: 480px) {
  .graph {
    height: 100px;
    font-size: 10px;
  }

  .bar {
    width: 15%;
  }
}

</style>
</html>