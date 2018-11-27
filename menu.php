<body>
<div id="nav">
<ul>
<?php
if(empty($_SESSION["username"])) {
echo '<li><a href="index.php">Home</a></li>';	
echo '<li><a href="log_in.php">Log In</a></li>';
echo '<li><a href="profile/alogin.php">Admin</a></li>';
}	
else if(!empty($_SESSION["username"])) {
echo '<li><a href="index.php">Home</a></li>';	
echo '<li>Welcome</li>';
echo '<li><a href="logout.php">Log Out</a></li>';
}
?>
</ul>
</div>