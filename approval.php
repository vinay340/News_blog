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
                //echo "<script>window.open('admin_ref.php','_self')</script>";
                header("Location: admin_ref.php");
            }
        ?>        