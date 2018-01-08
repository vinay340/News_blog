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
                echo "<script>window.open('posts.php?approved_id=approved&approved_msg=Approved successfully','_self')</script>";

            }else{
                echo "<script>window.open('posts.php?approved_id=approved&approved_msg=please select POST','_self')</script>";
            }
?>        