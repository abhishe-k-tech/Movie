<?php
require ('conn.php');
if ($_POST['action'] == "movieData") {
	header('Content-Type: application/json');
	$result    = array();
	$movieData = mysqli_query($conn, "SELECT * from movie where 1 Limit 10");
	while ($fetchedData = mysqli_fetch_assoc($movieData)) {
		array_push($result, $fetchedData);
	}
	echo json_encode($result, true);
} else if ($_POST['action'] == "actorData") {
	header('Content-Type: application/json');
	$result    = array();
	$actorData = mysqli_query($conn, "SELECT * from actor where 1");
	while ($fetchedData = mysqli_fetch_assoc($actorData)) {
		array_push($result, $fetchedData['actorName']);
	}
	echo json_encode($result, true);
} else if ($_POST['action'] == "addActor") {
	header('Content-Type: application/json');
	$actorData = mysqli_query($conn, "INSERT INTO actor(actorName, actorGender, actorDOB, actorBio) VALUES ('{$_POST['actorname']}', '{$_POST['gender']}', '{$_POST['dob']}', '{$_POST['bio']}')");
	echo mysqli_error($conn);
	if ($actorData) {
		$result = "Actor Added.";
	} else {
		$result = "Failed.";
	}
	echo json_encode($result, true);

} else if (isset($_POST["addMovie"])) {
	$target_path = "uploads/";
	if (!is_dir($target_dir)) {
		mkdir($target_dir);
	}
	$target_path = $target_path.basename($_FILES['selectedFile']['name']);
	if (move_uploaded_file($_FILES['selectedFile']['tmp_name'], $target_path)) {
		//echo "File uploaded successfully!";
		// print_r($_POST);
		// exit();
		$castname="";
		foreach($_POST['myFilter'] as $cast){
			$castname.=$cast.", ";
		}
		// echo $castname;
		// exit();
		$movieData = mysqli_query($conn, "INSERT INTO movie(movieName, releaseYear, plot, PosterUrl, cast) VALUES ('{$_POST['moviename']}', '{$_POST['year']}', '{$_POST['plot']}', '{$target_path}', '{$castname}') ");
		if ($movieData) {
			echo "<script>
			alert('Movie Added.');
			window.location.href='add_movie.php';
			</script>";
		} else {
			echo "<script>alert('Movie Not Added.'')</script>
			window.location.href='add_movie.php';
			</script>";
		}
	} else {
		echo "<script>alert('Movie Not Added.'')</script>
			window.location.href='add_movie.php';
			</script>";
	}

} else if ($_POST['action'] == "editMovie") {
	header('Content-Type: application/json');
	$movieUpdate = mysqli_query($conn, "UPDATE movie SET movieName='{$_POST['movieName']}', releaseYear='{$_POST['year']}', plot='{$_POST['plot']}', cast='{$_POST['cast']}' WHERE movieID='{$_POST['id']}'");
	echo mysqli_error($conn);
	if ($movieUpdate) {
		$result = "Movie Details Updated.";
	} else {
		$result = "Updated Failed.";
	}
	echo json_encode($result, true);
}
?>
