<?php
include("../config.php");
include("../firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$data = $db->retrieve("penalty");
$data = json_decode($data, 1);
$data1 = $db->retrieve("borrowbook");
$data1 = json_decode($data1, 1);

$id = $_POST['id'];

if ($data !== null && is_array($data)) {
    $count = count($data);
} else {
    $count = 0;
}

$currentDateTime = date('Y-m-d H:i:s');
$dueDate = $_POST['duedate'];
$current = new DateTime($currentDateTime);
$due = new DateTime($dueDate);
$interval = new DateInterval('P1D'); // 1 day interval
$period = new DatePeriod($current, $interval, $due);
$fine = 0;
foreach($period as $date) {
    if($date->format('N') >= 6) { // exclude Saturday and Sunday
        continue;
    }
    $fine += intval($_POST['fine']);
}
if ($fine > 0) {
    echo "<script>alert('Total fine is: $fine')</script>";

    echo $confirm =  "<script>
    var result = confirm('Do you want to add the book to penalty list?');
    if (result === true) {
        window.location.href = 'ViewNotification.php?id=$id'; 
    } else {
        window.location.href = 'ViewNotification.php?id=$id';
    }
</script>";
    if ($confirm == 'yes') {
        $totalbookborrowed = "0";
        $insert = $db->insert("penalty", $count, [
            "penaltytype" => $_POST['penaltytype'],
            "currentid" => $count,
            "bookname" => $_POST['bookname'],
            "borrowername" => $_POST['borrowername'],
            "dateborrow" => $_POST['dateborrow'],
            "duedate" => $_POST['duedate'],
            "fine" => $fine,
        ]);

        if ($insert) {
            
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Successful!</h1><p>Penalty Successfuly Added</p>');";
    echo "setTimeout(function() {";
    echo "popup.close();";
    echo "window.location.href = 'ViewNotification.php';";
    echo "}, 3000);";
    echo "</script>";
        } else {
       
            
    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>Failed to add penalty</p>');";
    echo "setTimeout(function() {";
    echo "popup.close();";
    echo "window.location.href = 'ViewNotification.php';";
    echo "}, 3000);";
    echo "</script>";
        }

        $status = "payed";
        $update_borrowbook = $db->update("borrowbook", $id, [
            "status" => $status
        ]);
    } else {
        echo "<script>alert('Book not added to penalty list.')</script>";
    }
} else {


    echo "<script>";
    echo "var left = (screen.width / 2) - (400 / 2);";
    echo "var top = (screen.height / 2) - (200 / 2);";
    echo "var popup = window.open('', 'mypopup', 'width=400,height=200,left='+left+',top='+top);";
    echo "popup.document.write('<h1>Failed!</h1><p>No fine</p>');";
    echo "setTimeout(function() {";
    echo "popup.close();";
    echo "window.location.href = 'ViewNotification.php';";
    echo "}, 3000);";
    echo "</script>";
}
?>
