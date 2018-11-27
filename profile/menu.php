<body>
<div id="nav">
<ul>
<?php
if(isset($logeduser)) {
echo '<li><a href="../index.php">Home</a></li>';
echo '<li>Welcome</li>';
echo '<li><a href="logout.php">Log Out</a></li>';
}	
if(!isset($logeduser)) {
echo '<li><a href="../index.php">Home</a></li>';	
echo '<li><a href="alogin.php">Admin</a></li>';
}
?>
</ul>
</div>