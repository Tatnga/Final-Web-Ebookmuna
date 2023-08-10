<<?php
include("../config.php");
include("../firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$data1 = $db->retrieve("course");
$data1 = json_decode($data1, 1);

if (!isset($_POST['bookcourse']) || empty($_POST['bookcourse'])) {
  echo "Error: book course name is missing or empty.";
  exit;
}

if (!is_array($data1) || empty($data1)) {
  echo "Error: course data is not an array or is empty.";
  exit;
}

$courseId = null;
$courseName = "";
$subjects = [];

foreach ($data1 as $id => $course) {
  if (!$course) {
    // Skip this course if it's null
    continue;
  }

  if (strtolower(trim($course['name1'])) == strtolower(trim($_POST['bookcourse']))) {
 
    $courseId = $id;
    $courseName = $course['name1'];
    $subjects = $course['subjects'] ?? [];
    break;
  }
}


$id = $_POST['id'];
$updateData = [
  "bookname" => $_POST['bookname'],
  "bookauthor" => $_POST['bookauthor'],
  "bookyear" => $_POST['bookyear'],
  "bookcourse" => $_POST['bookcourse'],
  "datepublish" => $_POST['datepublish'],
  "bookcatalog" => $_POST['bookcatalog'],
  "bookquantity" => $_POST['bookquantity'],
  "description" => $_POST['description'],
  "totaldays" => $_POST['totaldays'],
  "subjects" => $subjects,
];

if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] == 0) {
  $filedata = file_get_contents($_FILES['book_image']['tmp_name']);
  if ($filedata !== false && is_array(getimagesize($_FILES['book_image']['tmp_name']))) {
    $image_url = $db->uploadImageToStorage($filedata, $_FILES['book_image']);
    if ($image_url) {
      $updateData['book_image_url'] = $image_url;
    }
  }
}

$update = $db->update("book", $id, $updateData);
if ($update) {
  echo "<script>";
  echo "var left = (screen.width / 2) - (400 / 2);";
  echo "var top = (screen.height / 2) - (200 / 2);";
  echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
  echo "popup.document.write('<h1>Successful!</h1><p>Added Successfully</p>');";
  echo "setTimeout(function() {";
  echo "popup.close();";
  echo "window.location.href = 'ViewBooks.php';";
  echo "}, 3000);";
  echo "</script>";
} else {
  echo "<script>alert('Failed to add book')</script>";
  echo "<script>location.replace('addbook.php')</script>";
}

?>
