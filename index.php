<?php 
session_start();
include 'inc/quiz.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
<?php 
if ($currentQuestion < $totalQuestions){
?>		
            <p class="breadcrumbs">Question <?php echo $currentQuestion ?> of <?php echo $totalQuestions?></p>
            <p class="quiz">What is 54 + 71?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="0" />
				<input type="hidden" name="<?php echo $currentQuestion; ?>" value="<?php echo $currentQuestion+1; ?>" />
                <input type="submit" class="btn" name="answer" value="135" />
                <input type="submit" class="btn" name="answer" value="125" />
                <input type="submit" class="btn" name="answer" value="115" />
            </form>
        </div>
<?php } ?>
    </div>
</body>
</html>