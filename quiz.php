<!DOCTYPE html>
<html lang="en">
<head>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION["questionnumber"])){
    $_SESSION["questionnumber"] = 1;
}
if(isset($_POST["exit"])){
    $_SESSION["questionnumber"] = 1;
    header("Location: index.php");
}

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

/*echo "database connection success<br>";
echo "<strong>now showing results from a database query...</strong>";*/


$query="SELECT * FROM quiz;";

$result = $db_conn->query($query);
$count = 1;

if($result->num_rows  > 0) {
    //echo $result->num_rows.' records returned<br>';
    echo "<form method='post' action='quiz.php'> ";
    while($row = mysqli_fetch_assoc($result)) {
        if($count==$_SESSION["questionnumber"]){
            echo "<h3>Question ".$count."</h3>";
            echo "<p id='ques'>".$row['question']."</p><br>";
            if(isset($_POST["answers$count"])){
                if($_POST["answers$count"]==$row['answer1']){
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer1]' checked> a. ". $row['answer1']."</p><br>";
                }
                else{
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer1]'> a. ". $row['answer1']."</p><br>";
                }
                if($_POST["answers$count"]==$row['answer2']){
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer2]' checked> b. ". $row['answer2']."</p><br>";
                }
                else{
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer2]'> b. ". $row['answer2']."</p><br>";
                }
                if($_POST["answers$count"]==$row['answer3']){
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer3]' checked> c. ". $row['answer3']."</p><br>";
                }
                else{
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer3]'> c. ". $row['answer3']."<br>";
                }
                if($_POST["answers$count"]==$row['answer4']){
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer4]' checked> d. ". $row['answer4']."</p><br>";
                }
                else{
                    echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer4]'> d. ". $row['answer4']."</p><br>";
                }
                echo "<br>";
                if($_POST["answers$count"]==$row['correctanswer']){
                    echo "<p id='explain'>Correct</p><br>";
                    $_SESSION["score"] += 1;
                }
                else{
                    echo "<p id='explain'>Incorrect. The correct answer is: ".$row['correctanswer']."</p><br>";
                }
                $_SESSION["questionnumber"] += 1;
                if($_SESSION["questionnumber"]>$result->num_rows){
                    echo "<p id='score'>Final Score: ".$_SESSION["score"]."/".$result->num_rows."</p>";
//added code for high scores
                    $scoreQuery = "INSERT INTO scores
                    VALUES ($_SESSION['username'], $_SESSION['score']);";
                    $inputScore = $db_conn->query($scoreQuery);
                    
                    
                }
                echo "<input class='menu' type='submit' value='Next'>";
                
            }
            else{
                echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer1]'> a. ". $row['answer1']."</p><br>";
                echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer2]'> b. ". $row['answer2']."</p><br>";
                echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer3]'> c. ". $row['answer3']."</p><br>";
                echo "<p class='ans'><input type='radio' name='answers$count' value='$row[answer4]'> d. ". $row['answer4']."</p><br><br>";
                echo "<input class='menu' type='submit' value='Check' onclick='validate()'>"; 
            }
            break;
        }
        $count ++;
    }
    if($_SESSION["questionnumber"]>$result->num_rows){
        $_SESSION["questionnumber"] = 1;
        $_SESSION["score"] = 0;
        $scoreInput = 
    }
    echo "<input class='menu' type='submit' value='Exit Quiz' name='exit'>";
    echo "</form>";
} else {
    echo '<br>no records returned';
} 

$db_conn->close();

?>
<script> 
    function validate(){
        var buttons=document.querySelectorAll("input");
        for(var i=0; i<buttons.length; i++){
            if(buttons[i].type=="radio" && buttons[i].checked){
                return;
            }
        }
        alert("Please select an answer.");
        event.preventDefault();
    }
    
    

</script>

</body>
</html>