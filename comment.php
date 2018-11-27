<div id="inputarticle">
<article class="inputtopcomment">
<form method="post" type="text">
<input type="hidden" name="post_id" value="<?php echo preg_replace('#[^0-9]#i','',$post_id); ?>">
<input type="hidden" name="user_id" value="<?php echo $u_name; ?>">
<textarea name="comment_content" maxlength=" 200"  rows="2" cols="28" style="text-align:left;"  required></textarea><br>
<input type="submit" id="signupbtn" name="comment" value="Ask a question">
</form>
</article>
</div>
</div>
</div>
</br>
<?php

if (isset($_POST['comment'])){
$comment_content = preg_replace('#[^a-z 0-9-_.,(): \s\s+]#i', '', $_POST['comment_content']);
$time = time();

$string= $comment_content;
if (strlen($string) > 200 ) {
echo 'Your comment is too long. Please make it short';
exit();
}
if ($stmt = $db_conx->prepare("insert into questions (content,date_posted,student_id,post_id) values (?,?,?,?)"));
$stmt->bindParam(1,$comment_content);
$stmt->bindParam(2,$time);
$stmt->bindParam(3,$u_name);
$stmt->bindParam(4,$post_id);
$stmt->execute();

Header('Location:./explanation.php?dsgnid='.$post_id.'&dsgnd='.$u_name.'');              
}
?>
<?php
if ($stmt = $db_conx->prepare("SELECT c.q_id, c.post_id, c.student_id, c.content, c.date_posted, a.id, a.username FROM questions AS c LEFT JOIN students AS a ON a.id = c.student_id WHERE c.post_id = ?"));
$stmt->bindParam(1,$post_id);
$stmt->execute();
$num_rows = $stmt->rowCount();
if($num_rows == 0)
{ 	
echo '<div class="leavecomm">';
echo "<br/>&nbsp;&nbsp;&nbsp; <br/>&nbsp;&nbsp;&nbsp;Be the first to ask a question <br/><br/><br/><br/>";
exit;
echo '</div>';	
}  
if ($stmt = $db_conx->prepare("SELECT c.q_id, c.post_id, c.student_id, c.content, c.date_posted, a.id, a.username FROM questions AS c LEFT JOIN students AS a ON a.id = c.student_id WHERE c.post_id = ? ORDER BY q_id DESC"));
$stmt->bindParam(1,$post_id); 		
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

$comment = $content;
$q_id = $q_id;
$date       = $date_posted;

echo '<div id="regarticle">';
{
echo '<a><h5>'.sanitize($comment,ENT_QUOTES).'</a></h5>';	
}
echo '<h5>'.timeBetween($date,time()).'<h5>';			
echo '</div>';
echo '<br /><br />';
?>
</div>
</br>   
<?php
}
?>
<?php 

