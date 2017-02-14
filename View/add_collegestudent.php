<?php 

require __DIR__ . '/../vendor/autoload.php';

use Crud\Src\CollegeStudent;

$student = new CollegeStudent;

if(isset($_POST['submit'])) {
	$dir = 'gambar/';
	
	$name_foto = $_FILES["foto"]["name"];
	
	move_uploaded_file($_FILES["foto"]["tmp_name"], $dir.$name_foto);

	$student->add($_POST['name'], $_POST['gender'], 
		$_POST['phone_number'], $_POST['address'], $dir.$name_foto, 0);

	header("refresh : 2; url=index.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add College Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet"  href="action.css">
	<link href='gambar/aa.png' rel='shortcut icon'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
			<div class="well">
			<div class="form-group">
				<form action="add_collegestudent.php" method="POST"  enctype="multipart/form-data">
					<hr style="background-color: #000">
						<label>Name College Student :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
								<input type="text" name="name" class="form-control" placeholder="Name college student" required="">
						</div>
						<label>Gender :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-venus-mars" aria-hidden="true"></i>
							</span>
							<select name="gender" class="form-control">
								<option>=> Gender <=</option>
								<option value="female">=> Female </option>
								<option value="male">=> Male </option>									
							</select>
						</div>
						<label>Phone Number :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="+62" aria-hidden="true">+62</i>
							</span>
							<input min="0" type="number" name="phone_number" class="form-control" placeholder="Phone Number" required="">
						</div>
						<label>Address :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-address-card-o" aria-hidden="true"></i>
							</span>
							<input type="text" name="address" class="form-control" placeholder="Address" required="">
						</div>
						<label>Image :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-picture-o" aria-hidden="true"></i>
							</span>
							<input type="file" name="foto" class="form-control" placeholder="Image" required="">
						</div>
							<div align="center">
								<button style="color:#fff;text-decoration: none;" class="btn btn-primary btn-default" type="submit" name="submit" value="1">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>Register</button>
							</div>
						<?php if(isset($_POST['submit'])) :?>
							<div class="alert alert-success">
								<span class="glyphicon glyphicon-ok-circle-o"></span>
								<strong>Selamat register berhasil !!</strong>
								<!-- <a href="index.php" class="btn btn-primary btn-default">
									<i class="fa fa-sign-out" aria-hidden="true"></i>Kembali ke Home</a> -->
							</div>
						<?php endif; ?>
				</form>
				</div>
				</div>
				</div>
	</body>
</html>
