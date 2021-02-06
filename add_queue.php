<?php  
 require_once('config.php');
 $vn=$_POST['vn'];
 $hn=$_POST['hn'];
 $name=$_POST['name'];
 $queue=$_POST['queue'];
 $dep=$_POST['dep'];
 $qtype=$_POST['qtype']; 
    $sql ="INSERT INTO queue(q_id,name,department,vn,hn,qtype)VALUES('$queue','$name','$dep','$vn','$hn','$qtype')";
    $result=mysqli_query($connect2, $sql) or die(mysqli_error($sql));
 echo $qtype;  
 ?>