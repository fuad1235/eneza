<?php
//error_reporting(0); 
require('config.php'); 

if(!isset($_POST['post'])) {
header("location: ../deny.php?msg=you cannot do that");
exit();
}
if(isset($_POST['post']) && $_POST['post']=="mmm")
{
$course=nl2br(preg_replace('#[^a-z0-9-_.,(): \s\s+*]#i', '', $_POST['course']));

if ($stmt = $db_conx->prepare("INSERT INTO course (course_title) VALUES(?)"));
$stmt->bindParam(1,$course);
$stmt->execute();

$url = 'location:post.php?msg=Uploding SuccessFull';
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);
header($decodedUrll);
exit;
}
else
{
header("location: post.php?msg=add failed");
exit();
}
?>