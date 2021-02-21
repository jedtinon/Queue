<?php  
   require_once('config.php');
   $vn=$_POST['vn'];
   $channel=$_POST['channel'];
   $dapartment=$_POST['dapartment'];
   $time=date('H:i:s');
   $sql ="UPDATE queue SET channel='$channel',call_time='$time',call_now='Y' WHERE vn = '$vn' AND department = '$dapartment'";
   $result=mysqli_query($connect2, $sql) or die(mysqli_error($sql));

   $up_sql="UPDATE queue SET call_now = null WHERE channel='$channel' AND department = '$dapartment' AND vn != '$vn'";
   $up_result=mysqli_query($connect2, $up_sql) or die(mysqli_error($up_sql));
   echo 'Y';  
 ?>