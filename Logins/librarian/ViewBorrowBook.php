 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Borrowed</title>
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
  <select class="custom-select" id="inputGroupSelect03" onchange="searchTable()">
    <option selected>Book Status...</option>
         <option value="pending">pending</option>  
         <option value="waiting">waiting</option>
         <option value="borrowed">borrowed</option>
  </select>
  
</div>

		</div>  
		

	</div>
  <h1 style="margin-top:85px;text-align:center;color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">Book Borrowed</h1>

		<div class="home-content">
         <!--<p>Manage</p>-->
         <div class="user">
         .</p>
        

		 <div class="tab">
    <table class="table table-striped" width="100%" align="center">
    <thead>  
    <tr bgcolor="#dddddd">

			<th onclick="sortTable(0)"> ID</th>
            <th onclick="sortTable(1)">Date</th>
            <th onclick="sortTable(2)">Date Borrow</th>
            <th onclick="sortTable(3)">Due Date</th>
            <th onclick="sortTable(4)">Total Days</th>
            <th onclick="sortTable(5)">Book Name</th>
            <th onclick="sortTable(6)">Borrower Name</th>
            <th onclick="sortTable(7)">Book Status</th>
        
            <th colspan="2">Action</th>
        </tr>
        </thead>
				<tbody id="table-body">
        <?php
include("../config.php");
include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
$data2 = $db->retrieve("message");
$data2 = json_decode($data2, 1);
$data = $db->retrieve("borrowbook");
$data = json_decode($data, 1);
$data1 = $db->retrieve("users");
$data1 = json_decode($data1, 1);
$bookData = $db->retrieve("book");
$bookData = json_decode($bookData, 1);
$countPending = 0;

if(is_array($data)){
  foreach($data as $id => $borrowbook){
    if (!$borrowbook) {
      continue; // Skip to the next book in the loop
    }
    $status = $borrowbook['status'];
    if($status == "returned" || $status == "unclaimed" || $status == "overdue" || $status == "payed"|| $status == "reviewed") {
      continue; // Skip to the next book in the loop
    }

    if ($status == "waiting") {
      $borrowDate = strtotime($borrowbook['date']);
      $currentDate = strtotime(date("Y-m-d H:i:s"));
      $diff = $currentDate - $borrowDate;
      $daysPassed = floor($diff/(60*60*24));
      if ($daysPassed >= 1) {
          $status = "unclaimed";
          $update_borrowbook = $db->update("borrowbook", $id, [
              "status" => $status,
              "date" => date('Y-m-d H:i:s')
          ]);
          if ($data2 !== null && is_array($data2)) {
              $count = count($data2);
          } else {
              $count = 0;
          }
          $insert = $db->insert("message", $count, [    
              "date" => date('Y-m-d H:i:s'),
              "userid" => $borrowbook['nodeName'],
              "bookid" => $borrowbook['bookid'],
              "borrowid" => $borrowbook['currentid'],
              "type" => "unclaimed"
          ]);
      }
      
    }
    
    elseif(!empty($borrowbook) && isset($borrowbook['duedate']) && $borrowbook['duedate'] != "none" && $status == "borrowed"){
      $dueDate = $borrowbook['duedate'];
      $currentDate = strtotime(date("Y-m-d H:i:s"));
      if(strtotime($dueDate) <= time()){
          // Due date has passed, add your code here
          $status = "overdue";
          $update_borrowbook = $db->update("borrowbook", $id, [
              "status" => $status
          ]);
          if ($data2 !== null && is_array($data2)) {
              $count = count($data2);
          } else {
              $count = 0;
          }
          $insert = $db->insert("message", $count, [    
              "date" => date('Y-m-d H:i:s'),
              "userid" => $borrowbook['nodeName'],
              "bookid" => $borrowbook['bookid'],
              "borrowid" => $borrowbook['currentid'],
              "type" => "overdue"
          ]);
  
          // Change the penalty only when the status changes from "borrowed" to "overdue"
          if ($status === 'overdue' && $borrowbook['nodeName'] && is_array($data1) && isset($data1[$borrowbook['nodeName']])) {
              $user = $data1[$borrowbook['nodeName']];
              if(!isset($user['penalty']) || $user['penalty'] == 'none'){
                  $user['penalty'] = '1';
              } else {
                  $user['penalty'] = strval(intval($user['penalty']) + 1);
              }
              $update_user = $db->update("users", $borrowbook['nodeName'], $user);
          }
      }
  }
  
         if (isset($borrowbook['bookid']) && is_array($bookData) && array_key_exists($borrowbook['bookid'], $bookData)) {
    
          echo "<tr>
          <td>{$borrowbook['currentid']}</td>
          <td>" . date('d F Y, H:i', strtotime($borrowbook['date'])) . "</td>
          <td>" . date('d F Y, H:i', strtotime($borrowbook['dateborrow'])) . "</td>
          <td>" . date('d F Y, H:i', strtotime($borrowbook['duedate'])) . "</td>
          <td>{$borrowbook['totaldays']}</td>
          <td>{$borrowbook['bookname']}</td>
          <td>{$borrowbook['borrowername']}</td>
          <td>$status</td>
          <td>
            <a href='action_edit_borrow.php?id={$borrowbook['currentid']}&bookid=" . urlencode($borrowbook['bookid']) . "'><i class='fa fa-pencil'></i></a>
          </td>
      
          <td>";

          
                
          if ($status == "pending") {
              echo "<a href='deleteborrow.php?id={$id}'><i class='fa fa-trash'></i></a>";
          }
  
      }
      
      else{
      $delete = $db->delete("borrowbook", $id);
      }
    
  }
}

    ?>
    


    </tbody>
			</table>
