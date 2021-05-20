<?php require_once "app/autoload.php" ?>
<?php 

if (isset($_GET['user_id'])) {
	$student_id = $_GET['user_id'];

	$sql = "SELECT * FROM students WHERE id = '$student_id'";
	$data = $connection -> Query($sql);

	$single_student= $data -> fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Profile View</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

	<style>
		.profile img {
			width: 200px;
			height: 200px;
			border: 10px solid #fff;
			border-radius: 50%;
			margin: auto;
			display: block;
		}
	</style>
</head>

<body>



	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="students.php">Back to All Students</a>
		<div class="card shadow">
			<div class="card-body profile">
				<img class="shadow" src="assets/photo/students/<?php echo $single_student['photo'];?>" alt="<?php echo $single_student['name'] ?>">
				<div class="profile_name bg-info my-3 p-2 text-center text-white">
					<h2><?php echo $single_student['name'] ?></h2>
					<h4><?php echo $single_student['uname'] ?></h4>
					<h5><?php echo "ID - " . $_GET['user_id']?></h5>
				</div>
				<table class="table table-striped text-right ">
					<tr>
						<td>Name</td>
						<td><?php echo $single_student['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $single_student['email'] ?></td>
					</tr>
					<tr>
						<td>Phone_Number</td>
						<td><?php echo $single_student['cell'] ?></td>
					</tr>
					<tr>
						<td>User_Name</td>
						<td><?php echo $single_student['uname'] ?></td>
					</tr>
					<tr>
						<td>Age</td>
						<td><?php echo $single_student['age'] ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $single_student['gender'] ?></td>
					</tr>
					<tr>
						<td>location </td>
						<td><?php echo $single_student['location'] ?></td>
					</tr>
					<tr>
						<td>Shift</td>
						<td><?php echo $single_student['shift'] ?></td>
					</tr>
				</table>



			</div>
		</div>








		<!-- JS FILES  -->
		<script src="assets/js/jquery-3.4.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
</body>

</html>