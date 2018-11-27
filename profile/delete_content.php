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
if ($stmt = $db_conx->prepare("SELECT id, cat_id FROM content WHERE id=?"));
$stmt->bindParam(1,$id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
if ($stmt = $db_conx->prepare("DELETE FROM content WHERE id=?"));
$stmt->bindParam(1,$id);
$stmt->execute();

$url = 'location:content.php?cat='.(int)$cat_id.'';
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);
header($decodedUrll);
exit;
}
}
?>