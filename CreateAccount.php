<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 8's Amazing CS Quiz!</title>
    <link rel="stylesheet" href="mystyle.css">
</head>

<body>
     <h1>Create An Account</h1>
    <h6> All questions with a * are required</h6>
    
    <form method="post" action="CreateAccountResponse.php">

      <div >
        Username <input class='username' type='text' name='username' placeholder='Username' required>*<br>
        Password <input class='password' type='password' name='psw' placeholder='Password' required>*<br>
        Retype Password <input class='password' type='password' name='repsw' placeholder='Retype Password' required>*
        <input type='button' onclick='check(this.form)' class='passwordcheck' value='Check Password'><br>
        Email <input class='email' type='text' placeholder='johndoe476@gmail.com' required><br>
        Phone Number <input class='number' type='text' placeholder='815-555-5035'><br>
        <input type='submit' name='submit' value='Create Account'>
      </div>
    </form>
    <script>
        function check(form){
    if(form.psw.value == form.repsw.value && form.repsw.value == form.psw.value){
      alert('Passwords Match')
    } else {
       alert('Passwords do not match')
    }
  }
    </script>
</body>

</html>