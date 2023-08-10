<?php
error_reporting(E_ALL & ~E_WARNING);
ini_set('display_errors', 'Off');

include("../config.php");
include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
$courseid = $_POST["courseid"];
$node = "course/$courseid/subjects";
$node1 = "course/$courseid/name1";
$data1 = $db->retrieve($node);
$data2 = $db->retrieve($node1);

$data1 = json_decode($data1, 1);
$data2 = json_decode($data2, 1);
$data = $db->retrieve("book");
$data = json_decode($data, 1);

if (!isset($_POST['bookname'], $_POST['bookdatepublish'], $_POST['bookauthor'], $_POST['bookyear'], $_POST['bookcourse'], $_POST['bookcatalog'], $_POST['bookquantity'], $_FILES['book_image'])) {
 
  echo "<script>";
  echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
  echo "popup.document.write('<h1>Error</h1><p>All fields are required.</p>');";
  echo "setTimeout(function() {";
  echo "window.location.replace('addbook.php');";
  echo "popup.close();";
  echo "}, 3000);";
  echo "</script>";
  exit();
  }
  
  if ($_FILES['book_image']['error'] != 0 || empty($_POST['bookdatepublish'])) {

    echo "<script>";
    echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
    echo "popup.document.write('<h1>Error</h1><p>Image and date are required fields.</p>');";
    echo "setTimeout(function() {";
    echo "window.location.replace('addbook.php');";
    echo "popup.close();";
    echo "}, 3000);";
    echo "</script>";
    exit();
    
  }



$bookExists = false;
if ($data === null) {

} else if (is_array($data) && count($data) > 0) {
  foreach ($data as $book) {
      if (isset($book['bookname']) && $book['bookname'] === $_POST['bookname']) {
          $bookExists = true;
          break;
      }
  }
}


if ($bookExists) {
  echo "<script>";
  echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
  echo "popup.document.write('<h1>Error</h1><p>Book Already Exist.</p>');";
  echo "setTimeout(function() {";
  echo "window.location.replace('addbook.php');";
  echo "popup.close();";
  echo "}, 3000);";
  echo "</script>";
  exit();
  
  
  
} 
else 
{
    if ($data !== null && is_array($data)) {
        $count = count($data);
    } else {
        $count = 0;
    }
    if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] == 0) {
      $filename = $_FILES['book_image'];
      $filedata = file_get_contents($_FILES['book_image']['tmp_name']);
  
      if ($filedata !== false && is_array(getimagesize($_FILES['book_image']['tmp_name']))) {
          $image_url = $db->uploadImageToStorage($filedata, $filename);
  
          if ($_POST['totaldays'] != 0) {
            if ($image_url != null) {
                $review = "0";
            
                $insert = $db->insert("book", $count, [
                  "bookname" => $_POST['bookname'],
                  "bookauthor" => $_POST['bookauthor'],
                  "bookyear" => $_POST['bookyear'],
                  "bookcourse" => $data2,
                  "bookdatepublish" => $_POST['bookdatepublish'],
                  "bookcatalog" => $_POST['bookcatalog'],
                  "bookquantity" => strval($_POST['bookquantity']),
                  "totaldays" => $_POST['totaldays'],
                  "book_image_url" => $image_url,
                  "description" => $_POST['description'],
                  "totalreview" => $review,
                  "totalbookborrowed"=>"0",
                  "childno" => strval($count),
                  "averagereview" => "0",
                  "date" => date('Y-m-d H:i:s'),
                  "subjects" => $data1 
              ]);
              
              if ($insert) {
                echo "<script>";
                echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
                echo "popup.document.write('<h1>Success </h1><p>Book Added.</p>');";
                echo "setTimeout(function() {";
                echo "window.location.replace('addbook.php');";
                echo "popup.close();";
                echo "}, 3000);";
                echo "</script>";
              } else {
                echo "<script>";
                echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
                echo "popup.document.write('<h1>Failed </h1><p>Failed to Add Book.</p>');";
                echo "setTimeout(function() {";
                echo "window.location.replace('addbook.php');";
                echo "popup.close();";
                echo "}, 3000);";
                echo "</script>";
              }
            }
          }
          else {
            echo "<script>";
            echo "var popup = window.open('', 'mypopup', 'width=500,height=250,left='+(screen.width/2-250)+',top='+(screen.height/2-125));";
            echo "popup.document.write('<h1>Error </h1><p>Total days cannot be 0.</p>');";
            echo "setTimeout(function() {";
            echo "window.location.replace('addbook.php');";
            echo "popup.close();";
            echo "}, 3000);";
            echo "</script>";
          }
        }
      }
    }
  

?>
