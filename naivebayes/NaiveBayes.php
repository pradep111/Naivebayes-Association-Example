<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST')&&(isset($_POST['btnP']))){
	
			if (isset($_POST['result_c'])){
				 $c=1;
				 $c_result="Passed";
			}else{
				  $c=0;
				 $c_result="Failed";
			}

		if (isset($_POST['result_cplus'])){
				 $cplus=1;
				 $cplus_result="Passed";				
			}else{
				 $cplus=0;
				 $cplus_result="Failed";
			}

					
	



	$total_rows= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students"));
	$c_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE c=1"));
	$cplus_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE cplus=1"));
	$ooad_passed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1"));
	$ooad_failed= mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=0"));

	$c_passed_and_ooad_passed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1 and c=1"));
	$c_failed_and_ooad_passed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1 and c=0"));
	$c_passed_and_ooad_failed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=0 and c=1"));
	$c_failed_and_ooad_failed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=0 and c=0"));

	$cplus_passed_and_ooad_passed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1 and cplus=1"));
	$cplus_failed_and_ooad_passed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=1 and cplus=0"));
	$cplus_passed_and_ooad_failed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=0 and cplus=1"));
	$cplus_failed_and_ooad_failed=mysqli_num_rows(mysqli_query($dbconfig,"SELECT * FROM students WHERE ooad=0 and cplus=0"));

	//Calcution of Probabilities.
	$Pc_passed = $c_passed/$total_rows;
	$Pcplus_passed = $cplus_passed/$total_rows;

	//probabilites of class ooad pass and class ooad failed.
	$Pooad_passed = $ooad_passed/$total_rows;
	$Pooad_failed = $ooad_failed/$total_rows;

	//conditional probabities for ooad with c
	$Pc_passed_and_ooad_passed=$c_passed_and_ooad_passed/$ooad_passed;
	$Pc_failed_and_ooad_passed=$c_failed_and_ooad_passed/$ooad_passed;
	$Pc_passed_and_ooad_failed=$c_passed_and_ooad_failed/$ooad_failed;
	$Pc_failed_and_ooad_failed=$c_failed_and_ooad_failed/$ooad_failed;
	
	//conditional probabities for ooad with cplus
	$Pcplus_passed_and_ooad_passed=$cplus_passed_and_ooad_passed/$ooad_passed;
	$Pcplus_failed_and_ooad_passed=$cplus_failed_and_ooad_passed/$ooad_passed;
	$Pcplus_passed_and_ooad_failed=$cplus_passed_and_ooad_failed/$ooad_failed;
	$Pcplus_failed_and_ooad_failed=$cplus_failed_and_ooad_failed/$ooad_failed;
	

	//probabilities of Passing and Failing OOAD if both c and cplus is passed.
	if($c==1 && $cplus==1){
		
		 $Pooad_passing=$Pc_passed_and_ooad_passed*$Pcplus_passed_and_ooad_passed*$Pooad_passed;
		
		 $Pooad_failing=$Pc_passed_and_ooad_failed*$Pcplus_passed_and_ooad_failed*$Pooad_failed;
	}

	//probabilities of Passing and Failing OOAD if  c passed but cplus is failed.
	if($c==1 && $cplus==0){
		$Pooad_passing=$Pc_passed_and_ooad_passed*$Pcplus_failed_and_ooad_passed*$Pooad_passed;
		
		$Pooad_failing=$Pc_passed_and_ooad_failed*$Pcplus_failed_and_ooad_failed*$Pooad_failed;
	}
	//probabilities of Passing and Failing OOAD if both c and cplus is passed.
	if($c==0 && $cplus==1){
		$Pooad_passing=$Pc_failed_and_ooad_passed*$Pcplus_passed_and_ooad_passed*$Pooad_passed;
		
		$Pooad_failing=$Pc_failed_and_ooad_failed*$Pcplus_passed_and_ooad_failed*$Pooad_failed;
	}
	//probabilities of Passing and Failing OOAD if both c and cplus is passed.
	if($c==0 && $cplus==0){
		$Pooad_passing=$Pc_failed_and_ooad_passed*$Pcplus_failed_and_ooad_passed*$Pooad_passed;
		
		$Pooad_failing=$Pc_failed_and_ooad_failed*$Pcplus_failed_and_ooad_failed*$Pooad_failed;
	}

$Pooad_passing=$Pooad_passing;
$Pooad_failing=$Pooad_failing;
if($Pooad_passing>$Pooad_failing){
	$result2="OOAD Pass";
}else{
	$result2="OOAD Fail";
}
							

							// echo "<script>document.getElementById('form2').style.display = 'none';</script>";
							// echo "<div class='alert alert-info' role='alert'>";
							// echo "<label>Provided Informations</label>";
							// echo "<table class='table'><thead><tr><th>Subject</th><th>Result</th></tr></thead><tbody>";
							// echo "<tr><td>C Programming</td><td>".$c_result."</td></tr>";
							// echo "<tr><td>C++ Programming</td><td>".$cplus_result."</td></tr>";
							// echo "</tbody></table>";
							// echo "<hr>";
							// //echo "<b>Confidence to pass:</b><i> ".$Pooad_passing"%</i></div>";
							// echo "<b>The Prediction is <strong>".$result2."</strong> ";
							// echo "<a href='index.php' style='float:right'>Back to Home</a>";

}			
?>
