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
<div id="main">
<h1>
<table border ='1'>
  <tr>
    <td>From</td>
    <td>Message</td>		
  </tr>
  <?php 
  include 'dbopen.php';
  $sName = $_SESSION['uName'];
  $sql1 = "select * from icpfall2015_messages where mreceiver = '$sName' ";
	 $result = $conn->query($sql1);
	 if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
	 echo"<tr>
    <td>".$row["msender"]."</td>
    <td>".$row["mbody"]."</td>		
	</tr>";
	 
	 }
	 } 
	 ?>
</table>


</h1>
</div> 
<div id="footer">footer</div> 

</body>
</html>