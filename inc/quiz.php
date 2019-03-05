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
$_SESSION['questions'] = json_decode(file_get_contents('inc/questions.json'));

// Show which question they are on
$_SESSION['currentQuestion']=filter_input(INPUT_GET,'q',FILTER_SANITIZE_NUMBER_INT);
if(empty($_SESSION['currentQuestion'])){
	$_SESSION['questionsAsked'] = array();
	$_SESSION['currentQuestion']=1;
	$_SESSION['questionsCorrect'] = 0;
}
$_SESSION['totalQuestions']=count($_SESSION['questions']);

// Keep track of which questions have been asked
do{
	$randomQuestion = array_rand($_SESSION['questions'],1);
} while (in_array($randomQuestion,$_SESSION['questionsAsked']));
$_SESSION['questionsAsked'][] = $randomQuestion;

// Show random question
$leftAdder = $_SESSION['questions'][$randomQuestion]->leftAdder;
$rightAdder = $_SESSION['questions'][$randomQuestion]->rightAdder;

// Shuffle answer buttons
$possibleAnswers='';
$answers=[
	$_SESSION['questions'][$randomQuestion]->correctAnswer,
	$_SESSION['questions'][$randomQuestion]->firstIncorrectAnswer,
	$_SESSION['questions'][$randomQuestion]->secondIncorrectAnswer
];
shuffle($answers);
foreach($answers as $answer){
	$possibleAnswers .= '<input type="submit" class="btn" name="answer" value="'.$answer.'" />';
}

// Toast correct and incorrect answers
$studentAnswer = filter_input(INPUT_POST,'answer',FILTER_SANITIZE_NUMBER_INT);
$correctAnswerID = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);

$toast = '';
if(isset($studentAnswer)){
	$correctAnswer = $_SESSION['questions'][$correctAnswerID]->correctAnswer;
	if($studentAnswer == $correctAnswer){
		$toast .= '<p>Congrats! You answered correctly.</p>';
		$_SESSION['questionsCorrect']++;
	}else{
		$toast .= '<p>Sorry! That was incorrect.</p>';
		$toast .= '<p>You answered ' . $studentAnswer . '</p>';
		$toast .= '</p>The correct answer is ' . $correctAnswer . '</p>';
	}
}

// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question


// Show score