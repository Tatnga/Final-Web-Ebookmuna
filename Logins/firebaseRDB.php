<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
include("config.php");

require __DIR__ . '/../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

class firebaseRDB {
    private $url;
    
    public function __construct($url) {
       $this->url = $url;
    }
 
   public function grab($url, $method, $par=null){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      if(isset($par)){
         curl_setopt($ch, CURLOPT_POSTFIELDS, $par);
      }
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 120);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      $html = curl_exec($ch);
      return $html;
      curl_close($ch);
   }
 
   
   public function createUser($email, $password)
   {
      try {
          $factory = (new Factory)->withServiceAccount(__DIR__ . '/../appdt-2cc36-firebase-adminsdk-n62h1-8224af3d8f.json');
          $auth = $factory->createAuth();
   
          $userProperties = [
              'email' => $email,
              'password' => $password,
          ];
   
          $createdUser = $auth->createUser($userProperties);
   
          return $createdUser->uid;
      } catch (\Exception $e) {
          // Log the error message
          error_log("Error creating user: " . $e->getMessage());
   
          // Return a response indicating that an error occurred
          return [
              'error' => true,
              'message' => $e->getMessage()
          ];
      }
   }
   
   public function uploadImageToStorage($file, $folderName)
{
    try {
        $projectId = "appdt-2cc36";
        $keyFilePath = (__DIR__ . '/../appdt-2cc36-firebase-adminsdk-n62h1-8224af3d8f.json');

        // Create a new instance of the Firebase Storage object
        $storage = new \Google\Cloud\Storage\StorageClient([
            'projectId' => $projectId,
            'keyFilePath' => $keyFilePath,
            'debug' => true
        ]);

        // Get the bucket object for the Firebase Storage bucket
        $bucket = $storage->bucket('appdt-2cc36.appspot.com');

        if (is_string($file)) {
            $fileContent = $file;
            $fileExtension = 'jpeg'; // Default extension for string data
        } elseif (is_array($file)) {
            // Get the file contents
            $fileContent = file_get_contents($file['tmp_name']);
            // Get the file extension of the uploaded file
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        } else {
            throw new \Exception('$file must be an array or string.');
        }

        // Generate a unique name for the file
        $fileName = uniqid() . "." . $fileExtension;

        // Upload the file to the specified folder in Firebase Storage
        $object = $bucket->upload(
            $fileContent,
            [
                'name' => $folderName . "/" . $fileName
            ]
        );

        // Generate the image URL in the desired format
        $url = $object->signedUrl(
            new \DateTime('+1 year'),
            [
                'version' => 'v2',
                'action' => 'read',
            ]
        );

        // Return the image URL
        return $url;
    } catch (\Exception $e) {
        // Log the error message
        error_log("Error uploading file to Firebase Storage: " . $e->getMessage());

        // Return a response indicating that an error occurred
        return [
            'error' => true,
            'message' => $e->getMessage()
        ];
    }
}



   public function insert($table, $parentNode, $data){
      // Update the $data parameter to be an associative array with the parent node name as the key
      $path = $this->url."/$table/$parentNode.json";
      $grab = $this->grab($path, "PUT", json_encode($data));
      return $grab;
   }


   public function update($table, $uniqueID, $data){
      $path = $this->url."/$table/$uniqueID.json";
      $grab = $this->grab($path, "PATCH", json_encode($data));
      return $grab;
   }

   public function delete($table, $uniqueID){
      $path = $this->url."/$table/$uniqueID.json";
      $grab = $this->grab($path, "DELETE");
      return $grab;
   }
   

   public function retrieve($dbPath, $queryKey=null, $queryType=null, $queryVal =null){
      if(isset($queryType) && isset($queryKey) && isset($queryVal)){
         $queryVal = urlencode($queryVal);
         if($queryType == "EQUAL"){
               $pars = "orderBy=\"$queryKey\"&equalTo=\"$queryVal\"";
         }elseif($queryType == "LIKE"){
               $pars = "orderBy=\"$queryKey\"&startAt=\"$queryVal\"";
         }
      }
      $pars = isset($pars) ? "?$pars" : "";
      $path = $this->url."/$dbPath.json$pars";
      $grab = $this->grab($path, "GET");
      return $grab;
   }
   
   public function saveExcelToFirebase($table, $parentNode, $excelPath) {
    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($excelPath);
    $worksheet = $spreadsheet->getActiveSheet();
    $db = new firebaseRDB("https://appdt-2cc36-default-rtdb.firebaseio.com/");
    $data1 = $db->retrieve($parentNode);
    $data1 = json_decode($data1, 1);
    $headerRow = $worksheet->toArray()[0];
    $rowIterator = $worksheet->getRowIterator();
    $firstRowSkipped = false;
    $data = array();
    if ($data1 !== null && is_array($data1)) {
        $count = count($data1);
    } else {
        $count = 0;
    }
    foreach ($rowIterator as $row) {
        if (!$firstRowSkipped) {
            $firstRowSkipped = true;
            continue; // skip the first row
        }
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Include empty cells in the iterator
        $rowData = array();
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }

        // Remove the column keys
        $rowData = array_values($rowData);

        // Check if bookname already exists
        $bookname = strval($rowData[0]);
        $book_exists = false;
        foreach ($data1 as $key => $value) {
            if (isset($value['bookname']) && $value['bookname'] === $bookname) {
                $book_exists = true;
                break;
            }
        }

        if ($book_exists) {
            // Prompt user that the bookname already exists
            echo "Bookname '{$bookname}' already exists. Skipping...\n";
            continue;
        }

        $b1 = array(
            'bookname' => $bookname,
            'bookauthor' => strval($rowData[1]),
            'bookcatalog' => strval($rowData[2]),
            'bookcourse' => strval($rowData[3]),
            'bookyear' => strval($rowData[4]),
            'bookquantity' => strval($rowData[5]),
            'bookdatepublish' => strval($rowData[6]),
            'book_image_url' => "",
            'description' => strval($rowData[7]),
            'totalbookborrowed' => strval($rowData[8]),
            'averagereview' => strval($rowData[9]),
            'totalreview' => strval($rowData[10]),
            'totaldays' => strval($rowData[11]),
            'childno' =>  strval($count+1),
            'date' => date('Y-m-d H:i:s')
        );

        // Increment count for each row
        $count++;

        // Insert the data with the corresponding count
        $db->insert($parentNode, $count, $b1);
    }
}

