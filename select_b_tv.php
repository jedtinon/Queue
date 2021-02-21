<?php  
 require_once('config.php');
 $output = '';
 $sql = "SELECT q.vn,q.hn,q.name,q.new_queue,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),q.queue_time),'%H:%i') as tim
 FROM queue q
 WHERE q.department = '007'
 AND q.qtype = '2'
 AND IFNULL(q.new_queue,'') != ''
 AND IFNULL(q.call_now,'') = ''
 ORDER BY q.new_queue"; 
 $result = mysqli_query($connect2, $sql);  
 $output .= '  
     <table class="table table-head-fixed table-sm">
          <thead>
               <tr>
                    <th>คิว</th>
                    <th>HN</th>
                    <th>ชื่อ - สกุล</th>
                    <th>เวลารอคอยประมาณ</th>
               </tr>';  
 $rows = mysqli_num_rows($result);
 $i='1';
 while($row = mysqli_fetch_array($result)){
     if($i<='5'){
          $tim="5 นาที";
     }elseif($i<='10'){
          $tim="10 นาที";
     }else{
          $tim="20 นาที";
     }
     $output .= '  
          <tr> 
               <td>'.$row["new_queue"].'</td> 
               <td>'.$row["hn"].'</td>  
               <td>'.$row['name'].'</td>  
               <td>'.$tim.'</td>  
          </tr>';
     $i++;  
}   
 $output .= '</table>';  
 echo $output;  
 ?>