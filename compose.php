<?php include 'verify.php';?>




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
<div id="main"><h1>
<?php

$uform= true;
 include 'dbopen.php';
if(isset($_POST['uSend'])){  // if all information is provided, then the icpdall2015_users table will have new row added.

 $sName = $_SESSION['uName'];
 $rName = $_POST['sendTo'];
  $sSubject = $_POST['sentSubject'];
   $sMessage = $_POST['sentMessage'];
  

 //$sql = "insert into icpfall2015_users (uname, upassword) value ('$uName','$uPass')";
 $sql = "insert into icpfall2015_messages ( mbody, msender, mreceiver, msubject) value ('$sMessage', '$sName','$rName','$sSubject')";
 if ($conn->query($sql) == TRUE){
	$uform = false;
	}
else{
	echo "Error: ". $sql . "<br>".$conn->error;
	}

 
}

if($uform )
{
?>

<form method = 'post' action='compose.php'>
from : <?=$_SESSION['uName']?> <br> 
To: <select name = "sendTo">

<?php  
  include 'dbopen.php';
	$sql1 = "SELECT uname from icpfall2015_users";
	 $result = $conn->query($sql1);
	 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
	 
	  echo "<option >".$row['uname']."</option>" ; // adding all the users who have an account to the drop down menu.
     }
	 } 
	 
   
	 ?>
  
  <select> <br>
Subject:  <input type="text" name ="sentSubject"><br>
Message:  <textarea rows="20" cols="50" name = "sentMessage" > </textarea>  <br>
<input type=submit value="Send" name="uSend">
<form>
<?php 
} else {
echo "Message Sent";
}

?>




</h1></div> 
<div id="footer">footer</div> 

</body>
</html>