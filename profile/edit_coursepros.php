<?php
//error_reporting(0); 
//session_start(); 
require('config.php'); 

if (!isset($_POST['post']))
{
header("location: post.php");
exit();
}
if(isset($_POST['post']) && $_POST['post']=='mmm')
{
$fr_id		=preg_replace('#[^0-9]#i', '', sanitize($_POST['fr_id']));
$course	=preg_replace('#[^a-z0-9-_.,() ]#i', '', sanitize($_POST['course']));
	
if ($stmt = $db_conx->prepare("UPDATE course SET course_title=? WHERE id=?"));
$stmt->bindParam(1,$course);
$stmt->bindParam(2,$fr_id);
$stmt->execute();

$url = 'location:post.php?msg=Swap Edited Succesfully';
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);	
header($decodedUrll);
exit;
}
else
{
header('location:../deny.php?msg=Edited Failed');
exit;
}
?>