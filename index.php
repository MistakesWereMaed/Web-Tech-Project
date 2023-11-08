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
            <ul>
                <!-- TODO: Update the number of questions dynamically from the database -->
                <li>There will be 20 questions</li>
                <li>Each question will have 4 answers to choose from</li>
                <li>Only one of the choices is correct</li>
            </ul>
        </section>
    </main>
    <nav>
        <a href="quiz.php" class="start-quiz-btn">Start Quiz</a>
    </nav>
</body>

</html>