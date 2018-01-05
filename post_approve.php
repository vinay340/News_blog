<?php
    include ("mysql_conn.php");
        echo "<pre>";print_r($_REQUEST);
            $post_id = $_REQUEST['post_id'];
            foreach($post_id as $i)
            {
                if(isset($_REQUEST['accept_post_'.$i]) )
                {  
                    $role = mysqli_real_escape_string($conn,$_REQUEST['accept_post_'.$i]);

                    $sql2 = "UPDATE news SET status = 1 where id = '$i'";
                
                    $result=mysqli_query($conn,$sql2) or die(mysqli_error());
                }    
            } 
            if($result)
            {
                    //echo "<script>window.open('admin_ref.php','_self')</script>";
                    header("Location: posts.php");
            }
?>        