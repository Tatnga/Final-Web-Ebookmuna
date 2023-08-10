  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View User</title>
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
	</div>
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
				<span class="links_name">&nbsp;View App Rating</span>
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
				<input type="text" placeholder="Search.." id="search-input" style="width:32vw;padding:15px;">
					<button type="submit" onclick="searchTable()" style="position:absolute;z-index:1;right:55%;background-color: wheat;"><i class="fas fa-search"></i></button>
			</div>
			<div class="input-group mb-3">


</div>

<div class="input-group mb-3">
  <select class="custom-select" id="inputGroupSelect01" onchange="searchTable()">
    <option selected>Course...</option>
    <option value="beed">BEEd</option>  
         <option value="bsed">BSEd</option>
         <option value="bsa">BSA</option>
         <option value="bsba">BSBA</option>
         <option value="bscpe">BSCpE</option>
         <option value="bsee">BSEE</option>
         <option value="bsece">BSECE</option>
         <option value="bsie">BSIE</option>
         <option value="bsme">BSME</option>
         <option value="bscrim">BS Crim</option>
         <option value="bsca">BSCA</option>
         <option value="bsit">BSIT</option>
         <option value="bscs">BSCS</option>
         <option value="bshm">BSHM</option>
         <option value="bstm">BSTM</option>
         <option value="bsn">BSN</option>
         <option value="bsmt">BSMT</option>
         <option value="bstmarengg">BS Mar Engg</option>
         <option value="act">ACT</option>
         <option value="basiceducation">BASIC EDUCATION</option>
  </select>
  
  <select class="custom-select" id="inputGroupSelect02" onchange="searchTable()">
    <option selected>Year Level...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>

  
</div>

		</div>
		
		
	</div>
	<h1 style="margin-top:75px;text-align:center;color:#7b200a;font-size:80px; font-weight:bold;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black" class="text-center">View Ratings</h1>

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
          <th>Rating ID</th>
					<th>Review</th>
      		<th>Star</th>
          <th>User Name</th>
          <th>Date</th>
        

      
					</tr>
				</thead>
				<tbody id="table-body">
        <?php
        include("../config.php");
        include("../firebaseRDB.php");
        $db = new firebaseRDB($databaseURL);
        $data = $db->retrieve("review1");
        $data = json_decode($data, 1);
        if (is_array($data)) {
          foreach ($data as $id => $users) {
            if (is_array($users) && isset($users['reviewid'])) {
              $userid = $users['userid'];
              $user = $db->retrieve("users/{$userid}");
              $user = json_decode($user, true);
              if (is_array($user)) {
                echo "<tr>
                        <td>{$users['reviewid']}</td>
                        <td>{$users['review1']}</td>
                        <td>{$users['reviewstar']}</td>
                        <td>{$user['name']}</td>
                        <td>{$users['date']}</td>
                      </tr>";
              }
            }
          }
        }
      ?>





				</tbody>
			</table>
		</div>
		</div>
	</div>
	<br>
	<div class="user">
				<a href="addbook.php" class="btn">Add New User</a>
					&nbsp;	&nbsp; &nbsp;	&nbsp;
					</div>
	</div>

	<script>function searchTable() {
  var input, filter, table, tr, td0, td1, td2, td3, td4,td5,td6, td7,i, txtValue0, txtValue1, txtValue5,txtValue6, txtValue2, txtValue3, txtValue4, txtValue7;
  var courseSelect = document.getElementById("inputGroupSelect01");
  var yearSelect = document.getElementById("inputGroupSelect02");

  var courseFilter = courseSelect.options[courseSelect.selectedIndex].value.toUpperCase();

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
	td7 = tr[i].getElementsByTagName("td")[7];
    if (td0 && td1 && td2 && td3 && td4 && td5 && td7) {
      txtValue0 = td0.textContent || td0.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      txtValue5 = td5.textContent || td5.innerText;
	  txtValue6 = td6.textContent || td6.innerText;
	  txtValue7 = td7.textContent || td7.innerText;
      if ((txtValue0.toUpperCase().indexOf(filter) > -1 || 
           txtValue1.toUpperCase().indexOf(filter) > -1 || 
           txtValue2.toUpperCase().indexOf(filter) > -1 || 
           txtValue3.toUpperCase().indexOf(filter) > -1 || 
           txtValue4.toUpperCase().indexOf(filter) > -1 || 
		   txtValue7.toUpperCase().indexOf(filter) > -1 || 
		   txtValue6.toUpperCase().indexOf(filter) > -1 || 
           txtValue5.toUpperCase().indexOf(filter) > -1) && 
		  
          (courseFilter === 'COURSE...' || txtValue7.toUpperCase() === courseFilter) && 
          (yearFilter === 'Year Level...' || txtValue5 === yearFilter)) {
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
   .scrollable-cell {
    max-width: 200px; /* Set the maximum width of the cell */
    overflow-x: auto; /* Enable horizontal scrolling for the cell content */
    white-space: nowrap; /* Prevent the content from wrapping */
  }
  .scrollable-content {
    display: inline-block; /* Make the content a block-level element */
  }
	.container {
	position: absolute;
	right: 0;
	width: 75vw;
	height: 150vh;
	background: white;
	margin-right: 30px;
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