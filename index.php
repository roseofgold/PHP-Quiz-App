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
<?php if($_SESSION['currentQuestion'] <= $_SESSION['totalQuestions']){?>
            <p class="breadcrumbs">Question <?php echo $_SESSION['currentQuestion']; ?> of <?php echo $_SESSION['totalQuestions'];?></p>
            <p class="quiz">What is <?php echo $leftAdder; ?> + <?php echo $rightAdder; ?>?</p>
            <form action="index.php?q=<?php echo $_SESSION['currentQuestion']+1; ?>" method="post">
                <input type="hidden" name="id" value="0" />
                <?php echo $possibleAnswers; ?>
            </form>
<?php } else { ?>
			<p>Congrats! You got xx questions right!</p>
<?php } ?>
        </div>
    </div>
</body>
</html>