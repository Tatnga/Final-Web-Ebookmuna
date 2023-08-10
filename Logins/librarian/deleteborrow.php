
<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
if(!empty($id)){
   $delete = $db->delete("borrowbook", $id);

   echo "<script>";
   echo "var left = (screen.width / 2) - (400 / 2);";
   echo "var top = (screen.height / 2) - (200 / 2);";
   echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
   echo "popup.document.write('<h1>Success!</h1><p>Book successfully deleted.</p>');";
   echo "setTimeout(function() {";
   echo "window.location.replace('ViewBorrowBook.php');";
   echo "popup.close();";
   echo "}, 3000);";
   echo "</script>";
} else {
   echo "<script>";
   echo "var left = (screen.width / 2) - (400 / 2);";
   echo "var top = (screen.height / 2) - (200 / 2);";
   echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
   echo "popup.document.write('<h1>Error!</h1><p>No ID was provided.</p>');";
   echo "setTimeout(function() {";
   echo "window.location.replace('ViewBorrowBook.php');";
   echo "popup.close();";
   echo "}, 3000);";
   echo "</script>";
} 
?> 