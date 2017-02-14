<?php 
require __DIR__ . '/../vendor/autoload.php';

use Crud\Src\CollegeStudent;
$college_students = new CollegeStudent();
if(isset($_GET['id'])) {
	$student = $college_students->getCollegeStudentId($_GET['id']);
}else {
	$student = null ;
}

if(isset($_POST['submit'])) {
	$dir = 'gambar/';
	
	$name_foto = $_FILES["foto"]["name"];
	
	move_uploaded_file($_FILES["foto"]["tmp_name"], $dir.$name_foto);

	$college_students->editPhoto($_POST['id'], $dir.$name_foto);


	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit College Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet"  href="action.css">
	<link href='gambar/aa.png' rel='shortcut icon'>
</head>
	<body>
		<div class="container">
			<div class="well">
			<div class="form-group">
				<form action="edit_photo.php" method="POST" enctype="multipart/form-data">
					<hr style="background-color: #000">
					<input type="hidden" name="id" value="<?= $student['id']?>">
					<label>Replace your image :</label>
						<img src="<?= $student['photo'] ?>" width="100px" height="100px">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-picture-o" aria-hidden="true"></i>
							</span>
							<input type="file" name="foto" class="form-control" placeholder="Image" value="" >
						</div>
						<div align="center">
							<button style="color:#fff;text-decoration: none;" class="btn btn-primary btn-default" type="submit" name="submit" value="1">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Simpan</button>
						</div>
			</form>
	</body>
</html>