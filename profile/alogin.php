<?php
require('config.php');
require('headeruser.php');
include "menu.php";

echo '<div class="subbodys">';
echo '<h5>Admin Log In Page</h5>';
echo '</div>';
?>
<div id="regarticle">
<form action="aloginpros.php" method="post">
<ul>
<li>
Name :
<input name="username" type="text"   class="text" required="required" />
</li>

<li>
Pass : 
<input name="pass" type="password"  class="text" required="required" />
</li>

<li>   
<input name="submit" type="submit" value="Login"  class="login"/>
</li>
<li>
<input name="mm" type="hidden" id="mm" value="login" />
</li>
<li>
</li>
</ul>
</form>
</div>
</header>	
<hr />