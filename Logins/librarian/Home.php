  
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
				<span class="links_name">&nbsp;Import CSV File</span>
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
		<h2 style="font-weight:bold;font-size:35px;">Librarian Dashboard</h2>
    <br>
    <button onclick="generatePDF()">Generate PDF</button>
<br>
<br>
<div id="myDiv">

<br>
<div class="box1">
<div class="box2" style="display:none;">
	<center>
		<img src="Ebook.png" width="150px">
	</center>
  </div>



<h2 id="adminDashboard" style="font-weight:bold;font-size:35px;  display:none;">Librarian Report</h2>
<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          <?php
  include("../config.php");
  include("../firebaseRDB.php");
  $db = new firebaseRDB($databaseURL);

  $data = $db->retrieve("book");
  $data = json_decode($data, true);
  $pieData = [];
  $courses = [];
  $totalQuantity = 0;

  // Get total quantity and count of each category
  if (is_array($data)) {
  foreach($data as $id => $book){
    if (isset($book['bookcatalog'])) {
        $course =  $book['bookcatalog'];
        $quantity = $book['bookquantity'];
        $totalQuantity += $quantity;
        if (!isset($pieData[$course])) {
            $courses[] = $course;
            $pieData[$course] = $quantity;
        } else {
            $pieData[$course] += $quantity;
        }
    }
  }
}

  // Sort categories by quantity
  arsort($pieData);

  // Get top categories that make up at least 1% of the total quantity
  $otherQuantity = 0;
  $otherCategories = [];
  $pieChartData = [['Course', 'Total Book Quantity']];
  foreach($pieData as $course => $quantity) {
    $percent = ($quantity / $totalQuantity) * 100;
    if ($percent >= 1) {
        $pieChartData[] = [$course . ' ' . $quantity . ' (' . round($percent) . '%)', $percent];
    } else {
        $otherQuantity += $quantity;
        $otherCategories[] = $course;
    }
  }
  // Add empty data to fill up the rest of the pie chart
  while (count($pieChartData) < 10) {
    $pieChartData[] = ['', 0];
  }


  ?>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawPieChart);

            function drawPieChart() {
              var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

              var options = {
                title: 'Books in every Course: <?php echo array_sum($pieData); ?> (<?php echo round(($totalQuantity / array_sum($pieData)) * 100); ?>% of Total)',
              };

              var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div3'));
              chart.draw(data, options);
            }
          </script>


          <div id="pie_chart_div3" class="chart3" ></div>
        </center>
      </div>
    </div>  
</div>




<div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <?php


  $data = $db->retrieve("book");
  $data = json_decode($data, true);
  $pieData = [];
  $courses = [];
  $totalQuantity = 0;

  // Get total quantity and count of each category
    foreach($data as $id => $book){
    if (isset($book['bookcourse'])) {
        $course =  $book['bookcourse'];
        $quantity = $book['bookquantity'];
        $totalQuantity += $quantity;
        if (!isset($pieData[$course])) {
            $courses[] = $course;
            $pieData[$course] = $quantity;
        } else {
            $pieData[$course] += $quantity;
        }
    }
  }

  // Sort categories by quantity
  arsort($pieData);

  // Get top categories that make up at least 1% of the total quantity
  $otherQuantity = 0;
  $otherCategories = [];
  $pieChartData = [['Course', 'Total Book Quantity']];
  foreach($pieData as $course => $quantity) {
    $percent = ($quantity / $totalQuantity) * 100;
    if ($percent >= 1) {
        $pieChartData[] = [$course . ' ' . $quantity . ' (' . round($percent) . '%)', $percent];
    } else {
        $otherQuantity += $quantity;
        $otherCategories[] = $course;
    }
  }
  // Add empty data to fill up the rest of the pie chart
  while (count($pieChartData) < 10) {
    $pieChartData[] = ['', 0];
  }


  ?>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawPieChart);

            function drawPieChart() {
              var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

              var options = {
                title: 'Total Books by Course: <?php echo array_sum($pieData); ?> (<?php echo round(($totalQuantity / array_sum($pieData)) * 100); ?>% of Total)',
              };

              var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div4'));
              chart.draw(data, options);
            }
          </script>
          <div id="pie_chart_div4" class="chart4" ></div>
        </center>
      </div>
    </div>  
  </div>
