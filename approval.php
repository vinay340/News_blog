<?php
    include ("mysql_conn.php");
    echo "<pre>";print_r($_REQUEST);
    $auth_id = $_REQUEST['author_id'];
    foreach($auth_id as $i){
        if(isset($_REQUEST['role_'.$i]) ){  
            $role = mysqli_real_escape_string($conn,$_REQUEST['role_'.$i]);
            $sql2 = "UPDATE user SET role_id = $role where id = '$i'";
            $result=mysqli_query($conn,$sql2) or die(mysqli_error());
        }    
    } 
    if($result){
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: admin_ref.php");
    }
?>        