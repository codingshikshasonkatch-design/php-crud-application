<?php 
require 'connection.php';

$id = $_GET['id'];

if (!empty($_POST)) {
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$class = $_POST['class'];

	$update_q = "UPDATE students SET full_name='$full_name', email='$email', phone='$phone', class='$class' WHERE id='$id'";
	$exec_q = mysqli_query($conn, $update_q);
	if ($exec_q) {
		header("location:students_list.php?msg=record-updated");
	}else{
		header("location:students_edit.php?msg=record-updated-failed");
	}
}

$select_q = "SELECT * FROM students WHERE id='$id'";
$exec_q = mysqli_query($conn, $select_q);

$student_data = mysqli_fetch_assoc($exec_q);

?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Edit</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body>

	<div class="container">
		<h2>Student Edit</h2>

		<form method="post" action=''>
			<div>
				<label>Full Name </label>
				<input type="text" name="full_name" value="<?php echo $student_data['full_name']; ?>" placeholder="Enter Full Name" class="form-control">
			</div>
			<div>
				<label>Email </label>
				<input type="email" name="email" value="<?php echo $student_data['email']; ?>" placeholder="Enter Email" class="form-control">
			</div>
			<div>
				<label>Phone </label>
				<input type="phone" name="phone" value="<?php echo $student_data['phone']; ?>" placeholder="Enter Phone Number" class="form-control">
			</div>
			<div>
				<label>Class </label>
				<input type="text" name="class" value="<?php echo $student_data['class']; ?>" placeholder="Enter Class" class="form-control">
			</div>
			<div class="mt-2">
				<input type="submit" name="submit" value="Update" class="btn btn-success">
				<a href="students_list.php" class="btn btn-info">Back</a>
			</div>
		</form>
	</div>




</body>
</html>