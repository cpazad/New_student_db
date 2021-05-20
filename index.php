<?php require_once "app/autoload.php"?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>New Student Form  </title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	<?php

	if (isset($_POST['add'])) {
		$name 	=	$_POST['name'];
		$email 	=	$_POST['email'];
		$cell 	=	$_POST['cell'];
		$uname 	=	$_POST['uname'];
		$age 	=	$_POST['age'];
		if (isset($_POST['gender'])) {
			$gender =	$_POST['gender'];
		}
		
		$shift 	=	$_POST['shift'];
		$location =	$_POST['location'];

		// image uploader information and unique name creation
		$file_name 		= $_FILES['photo']['name'];
		$file_tmp_name 	= $_FILES['photo']['tmp_name'];
		$unique_name = md5(time().rand()).$file_name;

		// validation process
		if (empty($name) ||
			 empty($email) ||
			 empty($cell) ||
			 empty($uname) ||
			 empty($age) ||
			 empty($gender) ||
			 empty($shift) ||
			 empty($location)

			 	) {
			$mess = valMsg('All Fields are rquired', 'danger');
		}elseif( filter_var( $email , FILTER_VALIDATE_EMAIL  ) == false ) {
			$mess =  valMsg('Invalid Email Address', 'info');
		}elseif( $age <= 16 || $age >= 70 ){
			$mess =  valMsg('Invalid age', 'warning');
		}else{
			//send data to database
			$connection -> query("INSERT INTO students (name, email, cell, uname, age, gender, shift, location, photo)
			 VALUES ('$name','$email','$cell','$uname','$age','$gender','$shift','$location', '$unique_name')");
			//Uploading the file
			move_uploaded_file($file_tmp_name,'assets/photo/students/'. $unique_name);
			//Success Message
			$mess = valMsg('Successfully Data send', 'success');
		}
	}


	?>


	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="students.php">All Students</a>
		<div class="card shadow">
			<div class="card-body">
				<h4>New Student Add Form</h4>
				<p> <?php if(isset($mess)){echo $mess;} ?></p>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Gender</label> <br>
						<input name="gender" checked class="" type="radio" value="Male" id="male"> <label for="male">Male</label>
						<input name="gender" class="" type="radio" value="Female" id="female"> <label for="female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Shift</label>
						<select class="form-control" name="shift" id="">
							<option value="">-select-</option>
							<option value="Day">Day</option>
							<option value="Evening">Evening</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
							<option value="">-select-</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Barisal">Barisal</option>
							<option value="Chittagong">Chittagong</option>
							<option value="Khulna">Khulna</option>
							<option value="Mymensingh">Mymensingh</option>
							<option value="Rajshahi">Rajshahi</option>
							<option value="Rangpur">Rangpur</option>
							<option value="Sylhet">Sylhet</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control-file" type="file">
					</div>
					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Add New Student">
					</div>
				</form>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>