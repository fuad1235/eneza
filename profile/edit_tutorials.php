<?php 
//error_reporting(0); 
require('config.php'); 
include "headeruser.php";
 include "menu.php";
?>
</ul>
</div>
<?php
if (!isset($_GET['edit']) && !isset($_GET['cat']))
{
header("location: ../deny.php?msg=you cannot do that");
exit();
}
if(isset($_GET['edit']) && $_GET['edit']!='' && isset($_GET['cat']) && $_GET['cat']!='') {
$fid = preg_replace('#[^0-9]#i', '', $_GET['edit']);
$catid =  preg_replace('#[^0-9]#i', '', $_GET['cat']);
{	
if ($stmt = $db_conx->prepare("SELECT id, cat_id, content_title, content_desc, u_name FROM content WHERE id=? AND cat_id=?"));
$stmt->bindParam(1,$fid);
$stmt->bindParam(2,$catid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
}
}
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Edit Tutorials</h5>';
echo '</div>';
?>
<div id="regarticle">
<form id="form" name="form" method="post" action="edit_tutorialspros.php">
<ul>
<input name="fr_id" type="hidden" class="inputfield" id="fr_id" readonly value="<?php echo (int)$id;?>"/>
<input name="catid" type="hidden" class="inputfield" id="un_id" readonly value="<?php echo (int)$catid;?>"/>
<hr>

<li>
Change Item Name <input name="ad_title" required value="<?php echo sanitize($content_title);?>" type="text" class="textfeilds" maxlength="30" placeholder="........." />
</li>

<li>
Change Item Details<br> <textarea name="ad_desc" rows="5" cols="30" maxlength="500"><?php echo sanitize($content_desc);?></textarea>
</li>

<li>
<input type="submit" id="submit" value="Post" ><input type="hidden" name="post" value="mmm" > 
</li>
</ul>
</form>

<?php
if ($stmt = $db_conx->prepare("SELECT id FROM quize WHERE cat_id=?"));
$stmt->bindParam(1,$fid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
$url = '<a href="allquizes.php?qzs_id='.(int)$catid.'">Quizzes</a>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
?>
<li><?php echo $decodedUrle; ?></li>

<?php
$url = '<a href="questions.php?q_id='.(int)$catid.'">Questions</a>';
$encodedUrl = urlencode($url);
$decodedUrle = urldecode($encodedUrl);
?>
<li><?php echo $decodedUrle; ?></li>
</div>	
</div>
