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
  <link href="css/table.css" rel="stylesheet">
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
    function department_change(kid){
        $(document).ready(function(){
        if(kid!=''){
            function fetch_data(){  
                $.ajax({  
                    url:"select_main.php",  
                    method:"POST",
                    data: {changeStatus: $('#select_depart').val()},  
                    success:function(data){  
                        $('#live_data_his').html(data);
                        //setTimeout( function() { fetch_data();  } , 10000 );  
                    }  
                });  
            }
            fetch_data();
            //setInterval(fetch_data, 5000);  // 1000 = 1 second
            function fetch_dataA(){  
              $.ajax({  
                url:"select_a.php",  
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
                url:"select_b.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_b').html(data); 
                  //setTimeout( function() { fetch_dataB();  } , 5000 );
                }  
              });  
            }
            fetch_dataB();

            function fetch_dataC(){  
              $.ajax({  
                url:"select_c.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_c').html(data); 
                  //setTimeout( function() { fetch_dataC();  } , 5000 );
                }  
              });  
            }
            fetch_dataC();

        }
        });
    };

</script>
</head>
<body class="dark-mode">
    <div class="top navbar navbar-dark navbar-teal navbar-center" style="text-align: center;">
        <h4 style="text-align: center;">ระบบจัดคิว</h4>
    </div>
    <div class="bot">
        <div class="left col-lg-12">
            <div class="row">      
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>แผนก</label>
                        <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" onchange="department_change(this.value)" id="select_depart">
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
            </div>
            <div class="card card-teal">
                <div class="card-header">
                    <h3 class="card-title">คิวระบบ HIS</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-secondary btn-sm" onclick="RefreshData();"><i class="fas fa-sync-alt"></i> Refresh</button>
                    </div>
                </div>
                <div class="card-body p-0" id="live_data_his"></div>
            </div>
        </div>
        <div class="right1 col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">คิวปกติทั่วไป</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" id="live_queue_a"></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
        </div>
        <div class="right2 col-lg-12">
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
        <div class="right3 col-lg-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">คิวรับยาทีหลัง</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="live_queue_c"></div>
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
  function RefreshData(){
    $.ajax({  
      url:"select_main.php",  
      method:"POST",
      data: {changeStatus: $('#select_depart').val()},  
      success:function(data){  
        $('#live_data_his').html(data); 
      }  
    });
  }
$(document).on("click", "#AddQ", function(){
    $.ajax({
        type: "POST",
        url: "add_queue.php",
        data: {
            vn: $(this).data("vn"),
            hn: $(this).data("hn"),
            name: $(this).data("name"),
            queue: $(this).data("q"),
            dep: $(this).data("dep"),
            qtype: $(this).data("type")
        },
        success: function(dataT){
          function fetch_data(){  
                $.ajax({  
                    url:"select_main.php",  
                    method:"POST",
                    data: {changeStatus: $('#select_depart').val()},  
                    success:function(data){  
                        $('#live_data_his').html(data); 
                    }  
                });  
            }
            fetch_data();
            
            function fetch_dataA(){  
              $.ajax({  
                url:"select_a.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_a').html(data); 
                }  
              });  
            }
            fetch_dataA();

            function fetch_dataB(){  
              $.ajax({  
                url:"select_b.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_b').html(data); 
                }  
              });  
            }
            fetch_dataB();

            function fetch_dataC(){  
              $.ajax({  
                url:"select_c.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_c').html(data); 
                }  
              });  
            }
            fetch_dataC();
        }
    }); // ajax end
});

$(document).on("click", "#ReturnQ", function(){
    $.ajax({
        type: "POST",
        url: "return_queue.php",
        data: {
            vn: $(this).data("vn")
        },
        success: function(dataT){
          function fetch_data(){  
                $.ajax({  
                    url:"select_main.php",  
                    method:"POST",
                    data: {changeStatus: $('#select_depart').val()},  
                    success:function(data){  
                        $('#live_data_his').html(data); 
                    }  
                });  
            }
            fetch_data();
            
            function fetch_dataA(){  
              $.ajax({  
                url:"select_a.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_a').html(data); 
                }  
              });  
            }
            fetch_dataA();

            function fetch_dataB(){  
              $.ajax({  
                url:"select_b.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_b').html(data); 
                }  
              });  
            }
            fetch_dataB();

            function fetch_dataC(){  
              $.ajax({  
                url:"select_c.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_c').html(data); 
                }  
              });  
            }
            fetch_dataC();
        }
    }); // ajax end
});

$(document).on("click", "#GenQueue", function(){
    $.ajax({
        type: "POST",
        url: "run_queue.php",
        data: {
            vn: $(this).data("vn"),
            typeq: $(this).data("typeq")
        },
        success: function(dataT){
          if(dataT=='1'){
            function fetch_dataA(){  
              $.ajax({  
                url:"select_a.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_a').html(data); 
                }  
              });  
            }
            fetch_dataA();
          }else if(dataT=='2'){
            function fetch_dataB(){  
              $.ajax({  
                url:"select_b.php",  
                method:"POST",
                data: {changeStatus: $('#select_depart').val()},  
                success:function(data){  
                  $('#live_queue_b').html(data); 
                }  
              });  
            }
            fetch_dataB();
          }
        }
    }); // ajax end
});
</script>
</body>
</html>
