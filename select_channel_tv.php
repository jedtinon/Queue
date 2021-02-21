<?php  
 require_once('config.php');
 $sql = "SELECT 
 (SELECT new_queue 
 FROM queue 
 WHERE department = '007'
 AND channel = '1' 
 AND call_now = 'Y') ch1,
 (SELECT name
 FROM queue 
 WHERE department = '007'
 AND channel = '1' 
 AND call_now = 'Y') name_ch1,
 (SELECT new_queue
 FROM queue 
 WHERE department = '007'
 AND channel = '2' 
 AND call_now = 'Y') ch2,
 (SELECT name
 FROM queue 
 WHERE department = '007'
 AND channel = '2' 
 AND call_now = 'Y') name_ch2,
 (SELECT new_queue
 FROM queue 
 WHERE department = '007'
 AND channel = '3' 
 AND call_now = 'Y') ch3,
 (SELECT name
 FROM queue 
 WHERE department = '007'
 AND channel = '3' 
 AND call_now = 'Y') name_ch3,
 (SELECT new_queue
 FROM queue 
 WHERE department = '007'
 AND channel = '4' 
 AND call_now = 'Y') ch4,
 (SELECT '-' 
 FROM queue 
 WHERE department = '007'
 AND channel = '4' 
 AND call_now = 'Y') name_ch4"; 
 $result = mysqli_query($connect2, $sql);
 $fetch = mysqli_fetch_array($result);
 echo json_encode($fetch);  
 ?>