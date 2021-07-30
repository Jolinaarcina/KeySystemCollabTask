<?php
	session_start();
	include ("../MYSQL/MysqliDb.php");
	include("../connection.php");
	if(isset($_POST["action"]))
	{
		if($_POST["action"] == "history")
	    {
        	$sql1 = "Select users.id,users.name,users.position,users.description,users.b_time,users.r_time,
	               users.status,rooms.room_name
	               from users
	               inner join rooms
	               on users.room = rooms.id
	               ORDER BY id DESC";
      		$res1 = $db->rawQuery($sql1);
	      	?>
		          <div class="container-fluid">
		            <div class="card mb-3">
		              <div class="card-header">
		                HISTORY LIST</div>
		              <div class="card-body">
		                <div class="table-responsive">
		                  <table class="table" id="dataTable">
		                    <thead class=" text-primary text-center">
		                      <tr>
		                        <th>ROOM</th>
		                        <th>NAME</th>
		                        <th>POSITION</th>
		                        <th>DESCRIPTION</th>
		                        <th>BORROWED TIME</th>
		                        <th>RETURN</th>
		                        <th>STATUS</th>
		                      </tr>
		                    </thead>
		                    <tbody class="text-center">
		                      <?php
		                      foreach ($res1 as $key1)
		                      {
		                      ?>
		                      <tr>
		                        <td class="text-center"><?php echo $key1["room_name"]; ?></td>
		                        <td class="text-center"><?php echo $key1["name"]; ?></td>
		                        <td class="text-center"><?php echo $key1["position"]; ?></td>
		                        <td class="text-center"><?php echo $key1["description"]; ?></td>
		                        <td class="text-center"><?php echo $key1["b_time"]; ?></td>
		                        <td class="text-center"><?php echo $key1["r_time"]; ?></td>
		                        <td class="text-center"><?php echo $key1["status"]; ?></td>
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
	}
?>
<script src="jtables/js/demo/datatables-demo.js"></script>
<script src="jtables/vendor/jquery/jquery.min.js"></script>
<script src="jtables/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jtables/vendor/datatables/jquery.dataTables.js"></script>
<script src="jtables/vendor/datatables/dataTables.bootstrap4.js"></script>