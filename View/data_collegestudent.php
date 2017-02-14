<?php 

require  __DIR__ . '/../vendor/autoload.php';

use Crud\Src\CollegeStudent;

$college_students = new CollegeStudent();
$student = $college_students->getAll();

if(isset($_GET['id'])) {
	$college_students->softDelete($_GET['id']);

	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet"  href="action.css">
</head>
	<body>
	<div class="container">
		<div class="well">
		<div class="table-responsive">
			<h3> Daftar college student :</h3>	
			<table class="table table-bordered table-hover table-striped">
				<tr style="background: #FF1000; color: #fff;">
					<td>No</td>
					<td>Id College Student</td>
					<td>Name Student</td>
					<td>Gender</td>
					<td>Phone Number</td>
					<td>Address</td>
					<td>Image</td>
					<td>Option</td>
				</tr>
				<?php $no = 1; ?>
			<?php foreach ($student as $value) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value['id'] ?></td>
					<td><?= $value['name'] ?></td>
					<td><?= $value['gender'] ?></td>
					<td><?="+62". $value['phone_number'] ?></td>
					<td><?= $value['address'] ?></td>
					<td><img src='<?= $value['photo']?>' width='100' height='100'>
						<a href="edit_photo.php?id=<?= $value['id'] ?>" class="btn btn-primary btn-default">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					</td>
					<td align="center">
						<a href="edit_collegestudent.php?id=<?=$value['id']?>" class="btn btn-primary btn-default" style="text-decoration: none;color: #fff">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
						<a href="data_collegestudent.php?id=<?=$value['id']?>" class="btn btn-primary btn-danger" style="text-decoration: none;color: #fff">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		</div>
		</div>
	</body>
</html>
