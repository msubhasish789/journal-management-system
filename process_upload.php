<script>
                function alartUser(val){
                    alert(val);
                }
 
           
</script>
<?php 
    session_start();
    include('connection.php');

    $author_id = $_POST['author_id'];
    $manu_name = $_POST['manu_name'];
    $description = $_POST['description'];

    
    
   
$file_name =  basename($_FILES["fileToUpload"]["name"]);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image


// Check if file already exists
if (file_exists($target_file)) {
  $j = "Sorry, file already exists.";
  $uploadOk = 0;
}else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $qry = "INSERT INTO `manuscript submission` (`Manuscript ID`, `Author ID`, `Submission Date`, `Status`, `Manu Name`, `Description`, `FileContent`) 
                VALUES (null, '$author_id', CURRENT_DATE, '0', '$manu_name', '$description', '$file_name');";

        $data = mysqli_query($conn, $qry);
        if($data != null){
            $j =  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            
            $qry3 = "SELECT max(`Manuscript ID`) as 'man_id' FROM `manuscript submission` WHERE `Author ID` = $author_id;";
            $raw5 =  mysqli_query($conn, $qry3);

            if($raw5 != null){
                while ($arr =  mysqli_fetch_array($raw5)) {
                    $abc = $arr['man_id'];
                  
                }
            }
            echo $abc;
            



            $subjects = isset($_POST['Subjects']) ? $_POST['Subjects'] : [];
           
            $arraySize = count($subjects);
            
            for ($i = 1; $i <= 5; $i++) {
                echo "Iteration $i\n";
            }
           
           
            foreach ($subjects as $index =>  $subject) {
                echo $man_id. "---->";
                $qry2 =  "INSERT INTO `manuscript_subject` (`manuscript_id`, `subject`) 
                VALUES ('$abc', '$subject');";
                if(!mysqli_query($conn,$qry2)){
                    $j = "Something went worng";
                 //   header("Location: view_manuscript.php?manuscriptId=$manuscriptId");
                    break;
                }

            }

            echo '<script> alartUser("' .$j. '"); window.location= "author.php";</script>';
            exit();
        }

       
      } else {
        $j=  "Sorry, there was an error uploading your file.";
    }
}

echo '<script> alartUser("' .$j. '"); window.location= "upload_manuscricpt.php";</script>';






// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
?>