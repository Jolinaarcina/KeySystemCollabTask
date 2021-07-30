<?php
  include ("../MYSQL/MysqliDb.php");
  include("../connection.php");
  $sql = "Select * from rooms ORDER by id ASC";
  $res = $db->rawQuery($sql);
  if(isset($_POST["action"]))
  {
    if($_POST["action"] == "rooms")
    {
      ?>

        <div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header">
              ROOMS</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable">
                  <thead class=" text-primary">
                    <tr>
                      <th style="width: 5%;"></th>
                      <th style="width: 5%;"></th>
                      <th style="width: 5%;"></th>
                      <th></th>
                      <th>Room</th>
                      <th>Key</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                      <?php
                      foreach ($res as $key)
                      {
                      ?>
                        <tr>
                          <td>
                            <button type="button" name="add_room" class="btn btn-success btn-sm add_room" id="<?php echo $key["id"]; ?>"><i class="fa fa-plus"></i></button>
                          </td>
                          <td>
                            <button type="button" name="update_room" class="btn btn-info btn-sm update_room" id="<?php echo $key["id"]; ?>"><i class="fa fa-pencil"></i></button>
                          </td>
                          <td>
                            <button type="button" name="delete_room" class="btn btn-danger btn-sm delete_room" id="<?php echo $key["id"]; ?>"><i class="fa fa-trash"></i></button>
                          </td>
                          <td></td>
                          <td class="text-left"><?php echo $key["room_name"]; ?></td>
                          <td class="text-left"><?php echo $key["keycode"]; ?></td>
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
    if($_POST["action"] == "action_addroom")
    {
      $room = $_POST["a_room"];
      $key = $_POST["a_key"];
      $status = 'available';

      $res = $db->rawQueryOne("INSERT INTO rooms(room_name,keycode,status)VALUES('$room','$key','$status')");
    }
    if($_POST["action"] == "action_updateroom")
    {
      $id = $_POST["room_idu"];
      $room = $_POST["u_room"];
      $key = $_POST["u_key"];

      $res = $db->rawQueryOne("UPDATE rooms set room_name = '$room', keycode = '$key' WHERE id = '".$id."'");
    }
    if($_POST["action"] == "action_deleteroom")
    {
      $res = $db->rawQueryOne("DELETE FROM rooms WHERE id = '".$_POST["id"]."'");
    }
  }
?>
<script src="jtables/js/demo/datatables-demo.js"></script>
<script src="jtables/vendor/jquery/jquery.min.js"></script>
<script src="jtables/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jtables/vendor/datatables/jquery.dataTables.js"></script>
<script src="jtables/vendor/datatables/dataTables.bootstrap4.js"></script>