</div>
<br>
<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <?php
            $data = $db->retrieve("book");
            $data = json_decode($data, true);

            // Prepare data for the pie chart
            $pieData = [];
            $courses = [];
            foreach($data as $id => $book){
              if (isset($book['bookcourse'])) {
                $course = $book['bookcourse'];
                if (!in_array($course, $courses)) {
                  $courses[] = $course;
                  $pieData[$course] = 1;
                } else {
                  $pieData[$course]++;
                }
              }
            }

            // Convert data to array format expected by the chart
            $pieChartData = [['Course', 'No. Books Borrowed']];
            foreach($courses as $course) {
              $quantity = $pieData[$course];
              $percent = ($quantity / array_sum($pieData)) * 100;
              $pieChartData[] = [$course . ' ' . $quantity . ' (' . round($percent) . '%)', $quantity];
            }
          ?>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawPieChart);

            function drawPieChart() {
              var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

              var options = {
                title: 'Books by Courses: <?php echo array_sum($pieData); ?>',
                pieSliceText: 'label'
              };

              var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div6'));
              chart.draw(data, options);
            }
          </script>

          <div id="pie_chart_div6" class="chart6"></div>
        </center>
      </div>
    </div>  
  </div>

  <div class="box">
  <div class="add" style="position:static;">
    <div class="row">
      <center>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <?php
          $data = $db->retrieve("book");
          $data = json_decode($data, true);
      // Prepare data for the pie chart
      $pieData = [];
      $catalogs = [];
      foreach($data as $id => $book){
        if (isset($book['bookcatalog'])) {
          $catalog =  $book['bookcatalog'];
          if (!in_array($catalog, $catalogs)) {
            $catalogs[] = $catalog;
            $pieData[$catalog] = 1;
          } else {
            $pieData[$catalog]++;
          }
        }
      }

      // Convert data to array format expected by the chart
      $pieChartData = [['Catalog', 'No. Books Borrowed']];
      foreach($catalogs as $catalog) {
        $percent = ($pieData[$catalog] / array_sum($pieData)) * 100;
        $pieChartData[] = [$catalog . ' ' . $pieData[$catalog] . ' (' . round($percent) . '%)', $pieData[$catalog]];
      }
    ?>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart() {
        var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

        var options = {
          title: 'Books by Catalog: <?php echo array_sum($pieData); ?>',
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div5'));
        chart.draw(data, options);
      }
    </script>
    <div id="pie_chart_div5" class="chart5" ></div>
  </center>

      </div>
    </div>  
  </div>
</div>
	

<br>
<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <?php


$data = $db->retrieve("borrowbook");
$data = json_decode($data, true);

// Prepare data for the pie chart
$pieData = [];
$courses = [];
foreach($data as $id => $book){
    if (isset($book['borrowername'])) {

	
        $course =  $book['borrowername'];
        if (!in_array($course, $courses)) {
            $courses[] = $course;
            $pieData[$course] = 1;
        } else {
            $pieData[$course]++;
        }
    }
}

// Convert data to array format expected by the chart
$pieChartData = [['Course', 'No. Books Borrowed']];
foreach($courses as $course) {
    $pieChartData[] = [$course, $pieData[$course]];
}
?>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawPieChart);

            function drawPieChart() {
              var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

              var options = {
                title: 'Borrow Book per Borrower:  <?php echo array_sum($pieData); ?>',
              };
              var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
              chart.draw(data, options);
            }
          </script>


          <div id="pie_chart_div" class="chart" ></div>
        </center>
      </div>
    </div>  
  
</div>



<div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <?php


$data = $db->retrieve("borrowbook");
$data = json_decode($data, true);

// Prepare data for the pie chart
$pieData = [];
$courses = [];
foreach($data as $id => $book){
    if (isset($book['bookname'])) {

	
        $course =  $book['bookname'];
        if (!in_array($course, $courses)) {
            $courses[] = $course;
            $pieData[$course] = 1;
        } else {
            $pieData[$course]++;
        }
    }
}

// Convert data to array format expected by the chart
$pieChartData = [['Course', 'No. Books Borrowed']];
foreach($courses as $course) {
    $pieChartData[] = [$course, $pieData[$course]];
}
?>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawPieChart);

            function drawPieChart() {
              var data = new google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);

              var options = {
                title: 'Borrowed Book per Title:  <?php echo array_sum($pieData); ?>',
              };

              var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div1'));
              chart.draw(data, options);
            }
          </script>
          <div id="pie_chart_div1" class="chart11" ></div>
        </center>
      </div>
    </div>  
  </div>
