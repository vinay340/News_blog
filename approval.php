<?php
    include ("mysql_conn.php");
    $auth_id = $_REQUEST['author_id'];
    
    foreach($auth_id as $i){
        if(isset($_REQUEST['role_'.$i]) ){  
            $role = mysqli_real_escape_string($conn,$_REQUEST['role_'.$i]);
            $sql2 = "UPDATE user SET role_id = $role where id = '$i'";
            $result=mysqli_query($conn,$sql2) or die(mysqli_error());
        }    
    } 
    if($result){
        echo '<div class="container">
                        <div class="page-header">
                            <h3>Registration successfully completed</h3>
                        </div>
                    </div>;';
        header("Location: admin_ref.php");
    }
?>        