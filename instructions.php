<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 8's Amazing CS Quiz!</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<?php
    session_start();
    $_SESSION["questionnumber"] = 1;
    $_SESSION["score"] = 0;
?>
<body>
    <header>
        <h1>CS Quiz!</h1>
        <h2>Group 8</h2>
    </header>
    <main>
        <section>
            <h2>Welcome!</h2>
            <h3><u>Instructions</u></h3>
           
                <!-- TODO: Update the number of questions dynamically from the database -->
                <p>There will be 20 questions</p>
                <p>Each question will have 4 answers to choose from</p>
                <p>Only one of the choices is correct</p>
            
        </section>
    </main>
    <nav>
        <a href="quiz.php" class="start-quiz-btn">Start Quiz</a>
        <a href="LogOut.php" class="start-quiz-btn">Log Out</a>
    </nav>
</body>

</html>