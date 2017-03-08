<?php
	if(isset($_SESSION['uName'])){
?>
Hi, <?=$_SESSION['uName']?><br>
<a href="inbox.php">Inbox</a><br>
<a href="compose.php">Compose</a><br>
<a href="sent.php">Sent</a><br><br>
<!--<a href="changePassword.php">Change Password</a><br>-->
<a href="signOut.php">Signout</a><br>
<?php }else{ ?>

<a href="signUp.php">Sign Up</a><br>
<a href="signIn.php">Sign In</a><br><br>
<?php
}?>