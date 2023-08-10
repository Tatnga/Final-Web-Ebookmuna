<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$data = $db->retrieve("subjects");
$data = json_decode($data, 1);

$name1 = strtoupper($_POST['name1']);
$name_exists = false;
foreach ($data as $subject) {
  if ($subject['name1'] === $name1 ) {
    $name_exists = true;
    break;
  }
}

if (!$name_exists) {
  if ($data !== null && is_array($data)) {
    $count = count($data);
  } else {
    $count = 0;
  }
  $insert = $db->insert("subjects", $count, [
    "name1" => $name1,
    "childno" => $count
  ]);

  if ($insert) {
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Successfull!</h1><p>Subject added successfully.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('viewsubjects.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
  } else {


    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Failed.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('viewsubjects.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
  }
} else {
  echo "<script>";
  echo "var left = (screen.width / 2) - (400 / 2);";
  echo "var top = (screen.height / 2) - (200 / 2);";
  echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
  echo "popup.document.write('<h1>Failed!</h1><p>Error: Subject name already exists in the database.</p>');";
  echo "setTimeout(function() {";
  echo "window.location.replace('viewsubjects.php');";
  echo "popup.close();";
  echo "}, 3000);";
  echo "</script>";
}
?>
