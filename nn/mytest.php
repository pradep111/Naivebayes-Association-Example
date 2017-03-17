<?php
	/*Database Connection*/
	$host = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'dm';
	Global $dbconfig;
	$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured when connecting to the database");
?>

<?php
	$total_rows= mysqli_query($dbconfig,"SELECT * FROM students ");
	
//require_once ("Network.php");

// Create a new neural network with 3 input neurons,
// 4 hidden neurons, and 1 output neuron
//$n = new NeuralNetwork(3, 4, 1);
//$n->setVerbose(false);

// $c=array();
// $cplus = array();
// $ooad = array();
 // $result=mysqli_fetch_assoc($total_rows);
// Add test-data to the network. In this case,


require_once ("Network.php");

// Create a new neural network with 3 input neurons,
// 4 hidden neurons, and 1 output neuron
$n = new NeuralNetwork(2, 17,17, 1);
$n->setVerbose(false);

while ($res=mysqli_fetch_assoc($total_rows)) {
	if($res['c']==0){
		$res['c']=-1;
	}
	if($res['cplus']==0){
		$res['cplus']=-1;
	}
	if($res['ooad']==0){
		$res['ooad']=-1;
	}



// Add test-data to the network. In this case,
// we want the network to learn the 'XOR'-function
$n->addTestData(array ($res['c'], $res['cplus'],1),array( $res['ooad']) );

	echo $res['c']."      ".$res['cplus']."     ".$res['ooad']."<br>";
	

}
// we try training the network for at most $max times
$max = 3;
$i = 0;

echo "<h1>Learning the And function</h1>";
// train the network in max 1000 epochs, with a max squared error of 0.01
while (!($success = $n->train(5000, 0.01)) && ++$i<$max) {
	echo "Round $i: No success...<br />";
}

// print a message if the network was succesfully trained
if ($success) {
    $epochs = $n->getEpoch();
	echo "Success in $epochs training rounds!<br />";
}


echo "<h2>Result</h2>";
echo "<div class='result'>";
// in any case, we print the output of the neural network
for ($i = 0; $i < count($n->trainInputs); $i ++) {
	$output = $n->calculate($n->trainInputs[$i]);
	echo "<div>Testset $i; ";
	echo "expected output = (".implode(", ", $n->trainOutput[$i]).") ";
	echo "output from neural network = (".implode(", ", $output).")\n</div>";
}
echo "</div>";


// Now, play around with some of the network's parameters a bit, to see how it 
// influences the result
// $learningRates = array(0.1, 0.25, 0.5, 0.75, 1);
// $momentum = array(0.2, 0.4, 0.6, 0.8, 1);
// $rounds = array(100, 500, 1000, 2000);
// $errors = array(0.1, 0.05, 0.01, 0.001);

// echo "<h1>Playing around...</h1>";
// echo "<p>The following is to show how changing the momentum & learning rate, 
// in combination with the number of rounds and the maximum allowable error, can 
// lead to wildly differing results. To obtain the best results for your 
// situation, play around with these numbers until you find the one that works
// best for you.</p>";
// echo "<p>The values displayed here are chosen randomly, so you can reload 
// the page to see another set of values...</p>";

// for ($j=0; $j<10; $j++) {
// 	// no time-outs
// 	set_time_limit(0);
	
// 	$lr = $learningRates[array_rand($learningRates)];
// 	$m = $momentum[array_rand($momentum)];
// 	$r = $rounds[array_rand($rounds)];
// 	$e = $errors[array_rand($errors)];
// 	echo "<h2>Learning rate $lr, momentum $m @ ($r rounds, max sq. error $e)</h2>";
// 	$n->clear();
// 	$n->setLearningRate($lr);
// 	$n->setMomentum($m);
// 	$i = 0;
// 	while (!($success = $n->train($r, $e)) && ++$i<$max) {
// 		echo "Round $i: No success...<br />";
// 		flush();
// 	}

// 	// print a message if the network was succesfully trained
// 	if ($success) {
// 	    $epochs = $n->getEpoch();
// 		echo "Success in $epochs training rounds!<br />";

// 		echo "<div class='result'>";
// 		for ($i = 0; $i < count($n->trainInputs); $i ++) {
// 			$output = $n->calculate($n->trainInputs[$i]);
// 			echo "<div>Testset $i; ";
// 			echo "expected output = (".implode(", ", $n->trainOutput[$i]).") ";
// 			echo "output from neural network = (".implode(", ", $output).")\n</div>";
// 		}
// 		echo "</div>";
// 	}
// }


?>