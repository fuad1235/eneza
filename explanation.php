<?php
//error_reporting(0); 
require('classes/config.php');
include "header.php"; 
include "menu.php"; 
include "time_ago.php"; 
?>
</ul>
</div>

<?php
echo '<div class="subbodys">';
echo '<h5>Explanation</h5>';
echo '</div>';
?>
<?php
if(isset($_GET['dsgnid']) && isset($_GET['dsgnd']))
{	
$post_id= (int)($_GET['dsgnid']);
$name = preg_replace('#[^a-z0-9.-_]#i', '', ($_GET['dsgnd']));

if ($stmt = $db_conx->prepare("SELECT id, content_title, content_desc,  posted, u_name FROM content WHERE u_name = ? AND id = ? "));
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$post_id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
}
echo '<div id="regarticle">';
echo  '<li>'; 
$url = '<a href="explanation.php?dsgnid='.(int)$id.'&dsgnd='.sanitize($u_name).'">';
$encodedUrl = urlencode($url);
$decodedUrls = urldecode($encodedUrl);
echo '<br><h5>&nbsp;&nbsp;'.$decodedUrls.'<span style="color:#000;"></span>'.sanitize(ucwords(strtolower(substr($content_title,0,30)))).'</a></h5>';

echo '<br>';
echo sanitize($content_desc);
echo  '<li>'; 
echo '</div>';
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Quize</h5>';
echo '</div>';

if ($stmt = $db_conx->prepare("SELECT id, cat_id, question, ans1, ans2, ans3,  posted, u_name FROM quize WHERE u_name = ? AND cat_id = ? "));
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$post_id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

echo '<div id="product">';

echo '<br />';
echo '<li>'.$question.'</li>';
echo '<br />';
echo '<li>'.$ans1.'</li>';
echo '<li>'.$ans2.'</li>';
echo '<li>'.$ans3.'</li>';
}
?>

<?php include("comment.php"); ?>
</body>
</html>