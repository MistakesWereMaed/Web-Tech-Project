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

    <section>
        <h2>High Scores: </h2>
        <ul id="highScores">
            <?php

                $db_host="localhost";        //Change this
                $db_user="tudy";        //Change this
                $db_pass="password";        //Change this
                $db_name="game";     //Do not change

                $db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                
                if (mysqli_connect_errno())
                {
                    echo 'Connection to database failed:'.mysqli_connect_error();
                    exit();
                }

                $placement = 1;
                $scoreQuery = "SELECT * FROM scores ORDER BY score DESC;";
                $list = $db_conn->query($query);
                while($row = mysqli_fetch_assoc($list)){
                    echo "<li>$placement | $row['score']/20 | $row['username']</li>"
                    $placement++;
                }

                $db_conn->close();
            ?>
        </ul>
    </section>
    
</body>

</html>