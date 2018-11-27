<?php
//error_reporting(0); 
require('config.php'); 
include "headeruser.php"; 
include "menu.php"; 
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Wecome to your professional course</h5>';
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

$url = '<h5><a href="edit_course.php?edit='.(int)$id.'">Edit Course</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
echo $decodedUrle;
echo '<br />';

$url = '<h5><a href="delete_course.php?remove_id='. (int)($id).'">Delete Course</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrld = urldecode($encodedUrl);
echo $decodedUrld;
echo '</li>';
echo  '</li>';
}

echo  '<li>'; 
echo '<div class="cat_namesg">';
$url = '<h5><a href="add_course.php">Add a New Course</a></h5>';
$encodedUrl = urlencode($url);
$decodedUrl = urldecode($encodedUrl);
echo  $decodedUrl;
echo '</div>';
echo  '</li>';

echo '</div>';
?>
</body>
</html>