</div>


<br>
<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
$data = $db->retrieve("borrowbook");
$data = json_decode($data, true);

// Prepare data for the column chart
$bookData = [];
$books = array();
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

if(is_array($data)){
  foreach ($data as $id => $book) {
      if (!isset($book['date']) || !isset($book['bookname'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      $bookcourse = $book['bookname'];
      if (!in_array($bookcourse, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookcourse;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookcourse] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookcourse])) { // check if month index is valid
          $bookData[$bookcourse][intval($month) - 1]++; // increment count for this month
      }
  }
}
?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Retrieve data from PHP
        var data = <?php echo json_encode($bookData); ?>;

        // Create the data table
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Month');
        <?php foreach ($books as $bookname) { ?>
            dataTable.addColumn('number', '<?php echo $bookname; ?>');
        <?php } ?>
        dataTable.addRows([
            <?php foreach ($months as $i => $month) { ?>
                ['<?php echo $month; ?>',
                <?php foreach ($books as $bookname) { ?>
                    <?php echo $bookData[$bookname][$i]; ?>,
                <?php } ?>
                ],
            <?php } ?>
        ]);

        // Set chart options
        var options = {
            title: 'Books Borrowed by Title',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div17'));
        chart.draw(dataTable, options);
    }
  </script>
  <div id="chart_div17" class="chart18"></div>
        </center>
      </div>
    </div>
  </div>
</div>

<br>

<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
$data = $db->retrieve("borrowbook");
$data = json_decode($data, true);

// Prepare data for the column chart
$bookData = [];
$books = array();
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

if(is_array($data)){
  foreach ($data as $id => $book) {
      if (!isset($book['date']) || !isset($book['bookid'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      $data1 = $db->retrieve("book/{$book['bookid']}");
      $data1 = json_decode($data1, true);
      $bookcourse = $data1['bookcourse'];
      if (!in_array($bookcourse, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookcourse;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookcourse] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookcourse])) { // check if month index is valid
          $bookData[$bookcourse][intval($month) - 1]++; // increment count for this month
      }
  }
}
?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Retrieve data from PHP
        var data = <?php echo json_encode($bookData); ?>;

        // Create the data table
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Month');
        <?php foreach ($books as $bookname) { ?>
            dataTable.addColumn('number', '<?php echo $bookname; ?>');
        <?php } ?>
        dataTable.addRows([
            <?php foreach ($months as $i => $month) { ?>
                ['<?php echo $month; ?>',
                <?php foreach ($books as $bookname) { ?>
                    <?php echo $bookData[$bookname][$i]; ?>,
                <?php } ?>
                ],
            <?php } ?>
        ]);

        // Set chart options
        var options = {
            title: 'Books Borrowed by Course',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div11'));
        chart.draw(dataTable, options);
    }
  </script>
  <div id="chart_div11" class="chart22"></div>
        </center>
      </div>
    </div>

</div>


  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
$data = $db->retrieve("borrowbook");
$data = json_decode($data, true);

// Prepare data for the column chart
$bookData = [];
$books = array();
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
if (is_array($data)) {
  foreach ($data as $id => $book) {
      if (!isset($book['date']) || !isset($book['bookid'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      $data1 = $db->retrieve("book/{$book['bookid']}");
      $data1 = json_decode($data1, true);
      if (is_array($data1) && isset($data1['bookcatalog'])) {
          $bookcourse = $data1['bookcatalog'];
      } else {
          // handle the case when $data1 is null or not an array, or 'bookcatalog' key doesn't exist
          continue;
      }
      if (!in_array($bookcourse, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookcourse;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookcourse] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookcourse])) { // check if month index is valid
          $bookData[$bookcourse][intval($month) - 1]++; // increment count for this month
      }
  }
}

?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Retrieve data from PHP
        var data = <?php echo json_encode($bookData); ?>;

        // Create the data table
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Month');
        <?php foreach ($books as $bookname) { ?>
            dataTable.addColumn('number', '<?php echo $bookname; ?>');
        <?php } ?>
        dataTable.addRows([
            <?php foreach ($months as $i => $month) { ?>
                ['<?php echo $month; ?>',
                <?php foreach ($books as $bookname) { ?>
                    <?php echo $bookData[$bookname][$i]; ?>,
                <?php } ?>
                ],
            <?php } ?>
        ]);

        // Set chart options
        var options = {
            title: 'Books Borrowed by Catalog',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div12'));
        chart.draw(dataTable, options);
    }
  </script>



  <div id="chart_div12" class="chart21"></div>
        </center>
      </div>
    </div>
  </div>
</div>
 
<br>

<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
// Retrieve data from the database
$data = $db->retrieve("book");
$data = json_decode($data, true);

// Prepare data for the column chart
$booksData = [];
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
if (is_array($data)) {
  foreach ($data as $book) {
    if (!isset($book['bookcatalog']) || !isset($book['date']) || !isset($book['bookquantity'])) {
      continue; // skip this iteration if any of these values is null
    }
  
    $bookcatalog = $book['bookcatalog'];
    $date = $book['date'];
    $bookquantity = $book['bookquantity'];

    if (!is_null($bookcatalog) && !is_null($date) && !is_null($bookquantity)) {
      $month = date('m', strtotime($date)); // use 'm' to get the month number (01-12)
      $bookName = $bookcatalog;
      $bookQuantity = $bookquantity;

      if (!array_key_exists($bookName, $booksData)) { // add book to list of books if it hasn't been added yet
        $booksData[$bookName] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $booksData[$bookName])) { // check if month index is valid
        $booksData[$bookName][intval($month) - 1] += $bookQuantity; // increment count for this month
      }
    }
  }
}



// Create the data table
$table = array();
$table[0] = ['Month'];
$bookColumns = array_keys($booksData);
foreach ($bookColumns as $bookColumn) {
    $table[0][] = $bookColumn;
}

foreach ($months as $i => $month) {
    $row = [$month];

    foreach ($bookColumns as $bookColumn) {
        $currentQuantity = isset($booksData[$bookColumn][$i]) ? $booksData[$bookColumn][$i] : 0;
        $row[] = $currentQuantity;
    }

    $table[] = $row;
}
?>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create the data table
        var dataTable = google.visualization.arrayToDataTable(<?php echo json_encode($table); ?>);

        // Set chart options
        var options = {
            title: 'Total Books for each Catalog',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
        chart.draw(dataTable, options);
    }
</script>

<div id="chart_div7" class="chart9"></div>
        </center>
      </div>
    </div>
  </div>
  </div>


  
<br>

<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
// Retrieve data from the database
$data = $db->retrieve("book");
$data = json_decode($data, true);

// Prepare data for the column chart
$booksData = [];
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

if (is_array($data)) {
  foreach ($data as $book) {
      if (!isset($book['bookcourse']) || !isset($book['date']) || !isset($book['bookquantity'])) {
          continue; // skip this iteration if any of these values is null
      }

      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      if (!$month) {
          // handle error if date format is invalid
          continue;
      }

      $bookName = $book['bookcourse'];
      $bookQuantity = $book['bookquantity'];

      if (!$bookName || !$bookQuantity) {
          // handle error if book name or quantity is empty or null
          continue;
      }

      if (!array_key_exists($bookName, $booksData)) { // add book to list of books if it hasn't been added yet
          $booksData[$bookName] = array_fill(0, 12, 0);
      }

      if (array_key_exists(intval($month) - 1, $booksData[$bookName])) { // check if month index is valid
          $booksData[$bookName][intval($month) - 1] += $bookQuantity; // increment count for this month
      }
  }
}


// Create the data table
$table = array();
$table[0] = ['Month'];
$bookColumns = array_keys($booksData);
foreach ($bookColumns as $bookColumn) {
    $table[0][] = $bookColumn;
}

foreach ($months as $i => $month) {
    $row = [$month];

    foreach ($bookColumns as $bookColumn) {
        $currentQuantity = isset($booksData[$bookColumn][$i]) ? $booksData[$bookColumn][$i] : 0;
        $row[] = $currentQuantity;
    }

    $table[] = $row;
}
?>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create the data table
        var dataTable = google.visualization.arrayToDataTable(<?php echo json_encode($table); ?>);

        // Set chart options
        var options = {
            title: 'Total Books for each Course',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(dataTable, options);
    }
</script>

<div id="chart_div" class="chart91"></div>
        </center>
      </div>
    </div>
  </div>




  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
// Retrieve data from the database
$data = $db->retrieve("book");
$data = json_decode($data, true);

// Prepare data for the column chart
$booksData = [];
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
if (is_array($data)) {
  foreach ($data as $book) {
      if (!isset($book['bookname']) || !isset($book['date']) || !isset($book['bookquantity'])) {
          continue; // skip this iteration if any of these values is null
      }

      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      if (!$month) {
          // handle error if date format is invalid
          continue;
      }

      $bookName = $book['bookname'];
      $bookQuantity = $book['bookquantity'];

      if (!$bookName || !$bookQuantity) {
          // handle error if book name or quantity is empty or null
          continue;
      }

      if (!array_key_exists($bookName, $booksData)) { // add book to list of books if it hasn't been added yet
          $booksData[$bookName] = array_fill(0, 12, 0);
      }

      if (array_key_exists(intval($month) - 1, $booksData[$bookName])) { // check if month index is valid
          $booksData[$bookName][intval($month) - 1] += $bookQuantity; // increment count for this month
      }
  }
}


// Create the data table
$table = array();
$table[0] = ['Month'];
$bookColumns = array_keys($booksData);
foreach ($bookColumns as $bookColumn) {
    $table[0][] = $bookColumn;
}

foreach ($months as $i => $month) {
    $row = [$month];

    foreach ($bookColumns as $bookColumn) {
        $currentQuantity = isset($booksData[$bookColumn][$i]) ? $booksData[$bookColumn][$i] : 0;
        $row[] = $currentQuantity;
    }

    $table[] = $row;
}
?>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create the data table
        var dataTable = google.visualization.arrayToDataTable(<?php echo json_encode($table); ?>);

        // Set chart options
        var options = {
            title: 'Total Books for each Book',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
        chart.draw(dataTable, options);
    }
</script>
<div id="chart_div6" class="chart61"></div>

        </center>
      </div>
    </div>
  </div>
</div>

<br>
<div class="box">
    <div class="add" style="position:static;">
        <div class="row">
            <h5>Top Borrowed Books</h5>
            <center>
			<div class="graph">
      <?php
    $borrowbook = $db->retrieve("borrowbook");
    $borrowbook = json_decode($borrowbook, true);

    $courseCounts = array(); // array to hold course name and count
    if (is_array($borrowbook)) {
        foreach ($borrowbook as $id => $book) {
       
            if (!is_array($book) || is_null($book['bookname'])) {
                continue; // skip if nodeName is null
            }
            $bookname = $book['bookname'];
            if (!array_key_exists($bookname, $courseCounts)) { // add course to list of courses if it hasn't been added yet
                $courseCounts[$bookname] = 0;
            }
            $courseCounts[$bookname]++; // increment count for this course
        }
        arsort($courseCounts); // sort array by descending count
        $topCourses = array_slice($courseCounts, 0, 7); // get top 7 courses
        foreach ($topCourses as $course => $count) { // loop through top courses and display as bars
            $percent = $count / count($borrowbook) * 100; // calculate percentage of total books borrowed
            ?>
            <div class="bar" data-value="<?= $percent ?>">
                <span class="course-name"><?= $course ?></span>
                <span class="book-count">(<?= $count ?>)</span>
            </div>
            <?php
        }
    }
    ?>
</div>

                <script>
                    const bars = document.querySelectorAll('.bar');

                    bars.forEach(bar => {
                        const value = bar.dataset.value;
                        bar.style.height = `${value}%`;
                    });
                </script>
            </center>
        </div>
		</div>
    </div>
<br>
<div class="box">
    <div class="add" style="position:static;">
        <div class="row">
            <h5>Top Borrowers</h5>
            <center>
			<div class="graph">
    <?php
    $borrowbook = $db->retrieve("borrowbook");
    $borrowbook = json_decode($borrowbook, true);
	$borrowbook = $db->retrieve("borrowbook");
    $borrowbook = json_decode($borrowbook, true);
    $courseCounts = array(); // array to hold course name and count
    if (is_array($borrowbook)) {
        foreach ($borrowbook as $id => $book) {
       
            if (!is_array($book) || is_null($book['borrowername'])) {
                continue; // skip if nodeName is null
            }
            $bookname = $book['borrowername'];
            if (!array_key_exists($bookname, $courseCounts)) { // add course to list of courses if it hasn't been added yet
                $courseCounts[$bookname] = 0;
            }
            $courseCounts[$bookname]++; // increment count for this course
        }
        arsort($courseCounts); // sort array by descending count
        $topCourses = array_slice($courseCounts, 0, 7); // get top 7 courses
        foreach ($topCourses as $course => $count) { // loop through top courses and display as bars
            $percent = $count / count($borrowbook) * 100; // calculate percentage of total books borrowed
            ?>
            <div class="bar" data-value="<?= $percent ?>">
                <span class="course-name"><?= $course ?></span>
                <span class="book-count">(<?= $count ?>)</span>
            </div>
            <?php
        }
    }
    ?>
</div>

                <script>
                    const bars1 = document.querySelectorAll('.bar');

                    bars1.forEach(bar => {
                        const value = bar.dataset.value;
                        bar.style.height = `${value}%`;
                    });
                </script>
            </center>
        </div>
    </div>
</div>

<br>
<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
$data = $db->retrieve("review");
$data = json_decode($data, true);

// Prepare data for the column chart
$bookData = [];
$books = array();
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

if(is_array($data)){
  foreach ($data as $id => $book) {
      if (!isset($book['date']) || !isset($book['bookid'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      $data1 = $db->retrieve("book/{$book['bookid']}");
      $data1 = json_decode($data1, true);
      $bookcourse = $data1['bookcourse'];
      if (!in_array($bookcourse, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookcourse;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookcourse] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookcourse])) { // check if month index is valid
          $bookData[$bookcourse][intval($month) - 1]++; // increment count for this month
      }
  }
}
?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Retrieve data from PHP
        var data = <?php echo json_encode($bookData); ?>;

        // Create the data table
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Month');
        <?php foreach ($books as $bookname) { ?>
            dataTable.addColumn('number', '<?php echo $bookname; ?>');
        <?php } ?>
        dataTable.addRows([
            <?php foreach ($months as $i => $month) { ?>
                ['<?php echo $month; ?>',
                <?php foreach ($books as $bookname) { ?>
                    <?php echo $bookData[$bookname][$i]; ?>,
                <?php } ?>
                ],
            <?php } ?>
        ]);

        // Set chart options
        var options = {
            title: 'Reviewed Books by Course',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div19'));
        chart.draw(dataTable, options);
    }
  </script>
  <div id="chart_div19" class="chart29"></div>
        </center>
      </div>
    </div>

</div>


  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
$data = $db->retrieve("review");
$data = json_decode($data, true);

// Prepare data for the column chart
$bookData = [];
$books = array();
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

if(is_array($data)){
  foreach ($data as $id => $book) {
      if (!isset($book['date']) || !isset($book['bookid'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['date'])); // use 'm' to get the month number (01-12)
      $data1 = $db->retrieve("book/{$book['bookid']}");
      $data1 = json_decode($data1, true);
      $bookcourse = $data1['bookcatalog'];
      if (!in_array($bookcourse, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookcourse;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookcourse] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookcourse])) { // check if month index is valid
          $bookData[$bookcourse][intval($month) - 1]++; // increment count for this month
      }
  }
}
?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Retrieve data from PHP
        var data = <?php echo json_encode($bookData); ?>;

        // Create the data table
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Month');
        <?php foreach ($books as $bookname) { ?>
            dataTable.addColumn('number', '<?php echo $bookname; ?>');
        <?php } ?>
        dataTable.addRows([
            <?php foreach ($months as $i => $month) { ?>
                ['<?php echo $month; ?>',
                <?php foreach ($books as $bookname) { ?>
                    <?php echo $bookData[$bookname][$i]; ?>,
                <?php } ?>
                ],
            <?php } ?>
        ]);

        // Set chart options
        var options = {
            title: 'Reviewed Book by Catalog',
            hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            legend: {position: 'top'}
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div16'));
        chart.draw(dataTable, options);
    }
  </script>



  <div id="chart_div16" class="chart26"></div>
        </center>
      </div>
    </div>
  </div>
</div>
</div>
</div>



  <script>
 function generatePDF() {

// Get the elements you want to show in the PDF
const box2 = document.querySelector(".box2");
const adminDashboard = document.getElementById("adminDashboard");

// Show the elements
box2.style.display = "block";
adminDashboard.style.display = "block";

const div = document.getElementById("myDiv");
// Generate the PDF
html2canvas(div).then(function(canvas) {
  const imgData = canvas.toDataURL('image/png');
  const pdf = new jsPDF();
  pdf.addImage(imgData, 'PNG', 0, 0, 210, 297);
  pdf.save('myDiv.pdf');

  // Hide the elements again
  box2.style.display = "none";
  adminDashboard.style.display = "none";
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
.box1{
    padding: 15px;
	text-align: center;
	border: solid;
	border-radius: 0px;
	background: orange;
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
	background: #FFD580;
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