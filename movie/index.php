<!DOCTYPE html>
<html>

<head>
    <title>Movie_details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>

    <div class="row header">
        <div class="col-lg-9 col-md-8">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" Selected>Movies</a>
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
                <input class="form-control mr-sm-2 br" id="myInput" type="text" placeholder="Search..." >
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mt-h">Top 10 Movies</h3>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success mt" onclick="window.open('add_movie.php','_self')">+Movie</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Poster</th>
                        <th>Movie Name</th>
                        <th>Year of Release</th>
                        <th>Plot</th>
                        <th>Cast</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <script>
                        $(document).ready(function(){
                            $.post("ajax.php",
                            {
                                action:"movieData",
                            },
                            function(data,status){
                             for(i=0;i<data.length;i++) {
                               // alert(data[i].movieName);
                               $("#myTable").append("<tr><td><img src='"+data[i].PosterUrl+"' height='120px' width='80px'> </td><td>"+data[i].movieName+"</td><td>"+data[i].releaseYear+ "</td><td>"+data[i].plot+"</td><td>"+data[i].cast+"</td><td><a href='#' id='"+data[i].movieID+"' class='fa fa-pen edit' title='Edit' data-toggle='tooltip'></a><a href='#' id='"+data[i].movieID+"' class='fa fa-plus add' title='Add' data-toggle='tooltip' style='display:none;'></a></tr>");
                           }
                       })
                        });

                        $('[data-toggle="tooltip"]').tooltip();
                        $(document).on("click", ".add", function(){
                            var id=this.id;
                            var empty = false;
                            var input = $(this).parents("tr").find('input[type="text"]');
                            var newdata=new Array;
                            var data1;
                            input.each(function(){
                                if(!$(this).val()){
                                    $(this).addClass("error");
                                    empty = true;
                                } else{
                                    $(this).removeClass("error");
                                }
                            });

                            $(this).parents("tr").find(".error").first().focus();
                            if(!empty){
                                input.each(function(){
                                    $(this).parent("td").html($(this).val());
                                    data1=$(this).val();
                                    newdata.push(data1);
                                });
                                $(this).parents("tr").find(".add, .edit").toggle();
                                try{
                                    $.post("ajax.php",
                                    {
                                        action:"editMovie",
                                        id:id,
                                        movieName:newdata[0],
                                        year:newdata[1],
                                        plot:newdata[2],
                                        cast:newdata[3]
                                    },function(data,status)
                                    {
                                        alert(data);
                                    });
                                }catch(e)
                                {
                                    alert(e);
                                }
                                return false;

                            }
                        });
                        $(document).on("click", ".edit", function(){
                            $(this).parents("tr").find("td:not(:first-child):not(:last-child)").each(function(){
                                $(this).html('<input type="text" class="form-control" value="'+ $(this).text() + '">');
                            });
                            $(this).parents("tr").find(".add, .edit").toggle();
                       });
                       $(document).ready(function(){

                       $("#myInput").on("keyup", function() {
    
    
    
    
    
    
    
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
                       });
                   </script>
               </tbody>
           </table>
       </div>
   </div>

                    </div>
</body>
</html>