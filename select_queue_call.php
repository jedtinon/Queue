<?php  
 require_once('config.php');
 $depcode=$_POST['changeStatus'];
 $channel=$_POST['changeChannel'];
 $output = '';
 $i='1';
 $sql = "SELECT *,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),queue_time),'%H:%i') as tim1,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),call_time),'%H:%i') as tim2 FROM queue WHERE channel = '$channel' ORDER BY call_time DESC";
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
                    <th>เรียกแล้ว</th>
                    <th>เรียก</th>
               </tr>';  
 $rows = mysqli_num_rows($result);
 $i=1;
 while($row = mysqli_fetch_array($result)){  
     $output .= '  
          <tr> 
               <td><button type="button" class="btn btn-warning btn-sm" data-vn="'.$row['vn'].'" id="ReturnCall"><i class="fas fa-arrow-alt-circle-left"></i></button></td>  
               <td>'.$row["hn"].'</td>  
               <td>'.$row['name'].'</td>  
               <td>'.$row["new_queue"].'</td>
               <td>'.$row["tim1"].'</td>
               <td>'.$row["tim2"].'</td> 
               <td><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-arrow-alt-circle-right"></i></button></td>
          </tr>';
     $i++;  
}   
 $output .= '</table>';  
 echo $output;  
 ?>