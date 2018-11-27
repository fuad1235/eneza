<?php 
//error_reporting(0);
require('config.php');
include "headeruser.php"; 
include "menu.php";  
?>
<?php
if(!isset($_GET['cat'])) {
header("location: index.php");
exit();
}
if(isset($_GET['cat']))
{
$catid=preg_replace('#[^0-9]#i','',$_GET['cat']);

if ($stmt = $db_conx->prepare("SELECT id,sub_title FROM subjects WHERE id = ?"));
$stmt->bindParam(1,$catid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

echo '<div class="subbodys">';	
echo '<h5>'.sanitize($sub_title).'</h5>';     
echo '</div>'; 
}
?>
<div id="regarticle">
<?php
if ($stmt = $db_conx->prepare("SELECT id, content_title, content_desc, u_name, posted FROM content WHERE cat_id=? "));
$stmt->bindParam(1,$catid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

echo  '<li>'; 
$url = '<h4><a href="../explanation.php?dsgnid='.(int)$id.'&dsgnd='.sanitize($u_name).'">'.preg_replace('#[^a-z& ]#i', '', $content_title).'</a></h4>';
$encodedUrl = urlencode($url);
$decodedUrls = urldecode($encodedUrl);
echo $decodedUrls;

echo '<br />';
$url = '<h5><a href="edit_tutorials.php?edit='.(int)$id.'&cat='.(int)$catid.'">Edit Tutorials</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo $decodedUrle;
echo '<br />';

$url = '<h5><a href="delete_content.php?remove_id='. (int)($id).'">Delete Tutorials</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrld = urldecode($encodedUrl);
echo $decodedUrld;
echo '</li>';
echo '<br />';
}
}
echo '<p>';
$url = '<h5><a href="add_tutorials.php?cat='.(int)$catid.'&un='.sanitize($u_name).'">Add Tutorials</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo $decodedUrle;
echo '<p>';
?>
</div>
