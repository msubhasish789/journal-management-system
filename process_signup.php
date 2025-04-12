<script>
                function alartUser(val){
                    alert(val);
                }
 
           
</script>


<?php
        session_start();
        include('connection.php');

        //Problem with contact number

        //$authorId = generateAuthorId();
        //$editorId = generateEditorId();
        //$reviewerId = generateReviewerId();
        $role = $_POST['role'];
        $fname = $_POST['fname'];
        $contact = $_POST['cont'];
        $email = strtolower($_POST['emai']);  
        $password = $_POST['password'];  
    
        switch ($role) {
            case 1: // Editor
                $sql = "INSERT INTO editor (Name, Contact, Email, Password) 
                        VALUES ('$fname', '$contact', '$email', '$password')";
                break;
            case 2: // Author
                $sql = "INSERT INTO author (Name, Contact, Email, Password)
                        VALUES ('$fname', '$contact', '$email', '$password')";
                break;
            case 3: // Reviewer
                $sql = "INSERT INTO reviewer (Name, Contact, Email, Password)
                        VALUES ('$fname', '$contact', '$email', '$password')";
                break;
            default:
                die("Invalid role");
        }
        $j = "";

        if ($conn->query($sql) === TRUE) {
            $j = "Registration Succesfull ";
           
        } else {

            $j = "Error: " . $conn->error;
           
          //  header("Location: signup.php"); 

        }
        echo '<script> alartUser("' .$j. '"); window.location= "signup.php";</script>';


        function generateRandomNumber($length) {
            $min = pow(10, ($length - 1));
            $max = pow(10, $length) - 1;
            return str_pad(mt_rand($min, $max), $length, '0', STR_PAD_LEFT);
        }
        /*
        function generateAuthorId() {
            return 'AUT' . generateRandomNumber(4);
        }
        
        function generateEditorId() {
            return 'EDI' . generateRandomNumber(4);
        }
        function generateReviewerId() {
            return 'REV' . generateRandomNumber(4);
        }
        */


    
        $conn->close();
    
?>

