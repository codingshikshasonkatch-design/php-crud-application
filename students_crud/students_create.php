<?php 
require 'connection.php';

if (!empty($_POST)) {

	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$class = $_POST['class'];

	$insert_q = "INSERT INTO students (full_name, email, phone, class) VALUES ('$full_name', '$email', '$phone', '$class')";

	$resp = mysqli_query($conn, $insert_q);
	if ($resp) {
		header("location:students_list.php?msg=record-inserted");
	}else{
		header("location:students_create.php?msg=record-inserted-failed");
	}

}






 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Create</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</head>
<body>

	<div class="container">
		<h2>Student Create</h2>

		<form method="POST" action=''>
			<div>
				<label>Full Name </label>
				<input type="text" name="full_name" placeholder="Enter Full Name" class="form-control">
			</div>
			<div>
				<label>Email </label>
				<input type="email" name="email" placeholder="Enter Email" class="form-control">
			</div>
			<div>
				<label>Phone </label>
				<input type="phone" name="phone" placeholder="Enter Phone Number" class="form-control">
			</div>
			<div>
				<label>Class </label>
				<input type="text" name="class" placeholder="Enter Class" class="form-control">
			</div>
			<div class="mt-2">
				<input type="submit" name="submit" class="btn btn-success">
				<a href="students_list.php" class="btn btn-info">Back</a>
			</div>
		</form>
	</div>




</body>
</html>