<?php
//error_reporting(0); 
require('config.php'); 
include "headeruser.php";
include "menu.php";
?>
<?php
if(!isset($_GET['city'])) {
header("location: index.php");
exit();
}
if(isset($_GET['city'])){
$selected = (int) $_GET['city'];
?>
<?php 
echo '<div class="subbodys">';
echo '<h5>Subjects</h5>';     
echo '</div>'; 
}	  
?>  
<?php
if ($stmt = $db_conx->prepare("SELECT id,sub_title FROM subjects WHERE sub_id = ? ORDER BY id ASC"));
$stmt->bindParam(1,$selected);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>  
<?php
echo '<div id="product">'; 
echo  '<li>';
 
echo '<div class="cat_namesa">';
$url = '<h2><a href="content.php?cat='.(int)$id.'">'.preg_replace('#[^a-z& ]#i', '', $sub_title).'</a></h2>';
$encodedUrl = urlencode($url);
$decodedUrl = urldecode($encodedUrl);
echo  $decodedUrl; 
echo '</div>';

$url = '<h5><a href="edit_subject.php?edit='.(int)$id.'">Edit Subject</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo $decodedUrle;
echo '<br />';

$url = '<h5><a href="delete_subject.php?remove_id='. (int)($id).'">Delete Subject</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrld = urldecode($encodedUrl);
echo $decodedUrld;
echo '</li>';
echo  '</li>';

}

echo  '<li>'; 
echo '<div class="cat_namesg">';
$url = '<h2><a href="add_subject.php?city='.(int)$selected.'">Add a New Subject</a></h2>';
$encodedUrl = urlencode($url);
$decodedUrl = urldecode($encodedUrl);
echo  $decodedUrl;
echo '</div>';
echo  '</li>';

echo  '</li>';
echo '</div>';

?> 
