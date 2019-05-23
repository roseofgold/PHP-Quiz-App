<?php
function generateAdvancedQuestions(){
	// set array to hold questions
	$randomNumbers = array();

	// Loop for required number of questions
	for($i=0;$i<10;$i++){

		// Get two random numbers
		$randNum1 = rand(1,99);
		$randNum2 = rand(1,99);

		// Calculate correct answer
		$correct = $randNum1 + $randNum2;

		// Get two, unique, incorrect answers within 10 numbers either way of correct answer
		$incorrect1 = rand(($correct-10),($correct+10));
		while ($incorrect1 == $correct){
			$incorrect1 = rand(($correct-10),($correct+10));
		}

		$incorrect2 = rand(($correct-10),($correct+10));
		while ($incorrect2 == $correct || $incorrect1 == $incorrect2){
			$incorrect2 = rand(($correct-10),($correct+10));
		}


		// Add random numbers and answers to questions array
		$randomNumbers[]=[
			"leftAdder" => $randNum1,
			"rightAdder" => $randNum2,
			"correctAnswer" => $correct,
			"firstIncorrectAnswer" => $incorrect1,
			"secondIncorrectAnswer" => $incorrect2
		];
	}

	// Write results to json file
	$fp = fopen('inc/questions.json', 'w');
	fwrite($fp, json_encode($randomNumbers));
	fclose($fp);
}
