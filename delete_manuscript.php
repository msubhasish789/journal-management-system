<script>
                function alartUser(val){
                    alert(val);
                }
 
           
</script>

<?php 
        session_start();
        if(isset($_SESSION['editor id'])){
           $edid = $_SESSION['editor id'];
        }else{
            header("Location: ./login.php");
        }

        include('connection.php');


        $manuscriptId = $_GET['manuscriptId'];
        $editorId = $_GET['editorId'];

        if($editorId === $edid){
            $qry = "UPDATE `manuscript submission` SET `Status` = '-1' WHERE `manuscript submission`.`Manuscript ID` = $manuscriptId;";
            $j = "";
            if(mysqli_query($conn,  $qry))   {
                $j = "Msg: Successfuly Send to Dumped";
                
                // header("location: review_request_list.php");
            }
            else{
                $j = "Msg: Failed  to Duumped";
            }
            echo '<script> alartUser("' .$j. '"); window.location= "Pending list.php";</script>';
        }else{
            echo "validtion failed";
        }

        
?>

