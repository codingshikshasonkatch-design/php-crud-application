<?php 
require 'connection.php';

$id = $_GET['id'];

$select_q = "SELECT * FROM students WHERE id='$id'";

$exec_q = mysqli_query($conn, $select_q);

$student_data = mysqli_fetch_assoc($exec_q);
 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student View</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container">
		<h2 class="text-center">Student Detail</h2>
		<div class="row">
			<label>Full Name</label>
			<p><?php echo $student_data['full_name']; ?></p>
		</div>
		<div class="row">
			<label>Email</label>
			<p><?php echo $student_data['email']; ?></p>
		</div>
		<div class="row">
			<label>Phone</label>
			<p><?php echo $student_data['phone']; ?></p>
		</div>
		<div class="row">
			<label>Class</label>
			<p><?php echo $student_data['class']; ?></p>
		</div>

		<a href="students_list.php" class="btn btn-success">Back</a>
	</div>
</body>
</html>