<?php 
require 'connection.php';

$select_q = "SELECT * FROM students";

$exec_q = mysqli_query($conn, $select_q);

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Students list</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container">
		<h2 class="text-center">Students Record</h2>

		<?php if (!empty($_GET) && $_GET['msg']=='record-deleted'): ?>
			<p class="alert alert-success">Record Deleted Successfully.</p>
		<?php endif ?>

		<?php if (!empty($_GET) && $_GET['msg']=='record-inserted'): ?>
			<p class="alert alert-success">Record Inserted Successfully.</p>
		<?php endif ?>

		<?php if (!empty($_GET) && $_GET['msg']=='record-inserted-failed'): ?>
			<p class="alert alert-danger">Record Inserted Failed.</p>
		<?php endif ?>

		<?php if (!empty($_GET) && $_GET['msg']=='record-updated'): ?>
			<p class="alert alert-success">Record Updated Successfully.</p>
		<?php endif ?>

		<?php if (!empty($_GET) && $_GET['msg']=='record-updated-failed'): ?>
			<p class="alert alert-danger">Record Updated Failed.</p>
		<?php endif ?>

		<?php if (!empty($_GET) && $_GET['msg']=='record-deleted-failed'): ?>
			<p class="alert alert-danger">Record Deleted Failed.</p>
		<?php endif ?>

		
		<a href="students_create.php" class="btn btn-success float-end">Add Students</a>
		<table class="table">
			<thead>
				<tr>
					<td>Sn</td>
					<td>Full Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Class</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (mysqli_num_rows($exec_q) > 0) {
					$sn = 1;
					while ($row = mysqli_fetch_array($exec_q)) { ?>
						
					<tr>
						<td><?php echo $sn++; ?>.</td>
						<td><?php echo $row['full_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['class']; ?></td>
						<td>
							<a href="students_view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">View</a>
							<a href="students_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
							<a href="students_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are you sure, want to delete this record?")'>Delete</a>
						</td>
					</tr>



					<?php }


					
				}else{ ?>

					<tr>
						<td colspan="6" class="text-center">No Record Found</td>
					</tr>

				<?php }
				 ?>
			</tbody>
		</table>
	</div>

</body>
</html>