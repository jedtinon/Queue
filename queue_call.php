<?php
    require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/table2.css" rel="stylesheet">
  <style>
      .navbar-center h4 {
        float: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
  </style>
  <script>
    function department_channel(){
        $(document).ready(function(){
        var dep = $('#select_depart').val();
        var chn = $('#select_channel').val();
        if(dep!=null && chn!=null){
            function fetch_data(){  
                $.ajax({  
                    url:"select_queue_call.php",  
                    method:"POST",
                    data: {changeStatus: $('#select_depart').val(),changeChannel: $('#select_channel').val()},  
                    success:function(data){  
                        $('#live_queue_call').html(data);
                        //setTimeout( function() { fetch_data();  } , 5000 );  
                    }  
                });  
            }
            fetch_data();

            function fetch_dataA(){  
              $.ajax({  
                url:"select_a_call.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_a').html(data); 
                  //setTimeout( function() { fetch_dataA();  } , 5000 );
                }  
              });  
            }
            fetch_dataA();

            function fetch_dataB(){  
              $.ajax({  
                url:"select_b_call.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_b').html(data); 
                  //setTimeout( function() { fetch_dataB();  } , 5000 );
                }  
              });  
            }
            fetch_dataB();
        }
        });
    };

</script>
</head>
<body class="dark-mode">
    <div class="top navbar navbar-dark navbar-teal navbar-center" style="text-align: center;">
        <h4 style="text-align: center;">ระบบเรียกคิว</h4>
    </div>
    <div class="bot">
        <div class="left1 col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">คิวปกติทั่วไป</h3>
                </div>
                <div class="card-body" id="live_queue_a"></div>
            </div>
        </div>
        <div class="left2 col-lg-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">คิวยาเร่งด่วน</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_b"></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right col-lg-12">
            <div class="row">      
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>แผนก</label>
                        <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" onchange="department_channel()" id="select_depart">
                            <option value="" selected disabled hidden>เลือกแผนก</option>
                            <?php
                                $k_sql="SELECT * FROM kskdepartment";
                                $k_query=mysqli_query($connect, $k_sql) or die(mysqli_error($k_sql));
                                while($k_fetch=mysqli_fetch_array($k_query)){
                            ?>
                            <option value="<?=$k_fetch['depcode'];?>"><?=$k_fetch['department'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>ช่อง</label>
                        <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" onchange="department_channel()" id="select_channel">
                            <option value="" selected disabled hidden>เลือกช่อง</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><!-- /.col -->
            </div>
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">คิวที่เรียก</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_call"></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
    </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Popper -->
<script src="js/popper.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
<script>
$(document).on("click", "#CallQueue", function(){
    $.ajax({
        type: "POST",
        url: "call_queue.php",
        data: {
            vn: $(this).data("vn"),
            dap: $('#select_depart').val(),
            channel: $('#select_channel').val()
        },
        success: function (dataT) {
            fetch_data();
          if(dataT=='1'){
            fetch_dataA();
          }else if(dataT=='2'){
            fetch_dataB();
          }else if(dataT=='3'){
            fetch_dataC();
          }
        },
    }); // ajax end
});
</script>
</body>
</html>
