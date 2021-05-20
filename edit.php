<?php require_once "app/autoload.php"?>

<!-- Geting and form data and validation  -->
<?php

if (isset($_POST['add'])) {

	$edit_id = $_GET['edit_id'];
	//get value
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
		//getting new photo
		$photo_name = '';
        if(empty($_FILES['new_photo']['name'])){
            $photo_name = $_POST['old_photo'];
        }else{
            // Image update
            $file_name = $_FILES['new_photo']['name'];
            $file_tmp_name = $_FILES['new_photo']['tmp_name'];
            $file_size = $_FILES['new_photo']['size'];
            $photo_name = md5(time() . rand()) . $file_name;
            move_uploaded_file($file_tmp_name, 'assets/photo/students/' . $photo_name  );
        }


		//update data to database
		$sql = "UPDATE students SET name='$name', cell = '$cell', email='$email', uname ='$uname', age='$age', gender = '$gender', shift = '$shift', location = '$location', photo ='$photo_name'  WHERE id='$edit_id'  ";
		$connection -> query($sql);
		
		//Success Message
		$mess = valMsg('Data update Successfully', 'success');
	}
}


?>


	<!-- Getting the edit id and getting the data aswell -->

	<?php

if ( isset($_GET['edit_id']) ){
    $edit_id = $_GET['edit_id'];

    $sql = "SELECT * FROM students WHERE id=' $edit_id'";
    $data = $connection -> query($sql);

    $single_data = $data -> fetch_assoc();
		
}


		
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Edit Student Database</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="edit_body">
	


	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="students.php">All Students</a>
		<div class="card shadow">
			<div class="card-body">
				<h4>Update Students Data</h4>
				<p> <?php if(isset($mess)){echo $mess;} ?></p>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $single_data['name'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $single_data['email'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo $single_data['cell'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" value="<?php echo $single_data['uname'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="<?php echo $single_data['age'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Gender</label> <br>
						<input name="gender"  class="" type="radio" <?php if ($single_data['gender'] == 'Male') {
							echo "checked";}?> value="Male" id="male"> <label for="male">Male</label>
						<input name="gender" class="" type="radio" <?php if ($single_data['gender'] == 'Female') {
							echo "checked";}?> value="Female" id="female"> <label for="female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Shift</label>
						<select class="form-control" name="shift" id="">
							<option value="">-select-</option>
							<option <?php if ($single_data['shift'] == 'Day') {echo "Selected";}?> value="Day">Day</option>
							<option <?php if ($single_data['shift'] == 'Evening') {echo "Selected";}?> value="Evening">Evening</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
						<option value="">-select-</option>
                            <option <?php if($single_data['location'] == 'Dhaka') { echo "selected";  }  ?> value="Dhaka">Dhaka</option>
                            <option  <?php if($single_data['location'] == 'Barisal') { echo "selected";  }  ?> value="Barisal">Barisal</option>
                            <option <?php if($single_data['location'] == 'Chittagong') { echo "selected";  }  ?> value="Chittagong">Chittagong</option>
                            <option <?php if($single_data['location'] == 'Khulna') { echo "selected";  }  ?> value="Khulna">Khulna</option>
                            <option <?php if($single_data['location'] == 'Mymensingh') { echo "selected";  }  ?> value="Mymensingh">Mymensingh</option>
                            <option <?php if($single_data['location'] == 'Rajshahi') { echo "selected";  }  ?> value="Rajshahi">Rajshahi</option>
                            <option <?php if($single_data['location'] == 'Rangpur') { echo "selected";  }  ?> value="Rangpur">Rangpur</option>
                            <option <?php if($single_data['location'] == 'Sylhet') { echo "selected";  }  ?> value="Sylhet">Sylhet</option>
						</select>
					</div>
					<div class="form-group">
                        <img style="width: 150px;" src="assets/photo/students/<?php echo $single_data['photo']; ?>" alt="">
                        <input name="old_photo" value="<?php echo $single_data['photo']; ?>" type="hidden">
                    </div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="new_photo" class="form-control-file" type="file">
					</div>
					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Update">
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