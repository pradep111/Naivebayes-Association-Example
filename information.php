<?php
	/*Database Connection*/
	$host = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'students';
	Global $dbconfig;
	$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured when connecting to the database");
?>

<?php 
	$total_rows= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students"));
	$c_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE c=1"));
	$cplus_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE cplus=1"));
	$ooad_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1"));?>


						<p>Number of Rows in Dataset: <b><?=$total_rows?></b></p>
						<p>Passed in C Programming: <b><?=$c_passed?></b></p>
						<p>Passed in C++ Programming: <b><?=$cplus_passed?></b></p>
						<p>Passed in OOAD: <b><?=$ooad_passed?></b></p>