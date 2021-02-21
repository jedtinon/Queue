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
  <link href="css/table3.css" rel="stylesheet">
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
      $(document).ready(function(){
            function fetch_dataA(){  
              $.ajax({  
                url:"select_a_tv.php",  
                method:"POST",
                success:function(data){  
                  $('#live_queue_a').html(data); 
                  //setTimeout( function() { fetch_dataA();  } , 5000 );
                }  
              });  
            }
            fetch_dataA();

            function fetch_dataB(){  
              $.ajax({  
                url:"select_b_tv.php",  
                method:"POST", 
                success:function(data){  
                  $('#live_queue_b').html(data); 
                  //setTimeout( function() { fetch_dataB();  } , 5000 );
                }  
              });  
            }
            fetch_dataB();

            function fetch_channel(){  
              $.ajax({  
                url:"select_channel_tv.php",  
                method:"POST",
                dataType:"json", 
                success:function(data){
                  if(data.ch1!=null){
                    $('#ch1').val(data.ch1); 
                  }
                  if(data.name_ch1!=null){
                    $('#name_ch1').html(data.name_ch1);
                  }
                  if(data.ch2!=null){
                    $('#ch2').val(data.ch2);
                  }
                  if(data.name_ch2!=null){
                    $('#name_ch2').html(data.name_ch2);
                  }
                  if(data.ch3!=null){ 
                    $('#ch3').val(data.ch3);
                  }
                  if(data.name_ch3!=null){
                    $('#name_ch3').html(data.name_ch3);
                  }
                  if(data.ch4!=null){
                    $('#ch4').val(data.ch4);
                  }
                  if(data.name_ch4!=null){ 
                    $('#name_ch4').html(data.name_ch4); 
                  }
                }  
              });  
            }
            fetch_channel();


        });
</script>
</head>
<body class="dark-mode">
  <br>
    <div class="bot">
        <div class="left1 col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">รอเรียกคิวปกติทั่วไป</h3>
                </div>
                <div class="card-body" id="live_queue_a"></div>
            </div>
        </div>
        <div class="left2 col-lg-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">รอเรียกคิวยาเร่งด่วน</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_b"></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right1 col-lg-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ช่อง 1</h3>
                <div class="card-tools">
                  <input class="form-control form-control-navbar" type="text" style="text-align:center;" disabled id="ch1" placeholder="-">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="text-align: center;">
                <span id="name_ch1">-</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right2 col-lg-12">
            <div class="card card-maroon">
              <div class="card-header">
                <h3 class="card-title">ช่อง 2</h3>
                <div class="card-tools">
                  <input class="form-control form-control-navbar" type="text" style="text-align:center;" disabled id="ch2" placeholder="-">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_call" style="text-align: center;">
                <span id="name_ch2">-</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right3 col-lg-12">
            <div class="card card-indigo">
              <div class="card-header">
                <h3 class="card-title">ช่อง 3</h3>
                <div class="card-tools">
                  <input class="form-control form-control-navbar" type="text" style="text-align:center;" disabled id="ch3" placeholder="-">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_call" style="text-align: center;">
                <span id="name_ch3">-</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right4 col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title">ช่อง 4</h1>
                <div class="card-tools">
                  <input class="form-control form-control-navbar" type="text" style="text-align:center;" disabled id="ch4" placeholder="-">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_call" style="text-align: center;">
                <span id="name_ch4">-</span>
              </div>
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
</body>
</html>
