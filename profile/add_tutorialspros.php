<?php
//error_reporting(0); 
require('config.php'); 

if(!isset($_POST['post'])) {
header("location: ../deny.php?msg=you cannot do that");
exit();
}
if(isset($_POST['post']) && $_POST['post']=="mmm")
{
$catid = preg_replace('#[^0-9]#i', '', sanitize($_POST['catid']));
$unam=nl2br(preg_replace('#[^a-z0-9-_.,(): \s\s+*]#i', '', $_POST['unam']));
$content_title=nl2br(preg_replace('#[^a-z0-9-_.,(): \s\s+*]#i', '', $_POST['content_title']));
$content_desc=nl2br(preg_replace('#[^a-z0-9-_.,(): \s\s+*]#i', '', $_POST['content_desc']));
$time = time();

if ($stmt = $db_conx->prepare("INSERT INTO content (cat_id, content_title, content_desc, u_name, posted) VALUES(?,?,?,?,?)"));
$stmt->bindParam(1,$catid);
$stmt->bindParam(2,$content_title);
$stmt->bindParam(3,$content_desc);
$stmt->bindParam(4,$unam);
$stmt->bindParam(5,$time);
$stmt->execute();

$url = 'location:content.php?cat='.(int)$catid.'';
$encodedUrl = urlencode($url);
$decodedUrll = urldecode($encodedUrl);
header($decodedUrll);
exit;
}
else
{
header("location: models.php?msg=add failed");
exit();
}
?>