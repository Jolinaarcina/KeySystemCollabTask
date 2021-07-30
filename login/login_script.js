 $(document).ready(function(){

   fetch_data();

   function fetch_data()
   {
    var action = "fetch";
    $.ajax({
     url:"login/ajax_login.php",
     method:"POST",
     data:{action:action},
     success:function(data)
     {
		if (data == 1)
		{
			window.location.href = "admin/admin.php";
		}
     }
    })
   }
})

$("#Login").click(function()
{
	var action = "login";
	var username = $('#username').val();
	var pass = $('#pass').val();
	$("#Login").html('<li class="fa fa-spinner fa-spin"></li>Logging in ...')
	$.ajax({
		type: "POST",
		url: "login/ajax_login.php",
		data:{action:action,username:username,pass:pass},
		success: function(d)
		{
			if (d == 2)
			{
				window.location.href = "admin/admin.php";
			}
			else
			{
				$("#message").html(d);
			}
			$("#Login").html('Login');
		}
	})
})