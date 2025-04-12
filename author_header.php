
<?php
      /*  $query = "SELECT `Availability` FROM `reviewer` WHERE `Reviewer ID`= '$reviewer_id'"; // Adjust the query based on your actual database structure
        
        if($raw=mysqli_query($conn,$query)){
                $data = mysqli_fetch_array($raw);
                $cr_status = $data['Availability'];
        }
        else{
            echo "Error Occured";
        }*/
?>
    
    <header>
        <a href="./index.html" class="logo"><span id="logo"><img src="./images/icons8-home-50.png"></span></a>
         <nav class="navbar">
      <!--   <input type="checkbox" id="toggleCheckbox" onchange="updateStatus(this.checked)">  -->
            <a href="pending list.php" id="Pending">Submitted</a>
            <a href="upload_manuscricpt.php"  id="Assigned">Upload Manuscript</a>
            
            
            
            <a href="login.php"  ><img src="./images/account-8.svg"  class="account"></a>

          
            
           
            
         </nav> 
     <hr class="rounded">
    </header>
