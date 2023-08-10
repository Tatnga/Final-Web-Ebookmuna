<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Books</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
	<!--div class="container">
		<div class="header">
			<div class="nav">
				<div class="search">
					<input type="text" placeholder="Search..">
					<button type="submit"><img src="search.png" style="height: 30px;"></button>
				</div>
			</div>
			<div class="user">
				<a href="Home.php" class="btn">Home Page</a>
			</div>
		</div>
	</div->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
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
				<a href="ViewBorrowBook.php" class="active">
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
	<div class="header" style="width:78.8vw;">
		<div class="nav">
			<div class="search">
				<input type="text" placeholder="Search.." id="search-input" style="width:32vw;padding:15px;">
					<button type="submit" onclick="searchTable()" style="position:absolute;z-index:1;right:55%;background-color: wheat;"><i class="fas fa-search"></i></button>
			</div>
			<div class="input-group mb-3">


</div>

<div class="input-group mb-3">
  <select class="custom-select" id="inputGroupSelect01" onchange="searchTable()">
  <option selected>Course...</option>
  <?php
  error_reporting(E_ERROR | E_PARSE);
  error_reporting(0);
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
  
  <select class="custom-select" id="inputGroupSelect02" onchange="searchTable()">
    <option selected>Year Level...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  <select class="custom-select" id="inputGroupSelect03" onchange="searchTable()">
    <option selected>Book Catalog...</option>
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
  
</div>

		</div>
		
		
	</div>
	<h1 style="margin-top:85px;text-align:center;color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">Book Information</h1>

	<div class="user">
        <a href="addbook.php" class="btn">Add New Books</a>
          &nbsp;  &nbsp; &nbsp; &nbsp;
  </div>

		<div class="home-content">
         <!--<p>Manage</p>-->
         <div class="user">
         .</p>
        
		 <form action = "" method="GET">
			<div class="row">
               <div class="col-md-4">
			   <div class="input-group">

</div>
				</div>
			   </div>
			</div>
		 </form>

		 <div class="tab">
			<table class="table table-striped" width="100%" align="center">
				<thead>
					<tr bgcolor="#dddddd">
						<th onclick="sortTable(0)">ID</th>
						<th onclick="sortTable(1)">Image</th>
						<th onclick="sortTable(2)">Book Date Publish</th>
						<th onclick="sortTable(3)">Book Name</th>
						<th onclick="sortTable(4)">Book Author</th>
						<th onclick="sortTable(5)">Book Catalog</th>
						<th onclick="sortTable(6)">Book Course</th>
						<th onclick="sortTable(7)">Book borrowing<br>period in days</th>
						<th onclick="sortTable(8)">Book Quantity</th>
						<th onclick="sortTable(9)">Book Year</th>
						<th onclick="sortTable(10)">Total Book<br> Borrowed</th>
						<th onclick="sortTable(11)">Total Book<br> Reviewed </th>
						<th onclick="sortTable(12)">Book Average<br> Review </th>
						<th>Subjects</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody id="table-body">
				<?php


  $data = $db->retrieve("book");
  $data = json_decode($data, 1);

  if(is_array($data)){
	 foreach($data as $id => $book){

		// Add a check to make sure the $book variable has a bookquantity key
		if (!isset($book['bookquantity'])) {
		   continue; // Skip to the next book in the loop
		}
		if ($book['bookquantity'] <= 0) {
		   // Delete the book if quantity is less than or equal to 0
		 
		}
		echo "<tr>
		<td>{$book['childno']}</td>
		<td><img src='{$book['book_image_url']}' height='100' width='50'></td>
		<td>" . date('Y', strtotime($book['bookdatepublish'])) . "</td>
		<td>{$book['bookname']}</td>
		<td>{$book['bookauthor']}</td>
		<td>{$book['bookcatalog']}</td>
		<td>" . strtoupper($book['bookcourse']) . "</td>
		<td>{$book['totaldays']}</td>
		<td>{$book['bookquantity']}</td>
		<td>{$book['bookyear']}</td>
		<td>{$book['totalbookborrowed']}</td>
		<td>{$book['totalreview']}</td>
		<td>{$book['averagereview']}</td>
		<td>
			<div style='max-height: 100px; overflow-y: scroll; width: 150px;'>
				";
	
				// Add a loop to display the subjects for this book
				if (isset($book['subjects'])) {
					foreach ($book['subjects'] as $subject) {
						echo "{$subject}<br>";
					}
				}
	
		echo "</div>
		</td>
		<td><a href='editbook1.php?id={$id}'><i class='fa fa-pencil'></i></a></td>
		<td><a href='delete.php?id={$id}'><i class='fa fa-trash'></i></a></td>
	</tr>";
	
	 }   
  }
?>


				</tbody>
			</table>
		</div>

		
<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementsByTagName("table")[0];
    switching = true;
    dir = "asc";
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>
	</div>
</div>
<br>

<div class="user">
				<a href="addbook.php" class="btn">Add New Books</a>
					&nbsp;	&nbsp; &nbsp;	&nbsp;
</div>

	</div>

