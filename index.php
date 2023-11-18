<?php
session_start();
$valid=true;
if(isset($_POST['username']) && isset($_POST['psw'])){
    $username=$_POST['username'];
$password=$_POST['psw'];
if($username=='admin' && $password=='admin'){
    $_SESSION['username']='admin';
    $_SESSION['password']='admin';
    $_SESSION['valid']=true;
    header('Location: admin.php');
}
else if($username==$_SESSION['username'] && $password==$_SESSION['password']){
    $_SESSION['valid']=true;
    header('Location: instructions.php');
}
else{
    
    $valid=false;
    $_SESSION['valid']=false;
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 8's Amazing CS Quiz!</title>
    <link rel="stylesheet" href="mystyle.css">
</head>

<body>
    <header>
        <h1>CS Quiz!</h1>
        <h2>Group 8</h2>
    </header>
    <main>
        <section>
            <h2>Welcome!</h2>
            <h1>Log In</h1>
    <div >
        <form method='post' action="index.php">
          <input class='username' type='text' name='username' placeholder='Username' required>
          <br>
          <input class='password' type='password' name='psw' placeholder='Password' required>
          <br>
          <input type='submit' name='LogIn' value='Login'>
        </form>
        <?php
        if(!$valid){
            echo 'Invalid Login';
        }

?>
      </div>
      <div class="text-center" >
        <a onclick='window.location.href = "CreateAccount.php";' class='button'> Create Account</a>
      </div>
      <script>
        function check(form){
    if (form.username.value == 'Xander2355' && form.psw.value == 'Blackops3') {
      window.open('practicelog.html')
    } else {
      alert('This username or password is incorrect');
    }
  }
      </script>
        </section>
    </main>
    
</body>

</html>