<script>
function searchTable() {
  var input, filter, table, tr, td1, td2, td0, td3, td4, td5,i, txtValue1, txtValue2, txtValue0, txtValue3, txtValue4,txtValue5;

var bookstatusSelect = document.getElementById("inputGroupSelect03");
var bookstatusFilter = bookstatusSelect.options[bookstatusSelect.selectedIndex].value.toUpperCase();

  input = document.getElementById("search-input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table-body");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    td0 = tr[i].getElementsByTagName("td")[0];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[4];
    td5 = tr[i].getElementsByTagName("td")[5];
  

    if (td1 && td2 && td0 && td3 && td4 && td5) {
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue0 = td0.textContent || td0.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      txtValue5 = td5.textContent || td5.innerText;
      
      if((txtValue1.toUpperCase().indexOf(filter) > -1 || 
          txtValue2.toUpperCase().indexOf(filter) > -1 || 
          txtValue0.toUpperCase().indexOf(filter) > -1 || 
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
	
</body>
<style>
.container {
  position: absolute;
  right: 0;
  width: 75.8vw;
  height: 150vh;
  background: white;
  margin-right: 20px;
}

.home-section nav {
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  align-items: center;
  position: fixed;
  width: calc(100% - 300px);
  left: 200px;
  padding: 5px;
  margin-left: 100px;
  z-index: 100;
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
  table td:nth-of-type(1):before {
    content: "Image: ";
  }
  table td:nth-of-type(2):before {
    content: "Name: ";
  }
  table td:nth-of-type(3):before {
    content: "Author: ";
  }
  table td:nth-of-type(4):before {
    content: "Catalog: ";
  }
  table td:nth-of-type(5):before {
    content: "Course: ";
  }
  table td:nth-of-type(6):before {
    content: "Borrowing period: ";
  }
  table td:nth-of-type(7):before {
    content: "Quantity: ";
  }
  table td:nth-of-type(8):before {
    content: "Year: ";
  }
  table td:nth-of-type(9):before {
    content: "Borrowed: ";
  }
  table td:nth-of-type(10):before {
    content: "Review: ";
  }
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