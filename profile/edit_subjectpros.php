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
$sub_id		=preg_replace('#[^0-9]#i', '', sanitize($_POST['sub_id']));
$subject	=preg_replace('#[^a-z0-9-_.,() ]#i', '', sanitize($_POST['subject']));
	
if ($stmt = $db_conx->prepare("UPDATE subjects SET sub_id=?, sub_title=? WHERE id=?"));
$stmt->bindParam(1,$sub_id);
$stmt->bindParam(2,$subject);
$stmt->bindParam(3,$fr_id);
$stmt->execute();

$url = 'location:models.php?city='.(int)$fr_id;
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