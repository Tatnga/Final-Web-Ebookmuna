  
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
				<a href="ViewPending.php" class="active">
				<i class="fa-solid fa-book"></i>
				<span class="links_name">&nbsp;View Pending Registration</span>
				</a>
			</li>
		
			<li>
				<a href="ViewUser.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;View User</span>
				</a>
			</li>
     
		
			<li>
				<a href="UserPenalty.php" class="active">
				<i class="fa-solid fa-message"></i>
				<span class="links_name">&nbsp;View User with Penalty</span>
				</a>
			</li>
            <li>
				<a href="viewcourse.php" class="active">
				<i class="fa-solid fa-message"></i>
				<span class="links_name">&nbsp;View Course</span>
				</a>
			</li>
            <li>
				<a href="viewsubjects.php" class="active">
				<i class="fa-solid fa-message"></i>
				<span class="links_name">&nbsp;View Subjects</span>
				</a>
			</li>
			<li>
				<a href="History.php" class="active">
				<i class="fa fa-history" aria-hidden="true"></i>
				<span class="links_name">&nbsp;View History</span>
				</a>
			</li>
      <li>
				<a href="viewrating.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;View Rating</span>
				</a>
			</li>
			<li>
				<a href="viewimport.php" class="active">
				<i class="fa-solid fa-user"></i>
				<span class="links_name">&nbsp;Import CSV File</span>
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
		<div class="header" style="width:78.8vw;">
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
		
	<div class="wrapper" style="position: static;"> 
		<br>
		<br>
		<h2 style="font-weight:bold;font-size:35px;">Admin Dashboard</h2>
<br>
<div class="user">

<button onclick="generatePDF()">Generate PDF</button>
  &nbsp;	&nbsp; &nbsp;	&nbsp;
</div>

<div id="myDiv">

<br>
<div class="box1">
<div class="box2" style="display:none;">
	<center>
		<img src="Ebook.png" width="150px">
	</center>
  </div>
  <h2 id="adminDashboard" style="font-weight:bold;font-size:35px; display:none;">Admin Report</h2>


<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          <?php
  include("../config.php");
  include("../firebaseRDB.php");
  $db = new firebaseRDB($databaseURL);

 
  $data = $db->retrieve("users");
  $data = json_decode($data, true);

  // Prepare data for the pie chart
  $pieData = [];
  $courses = [];
  foreach($data as $id => $book){
    if (isset($book['usercourse'])) {

	
        $course =  $book['usercourse'];
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
                title: 'Total Users by Course:  <?php echo array_sum($pieData); ?>',
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

</div>


<br>

















<div class="boxcontainer" style="position: static;">
  <div class="box">
    <div class="add" style="position:static;">
      <div class="row">
        <center>
          
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<?php
  $data = $db->retrieve("users");
  $data = json_decode($data, true);

  // Prepare data for the column chart
  $bookData = [];
  $books = array();
  $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

  if(is_array($data)){
  foreach ($data as $id => $book) {
      if (!isset($book['registration_date']) || !isset($book['usercourse'])) {
          continue; // skip this element if it has missing keys
      }
      $month = date('m', strtotime($book['registration_date'])); // use 'm' to get the month number (01-12)
      $bookname = $book['usercourse'];
      if (!in_array($bookname, $books)) { // add book to list of books if it hasn't been added yet
          $books[] = $bookname;
          // add an array for this book if it hasn't been added yet
          $bookData[$bookname] = array_fill(0, 12, 0);
      }
      if (array_key_exists(intval($month) - 1, $bookData[$bookname])) { // check if month index is valid
          $bookData[$bookname][intval($month) - 1]++; // increment count for this month
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
            title: 'Users by Course',
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
</div>
<br>

<div class="box">
    <div class="add" style="position:static;">
        <div class="row">
            <h5>Users with Highest Penalty</h5>
            <center>
              
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
			<div class="graph" id="graph1">
            <?php
$borrowbook = $db->retrieve("users");
$borrowbook = json_decode($borrowbook, true);

$courseCounts = array(); // array to hold course name and count
if (is_array($borrowbook)) {
    foreach ($borrowbook as $id => $book) {
        if (!is_array($book) || !isset($book['name']) || empty($book['name'])) {
            continue; // skip if name is not set or empty
        }

        // check if user has penalty
        if ($book['penalty'] != 'none') {
            $bookname = $book['name'];
            if (!array_key_exists($bookname, $courseCounts)) { // add course to list of courses if it hasn't been added yet
                $courseCounts[$bookname] = 0;
            }
            $courseCounts[$bookname]++; // increment count for this course
        }
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
            <h5>Course with Highest Penalty</h5>
            <center>
              
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
			<div class="graph" id="graph2">
            <?php
$borrowbook = $db->retrieve("users");
$borrowbook = json_decode($borrowbook, true);

$courseCounts = array(); // array to hold course name and count
if (is_array($borrowbook)) {
    foreach ($borrowbook as $id => $book) {
        if (!is_array($book) || empty($book['usercourse'])) {
            continue; // skip if 'usercourse' is empty or not set in the array
        }

        // check if user has penalty
        if ($book['penalty'] != 'none') {
            $bookname = $book['usercourse'];
            if (!array_key_exists($bookname, $courseCounts)) { // add course to list of courses if it hasn't been added yet
                $courseCounts[$bookname] = 0;
            }
            $courseCounts[$bookname]++; // increment count for this course
        }
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

</div>

</div>
</div>
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
	background: #FFD580;
	}
  .box1{
    padding: 15px;
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