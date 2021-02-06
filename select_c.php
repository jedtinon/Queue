<?php  
 require_once('config.php');
 $depcode=$_POST['changeStatus'];
 $output = '';
 $i='1';

 $sql = "SELECT q.vn,q.hn,q.name,q.q_id,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),q.queue_time),'%H:%i') as tim
 FROM queue q
 WHERE q.department = '$depcode'
 AND q.qtype = '3'
 ORDER BY q.queue_time"; 
 $result = mysqli_query($connect2, $sql);  
 $output .= '  
     <table class="table table-head-fixed table-sm">
          <thead>
               <tr>
                    <th>คืน</th>
                    <th>HN</th>
                    <th>ชื่อ - สกุล</th>
                    <th>คิว</th>
                    <th>เวลารอคอย</th>
               </tr>';  
 $rows = mysqli_num_rows($result);
 $i=1;
 while($row = mysqli_fetch_array($result)){  
     $output .= '  
          <tr> 
               <td><a class="btn btn-warning btn-sm" data-vn="'.$row['vn'].'" id="ReturnQ"><i class="fas fa-arrow-alt-circle-left"></i></a></td>  
               <td>'.$row["hn"].'</td>  
               <td>'.$row['name'].'</td>  
               <td>'.$row["q_id"].'</td>
               <td>'.$row["tim"].'</td>  
          </tr>';
     $i++;  
}   
 $output .= '</table>';  
 echo $output;  
 ?>