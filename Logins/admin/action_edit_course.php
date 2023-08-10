<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$data = $db->retrieve("course");
$data = json_decode($data, 1);
$id = $_POST['id'];
if ($data !== null && is_array($data)) {
  $count = count($data);
} else {
  $count = 0;
}
$selected_subjects = isset($_POST['subjects']) ? $_POST['subjects'] : array();
$insert = $db->update("course", $id, [
  "name1" => strtolower(str_replace(' ', '', $_POST['name1'])),
  "name2" => $_POST['name2'],
  "childno" => $count,
  "subjects" => $selected_subjects
]);

if ($insert) {


    
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Successful!</h1><p>Book added successfully.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('viewcourse.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
} else {
  echo "<script>alert('Failed to add book')</script>";
  echo "<script>location.replace('addbook.php')</script>";
}

?>
