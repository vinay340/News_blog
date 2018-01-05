<?php
    if((int)$_SESSION["sess_userrole"] !== 1) {
        header("Location: loginform.php");              
        exit();
    }
?>