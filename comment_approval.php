<?php
    include ("mysql_conn.php");
    include ("auth.php");
        echo "<pre>";print_r($_REQUEST);
            $cmnt_id = $_REQUEST['comment_id'];
            $approver= $_SESSION['sess_user_id'];
            foreach($cmnt_id as $i)
            {
                if(isset($_REQUEST['accept_comment_'.$i]) )
                {  
                    $role = mysqli_real_escape_string($conn,$_REQUEST['accept_comment_'.$i]);

                    $sql2 = "UPDATE comment SET status = 1 , approved_by=$approver where id = '$i'";
                
                    $result=mysqli_query($conn,$sql2) or die(mysqli_error());
                }    
            } 
            if($result)
            {
                $msg = "success";       
                echo "<script type='text/javascript'>alert(<?php echo $msg; ?>);</script>";
                    //echo "<script>window.open('admin_ref.php','_self')</script>";
                     header("Location: comments.php");
            }
?>        