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
$diff = $current->diff($due);
$totalDays = $diff->days;
if ($totalDays >= 0) {
    $fine = $totalDays * intval($_POST['fine']);
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
            echo "<script>alert('Book added successfully')</script>";
        } else {
            echo "<script>alert('Failed to add book')</script>";
            echo "<script>location.replace('edit.php')</script>";
        }

        $status = "payed";
        $update_borrowbook = $db->update("borrowbook", $id, [
            "status" => $status
        ]);
    } else {
        echo "<script>alert('Book not added to penalty list.')</script>";
    }
} else {
    echo "<script>alert('No fine')</script>";
}

?>
