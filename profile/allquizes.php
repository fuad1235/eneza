<?php
//error_reporting(0);
require('config.php');
include "headeruser.php";
include "menu.php";  
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Edit Quize</h5>';
echo '</div>';
?>
<?php
if(!isset($_GET['qzs_id'])) {
header("location: index.php");
exit();
}
if(isset($_GET['qzs_id']))
{
$qzs_id=preg_replace('#[^0-9]#i','',$_GET['qzs_id']);

if ($stmt = $db_conx->prepare("SELECT id, cat_id, question FROM quize WHERE cat_id=?"));
$stmt->bindParam(1,$qzs_id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

$url = '<a href="edit_quize.php?edit='.(int)$id.'">'.$question.' - &nbsp;&nbsp;&nbsp;Click to Edit Quize</a>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo '<li>'.$decodedUrle.'</li><br />'; 
}}
?>