<?php
    $sqlInfo = "SELECT * FROM clients WHERE usercode='$usercode'";
    $resultInfo = mysqli_query($conn, $sqlInfo);
    //$resultCheck = mysqli_num_rows($resultInfo); 
    //if($resultCheck > 0) {
        $Info = mysqli_fetch_assoc($resultInfo);            
        $fname = $Info['fname'];
        $lname = $Info['lname'];
        $email = $Info['email'];
        $emailverification = $Info['emailverification'];
        $marital = $Info['marital'];
        $birthday = $Info['birthday'];
        $lname = $Info['lname'];
        $gender = $Info['gender'];
        $mycountry = $Info['mycountry'];
        $mystate = $Info['mystate'];    
        $mylocation = $Info['mylocation'];
        $reason = $Info['reason'];
        $imageupload = $Info['imageupload'];
        $created_at = $Info['created_at'];
        $modified_at = $Info['modified_at'];    
    //}
?>