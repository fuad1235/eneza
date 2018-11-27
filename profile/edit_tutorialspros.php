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
$getid		=preg_replace('#[^0-9]#i', '', sanitize($_POST['fr_id']));
$catid	=preg_replace('#[^0-9]#i', '', sanitize($_POST['catid']));
$ad_title	=preg_replace('#[^a-z0-9-_.,() ]#i', '', sanitize($_POST['ad_title']));
$ad_desc	=preg_replace('#[^a-z0-9-_.,(): \s\s+]#i', '', sanitize($_POST['ad_desc']));
$time = time();
	
if ($stmt = $db_conx->prepare("UPDATE content SET content_title=?, content_desc=?, posted=?  WHERE id=? AND cat_id=?"));
$stmt->bindParam(1,$ad_title);
$stmt->bindParam(2,$ad_desc);
$stmt->bindParam(3,$time);
$stmt->bindParam(4,$getid);
$stmt->bindParam(5,$catid);
$stmt->execute();

$url = 'location:content.php?cat='.(int)$catid;
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