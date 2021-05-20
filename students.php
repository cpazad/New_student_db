<?php include_once"app/autoload.php"?>
<?php 


 	/**
     * Destroy user data with photo
     */

if (isset($_GET['del_id'])) {
	$delete_id = $_GET['del_id'];
	$delete_photo = $_GET['photo_delete'];

	$sql = "DELETE FROM students WHERE id='$delete_id'";
	$connection -> query($sql);

	unlink('assets/photo/students/' . $delete_photo);
	header("location:students.php");
}


/**
 * active user
 */

if (isset($_GET['active_id'])) {
	$active_id = $_GET['active_id'];
	$connection -> query("UPDATE students SET status = 'inactive' WHERE id = '$active_id'");
	header('location:students.php');
}

/**
 * inactive user
 */

if (isset($_GET['inactive_id'])) {
	$inactive_id = $_GET['inactive_id'];
	$connection -> query("UPDATE students SET status = 'active' WHERE id = '$inactive_id'");
	header('location:students.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students Database </title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- Font_Awesome cdn link -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body class="studentBody">
	
	

	<div class="wrap-table ">
	<a class="btn btn-sm btn-primary" href="index.php">Add New Students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Students</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<!-- Getting all data from the database and setting them on the table with while loop -->
					<?php
					$data = $connection -> Query('SELECT * FROM students');
					$i = 1;
					while($all_data = $data -> fetch_assoc()):

					?>
						<tr>
							<td><?php echo $i; $i++;?></td>
							<td><?php echo $all_data['name'];?></td>
							<td><?php echo $all_data['email'];?></td>
							<td><?php echo $all_data['cell'];?></td>
							<td><img src="assets/photo/students/<?php echo $all_data['photo'];?>" alt=""></td>
							<!-- control Buttons -->
							<td>
								<?php if($all_data['status']== 'inactive'):?>
									<a class="btn btn-sm btn-success" href="?inactive_id=<?php echo $all_data['id'];?>"><i class="far fa-thumbs-up"></i></a>	
								<?php elseif($all_data['status']== 'active'):?>
									<a class="btn btn-sm btn-dark" href="?active_id=<?php echo $all_data['id'];?>"><i class="far fa-thumbs-down"></i></a>	
								<?php endif;?>
								
								<a class="btn btn-sm btn-info" href="profile.php?user_id=<?php echo $all_data['id']; ?>"><i class="fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php echo $all_data['id']; ?>"><i class="far fa-edit"></i></a>
								<a id="delete_btn" class="btn btn-sm btn-danger" href="?del_id=<?php echo $all_data['id'];?>&photo_delete=<?php echo $all_data['photo'];?>"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
						
						<?php endwhile; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script>
	$('a#delete_btn').click(function () {
		let $sure = confirm('Are you sure?');
		if ($sure == true) {
			return true;
		} else {
			return false;
		}
	});
	
	</script>
</body>
</html>