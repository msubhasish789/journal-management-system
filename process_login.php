<?php 
    session_start();
    include('connection.php');

    $role = $_POST['role'];
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];


    if($role == 1){
        $qry = "SELECT * FROM `editor` WHERE `Email` = '$login_id' AND `password`= '$password' LIMIT 1";
        $raw=mysqli_query($conn,$qry);

        if( $data = mysqli_fetch_array($raw))
        {
            $_SESSION['editor id'] = $data['Editor ID'];
            header("Location: Pending list.php");
            exit();

        }
        else {
            // Incorrect credentials
            echo "Incorrect Editor ID or Password. Please try again.";
        }
        
    }
    elseif($role == 2){
        $qry = "SELECT * FROM `author` WHERE `Email` = '$login_id' AND `password`= '$password' LIMIT 1";
        $raw=mysqli_query($conn,$qry);
        
        if($data = mysqli_fetch_array($raw))
        {
           
            $_SESSION['author id'] = $data['Author ID'];
           // echo $data['author id'];
            header("Location: author.php");
            exit();

        }
        else {
            // Incorrect credentials
            echo "Incorrect Author ID or Password. Please try again.";
        }
        
    }
    elseif($role == 3){
        $qry = "SELECT * FROM `reviewer` WHERE `Email` = '$login_id' AND `password`= '$password' LIMIT 1";
        $raw=mysqli_query($conn,$qry);
        
        if($data = mysqli_fetch_array($raw))
        {
            $_SESSION['reviewer id'] = $data['Reviewer ID'];
          //  echo $data['Reviewer ID'];
            header("Location: review_request_list.php");
            exit();

        }
        else {
            // Incorrect credentials
            echo "Incorrect Reviewer ID or Password. Please try again.";
        }
        
    }
    else{
        echo "Something Went wrong";
    }

?>