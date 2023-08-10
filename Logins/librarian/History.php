
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View History</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<!--link rel="stylesheet" type="text/css" href="adminb.css"-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
	
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
   <option selected>Book Status...</option>
         <option value="returned">returned</option>  
         <option value="overdue">reviewed</option>
  </select>
  
</div>

		</div>
		
		
	</div>
	<h1 style="margin-top:85px;text-align:center;color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">Book History</h1>

		<div class="home-content">
         <!--<p>Manage</p>-->
         <div class="user">
         .</p>
		 <div class="tab">
    <table class="table table-striped" width="100%" align="center">
        <tr bgcolor="#dddddd">
           
            <th>Date Returned</th>
			<th>Date Borrowed</th>
            <th>Book Name</th>
            <th>Borrower Name</th>
            <th>Book Status</th>

        </tr>
		<?php
   include("../config.php");
   include("../firebaseRDB.php");
   $db = new firebaseRDB($databaseURL);
   
   $data = $db->retrieve("borrowbook");
   $data = json_decode($data, 1);
   
   if(is_array($data)){
      foreach($data as $id => $borrowbook){
		if (!isset($borrowbook['bookid'])) {
            continue; // Skip to the next book in the loop
         }
         $status = $borrowbook['status'];
         if($status == "returned" ||$status == "payed" ||$status == "reviewed"   ){
         
          echo "<tr>
          <td>" . date('d F Y', strtotime($borrowbook['date'])) . "</td>
    <td>" . date('d F Y', strtotime($borrowbook['dateborrow'])) . "</td>
          <td>{$borrowbook['bookname']}</td>
          <td>{$borrowbook['borrowername']}</td>
          <td>$status</td>
         
    </tr>";
      }
   }
}
?>



	</table>
	
<script>
function searchTable() {
  var input, filter, table, tr, td0, td1, td2, td3, td4, i, txtValue0, txtValue1, txtValue2, txtValue3, txtValue4;

var bookstatusSelect = document.getElementById("inputGroupSelect01");
var bookstatusFilter = bookstatusSelect.options[bookstatusSelect.selectedIndex].value.toUpperCase();
  
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
   

    if (td0 && td1 && td2 && td3 && td4 && td5) {
      txtValue0 = td0.textContent || td0.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      txtValue5 = td5.textContent || td5.innerText;
      
 
      if((txtValue0.toUpperCase().indexOf(filter) > -1 || 
          txtValue1.toUpperCase().indexOf(filter) > -1 || 
          txtValue2.toUpperCase().indexOf(filter) > -1 || 
          txtValue3.toUpperCase().indexOf(filter) > -1 || 
          txtValue4.toUpperCase().indexOf(filter) > -1 || 
          txtValue5.toUpperCase().indexOf(filter) > -1 ) &&
          (bookstatusFilter === 'BOOK STATUS...' || txtValue5.toUpperCase() === bookstatusFilter))  {
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
.container {
	position: absolute;
	right: 0;
	width: 75.8vw;
	height: 150vh;
	background: white;
	margin-right: 30px;
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
  transition: all 0.5s ease;*/
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
  background-color: #BFC9CA;
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