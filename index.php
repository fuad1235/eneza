<?php
//error_reporting(0); 
require('classes/config.php');
include "header.php"; 
include "menu.php"; 
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Wecome to the professional training</h5>';
echo '</div>';
?>
<?php
if ($stmt = $db_conx->prepare("SELECT id, course_title FROM course"));
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

echo '<div id="product">'; 

echo  '<li>'; 
echo '<div class="cat_namesa">';
$url = '<a href="models.php?city='.$id.'">'.$course_title.'</a>';
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