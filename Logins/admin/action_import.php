<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

if(isset($_FILES['excelfile'])) {
  $excelPath = $_FILES['excelfile']['tmp_name'];
  if ($_FILES['excelfile']['error'] != UPLOAD_ERR_OK) {
   echo "Error uploading file: " . $_FILES['excelfile']['error'];
}
  if(isset($_FILES['excelfile']) && $_FILES['excelfile']['error'] == 0) {
    echo "File uploaded successfully.";
  } else {
    echo "Error uploading file.";
  }
  echo "Excel file path: " . $excelPath;
  $tableName = "myTable";
  $parentNodeName = "users";

  $result = $db->saveExcelToFirebase1($tableName, $parentNodeName, $excelPath);

  if ($result) {
    echo "Excel data saved to Firebase Realtime Database successfully.";
  } else {
    echo "Error: Could not save Excel data to Firebase Realtime Database.";
  }
} else {
  echo "Error: No file uploaded.";
}
?>
