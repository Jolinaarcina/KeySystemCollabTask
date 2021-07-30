<?php
  session_start();
  if (empty($_SESSION))
  {
    header('location:../');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/logo-small.png">
          </div>
        </a>
        <a class="simple-text logo-normal">
          ADMINISTRATOR
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="" id="btnDashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="" id="btnRooms">
              <i class="nc-icon nc-credit-card"></i>
              <p>Rooms</p>
            </a>
          </li>
          <li>
            <a href="" id="btnHistory">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>History</p>
            </a>
          </li>
           <li>
            <a href="" id="btnSign">
              <i class="nc-icon nc-button-power"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand"></a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content" id="end">
      </div>
    </div>
  </div>

  <div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Borrower Info</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="room_form" method="POST">            
            <div class="control-group">
              <label>Name</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="bname" name="bname" type="text">
              </div>
            </div>
            <div class="control-group">
              <label>Position</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="bposition" name="bposition" type="text">
              </div>
            </div>
            <div class="control-group">
              <label>Description</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="bdescription" name="bdescription" type="text">
              </div>
            </div>
           <input type="hidden" name="action" id="action" value="action_borrow" />
           <input type="hidden" name="room_id" id="room_id" />
           <input type="submit" name="btn_borrow" id="btn_borrow" value="SAVE" class="btn btn-info" />
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Borrower Info</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="Views"></div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add_roomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="aroom_message"></div>
          <form id="a_rooms" method="POST">            
            <div class="control-group">
              <label>Room Name</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="a_room" name="a_room" type="text">
              </div>
            </div>
            <div class="control-group">
              <label>Key Code</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="a_key" name="a_key" type="text">
              </div>
            </div>
           <input type="hidden" name="action" id="action" value="action_addroom" />
           <input type="hidden" name="room_ida" id="room_ida" />
           <input type="submit" name="btn_addroom" id="btn_addroom" value="" class="btn btn-info" />
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_roomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="u_rooms" method="POST">            
            <div class="control-group">
              <label>Room Name</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="u_room" name="u_room" type="text">
              </div>
            </div>
            <div class="control-group">
              <label>Key Code</label>
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <input class="form-control" id="u_key" name="u_key" type="text">
              </div>
            </div>
           <input type="hidden" name="action" id="action" value="action_updateroom" />
           <input type="hidden" name="room_idu" id="room_idu" />
           <input type="submit" name="btn_updateroom" id="btn_updateroom" value="" class="btn btn-info" />
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script src="admin_js.js"></script>
</body>

</html>