<script>function searchTable() {
  var input, filter, table, tr, td0, td1, td2, td3, td4,td5,td6, td9,i, txtValue0, txtValue1, txtValue5,txtValue6, txtValue2, txtValue3, txtValue4, txtValue9;
  var courseSelect = document.getElementById("inputGroupSelect01");
  var yearSelect = document.getElementById("inputGroupSelect02");
  var catalogSelect = document.getElementById("inputGroupSelect03");
  var courseFilter = courseSelect.options[courseSelect.selectedIndex].value.toUpperCase();
  var catalogFilter = catalogSelect.options[catalogSelect.selectedIndex].value.toUpperCase();
  var yearFilter = yearSelect.options[yearSelect.selectedIndex].value;
  input = document.getElementById("search-input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table-body");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td0 = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[4];
    td5 = tr[i].getElementsByTagName("td")[5];
	td6 = tr[i].getElementsByTagName("td")[6];
	td9 = tr[i].getElementsByTagName("td")[9];
    if (td0 && td1 && td2 && td3 && td4 && td5 && td9) {
      txtValue0 = td0.textContent || td0.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      txtValue5 = td5.textContent || td5.innerText;
	  txtValue6 = td6.textContent || td6.innerText;
	  txtValue9 = td9.textContent || td9.innerText;
      if ((txtValue0.toUpperCase().indexOf(filter) > -1 || 
           txtValue1.toUpperCase().indexOf(filter) > -1 || 
           txtValue2.toUpperCase().indexOf(filter) > -1 || 
           txtValue3.toUpperCase().indexOf(filter) > -1 || 
           txtValue4.toUpperCase().indexOf(filter) > -1 || 
		   txtValue9.toUpperCase().indexOf(filter) > -1 || 
		   txtValue6.toUpperCase().indexOf(filter) > -1 || 
           txtValue5.toUpperCase().indexOf(filter) > -1) && 
		   (catalogFilter === 'BOOK CATALOG...' || txtValue5.toUpperCase() === catalogFilter) && 
          (courseFilter === 'COURSE...' || txtValue6.toUpperCase() === courseFilter) && 
          (yearFilter === 'Year Level...' || txtValue9 === yearFilter)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  // Clear the search input field
  input.value = "";
}

</script>

</body>

<style>
	.subjects {
  width: 300px; /* Increase the width */
  overflow-x: auto; /* Add horizontal scrolling */
}
.container {
	position: absolute;
	right: 0;
	width: 75.8vw;
	height: 1000vh;
	background: white;
	margin-right: 20px;
}

.home-section nav {
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  /*display: flex;*/
  align-items: center;
  position: fixed;
  width: calc(100% - 300px);
  left: 200px;
  padding: 5px;
  margin-left: 100px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 10px 5px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}

.scroll-bg {
	position: fixed;
	background: orange;
	width: 1100px;
	margin: 1% auto;
	padding: 10px 20px;
	border-radius: 20px;
}
.scroll-div {
	width: 1100px;
	background: whitesmoke;
	height: 650px;
	overflow: hidden;
	overflow-y: scroll;
}
.scroll-object {
	color: black;
	font-family: cursive;
	font-size: 20px;
	padding: 15px;
	text-align: justify;
}
/*---------------------------------------------------*/
/* Responsive table */
.table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}
/* Table style */
table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  background-color: silver; 
}
table th,
table td {
  padding: 8px;
  border: 1px solid #ddd;
}
table th {
  background-color: #b47d17;
  text-align: center;
}
table td img {
  display: block;
  margin: auto;
  max-height: 100px;
  max-width: 50px;
}
/* Button style */
.btn {
  display: inline-block;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  background-color: orangered;
  color: #fff;
  text-align: center;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.btn:hover {
  background-color: white;
}

/* Media queries */
@media (max-width: 768px) {
  table td:nth-of-type(1):before { content: "Image: "; }
  table td:nth-of-type(2):before { content: "Name: "; }
  table td:nth-of-type(3):before { content: "Author: "; }
  table td:nth-of-type(4):before { content: "Catalog: "; }
  table td:nth-of-type(5):before { content: "Course: "; }
  table td:nth-of-type(6):before { content: "Borrowing period: "; }
  table td:nth-of-type(7):before { content: "Quantity: "; }
  table td:nth-of-type(8):before { content: "Year: "; }
  table td:nth-of-type(9):before { content: "Borrowed: "; }
  table td:nth-of-type(10):before { content: "Review: "; }
  table td:last-child {
    width: 100%;
    display: block;
    text-align: center;
  }
}
/*---------------------------------------------------*/
.custom-select {
  display: inline-block;
  padding: 8px 12px;
  font-size: 10px;
  font-weight: bold;
  line-height: 1.5;
  color: black;
  background-color: #ffffff;
  border: 1px solid black;
  border-radius: 4px;
  box-shadow: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.custom-select:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
}

.custom-select option {
  font-weight: normal;
}

.custom-select:first-of-type {
  margin-right: 5px;
}

.custom-select:not(:last-of-type) {
  margin-bottom: 5px;
}




</style>
</html>