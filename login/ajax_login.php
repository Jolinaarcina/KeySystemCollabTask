<?php
	session_start();
	include ("../MYSQL/MysqliDb.php");
	include '../connection.php';

	if(isset($_POST["action"]))
  	{
  		if($_POST["action"] == "fetch")
  		{
			// if ($_SESSION['status'] == 'active')
			if (!empty($_SESSION))
		    {
		    	echo "1";
		    }
  		}
	  	if($_POST["action"] == "login")
	    {
			$uname = sha1($_POST['username']);
			$pword = sha1($_POST['pass']);


			$sql = "Select * from account where user like ('".$uname."') and pass like ('".$pword."')";

			$result = $db->rawQueryOne($sql);

			if (!empty($result))
			{
				$_SESSION['usertype'] = 'admin';
				$_SESSION['status'] = 'active';
				echo "2";
			}
			else
			{
				echo'
					<br>
					<div class="container" style="text-align:center;">
						<div class="alert alert-danger alert-dismissible fade show">
							<span><b> Your Login Name or Password is invalid</b></span>
						</div>
					</div> 
					';
			}
	    }
  	}
?>


