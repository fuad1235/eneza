<?php 
//error_reporting(0); 
require('config.php'); 
include "headeruser.php"; 
include "menu.php"; 
?>
<?php
if (!isset($_GET['edit']))
{
header("location: ../deny.php?msg=you cannot do that");
exit();
}
if(isset($_GET['edit']) && $_GET['edit']!='') {
$fid = preg_replace('#[^0-9]#i', '', $_GET['edit']);
{	
if ($stmt = $db_conx->prepare("SELECT id, sub_id, sub_title FROM subjects WHERE id=?"));
$stmt->bindParam(1,$fid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
}
}
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Edit Swap</h5>';
echo '</div>';
?>
<div id="regarticle">
<form id="form" name="form" method="post" action="edit_subjectpros.php">
<ul>
<input name="fr_id" type="hidden" class="inputfield" id="fr_id" readonly value="<?php echo $id;?>"/>
<input name="sub_id" type="hidden" class="inputfield" id="sub_id" readonly value="<?php echo $sub_id;?>"/>
<hr>

<li>
Edit Subject : <input name="subject" required value="<?php echo sanitize($sub_title);?>" type="text" class="textfeilds" maxlength="30" placeholder="........." />
</li>

<li>
<input type="submit" id="submit" value="Post" ><input type="hidden" name="post" value="mmm" > 
</li>
</ul>
</form>
</div>	
