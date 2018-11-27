<?php
session_start();
$logeduser= $username;
session_destroy();
$_SESSION['username']=$username;
header("location:../index.php");
exit;
?>