public function saveExcelToFirebase1($table, $parentNode, $excelPath) {
    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($excelPath);
    $worksheet = $spreadsheet->getActiveSheet();
    $db = new firebaseRDB("https://appdt-2cc36-default-rtdb.firebaseio.com/");
    $data1 = $db->retrieve($parentNode);
    $data1 = json_decode($data1, 1);
    $headerRow = $worksheet->toArray()[0];
    $rowIterator = $worksheet->getRowIterator();
    $firstRowSkipped = false;
    $data = array();
    if ($data1 !== null && is_array($data1)) {
        $count = count($data1);
    } else {
        $count = 0;
    }
    // Initialize Firebase Admin SDK
    $factory = (new Factory)->withServiceAccount(__DIR__ . '/../appdt-2cc36-firebase-adminsdk-n62h1-8224af3d8f.json');
    $database = $factory->createDatabase();
    $auth = $factory->createAuth();
    foreach ($rowIterator as $row) {
        if (!$firstRowSkipped) {
            $firstRowSkipped = true;
            continue; // skip the first row
        }
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Include empty cells in the iterator
        $rowData = array();
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }
        $rowData = array_values($rowData);
    
        $b1 = array(
            'address' => strval($rowData[0]),
            'childno' =>  strval($count+1),
            'contact' => strval($rowData[1]),
            'email' => strval($rowData[2]),
            'name' => strval($rowData[3]),
            'password' => strval($rowData[4]),
            'penalty' => strval($rowData[5]),
            'registration_date' => strval($rowData[6]),
            'status' => strval($rowData[7]),
            'totalbook' => strval($rowData[8]),
            'totalborrow' => strval($rowData[9]),
            'totalpending' => strval($rowData[10]),
            'totalreturn' => strval($rowData[11]),
            'totalreview' => strval($rowData[12]),
            'user_type' => strval($rowData[13]),
            'usercourse' => strval($rowData[14]),
            'useridno' => strval($rowData[15]),
            'useryear' => strval($rowData[16]),
            'date' => date('Y-m-d H:i:s')
        );
    
        // Check if the email already exists in Firebase Authentication
        $email = $b1['email'];
        $emailExists = false;
        try {
            $user = $auth->getUserByEmail($email);
            if ($user !== null) {
                $emailExists = true;
            }
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            // User does not exist in Firebase Authentication, do nothing
        }
        
        if ($data === null) {
          // do nothing
        } else if (count($data) > 0) {
            foreach ($data as $users) {
                if ($users['email'] === $_POST['email']) {
                    $emailExists = true;
                    break;
                }
            }
        }
        
        if ($data !== null && is_array($data)) {
            $count = count($data);
        } else {
            $count = 0;
        }
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format')</script>";
            echo "<script>location.replace('register.php')</script>";
        } else if ($emailExists) {
            echo "<script>alert('Email already exists in database or Firebase Authentication')</script>";
            echo "<script>location.replace('register.php')</script>";
        }
        else {
        if (!$emailExists) {
            $database->getReference($table)->push($b1);
            $count++;
            
                    $db->insert($parentNode, $count, $b1);
                } else {
                    echo "Email $email already exists in Firebase Authentication or Realtime Database. Skipping data for this user.<br>";
                }
            }
            echo "Data import completed.<br>";

        }
    }
}