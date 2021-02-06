<?php  
   require_once('config.php');
   $vn=$_POST['vn'];
   $sql ="DELETE FROM queue WHERE vn = '$vn'";
   $result=mysqli_query($connect2, $sql) or die(mysqli_error($sql));
   echo 'Y';  
 ?>