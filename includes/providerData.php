<?php
    $sqlInfo = "SELECT * FROM specialists WHERE usercode='$usercode'";
    $resultInfo = mysqli_query($conn, $sqlInfo);
    //$resultCheck = mysqli_num_rows($resultInfo); 
    //if($resultCheck > 0) {
        $Info = mysqli_fetch_assoc($resultInfo);            
        $fname = $Info['fname'];
        $lname = $Info['lname'];
        $email = $Info['email'];
        $emailverification = $Info['emailverification'];
        $phone = $Info['phone'];
        $birthday = $Info['birthday'];
        $lname = $Info['lname'];
        $gender = $Info['gender'];
        $mycountry = $Info['mycountry'];
        $mystate = $Info['mystate'];    
        $mylocation = $Info['mylocation'];
        $specialty = $Info['specialty'];
        $imageupload = $Info['imageupload'];
        $created_at = $Info['created_at'];
        $modified_at = $Info['modified_at'];   
        $approvalstatus = $Info['approvalstatus'];  
    //}
?>