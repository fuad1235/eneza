<?php
//error_reporting(0);
require('config.php');
 
if(!isset($_GET['remove_id'])) {
header("location: post.php");
exit();
}
if(isset($_GET['remove_id'])) {
$id = preg_replace('#[^0-9]#i', '', sanitize($_GET['remove_id']));
{
if ($stmt = $db_conx->prepare("DELETE FROM subjects WHERE id=?"));
$stmt->bindParam(1,$id);
$stmt->execute();

$url = 'location:models.php?city='.(int)$id;
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);
header($decodedUrll);
exit;
}
}
?>