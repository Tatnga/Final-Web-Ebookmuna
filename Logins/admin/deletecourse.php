<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
if($id != ""){
   $delete = $db->delete("course", $id);

   
echo "<script>";
echo "var left = (screen.width / 2) - (400 / 2);";
echo "var top = (screen.height / 2) - (200 / 2);";
echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
echo "popup.document.write('<h1>Successfull!</h1><p>Course Deleted.</p>');";
echo "setTimeout(function() {";
echo "window.location.replace('viewcourse.php');";
echo "popup.close();";
echo "}, 3000);";
echo "</script>";
}
