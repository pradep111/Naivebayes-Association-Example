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
	$ooad_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1"));
/*collecting informations from form*/
	if (($_SERVER['REQUEST_METHOD'] == 'POST')&&(isset($_POST['btnPredict']))){
		$subject_to_predict= $_POST['op_subject'];

/*to collect previous result in an array*/
		$appeared_subjects= array();
		$appeared_subjects_results= array();

		if (isset($_POST['ip_c'])){
			array_push($appeared_subjects,"c");
			if (isset($_POST['result_c'])){
				array_push($appeared_subjects_results,1);
			}else{
				array_push($appeared_subjects_results,0);
			}
		}
		if (isset($_POST['ip_cplus'])){
			array_push($appeared_subjects,"cplus");
			if (isset($_POST['result_cplus'])){
				array_push($appeared_subjects_results,1);
			}else{
				array_push($appeared_subjects_results,0);
			}
		}
		if (isset($_POST['ip_ooad'])){
			array_push($appeared_subjects,"ooad");
			if (isset($_POST['result_ooad'])){
				array_push($appeared_subjects_results,1);
			}else{
				array_push($appeared_subjects_results,0);
			}
		}

/*/copied to variables*/

	$result = find_confidence($appeared_subjects,$appeared_subjects_results,$subject_to_predict)*100;

	}
?>

<?php


	function find_confidence($subjects,$result,$subject_to_predict){
		Global $dbconfig;
		if (count($subjects)==1) {
			$support_both= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE $subjects[0]=$result[0] AND $subject_to_predict=1"));
			$support_single= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE $subjects[0]=$result[0]"));
			$confidence=$support_both/$support_single;
			return $confidence;

		}elseif (count($subjects)==2) {
			$support_triple= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE $subjects[0]=$result[0] AND $subjects[1]=$result[1] AND $subject_to_predict=1"));
			$support_double= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE $subjects[0]=$result[0] AND $subjects[1]=$result[1]"));
			$confidence=$support_triple/$support_double;
			return $confidence;
		}	
	}

 ?>

 <?php 
/*add new row to dataset*/
	if (($_SERVER['REQUEST_METHOD'] == 'POST')&&(isset($_POST['btnAddRecord']))){
		$add_message="True";
		$new_c=0;$new_cplus=0;$new_ooad=0;
		if (isset($_POST['new_c'])) {
			$new_c=1;
		}
		if (isset($_POST['new_cplus'])) {
			$new_cplus=1;
		}
		if (isset($_POST['new_ooad'])) {
			$new_ooad=1;
		}

		$sql="INSERT INTO `students`(`c`, `cplus`, `ooad`) VALUES ($new_c,$new_cplus,$new_ooad)";
		mysqli_query($dbconfig,$sql);

	}
  ?>

