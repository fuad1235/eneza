<?php
//error_reporting(0); 
require_once("config.php");
include_once("clean.php");
?>
<?php
if(isset($_POST['mm']) && $_POST['mm']=="login")
{
$username=preg_replace('#[^a-z0-9]#i', '', sanitize($_POST['username']));
$passwprd=sha1($_POST['pass']);

$stmt = $db_conx->prepare("SELECT * FROM admin WHERE username=? 
AND password=?");
$stmt->bindParam(1,$username);
$stmt->bindParam(2,$passwprd);
$stmt->execute();
$total_recs = $stmt->rowCount();

if($total_recs == 0)
{
header("location:index.php?msg=!!!!! Wrong input check your CAPSLOCK and try again !!!!!");
exit;	
}
if ($total_recs>0)
{
$logeduser= $username;
session_start();
$_SESSION['username']=$username;
header("location:post.php");
exit;
}
else
{
header("location:index.php?msg=!!!! check your CAPSLOCK and try again");
}
}


?>