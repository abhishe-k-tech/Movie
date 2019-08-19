<!DOCTYPE html>
<html>

<head>
  <title>Add Movie Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



</head>

<body>
  <div class="row header">
    <div class="col-lg-9 col-md-8">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TV Shows</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Celebrities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Watch List</a>
        </li>
      </ul>

    </div>

    <div class="col-lg-3 col-md-4">
      <div class="search">
        <input class="form-control mr-sm-2 br" type="text" placeholder="Search..." >
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <h5 class="mt-25">Add New Movie</h5>
    </div>
    <div class="col-12">
      <form method="post"  action ="ajax.php" enctype="multipart/form-data">
        <label class="lbl">Movie Name</label>
        <input class="inp" type="text" id="moviename" name="moviename" required><br>
        <label class="lbl">Year of Relase</label>
        <input class="inp1" type="text" id="year" name="year" required><br>
        <label class="lbl">Plot</label>
        <textarea class="inp2" type="text" id="plot" name="plot" required></textarea><br>
        <label class="lbl">Poster</label>

        <input type="file" id="selectedFile" name="selectedFile" style="display: none;" accept="image/*" required/>
        <input  type="button" class="btn btn-success btn-sm inp3 " value="+Image" onclick="document.getElementById('selectedFile').click();" required/><br>
        <label class="lbl">Cast</label>

        <select id="myFilter" name="myFilter[]" class="multiple_select inp8" onclick="addCombo();" multiple required>
          

        </select>



        <button type="button" class="btn btn-success btn-sm mlt" data-toggle="modal" data-target="#myModal">+Actor</button><br>
        <input type="submit" value="Save" name="addMovie" class="btn btn-success btn-sm  ml-239" />
        <input type="button" value="Cancel" class="btn btn-light btn-sm"/>
      </form>
    </div>

    <div class="modal" id="myModal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">


          <div class="modal-header">
            <h5 class="modal-title">Add Actor</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>


          <div class="modal-body">
            <form method="post" id="actorr" onsubmit="return addCombo();" >
              <label class="lbl">Actor Name</label>
              <input class="mic0" type="text" id="actorname" name="actorname" required/><br>
              <label class="lbl">Sex</label>
              <div class="form-check-inline">
                <label class="form-check-label mic1" for="radio1">
                  <input type="radio" class="form-check-input " id="gender" name="gender" value="male" required/>Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                  <input type="radio" class="form-check-input form-check-label" id="gender" name="gender" value="female" />Female
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                  <input type="radio" class="form-check-input" id="gender" name="gender" value="other" />Other
                </label>
              </div><br>
              <label class="lbl">Date of Birth</label>
              <input class="mic2" type="date" id="dob" name="dob" required/><br>
              <label class="lbl">Bio</label>
              <textarea class="mic3" type="text" id="bio" name="bio" required></textarea><br>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>

              <input type="submit" class="btn btn-success btn-sm" value="Done" />
            </form>
          </div>

        </div>
      </div>
    </div>

  </div>

  <script>


    function addCombo() {
      actorname=$("#actorname");
      gender=$("#gender");
      dob=$("#dob");
      bio=$("#bio");
      if(actorname.val()!="") {
        $("#myFilter").append('<option>'+actorname.val()+'</option>');


        actorname=$("#actorname");
        gender=$("#gender");
        dob=$("#dob");
        bio=$("#bio");
        $.post("ajax.php",
        {
          action:"addActor",
          actorname: actorname.val(),
          gender:gender.val(),
          dob:dob.val(),
          bio:bio.val()
        },
        function(data,status){
          alert(data);
        });
        $('#actorname').trigger("reset")
        $('#myModal').modal('hide');
        value=$("#actorname").val('');
      }
      $(".multiple_select").mousedown(function(e) {
        if (e.target.tagName == "OPTION")
        {
return; //don't close dropdown if i select option
}
$(this).toggleClass('multiple_select_active'); //close dropdown if click inside <select> box
});
      $(".multiple_select").on('blur', function(e) {
$(this).removeClass('multiple_select_active'); //close dropdown if click outside <select>
});

$('.multiple_select option').mousedown(function(e) { //no ctrl to select multiple
  e.preventDefault();
$(this).prop('selected', $(this).prop('selected') ? false : true); //set selected options on click
$(this).parent().change(); //trigger change event
});


$("#myFilter").on('change', function() {
var selected = $("#myFilter").val().toString(); //here I get all options and convert to string
var document_style = document.documentElement.style;
if(selected !== "")
  document_style.setProperty('--text', "'Selected: "+selected+"'");
else
  document_style.setProperty('--text', "'Select'");
});

return false;
}


$(document).ready(function() {
  $.post("ajax.php",
  {
    action:"actorData",
  },
  function(data,status) {
    var i;
    for(i=0;i<data.length;i++) {
      $("#myFilter").append('<option>'+data[i]+'</option>');
    }
  });
});


</script>
</body>
</html>
