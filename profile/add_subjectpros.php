<?php
//error_reporting(0); 
require('config.php'); 

if(!isset($_POST['post'])) {
header("location: ../deny.php?msg=you cannot do that");
exit();
}
if(isset($_POST['post']) && $_POST['post']=="mmm")
{
$sub_id = preg_replace('#[^0-9]#i', '', sanitize($_POST['sub_id']));
$subject=nl2br(preg_replace('#[^a-z0-9-_.,(): \s\s+*]#i', '', $_POST['subject']));

if ($stmt = $db_conx->prepare("INSERT INTO subjects (sub_id, sub_title) VALUES(?,?)"));
$stmt->bindParam(1,$sub_id);
$stmt->bindParam(2,$subject);
$stmt->execute();

$url = 'location:models.php?city='.(int)$sub_id;
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);
header($decodedUrll);
exit;
}
else
{
header("location: models.php?msg=Add failed");
exit();
}
?>