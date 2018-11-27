<?php
require('classes/config.php');
include "header.php";
include "menu.php";

if (isset($_POST['formsubmitted'])) {
$error = array();//Declare An Array to store any error message  
if (empty($_POST['name'])) {//if no name has been supplied 
$error[] = 'Please Enter a name ';//add to array "error"
} else {
$name = $_POST['name'];//else assign it a variable
}
if (empty($_POST['email'])) {
$error[] = 'Please Enter your email ';
} else {
if ($_POST['email']) {
//regular expression for email validation
$email = $_POST['email'];
} else {
$error[] = 'Your EMail Address is invalid  ';
}
}
if (empty($_POST['password'])) {
$error[] = 'Please Enter Your password ';
} else {
$password = md5($_POST['password']);
}
if (empty($error)) //send to Database if there's no error '
{ // If everything's OK...

// Make sure the email address is available:
if ($result_verify_email = $db_conx->prepare("SELECT email FROM students  WHERE email =?"));
$result_verify_email->bindParam(1,$email);
$rowCount = $result_verify_email->rowCount();

if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
echo ' Database Error Occured ';
}
if ($rowCount == 0) { // IF no previous user is using this email .
// Create a unique  activation code:
$activation = md5(uniqid(rand(), true));
if ($query_insert_user = $db_conx->prepare("INSERT INTO students (username, email, password, activation) VALUES (?, ?, ?, ?)"));
$query_insert_user->bindParam(1,$name);
$query_insert_user->bindParam(2,$email);
$query_insert_user->bindParam(3,$password);
$query_insert_user->bindParam(4,$activation);
$query_insert_user->execute();
$insertCount = $query_insert_user->rowCount();
if (!$query_insert_user) {
echo 'Query Failed ';
}
if ($insertCount == 1) { //If the Insert Query was successfull.
echo '<div class="success">Thank you for
registering '.$email;

} else { // If it did not run OK.
echo '<div class="errormsgbox">You could not be registered due to a system
error. We apologize for any
inconvenience.</div>';
}

} else { // The email address is not available.
echo '<div class="errormsgbox" >That email
address has already been registered.
</div>';
}

} else {//If the "error" array contains error msg , display them

echo '<div class="errormsgbox"> <ol>';
foreach ($error as $key => $values) {

echo '	<li>'.$values.'</li>';
}
echo '</ol></div>';
}
} // End of the main Submit conditional.
?>
<div id="regarticle">
<form action="register.php" method="post" >
<li>
<legend>Registration Form </legend>
</li>

<li>
Already a member? <a href="log_in.php">Log in</a></span> </p>
</li>

<li>
<label for="name">Name :</label>
<input type="text" id="name" name="name" size="25" />
</li>

<li>
<label for="email">E-mail :</label>
<input type="text" id="email" name="email" size="25" />
</li>

<li>
<label for="password">password:</label>
<input type="password" id="password" name="password" size="25" />
</li>

<li>
<input type="hidden" name="formsubmitted" value="TRUE" />
<input type="submit" value="Register" />
</div>
</form>
</div>
</body>
</html>
