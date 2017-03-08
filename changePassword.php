<?php include 'verify.php';?>
<?  ?>



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

if(isset($_POST['uSend'])){

 $sName = $_SESSION['uName'];
  $rName = $_POST['newpass'];

 //$sql = "UPDATE icpfall2015_users SET `upassword`='$npass' WHERE uname='$sName'";
 //$sql = "insert into icpfall2015_messages ( mbody, msender, mreceiver, msubject) value ('$sMessage', '$sName','$rName','$sSubject')";
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

oldPassword:  <input type="text" name ="oldpass"><br>
New Password:  <input type="text" name ="newpass"><br>

<input type=submit value="Change" name="uSend">
<?php 
  include 'dbopen.php';
	$sql1 = "SELECT uname from icpfall2015_users";
	 $result = $conn->query($sql1);
	 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
	 
	  echo "<option >".$row['uname']."</option>" ;
     }
	 } 
	 
   
	 ?>




</h1></div> 
<div id="footer">footer</div> 

</body>
</html>