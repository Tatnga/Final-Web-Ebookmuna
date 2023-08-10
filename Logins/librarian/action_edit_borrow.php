<?php
include("../config.php");
include("../firebaseRDB.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$db = new firebaseRDB($databaseURL);

if(isset($_GET['id'])){
   $id = urldecode($_GET['id']);
   $bookid = urldecode($_GET['bookid']);
   $data = $db->retrieve("book/$bookid");
   $data1 = $db->retrieve("borrowbook/$id");
   $currentDateTime = date('Y-m-d H:i:s');

   if (!empty($data1) && !empty($data)) {
      $book = json_decode($data, true);
      $borrowbook = json_decode($data1, true);
      $users = $db->retrieve("users/$borrowbook[nodeName]");
      $users = json_decode($users, true);
      if(!empty($borrowbook) && isset($borrowbook['duedate']) && $borrowbook['duedate'] != "none"){
   $dueDate = $borrowbook['duedate'];
   if(strtotime($dueDate) < time()){
      // Due date has passed, add your code here
      $status = "overdue";
      $update_borrowbook = $db->update("borrowbook", $id, [
         "status" => $status,
         "date" =>  $currentDateTime 
      ]);
   }
}
      if(!empty($book)){
      if (isset($borrowbook) && isset($borrowbook['status'])) {
         $status = $borrowbook['status'];
         if($borrowbook['status'] == "pending"){
            $status = "waiting";
            $bookquantity = strval(intval($book['bookquantity']) - 1);
            $update_book = $db->update("borrowbook", $id, [
               "date" => date('Y-m-d H:i:s')
            ]);
            
            $update_book = $db->update("book", $bookid, [

               "bookquantity" => strval($bookquantity),
             
            ]);
            
           $mail = new PHPMailer(true);
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com';
           $mail->SMTPAuth = true;
           $mail->Username = 'alfoncabonilla@gmail.com';//your gmail
           $mail->Password = 'v y l j u k u x f o o n r i n l';// your gmail password
           $mail->SMTPSecure = 'ssl';
           $mail->Port = 465;

           $mail->setFrom('alfoncabonilla@gmail.com');//your gmail
           $mail->addAddress($users['email']);
           $mail->isHTML(true);

           $mail->Subject = "Your Book Ready to Claim";
           $claimDate = date('Y-m-d H:i:s', strtotime($borrowbook['date'] . ' +3 days'));
           $mail->Body = "Your book borrow request has been accepted on " . date('Y-m-d H:i:s', strtotime($borrowbook['date'])) . " and is ready to be claimed until " . date('Y-m-d H:i:s', strtotime($claimDate)) . ".
          <br> Book borrower: $borrowbook[borrowername] 
          <br> Book borrowed: $borrowbook[bookname] 
          <br> Borrow ID: $borrowbook[currentid] 
           ";
           

           $mail->send();
         }
         elseif($borrowbook['status'] == "waiting"){
               $status = "borrowed";
               $totalbookborrowed = strval(intval($book['totalbookborrowed']) + 1);
           
               $currentDateTime = date('Y-m-d H:i:s');
               $totalDays = intval($book['totaldays']);
               $dateborrow = date('Y-m-d H:i:s', strtotime($currentDateTime . ' +' . $totalDays . ' days'));

           
               $update_book = $db->update("book", $bookid, [
                  "totalbookborrowed" => strval($totalbookborrowed),
            
               ]);
               $update_book = $db->update("borrowbook", $id, [
              
                  "duedate" => strval($dateborrow),
                  "dateborrow" => date('Y-m-d H:i:s')
               ]);
               $update_book = $db->update("users", $borrowbook['nodeName'], [
              "totalreturn" => strval(intval($users['totalreturn']) + 1),
       
               ]);
               $mail = new PHPMailer(true);
               $mail->isSMTP();
               $mail->Host = 'smtp.gmail.com';
               $mail->SMTPAuth = true;
               $mail->Username = 'alfoncabonilla@gmail.com';//your gmail
               $mail->Password = 'v y l j u k u x f o o n r i n l';// your gmail password
               $mail->SMTPSecure = 'ssl';
               $mail->Port = 465;
    
               $mail->setFrom('alfoncabonilla@gmail.com');//your gmail
               $mail->addAddress($users['email']);
               $mail->isHTML(true);
    
               $mail->Subject = "Book Borrowed";
               $claimDate = date('Y-m-d H:i:s', strtotime($borrowbook['date'] . ' +' . intval($borrowbook['totaldays']) . ' days'));
               $mail->Body = "The $borrowbook[bookname]  was borrowed on " . date('Y-m-d H:i:s', strtotime($borrowbook['date'])) . " and should be returned by " . date('Y-m-d H:i:s', strtotime($claimDate)) . 
               "<br> Borrow Book Details
               <br> Book borrower: $borrowbook[borrowername] 
               <br> Book borrowed: $borrowbook[bookname] 
               <br> Borrow ID: $borrowbook[currentid] 
               
               .";
               
               $mail->send();
            } 
         
         elseif($borrowbook['status'] == "borrowed"){
            $status = "returned";
            $bookquantity = strval(intval($book['bookquantity']) + 1);
            $update_book = $db->update("book", $bookid, [
               "bookquantity" => strval($bookquantity)
            ]);
            $update_book = $db->update("borrowbook", $id, [
         
               "date" => date('Y-m-d H:i:s')
            ]);
            $update_book = $db->update("users", $borrowbook['nodeName'], [
               "totalreturn" => strval(intval($users['totalreturn']) - 1),
               "totalbook" => strval(intval($users['totalbook']) + 1)
                ]);
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'alfoncabonilla@gmail.com';//your gmail
                $mail->Password = 'v y l j u k u x f o o n r i n l';// your gmail password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
     
                $mail->setFrom('alfoncabonilla@gmail.com');//your gmail
                $mail->addAddress($users['email']);
                $mail->isHTML(true);
     
                $mail->Subject = "You have Returned the Book you Borrow";
              
                $mail->Body = "You have return the book you borrow you can now review the book";
     
                $mail->send();
         }
         elseif($borrowbook['status'] == "overdue"){
            // Book is overdue, add your code here
         }
       
     
         $update_borrowbook = $db->update("borrowbook", $id, [
            "status" => $status,
            "date" => date('Y-m-d H:i:s')
         ]);
    
      }
         else {
            echo "<script>alert('Sorry, the book you are trying to borrow is currently unavailable. Please try again later or choose another book. You will now be redirected to the book borrowing page.')</script>";
            echo "<script>location.replace('ViewBorrowBook.php')</script>";
            
   $delete_borrowbook = $db->delete("borrowbook", $id);
         }

 echo "<script>";
  echo "var left = (screen.width / 2) - (400 / 2);";
  echo "var top = (screen.height / 2) - (200 / 2);";
  echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
  echo "popup.document.write('<h1>Successful!</h1><p>Your book borrowing status has been updated. You will now be redirected to the book borrowing page</p>');";
  echo "setTimeout(function() {";
  echo "popup.close();";
  echo "window.location.href = 'ViewBorrowBook.php';";
  echo "}, 3000);";
  echo "</script>";
    
     
      }
   } else {
      echo "<script>alert('No data found.')</script>";
      echo "<script>location.replace('ViewBorrowBook.php')</script>";
   }
}


else{
   echo "Invalid input.";
}
?>
