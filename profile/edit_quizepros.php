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
$getid = preg_replace('#[^0-9]#i', '', sanitize($_POST['fr_id']));
$quest	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['quest']));	
$ans1	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans1']));
$ans2	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans2']));
$ans3	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans3']));
$ans4	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ans4']));

if ($stmt = $db_conx->prepare("UPDATE quize SET question=?, ans1=?, ans2=?, ans3=?, ans4=?  WHERE id=?"));
$stmt->bindParam(1,$quest);
$stmt->bindParam(2,$ans1);
$stmt->bindParam(3,$ans2);
$stmt->bindParam(4,$ans3);
$stmt->bindParam(5,$ans4);
$stmt->bindParam(6,$getid);
$stmt->execute();

$url = 'location:edit_quize.php?edit='.(int)$getid.'';
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