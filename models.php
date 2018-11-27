<?php
//error_reporting(0); 
require('classes/config.php'); 
include "header.php"; 
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
</ul>
</div>
<?php 
echo '<div class="subbodys">';
echo '<h5>Subjects</h5>';     
echo '</div>'; 
}	  
?>  
<?php
if ($stmt = $db_conx->prepare("SELECT id,sub_title FROM subjects WHERE sub_id = ? ORDER BY id ASC "));
$stmt->bindParam(1,$selected);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>  
<?php
echo '<div id="product">'; 
echo  '<li>';
echo '<div class="cat_namesa">';
$url = '<a href="tutorials.php?cat='.(int)$id.'">'.preg_replace('#[^a-z& ]#i', '', $sub_title).'</a>';
$encodedUrl = urlencode($url);
$decodedUrl = urldecode($encodedUrl);
echo  $decodedUrl; 
echo '</div>';

echo  '</li>';
echo '</div>';
}
?> 
</body>
</html>