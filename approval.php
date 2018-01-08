<?php
    include ("mysql_conn.php");
    $auth_id = $_POST['author_id'];
    
    foreach($auth_id as $i){
        if(isset($_POST['role_'.$i]) ){  
            $role = mysqli_real_escape_string($conn,$_POST['role_'.$i]);
            $sql2 = "UPDATE user SET role_id = $role where id = '$i'";
            $result=mysqli_query($conn,$sql2) or die(mysqli_error());
        }    
    } 
    if($result){
        echo "<script>window.open('admin_ref.php?approved_id=approved&approved_msg=Approved successfully','_self')</script>";

    }else{
        echo "<script>window.open('admin_ref.php?approved_id=approved&approved_msg=please select ROLE','_self')</script>";
        
    }
?>        