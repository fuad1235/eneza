<?php
//error_reporting(0); 
require('config.php');
//require('p_header.php');
?>
<?php
echo '<div class="subbodys">';
echo 'Add Course';
echo '</div>';	
?>

<div id="allform">
<form action="add_coursepros.php" method="post" enctype="text">
<br/> 
<p>
<input name="course" required="required" class="textarea" type="text"  maxlength="100" size="50">

<br/> 
<p> <input type="submit" id="submit" value="Save Course" ><input type="hidden" name="post" value="mmm" >
</form>	
</div>	

