<?php 

session_start();
//var_dump ($_COOKIES);
if(isset($_COOKIE['uName'])){ 
   $uName = $_COOKIE['uName'];
}
	 $uPass = $uPassError = $uNameError = "";
	if(isset($_POST['uSignIn'])){
	if($_POST['uName'] && $_POST['uPass']){
	  $uName = $_POST['uName'];
		
	  $uPass = $_POST['uPass'];
	  
	   include 'dbopen.php';
	 //Validation (making sure the user exists in database) 
	 $sql = "select * from icpfall2015_users where uname = '$uName' and upassword = '$uPass'";
	 $result = $conn->query($sql);
	 
	 if ($result->num_rows > 0){
	  $_SESSION['uName']=$uName;
	  setcookie('uName', $_SESSION['uName'], strtotime('+1 year'), '/');
	  header('Location: inbox.php'  );
	  echo $uName, " Sign in Successful.";
	  }
	  else{
	  $uPassError = "Wrong Password";
	  }
	  
	}else {
	
	$uNameError = "User Name or Password Missing.";
	}
	
	}

?>

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
<h1>Sign In</h1>



<form method='post' action='signIn.php'>
<i><?echo $uNameError;?></i><br>

User Name:<input type="text" name="uName" value ="<?=$uName?>">
<br>
Password:<input type="password" name="uPass"><?echo $uPassError;?>
<br>


<input type=submit value="Sign In" name="uSignIn">
</form>

</div> 
<div id="footer">footer</div> 

</body>
</html>