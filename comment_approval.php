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
                echo "<script>window.open('comments.php?approved_id=approved&approved_msg=Approved successfully','_self')</script>";

            }else{
                echo "<script>window.open('comments.php?approved_id=approved&approved_msg=please select COMMENT','_self')</script>";
            }
?>        