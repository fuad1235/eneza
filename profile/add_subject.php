<?php
//error_reporting(0); 
require('config.php');
//require('p_header.php');
?>
<?php
echo '<div class="subbodys">';
echo 'Add Subject';
echo '</div>';

if(isset($_GET['city']))
{
$catid=preg_replace('#[^0-9]#i','',$_GET['city']);	
?>

<div id="allform">
<form action="add_subjectpros.php" method="post" enctype="text">
<input name="sub_id" type="hidden" class="inputfield" readonly value="<?php echo (int)$catid; }?>"/>
<br/> 
<p>
<input name="subject" required="required" class="textarea" type="text"  maxlength="100" size="50">

<br/> 
<p> <input type="submit" id="submit" value="Save Course" ><input type="hidden" name="post" value="mmm" >
</form>	
</div>	

