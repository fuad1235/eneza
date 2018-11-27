<?php
//error_reporting(0);
require('config.php');
include "headeruser.php";  
include "menu.php";
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Edit Questions</h5>';
echo '</div>';
?>
<?php
if(!isset($_GET['q_id'])) {
header("location: index.php");
exit();
}
if(isset($_GET['q_id']))
{
$q_id=preg_replace('#[^0-9]#i','',$_GET['q_id']);

if ($stmt = $db_conx->prepare("SELECT q_id, content FROM questions WHERE post_id=?"));
$stmt->bindParam(1,$q_id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
$url = '<a href="new_quize.php?nqz='.(int)$q_id.'">'.$content.'&nbsp;  - &nbsp; Add to quize</a>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo '<li>'.$decodedUrle.'</li><br />';
}}
?>
