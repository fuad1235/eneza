<?php
//error_reporting(0); 
require('config.php'); 

if (!isset($_POST['post']))
{
header("location: post.php");
exit();
}
if(isset($_POST['post']) && $_POST['post']=='mmm')
{
$post_id	=preg_replace('#[^a-z0-9-_.,() ]#i', '', sanitize($_POST['post_id']));
$quest	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['quest']));	
$ans1	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans1']));
$ans2	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans2']));
$ans3	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans3']));
$ans4	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans4']));
$time = time();

//session_start(); 
//$ad_name = $_SESSION["username"];
if ($stmt = $db_conx->prepare("INSERT INTO quize (cat_id, question, ans1, ans2, ans3, ans4, posted) VALUES(?,?,?,?,?,?,?)"));
$stmt->bindParam(1,$post_id);
$stmt->bindParam(2,$quest);
$stmt->bindParam(3,$ans1);
$stmt->bindParam(4,$ans2);
$stmt->bindParam(5,$ans3);
$stmt->bindParam(6,$ans4);
$stmt->bindParam(7,$time);
//$stmt->bindParam(8,$ad_name);
$stmt->execute();

$url = 'location:allquizes.php?qzs_id='.(int)$post_id.'';
$encodedUrl = urlencode($url);
$decodedUrl = urldecode($encodedUrl);
header($decodedUrl);
exit;
}
else
{
header('location:../deny.php?msg=Edited Failed');
exit;
}
?>