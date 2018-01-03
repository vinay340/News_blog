<?php
session_start();
if(!isset($_SESSION["sess_username"])) {
    header("Location: loginform.php");              
    exit(); 
}
?>