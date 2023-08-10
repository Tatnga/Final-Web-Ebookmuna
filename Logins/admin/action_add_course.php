<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(0);

include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$data = $db->retrieve("course");
$data = json_decode($data, true);

$selected_subjects = isset($_POST['subjects']) ? $_POST['subjects'] : array();

// Check if name1 or name2 already exists in the database
$name1 = strtolower(str_replace(' ', '', $_POST['name1']));
$name2 = $_POST['name2'];
$name_exists = false;

if ($data !== null && is_array($data)) {
  foreach ($data as $course) {
    if ($course['name1'] === $name1 || $course['name2'] === $name2) {
      $name_exists = true;
      break;
    }
  }
}

if (!$name_exists) {
  // Insert new data if name1 or name2 doesn't exist in the database
  $new_course = [
    "name1" => $name1,
    "name2" => $name2,
    "childno" => 0,
    "subjects" => $selected_subjects
  ];

  if ($data !== null && is_array($data)) {
    $count = count($data);
    $new_course['childno'] = $count;
  }

  $insert = $db->insert("course", $new_course['childno'], $new_course);
} 
if ($insert) {
  echo "<script>";
  echo "var left = (screen.width / 2) - (400 / 2);";
  echo "var top = (screen.height / 2) - (200 / 2);";
  echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
  echo "popup.document.write('<h1>Successful!</h1><p>Course added successfully.</p>');";
  echo "setTimeout(function() {";
  echo "window.location.replace('viewcourse.php');";
  echo "popup.close();";
  echo "}, 3000);";
  echo "</script>";
} else {
  echo "<script>";
  echo "var left = (screen.width / 2) - (400 / 2);";
  echo "var top = (screen.height / 2) - (200 / 2);";
  echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
  echo "popup.document.write('<h1>Failed!</h1><p>Error: Course Acronym or Course Full name already exists in the database.</p>');";
  echo "setTimeout(function() {";
  echo "window.location.replace('viewcourse.php');";
  echo "popup.close();";
  echo "}, 3000);";
  echo "</script>";
}
?>
