<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

// Include questions
include 'questions.php';

// Show which question they are on
$totalQuestions = 10;
$currentQuestion = filter_input(INPUT_GET,'q',FILTER_SANITIZE_NUMBER_INT);
if (empty($currentQuestion)){
	session_destroy();
	$currentQuestion = 1;
}

//Keep track of total questions answered and correctly.
$questionsAnswered = 0;
if(!isset($_SESSION['questionsAnsweredCorrectly'])){
	$_SESSION['questionsAnsweredCorrectly']=0;
}

// Keep track of which questions have been asked
$questionAsked[]=array_push($randomQuestion);


function printQuestion($array,$currentQuestion){
	// get question number
	$questionNumber = $currentQuestion;
	
	// Choose a number between 0 and the number of elements in the array.
	$randomArrayNumber = array_rand($array,1);

	// Call the Random Question!
	$choseQuestion = $array[$randomArrayNumber];
	
	// Ask the question
	$chosenQuestion = '<p class="quiz">What is ' 
		. $choseQuestion['leftAdder'] 
		. ' + ' 
		. $choseQuestion['rightAdder']
		. "?</p>";	
	
	// Print the question
	echo $chosenQuestion;
	
	// Shuffle answer buttons
	$possibleAnswers = [$choseQuestion['correctAnswer'],$choseQuestion['firstIncorrectAnswer'],$choseQuestion['secondIncorrectAnswer']];
	shuffle($possibleAnswers);
	
	//Print possible answers
	echo '<form action="index.php?q=' . ($questionNumber+1) . '" method="post">';
	echo '<input type="hidden" name="correctAnswer" value="'. $choseQuestion['correctAnswer'] .	'" />';
	foreach ($possibleAnswers as $answer) {
		echo '<input type="submit" class="btn" name="answer" value="';
		echo $answer;
		echo '" />';
	}
	echo '</form>';
}

if(isset($_POST['answer'])){
	$yourAnswer=filter_input(INPUT_POST,'answer',FILTER_SANITIZE_NUMBER_INT);
	$correctAnswer=filter_input(INPUT_POST,'correctAnswer',FILTER_SANITIZE_NUMBER_INT);

	// Toast correct and incorrect answers
	if($yourAnswer == $correctAnswer){
		echo '<h1>You got the correct answer</h1>';
		$_SESSION['questionsAnsweredCorrectly']++;
	} else{
		echo '<h1>Sorry that was not the correct answer</h1>';
	}
}

// Keep track of answers
// If all questions have been asked, give option to show score
if ($currentQuestion==11){
			echo '<h2>You\'ve answered ' . $_SESSION['questionsAnsweredCorrectly'] . ' question(s) correctly!</h2>';
 
}
// else give option to move to next question


// Show score