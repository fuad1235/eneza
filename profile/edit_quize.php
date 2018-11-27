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
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Edit Swap</h5>';
echo '</div>';
?>
<div id="regarticle">
<form id="form" name="form" method="post" action="edit_quizepros.php">
<ul>
<input name="fr_id" type="hidden" class="inputfield" id="fr_id" readonly value="<?php echo (int)$fid; }?>"/>
<?php
//error_reporting(0);
if ($stmt = $db_conx->prepare("SELECT id, cat_id, question, ans1, ans2, ans3, ans4 FROM quize WHERE id = ? ORDER BY id DESC"));
$stmt->bindParam(1,$fid);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
?>
<li>
Question : <input name="quest" required value="<?php echo sanitize($question);?>" type="text" class="textfeilds" maxlength="255" placeholder="........." />
</li>

<li>
Ans A : <input name="ans1" value="<?php echo sanitize($ans1);?>" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans B : <input name="ans2" value="<?php echo sanitize($ans2);?>" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans C : <input name="ans3" value="<?php echo sanitize($ans3);?>" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans D : <input name="ans4" value="<?php echo sanitize($ans4);?>" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
<input type="submit" id="submit" value="Edit Quize" ><input type="hidden" name="post" value="mmm" > 
</li>
</ul>
</form>
</div>	

</body>
</html>