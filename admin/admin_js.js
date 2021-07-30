$(document).ready(function(){
  //dashboard start
  fetch_data();
  // setInterval(function(){reload()},10000);

  function reload()
  {
     fetch_data();
  }

  function fetch_data()
  {
    var action = "fetch";
    $.ajax({
     url:"dashboard.php",
     method:"POST",
     data:{action:action},
     success:function(data)
     {
        $('#end').html(data);
     }
    })
  }

  $(document).ready(function(){
    $('#btnDashboard').click(function(event){
      event.preventDefault();
      var action = "fetch";
      $.ajax({
        url:"dashboard.php",
        method:"POST",
        data:{action:action},
        success: function(Result){
        $('#end').html(Result)
        }
      })
    })
  })

  $(document).on('click', '.borrow', function(){
    $('#room_id').val($(this).attr("id"));
    $('#borrowModal').modal("show");
   })

  $('#room_form').submit(function(event){
    event.preventDefault();
    var bname = $('#bname').val();
    var bposition = $('#bposition').val();
    var bdescription = $('#bdescription').val();
    if(bname == '' || bposition == '' || bdescription == '')
    {
     alert("One or more field are empty ...");
     return false;
    }
    else
    {
      $.ajax({
       url:"dashboard.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data)
       {
        alert('Successfully saved ...');
        fetch_data();
        $('#room_form')[0].reset();
        $('#borrowModal').modal('hide');
       }
      });
    }
   });

    $("#viewModal").on("shown.bs.modal", function(e){
      var ids = $(e.relatedTarget).data("id");
        $.ajax({
          url: "viewModal.php?id="+ids,
          cache: false,
          success: function (d) 
          {
            $("#Views").html(d);  
          }
      })
    })

    $(document).on('click', '.return', function(){
      var id = $(this).attr("id");
      var action = "action_return";
      if(confirm("Confirm to return?"))
      {
       $.ajax({
        url:"dashboard.php",
        method:"POST",
        data:{id:id, action:action},
        success:function(data)
        {
         alert('Successfully returned ...');
         fetch_data();
        }
       })
      }
      else
      {
       return false;
      }
     });




    //end of dashboard




  //rooms start
  function rooms()
  {
    var action = "rooms";
    $.ajax({
     url:"rooms.php",
     method:"POST",
     data:{action:action},
     success:function(data)
     {
      $('#end').html(data);
     }
    })
   }

  $(document).ready(function(){
    $('#btnRooms').click(function(event){
      event.preventDefault();
      var action = "rooms";
      $.ajax({
        url:"rooms.php",
        method:"POST",
        data:{action:action},
        success: function(Result){
        $('#end').html(Result)
        }
      })
    })
  })

  $(document).on('click', '.add_room', function(){
    $('#add_roomModal').modal("show");
    $('#a_rooms')[0].reset();
    $('.modal-title').text("Create new room");
    $('#room_ida').val('');
    $('#action').val('action_addroom');
    $('#btn_addroom').val("SAVE");
  })

  $('#a_rooms').submit(function(event){
    event.preventDefault();
    var room = $('#a_room').val();
    var key = $('#a_key').val();
    if(room == '' || key == '')
    {
      alert("One or more field are empty ...");
      return false;
    }
    else
    {
      $.ajax({
       url:"rooms.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data)
       {
        alert('Room Inserted into Database');
        rooms();
        $('#a_rooms')[0].reset();
        $('#add_roomModal').modal('hide');
       }
      });
    }
   });

  $(document).on('click', '.update_room', function(){
    $('#room_idu').val($(this).attr("id"));
    $('#action').val("action_updateroom");
    $('.modal-title').text("Room Info");
    $('#btn_updateroom').val("SAVE");
    $('#update_roomModal').modal("show");

     $tr = $(this).closest('tr');
     var data = $tr.children("td").map(function(){
      return $(this).text();
     }).get();

    console.log(data);
      $('#u_room').val(data[4]);
      $('#u_key').val(data[5]);
    });

  $('#u_rooms').submit(function(event){
    event.preventDefault();
    var room = $('#u_room').val();
    var key = $('#u_key').val();
    if(room == '' || key == '')
    {
      alert("One or more field are empty ...");
      return false;
    }
    else
    {
      $.ajax({
       url:"rooms.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data)
       {
        alert('Room Updated into Database');
        rooms();
        $('#u_rooms')[0].reset();
        $('#update_roomModal').modal('hide');
       }
      });
    }
   });

   $(document).on('click', '.delete_room', function(){
      var id = $(this).attr("id");
      var action = "action_deleteroom";
      if(confirm("Are you sure you want to remove this room from database?"))
      {
       $.ajax({
        url:"rooms.php",
        method:"POST",
        data:{id:id, action:action},
        success:function(data)
        {
         alert('File Deleted from Database');
         rooms();
        }
       })
      }
      else
      {
       return false;
      }
    });




   //end of rooms




   //start of history
  $(document).ready(function(){
      $('#btnHistory').click(function(event){
        event.preventDefault();
        var action = "history";
        $.ajax({
          url:"history.php",
          method:"POST",
          data:{action:action},
          success: function(Result){
          $('#end').html(Result)
          }
        })
      })
    })




  //end of history




  //start of logout
  $(document).ready(function(){
    $('#btnSign').click(function(event){
      event.preventDefault();
      if(confirm("Are you sure you want to sign out?"))
      {
        $.ajax({
          url:"ajax_logout.php",
          datatype:"html",
          success: function(Result)
          {
            if (Result == 1)
            {
              window.location = "../";
            }
          }
        })
      }
      else
      {
        return false;
      }
    })
  })




  //end of logout

})