<?php 
session_start();
if(isset($_SESSION['uName'])){}
else{
 header('Location: signIn.php');

}
?>