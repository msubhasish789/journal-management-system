<script>
                function alartUser(val){
                    alert(val);
                }
 
           
</script>

<?php 
        session_start();
        if($_SESSION['editor id']=== null){
            header("Location: ./login.php");
        }

        include('connection.php');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve values from the form
            $reviewer_ids = isset($_POST['reviewer_ids']) ? $_POST['reviewer_ids'] : [];
            $manuscriptId =  $_POST['manuscriptId'];
            $arraySize = count($reviewer_ids);
            
            for ($i = 1; $i <= 5; $i++) {
                echo "Iteration $i\n";
            }
           
            $j = "Request Send Succesfully !!";
            foreach ($reviewer_ids as $index => $reviewer_id) {
                $qry =  "INSERT INTO `review_request_temp` (`Manuscript ID`, `Reviewer ID`) 
                VALUES ('$manuscriptId', '$reviewer_id') ";
                if(!mysqli_query($conn,$qry)){
                    $j = "Something went worng";
                 //   header("Location: view_manuscript.php?manuscriptId=$manuscriptId");
                    break;
                }

            }

            echo '<script> alartUser("' .$j. '"); window.location= "view_manuscript.php?manuscriptId='.$manuscriptId.'";</script>';

        //    header("Location: view_manuscript.php?manuscriptId=$manuscriptId");
        //    echo "Succes";

            
           
        } else {
            // Handle invalid requests or direct access to the script
            echo "Invalid request";
        }
?>