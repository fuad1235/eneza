<?php 
//error_reporting(0);
require('classes/config.php'); 
include "header.php"; 
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
?>
<?php
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

echo '<li>'; 
$url = '<a href="explanation.php?dsgnid='.(int)$id.'&dsgnd='.sanitize($u_name).'">';
$encodedUrl = urlencode($url);
$decodedUrls = urldecode($encodedUrl);
echo '<h5>'.$decodedUrls.'<span style="color:#000;"></span>'.sanitize(ucwords(strtolower(substr($content_title,0,30)))).'</a></h5>';
echo '</li>';

}}
?>
</div>
</body>
</html>