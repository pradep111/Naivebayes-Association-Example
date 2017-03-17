<?php 
ini_set('display_errors', 1);
error_reporting(~0);
?>
<?php include 'student.php';
	  include 'naivebayes/NaiveBayes.php';	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Predict Your Result</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
			<div class="page-header">
			  	<h1>Result Predictor</h1><small></small>
			</div>

			<div class="col-md-8">
				<div id="form1">					
				<form onsubmit="return validate();" method="POST" action="index.php">
					<label>Please fill the form correctly.</label>
					 <div class="input-group">
					      <span title="Check only if you've already got result for this subject" class="input-group-addon">
					        <input type="checkbox" name="ip_c" id="ip_c">
					      </span>
					      <span class="input-group-addon" title="Check only if you've already got result for this subject">Appeared</span>
					      <label class="form-control"> C Programming</label>
					      <span class="input-group-addon">
					        <input title="Leave unchecked if you failed in this subject" type="checkbox" name="result_c">
					      </span>
					      <span class="input-group-addon" title="Leave unchecked if you failed in this subject">Passed</span>

    				 </div><!-- /input-group -->
    				 <br>
    				 <div class="input-group">
					      <span title="Check only if you've already got result for this subject" class="input-group-addon">
					        <input type="checkbox" name="ip_cplus" id="ip_cplus">
					      </span>
					      <span class="input-group-addon" title="Check only if you've already got result for this subject">Appeared</span>
					      <label class="form-control"> C++ Programming</label>
					      <span class="input-group-addon">
					        <input title="Leave unchecked if you failed in this subject" type="checkbox" name="result_cplus">
					      </span>
					      <span class="input-group-addon" title="Leave unchecked if you failed in this subject">Passed</span>
    				 </div><!-- /input-group -->
    				 <br>
    				 <div class="input-group">
					      <span title="Check only if you've already got result for this subject" class="input-group-addon">
					        <input type="checkbox" name="ip_ooad" id="ip_ooad">
					      </span>
					       <span class="input-group-addon" title="Check only if you've already got result for this subject">Appeared</span>
					      <label class="form-control"> Object Oriented Analysis & Design</label>
					      <span class="input-group-addon">
					        <input title="Leave unchecked if you failed in this subject" type="checkbox" name="result_ooad">
					      </span>
					      <span class="input-group-addon" title="Leave unchecked if you failed in this subject">Passed</span>
    				 </div><!-- /input-group -->
    				 <hr>
					 <label for="sel1">Select a subject to predict result</label>
					 <div class="row">
	    				 <div class="col-md-8">
		    				 <div class="form-group">
								  <select class="form-control" name="op_subject" id="op_subject">
								    <option value="c">C Programming</option>
								    <option value="cplus">C++ Programming</option>
								    <option value="ooad">Object Oriented Analysis</option>
								  </select>
							</div>
						</div>
						<div class="col-md-4">
							<button type="submit" name="btnPredict" class="btn btn-primary pull-right">Check Now</button>
						</div>
						
					</div>
				</form>
				
				<br>
				<hr>
				
				<h4>To check probability of Passing and Failing OOAD with Naive Bayes</h4>
			
					<form action="index.php"  method="POST">
					 <div class="input-group">
						<label class="form-control"> C Programming</label>
					    <span class="input-group-addon">
					    <input title="Leave unchecked if you failed in this subject" type="checkbox" name="result_c">
					    </span>
					    <span class="input-group-addon" title="Leave unchecked if you failed in this subject">Passed</span>
					    </div>
					    <br>

					    <div class="input-group">
					    <label class="form-control"> C++ Programming</label>
					    <span class="input-group-addon">
					    <input title="Leave unchecked if you failed in this subject" type="checkbox" name="result_cplus">
					    </span>
					    <span class="input-group-addon" title="Leave unchecked if you failed in this subject">Passed</span>
    				 </div>
    				 <br>
    				 		<button type="submit" name="btnP" class="btn btn-success pull-right">Check Probabability Now</button>
					
					</form>
				</div>
				<div id="message">

				</div>
							<?php 
						if (isset($result)) {
							echo "<script>document.getElementById('form1').style.display = 'none';</script>";
							echo "<div class='alert alert-info' role='alert'>";
							echo "<label>Provided Informations</label>";
							echo "<table class='table'><thead><tr><th>Subject</th><th>Result</th></tr></thead><tbody>";
    					$i=0;
    					foreach ($appeared_subjects as $subject) {
    						echo "<tr><td>";
    						echo ($subject=='c'?'C Programming':($subject=='cplus'?'C++ Programming':'Object Oriented Analysis'));
    						echo "</td><td>";
    						echo $appeared_subjects_results[$i]==1?'Passed':'Failed';
    						echo "</td></tr>";
							$i++;
						}
						echo "</tbody></table>";
							

							echo "<hr>";
							echo "<b>Predict For:</b> <i>".($subject_to_predict=='c'?'C Programming':($subject_to_predict=='cplus'?'C++ Programming':'Object Oriented Analysis'))."</i><br>";
							echo "<b>Confidence to pass:</b><i> ".$result."%</i></div>";
							echo "<a href='index.php' style='float:right'>Back to Home</a>";
						}

						//for Naive bayes result
						if (isset($result2)) {

							echo "<script>document.getElementById('form1').style.display = 'none';</script>";
							echo "<div class='alert alert-info' role='alert'>";
							echo "<label>Provided Informations</label>";
							echo "<table class='table'><thead><tr><th>Subject</th><th>Result</th></tr></thead><tbody>";
							echo "<tr><td>";
							echo "C Programming";
							echo"</td><td>";
							echo $c_result;
							echo "</td></tr>";
							echo "<tr><td>";
							echo "C++ Programming";
							echo "</td><td>";
							echo $cplus_result;
							echo "</td></tr>";
							echo "</tbody></table>";
							echo "<hr>";
							echo "<b>The Prediction is <strong></b>".$result2."</strong> <br></div>";
							echo "<a href='index.php' style='float:right'>Back to Home</a>";
						}
						

					 ?>	
			</div>
			<div class="col-md-4" style="padding-left:20px; border-left: 1px solid #ccc;">
				<div class="panel panel-default">
					<div class="panel-heading">Information About Dataset</div>
  					<div class="panel-body" id="Information">
						<?php include 'information.php' ?>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Add New Record to Dataset</div>
  					<div class="panel-body">
						<form method="POST" onsubmit="return validateAddnew();" action="index.php">
							<div class="input-group">
					      		<label class="form-control"> C</label>
					      			<span class="input-group-addon">
					        			<input title="Leave unchecked if failed" type="checkbox" name="new_c">
					      			</span>
					      			<span class="input-group-addon" title="Leave unchecked if failed">Passed</span>
    				 		</div><!-- /input-group -->
    				 		<div class="input-group">
					      		<label class="form-control"> CPP</label>
					      			<span class="input-group-addon">
					        			<input title="Leave unchecked if failed" type="checkbox" name="new_cplus">
					      			</span>
					      			<span class="input-group-addon" title="Leave unchecked if failed">Passed</span>
    				 		</div><!-- /input-group -->
    				 		<div class="input-group">
					      		<label class="form-control"> OOAD</label>
					      			<span class="input-group-addon">
					        			<input title="Leave unchecked if failed" type="checkbox" name="new_ooad">
					      			</span>
					      			<span class="input-group-addon" title="Leave unchecked if failed">Passed</span>
    				 		</div><!-- /input-group -->
    				 		<div class="checkbox">
 								 <label><input type="checkbox" id="confirm" name="confirm" title="This is to avoid unwanted addition of data">Add Confirmation</label>
							</div>
							<div id="addMessage">
    				 		<?php if (isset($add_message)) {
    				 			echo "<div class='input-group' style='background-color: #d9edf7; width: 100%; margin-top:5px'>Successfully Added</div>";
    				 		} ?>
    				 		</div>
    				 		<button type="submit" id="submit" name="btnAddRecord" class="btn-block btn-primary pull-right" style="margin-top:5px">Add</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class='alert alert-danger' role='alert'>We need to know about your result in previous subjects. Please check subject(s) that you have passed.</div> -->
</body>
</html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 	
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
	function validate(){
		var ip_c=document.getElementById('ip_c');
		var ip_cplus=document.getElementById('ip_cplus');
		var ip_ooad=document.getElementById('ip_ooad');
		var op=document.getElementById('op_subject').value;
		if ((!ip_c.checked && !ip_cplus.checked) && !ip_ooad.checked) {
			document.getElementById('message').innerHTML="<div class='alert alert-danger' role='alert'>You have to provide some previous result to predict. Please fill the form above to process.<br></div>";
			return false;
		}else if((ip_c.checked && op=='c')||(ip_cplus.checked && op=='cplus')||(ip_ooad.checked && op=='ooad')) {
			document.getElementById('message').innerHTML="<div class='alert alert-danger' role='alert'>You have checked this subject in appeared list.<br></div>";
			return false;
		}
	}

	function validateAddnew(){
		var checkbox= document.getElementById('confirm');
		if (!checkbox.checked) {
			document.getElementById('addMessage').innerHTML="<div class='input-group' style='background-color: red; width: 100%; margin-top:5px; color:white;'>Check confirmation box to add</div>";
			return false;
		}
	}


</script>
<script> 
$('#submit').click(function(event){ 
   $("#Information").load('information.php');  

}); 

</script> 
