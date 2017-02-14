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
	$college_students->edit($_POST['id'], $_POST['name'], $_POST['gender'], 
		$_POST['phone_number'], $_POST['address'], 0);


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
				<form action="edit_collegestudent.php" method="POST" enctype="multipart/form-data">
					<hr style="background-color: #000">
						<input type="hidden" name="id" value="<?= $student['id']?>">
						<label>Name College Student :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
								<input type="text" name="name" class="form-control" placeholder="Name college student" value="<?=$student['name']?>" required="">
						</div>
						<label>Gender :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-venus-mars" aria-hidden="true"></i>
							</span>
							<select name="gender" class="form-control">
								<option>=> Gender <=</option>
								<?php if ($student['gender'] =='female') {
									$select1 = 'selected';
									$select2 = '';
									} 
									else {
									$select1 = '';
									$select2 = 'selected';
									}
								?>
								<option value="female" <?=$select1?>> => Female </option>
								<option value="male" <?=$select2?>> => Male </option>									
							</select>
						</div>
						<label>Phone Number :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="+62" aria-hidden="true">+62</i>
							</span>
							<input min="0" type="number" name="phone_number" class="form-control" placeholder="Phone Number" value="<?=$student['phone_number']?>" required="">
						</div>
						<label>Address :</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-address-card-o" aria-hidden="true"></i>
							</span>
							<input type="text" name="address" class="form-control" placeholder="Address" value="<?= $student['address']?>" required="">
						</div>
						<br>
						<div align="center">
							<button style="color:#fff;text-decoration: none;" class="btn btn-primary btn-default" type="submit" name="submit" value="1">
							<i class="fa fa-sign-out" aria-hidden="true"></i>Edit</button>
							<a href="index.php?id=<?=$value['id']?>" class="btn btn-primary btn-danger" style="text-decoration: none;color: #fff"><i class="fa fa-times" aria-hidden="true"></i>Kembali ke Home</a>
						</div>
				</tr>
				</form>
	</body>
</html>