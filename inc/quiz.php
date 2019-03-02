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

// Keep track of which questions have been asked
$questionsAsked=array();
var_dump ($questionsAsked);

// Show which question they are on
$totalQuestions = 10;
$currentQuestion = filter_input(INPUT_GET,'currentQuestion',FILTER_SANITIZE_NUMBER_INT);
$currentQuestion = 1;

// Show random question

// Shuffle answer buttons


// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question


// Show score