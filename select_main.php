<?php  
 require_once('config.php');
 $depcode=$_POST['changeStatus'];
 $output = '';
 $i='1';
 $vn=''; 
 $date = substr(date('Y')+543,-2).date('m').date('d').'%';
 $sql_vn = "SELECT vn FROM queue WHERE department = '$depcode'";
 $result_vn = mysqli_query($connect2, $sql_vn);
 $numrow = mysqli_num_rows($result_vn);
if($numrow >= 1){
 while($vnA = mysqli_fetch_array($result_vn)){
     if($i<$numrow){
          $vn .= "'$vnA[vn]'".", ";
     }else{
          $vn .= "'$vnA[vn]'";
     }
     $i++;
 }
 $sql_Dvn = "DELETE FROM queue WHERE department = '$depcode' AND vn NOT IN ($vn) AND qtype = '1'";
$result_Dvn = mysqli_query($connect2, $sql_Dvn);
 /*$sql="SELECT vn,hn,CONCAT(pname,fname,' ',lname) as fullname,rx_queue,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),cur_dep_time),'%H:%i') as tim
 FROM ovst_test
 WHERE vstdate = CURDATE()
 AND cur_dep = '$depcode'
 AND vn not in ($vn)
 ORDER BY cur_dep_time";*/

 
 $sql = "SELECT o.vn,o.hn,CONCAT(pt.pname,pt.fname,' ',pt.lname) as fullname,o.rx_queue,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),o.cur_dep_time),'%H:%i') as tim
 FROM ovst o
 LEFT OUTER JOIN patient pt on pt.hn = o.hn
 WHERE o.vstdate = CURDATE()
 AND o.cur_dep = '$depcode'
 AND o.vn not in (SELECT vn FROM rx_operator WHERE vn like '$date' AND pay='Y')
 AND o.vn not in ($vn)
 ORDER BY o.cur_dep_time";
}else{
 /*$sql="SELECT vn,hn,CONCAT(pname,fname,' ',lname) as fullname,rx_queue,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),cur_dep_time),'%H:%i') as tim
 FROM ovst_test
 WHERE vstdate = CURDATE()
 AND cur_dep = '$depcode'
 ORDER BY cur_dep_time";*/

 $sql = "SELECT o.vn,o.hn,CONCAT(pt.pname,pt.fname,' ',pt.lname) as fullname,o.rx_queue,DATE_FORMAT(TIMEDIFF(CURRENT_TIME(),o.cur_dep_time),'%H:%i') as tim
 FROM ovst o
 LEFT OUTER JOIN patient pt on pt.hn = o.hn
 WHERE o.vstdate = CURDATE()
 AND o.cur_dep = '$depcode'
 AND o.vn not in (SELECT vn FROM rx_operator WHERE vn like '$date' AND pay='Y')
 ORDER BY o.cur_dep_time";
}
 $result = mysqli_query($connect, $sql);  
 $output .= '  
     <table class="table table-head-fixed table-sm">
          <thead>
               <tr>
                    <th>ลำดับ</th>
                    <th>HN</th>
                    <th>ชื่อ - สกุล</th>
                    <th>คิว</th>
                    <th>เวลารอคอย</th>
                    <th>จัดคิว</th>
               </tr>';  
 $rows = mysqli_num_rows($result);
 $i=1;
 while($row = mysqli_fetch_array($result)){  
     $output .= '  
          <tr> 
               <td>'.$i.'</td>  
               <td>'.$row["hn"].'</td>  
               <td>'.$row['fullname'].'</td>  
               <td>'.$row["rx_queue"].'</td>
               <td>'.$row["tim"].'</td>  
               <td><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fas fa-arrow-alt-circle-right"></i></button>
               <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0)" id="AddQ" data-vn="'.$row['vn'].'" data-hn="'.$row['hn'].'" data-name="'.$row['fullname'].'" data-q="'.$row['rx_queue'].'" data-dep="'.$depcode.'" data-type="1">ปกติ</a>
                    <a class="dropdown-item" href="javascript:void(0)" id="AddQ" data-vn="'.$row['vn'].'" data-hn="'.$row['hn'].'" data-name="'.$row['fullname'].'" data-q="'.$row['rx_queue'].'" data-dep="'.$depcode.'" data-type="2">ยาเร่งด่วน</a>
                    <a class="dropdown-item" href="javascript:void(0)" id="AddQ" data-vn="'.$row['vn'].'" data-hn="'.$row['hn'].'" data-name="'.$row['fullname'].'" data-q="'.$row['rx_queue'].'" data-dep="'.$depcode.'" data-type="3">รับยาทีหลัง</a>
               </div>
               </td>
          </tr>';
     $i++;  
}   
 $output .= '</table>';  
 echo $output;  
 ?>