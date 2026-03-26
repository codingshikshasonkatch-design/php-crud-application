<?php 

require 'connection.php';

$id = $_GET['id'];

$delete_q = "DELETE FROM students WHERE id='$id'";

$resp = mysqli_query($conn, $delete_q);
 
if ($resp) {
	header("location:students_list.php?msg=record-deleted");
}else{
	header("location:students_list.php?msg=record-deleted-failed");
}


 ?>
