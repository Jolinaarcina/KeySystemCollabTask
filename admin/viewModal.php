<?php
  include ("../MYSQL/MysqliDb.php");
  include("../connection.php");
  $id = $_GET['id'];
  $stat = "borrowed";
  $sql = "Select users.id,users.name,users.position,users.description,users.b_time,users.status,rooms.room_name
          from users
          inner join rooms
          on users.room = rooms.id
          where users.room = '".$id."' AND users.status = '".$stat."'";
  $res = $db->rawQueryOne($sql);
?>
 <form id="room_form1" method="POST">
  <input type="hidden" name="id1" id="id1" value="<?=$res['id']?>">
     <div class="control-group">
      <label>Room</label>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        <input class="form-control" id="room1" name="room1" type="text" value="<?=$res['room_name']?>">
      </div>
    </div>         
    <div class="control-group">
      <label>Name</label>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        <input class="form-control" id="bname1" name="bname1" type="text" value="<?=$res['name']?>">
      </div>
    </div>
    <div class="control-group">
      <label>Position</label>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        <input class="form-control" id="bposition1" name="bposition1" type="text" value="<?=$res['position']?>">
      </div>
    </div>
     <div class="control-group">
      <label>Borrowed Time</label>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        <input class="form-control" id="b_time1" name="b_time1" type="text" value="<?=$res['b_time']?>">
      </div>
    </div>
    <div class="control-group">
      <label>Description</label>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        <input class="form-control" id="b_description1" name="b_description1" type="text" value="<?=$res['description']?>">
      </div>
    </div>
   <input type="hidden" name="action" id="action" value="action_return" />
   <input type="hidden" name="room_id1" id="room_id1" />
  </form>