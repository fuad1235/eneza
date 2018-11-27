<?php
//error_reporting(0); 
require('config.php');
include "headeruser.php"; 
?>
<?php
echo '<div class="subbodys">';
echo 'Add Subject';
echo '</div>';

if(isset($_GET['nqz']))
{
$nqz=preg_replace('#[^0-9]#i','',$_GET['nqz']);	

if ($stmt = $db_conx->prepare("SELECT q_id,post_id,content FROM questions WHERE q_id = ?"));
$stmt->bindParam(1,$nqz);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
}
?>

<div id="regarticle">
<form action="new_quizepros.php" method="post" enctype="text">
<input name="post_id" type="hidden" class="inputfield" readonly value="<?php echo (int)$post_id; }?>"/>
<ul>
<li>
Question : <input name="quest" required value="<?php echo sanitize($content);?>" type="text" class="textfeilds" maxlength="255" placeholder="........." />
</li>

<li>
Ans A : <input name="ans1" class="textarea" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans B : <input name="ans2" class="textarea" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans C : <input name="ans3" class="textarea" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>
Ans D : <input name="ans4" class="textarea" type="text" class="textfeilds" maxlength="225" placeholder="........." />
</li>
<li>

<br/> 
<p> <input type="submit" id="submit" value="Save as Quize" ><input type="hidden" name="post" value="mmm" >
</ul>
</form>	
</div>	

