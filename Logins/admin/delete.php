<?php 
    require_once("../config.php");
    require_once("../firebaseRDB.php");
    $id = "";
    $db = new firebaseRDB($databaseURL);
    if (isset($_GET['id'])) {
    
      $id = $_GET['id'];
   
      $data1 = $db->retrieve("users/$id");
      $data1 = json_decode($data1, true);
      $email = $data1['email'];
    } 
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete User</title>
</head>
<body>
    <div class="container">
        <form class="email-form" action="delete1.php" method="post">
            <center><img src="Ebook.png" width="180px"></center>
            <h2>Delete User</h2>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id?>">


            <button type="submit" name="delete">Delete</button>
            <a class="back-link" href="ViewPending.php">Go Back</a>
        </form>
    </div>

   

</body>

<style>
body{
    background-color: wheat;
}
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.email-form {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  padding: 20px;
  width: 400px;
}

.email-form h2 {
  font-size: 24px;
  margin-bottom: 30px;
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 16px;
  font-weight: 700;
  margin-bottom: 10px;
}

.form-group input,
.form-group textarea {
  border: 1px solid #ddd;
  border-radius: 3px;
  font-size: 16px;
  padding: 5px;
  width: 100%;
}

button[type="submit"] {
  background-color: #4CAF50;
  border: none;
  color: #fff;
  font-size: 16px;
  font-weight: 700;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-top: 20px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

.back-link {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  color: #333;
  display: inline-block;
  font-size: 16px;
  font-weight: 700;
  margin-top: 20px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.2s ease-in-out;
}

.back-link:hover {
  background-color: #ddd;
}
</style>

