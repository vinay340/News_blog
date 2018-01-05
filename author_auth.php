<?php
    if((int)$_SESSION["sess_userrole"] !== 2) {
        header("Location: loginform.php");              
        exit();
    }
?>