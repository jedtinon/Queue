<?php
date_default_timezone_set('Asia/Bangkok');
require_once("config.php");
$vn=$_POST['vn'];
$qtype=$_POST['typeq'];
if($qtype=='1'){
    $new_id ="SELECT Max(substr(queue_a,-3))+1 as MaxID FROM run_queue WHERE date_queue = CURDATE()";
    $result_new=mysqli_query($connect2, $new_id) or die(mysqli_error($new_id));
    $fetch_new=mysqli_fetch_array($result_new);
    if($fetch_new['MaxID']==''){
        $Queue_id="A001"; 
    }else{
        $Queue_id="A".sprintf("%03d",$fetch_new['MaxID']);
    }
    $date=date('Y-m-d');
    $gen_q="UPDATE run_queue SET queue_a='$Queue_id',date_queue = '$date' WHERE id='1'";
    $res_gen=mysqli_query($connect2, $gen_q) or die(mysqli_error($gen_q));
    $time=date('H:i:s');
    $sql_update="UPDATE queue SET new_queue='$Queue_id',queue_time='$time' WHERE vn = '$vn'";
    $result_up=mysqli_query($connect2, $sql_update) or die(mysqli_error($sql_update));
}else{
    $new_id ="SELECT Max(substr(queue_b,-3))+1 as MaxID FROM run_queue WHERE date_queueb = CURDATE()";
    $result_new=mysqli_query($connect2, $new_id) or die(mysqli_error($new_id));
    $fetch_new=mysqli_fetch_array($result_new);
    if($fetch_new['MaxID']==''){
        $Queue_id="B001";  
    }else{
        $Queue_id="B".sprintf("%03d",$fetch_new['MaxID']);
    }
    $date=date('Y-m-d');
    $gen_q="UPDATE run_queue SET queue_b='$Queue_id',date_queueb = '$date' WHERE id='1'";
    $res_gen=mysqli_query($connect2, $gen_q) or die(mysqli_error($gen_q));
    $time=date('H:i:s');
    $sql_update="UPDATE queue SET new_queue='$Queue_id',queue_time='$time' WHERE vn = '$vn'";
    $result_up=mysqli_query($connect2, $sql_update) or die(mysqli_error($sql_update));
}
echo $qtype;
?>