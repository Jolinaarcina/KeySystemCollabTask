<?php
  session_start();
  include ("../MYSQL/MysqliDb.php");
  include("../connection.php");
  $sql = "Select * from rooms ORDER by id ASC";
  $res = $db->rawQuery($sql);
  if(isset($_POST["action"]))
  {
    if($_POST["action"] == "fetch")
    {
        ?>

        <div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header">
              DASHBOARD</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable">
                  <thead class=" text-primary">
                    <tr>
                      <th style="width: 50%;"></th>
                      <th>Room</th>
                      <th>Key</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                      <?php
                      foreach ($res as $key)
                      {
                      ?>
                        <tr>
                        <?php
                        if ($key["status"] == 'available')
                        {
                        ?>
                          <td><button type="button" name="borrow" class="btn btn-danger btn-sm borrow" id="<?php echo $key["id"]; ?>" style="width: 50%;"><i class="fa fa-key"></i> BORROW</button></td>
                        <?php
                        }
                        else
                        {
                        ?>
                          <td>
                            <button type="button" name="view" id="view" class="btn btn-info btn-sm view" data-toggle = "modal" data-id = "<?=$key['id']?>"  data-target = "#viewModal" style="width: 25%;"><i class="fa fa-list"></i> VIEW</button>
                            <button type="button" name="return" class="btn btn-danger btn-sm return" id="<?php echo $key["id"]; ?>" style="width: 25%;"><i class="fa fa-key"></i> RETURN</button>
                          </td>
                        <?php
                        }
                        ?>
                        <td class="text-left"><?php echo $key["room_name"]; ?></td>
                        <td class="text-left"><?php echo $key["keycode"]; ?></td>
                        <td class="text-left"><?php echo $key["status"]; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <?php
    }
    if($_POST["action"] == "action_borrow")
    {
      $room = $_POST["room_id"];
      $name = $_POST["bname"];
      $position = $_POST["bposition"];
      $des = $_POST["bdescription"];
      $date = date('yy/m/d h:m a');
      $status = 'borrowed';

      echo $res = $db->rawQueryOne("INSERT INTO users(name,position,description,room,b_time,status)VALUES('$name','$position','$des','$room','$date','$status')");

      $data = array("status" =>$status);

      $db->where("id", $room);
      $res = $db->update("rooms", $data);
    }
    if($_POST["action"] == "action_return")
    {
      $id = $_POST['id'];
      $status = 'available';
      $status1 = 'returned';
      $date = date('yy/m/d h:m a');

      $res = $db->rawQueryOne("UPDATE rooms set status = '$status' WHERE id = '".$id."'");
      $res1 = $db->rawQueryOne("UPDATE users set status = '$status1', r_time = '$date' WHERE room = '".$id."'");
    }
  }
?>
<script src="jtables/js/demo/datatables-demo.js"></script>
<script src="jtables/vendor/jquery/jquery.min.js"></script>
<script src="jtables/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jtables/vendor/datatables/jquery.dataTables.js"></script>
<script src="jtables/vendor/datatables/dataTables.bootstrap4.js"></script>