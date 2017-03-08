<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="header">header</div> 
<div id="left">
<?php  include 'left.php';?>

</div> 
<div id="main">
<h1>Sign Up</h1>
<?php
$uName = $uPass =$rPass = "";
$uNameError = $uPasswordError = $rPasswordError = "" ;
$uform= true;
$uNametrue = false;
$uPasstrue = false;
$rPasstrue = false;



if(isset($_POST['uSignUp'])){ //making sure the text box are not empty

if($_POST['uName']){
$uName =$_POST["uName"];
$uNametrue = true;
}
else{
$uNameError ="User Name required.";
}

if($_POST['uPass']){
$uPass =$_POST["uPass"];
$uPasstrue  = true;
}
else{
$uPasswordError ="User Password required.";
}

if($_POST['rPass']){
$rPass =$_POST["rPass"];
$rPasstrue = true;
}
else{
$rPasswordError ="Please Re-Enter Password.";
}
if($_POST['rPass'] != $uPass )
{
$rPasswordError = $rPasswordError." Password Does not Match.";
}

 if($uNametrue && $uPasstrue && $uPasstrue )
 {
 
 
 $uName =$_POST['uName'];
 $uPass = $_POST['uPass'];
 
 include 'dbopen.php';
 $sql = "insert into icpfall2015_users (uname, upassword) value ('$uName','$uPass')";

 if ($conn->query($sql) == TRUE)
	$uform = false;
else
	echo "Error: ". $sql . "<br>".$conn->error;

 }
}

if($uform )
{
?>
<form method='post' action='signUp.php'>

User Name:<input type="text" name="uName" value ="<?=$uName?>"><?echo $uNameError;?>
<br>
Password:<input type="password" name="uPass" ><?echo $uPasswordError;?>
<br>

Retype Password: <input type="password" name="rPass" ><?echo $rPasswordError;?>
<br>

<input type=submit value="Sign Up" name="uSignUp">
</form>



<?php 
} else {
echo "Signed up";
}

?>

</div> 
<div id="footer">footer</div> 

</body>
</html>