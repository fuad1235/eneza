<?php
//error_reporting(0); 
require('classes/config.php');
include "header.php";
include "menu.php";

if(!empty($_SESSION['username'])) {
header("location: index.php");
exit();
}
if (isset($_POST['formsubmitted'])) {
// If user is already logged in, header that weenis away
?><?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["email"])){
// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
$e = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$p = md5($_POST['password']);
// GET USER IP ADDRESS
$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
// FORM DATA ERROR HANDLING
if($e == "" || $p == ""){
echo "login_failed";
exit();
}} 
else {
// END FORM DATA ERROR HANDLING
$active = (int)1;
if ($stmt = $db_conx->prepare("SELECT id, username, password, email FROM students WHERE email=? AND password=? AND activation=? LIMIT 1"));
$stmt->bindParam(1,$e);
$stmt->bindParam(2,$p);
$stmt->bindParam(3,$active);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);

$newid = (int)$id;
$newusername = $username;
$newemail = $email;

$_SESSION['userid'] = $newid;
$_SESSION['username'] = $newusername;
$_SESSION['email'] = $newemail;

setcookie("id", $newid, strtotime( '+30 days' ), "/", "", "", TRUE);
setcookie("user", $newusername, strtotime( '+30 days' ), "/", "", "", TRUE);
setcookie("email", $newemail, strtotime( '+30 days' ), "/", "", "", TRUE); 
// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
$time = date("Y-m-d H:i:s");
if ($stmt = $db_conx->prepare('UPDATE students SET ip=?, signup=? WHERE username=? LIMIT 1'));
$stmt->bindParam(1,$ip);
$stmt->bindParam(2,$time);
$stmt->bindParam(3,$newusername);
$stmt->execute();
}
header("Location: index.php");
}
//exit();
}
?>
<?php
echo '<div class="subbodys">';
echo '<h5>Log In Page</h5>';
echo '</div>';
?>
<div id="regarticle">
<form action="log_in.php" method="post" class="login_form">

<li><a href='register.php'>Create New Account</a></li>

<li>
Email Address:
<input type="text" id="email" name"email" maxlength="100">
</li>

<li>
Password:
<input type="password" id="password" name"password" maxlength="100">
<br /><br />
</li>

<li>
<div class="submit">
<input type="hidden" name="formsubmitted" value="TRUE" />
<input type="submit" value="Log In" />
</div>
</li>

</form>
</div>

</body>
</html>