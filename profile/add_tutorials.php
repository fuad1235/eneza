<?php
//error_reporting(0); 
require('config.php');
//require('p_header.php');
?>
<?php
echo '<div class="subbodys">';
echo 'Add Subject';
echo '</div>';

if(isset($_GET['cat']) && $_GET['cat']!='' && isset($_GET['un']) && $_GET['un']!='') {
$catid = preg_replace('#[^0-9]#i', '', $_GET['cat']);
$unam =  preg_replace('#[^a-z0-9.-_]#i', '', sanitize($_GET['un']));	
?>

<div id="allform">
<form action="add_tutorialspros.php" method="post" enctype="text">
<input name="catid" type="hidden" class="inputfield" readonly value="<?php echo (int)$catid; ?>"/>
<input name="unam" type="hidden" class="inputfield" readonly value="<?php echo sanitize($unam); }?>"/>
<br/> 
<li>
Topic :  <input name="content_title" required type="text" class="textarea" maxlength="100" />
</li>
<p>
<li>
Explanation : <br> <textarea name="content_desc" rows="5" cols="30" maxlength="500"></textarea>
</li><br/> 
<p> <input type="submit" id="submit" value="Save Course" ><input type="hidden" name="post" value="mmm" >
</form>	
</div>	

