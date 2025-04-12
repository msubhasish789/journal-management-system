<?php
    session_start();
    if( $_SESSION['author id']=== null){
        header("Location: ./login.php");
    }

    include('connection.php');
    $author_id = $_SESSION['author id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Manuscript</title>
    <link rel ="stylesheet" href="./css/style.css">
</head>
<body style="background-color: #f4f4f4; height: 100vh">
    <div class="login">
        <h1>Upload Manuscript</h1><br><br>
        <form method="post" action="process_upload.php" enctype="multipart/form-data">
            <input type="hidden" id="author_id" name="author_id" value="<?php echo $author_id ?>;">
            <label for="manu_name">Manuscript Name</label><br>
            <input type="name" name="manu_name" placeholder="Enter Manuscript Name" required><br><br>

            <label for="description">Description</label><br>
            <textarea name="description" id="description" rows="4" col="" placeholder="Manuscript Description" required></textarea>
            <br><br>
            <label for="fileToUpload">Upload</label><br>
            <input type="file" name="fileToUpload" id="fileToUpload" placeholder="Upload File" required><br><br>
            
            <label for="Subjects">Subjects </label><br> <br >
            <div class="upload">
                <div class= "sub"> History</div>
                <div> <input type="checkbox" id="History" name="Subjects[]" value="History">  </div> <br>
                <div class= "sub"> Geography</div>
                <div> <input type="checkbox" id="Geography" name="Subjects[]" value="Geography">  </div> <br>
                <div class= "sub"> Maths</div>
                <div> <input type="checkbox" id="Maths" name="Subjects[]" value="Maths">  </div> <br>
               
            </div>
            <br><br>

            <input type="submit" name="submit" value="Submit"  class="btn">
        </form>
        
    </div>
    
</body>
    
</html>



