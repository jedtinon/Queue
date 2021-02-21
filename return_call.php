<?php  
   require_once('config.php');
   $vn=$_POST['vn'];
   $channel=$_POST['channel'];
   $dapartment=$_POST['dapartment'];
   $sql ="UPDATE queue SET channel=null,call_time=null,call_now=null WHERE vn = '$vn' AND channel = '$channel' AND department = '$dapartment'";
   $result=mysqli_query($connect2, $sql) or die(mysqli_error($sql));
   echo 'Y';  
 ?>