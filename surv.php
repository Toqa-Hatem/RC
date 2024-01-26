<?php
include ('connection.php');

If (!isset ($_SESSION['userid']))
{
session_start();
$u =$_SESSION['userid'];
}
if (isset ($_POST['end']))
{
    $current=date("Y/m/d h:i:s");
$q1=mysqli_real_escape_string($con,$_POST['a']);
$q2=mysqli_real_escape_string($con,$_POST['b']);
$q3=mysqli_real_escape_string($con,$_POST['c']);
$q4=mysqli_real_escape_string($con,$_POST['d']);
$q5=mysqli_real_escape_string($con,$_POST['e']);
$q6=mysqli_real_escape_string($con,$_POST['f']);
$q7=mysqli_real_escape_string($con,$_POST['g']);
$q8=mysqli_real_escape_string($con,$_POST['h']);
$q9=mysqli_real_escape_string($con,$_POST['i']);
$q10=mysqli_real_escape_string($con,$_POST['j']);
$q11=mysqli_real_escape_string($con,$_POST['k']);
$q="INSERT INTO `survey` VALUES (NULL,$u,'$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$current')";
$t=mysqli_query($con,$q);
$query=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `survey` WHERE `creation_date`='$current'"));
$var1=date("Y/m/d");
  $var2=date('Y/m/d',strtotime('+30 days'));
  $var3=$query['user_id'];
  $var4=$query['surv_id'];
  $var5="5";
  $sql=mysqli_query($con,"INSERT INTO `elcpoint` VALUES(NULL,'$var5','$var3',NULL,'$var4',NULL,'$var1','$var2')");
if($t){
    header("location:profile.php");
}
    
}