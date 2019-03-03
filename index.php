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
if ($currentQuestion <= $totalQuestions){
?>		
            <p class="breadcrumbs">Question <?php echo $currentQuestion ?> of <?php echo $totalQuestions?></p>
            <p class="quiz">What is <?php echo $questions[$randomQuestion]['leftAdder']?> + <?php echo $questions[$randomQuestion]['rightAdder']?>?</p>
            <form action="index.php?q=<?php echo $currentQuestion+1; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $randomQuestion; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $questions[$randomQuestion]['correctAnswer']; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $questions[$randomQuestion]['firstIncorrectAnswer']; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $questions[$randomQuestion]['secondIncorrectAnswer']; ?>" />
            </form>
        </div>
<?php } ?>
    </div>
</body>
</html>