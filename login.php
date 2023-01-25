<?php

$servername= "localhost";
$username= "root";
$password= "";
$dbname= "di";

$conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
    echo "Connection Failed" . mysqli_connect_error();
   } 
   if (isset($_POST) && $_POST != []) {

     $email = $_POST["email"];
     $pwd = $_POST["pwd"];
     
     $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pwd' ";
     
     $query = mysqli_query($conn, $sql);
     
     if (mysqli_num_rows($query) > 0) {
      session_start();
      $_SESSION['username'] = 'di';

      header("location: index.html");
     }else{
      $error = "Login Or Password doesn't exist";
     }
   }


?>
<html>

<head> </head>
    
<link rel="stylesheet" href="assets /css/login.css">

<body>
    <section id="test_section">
    <div class="left">
        <img src="images/banner.jpg" alt="photo image"></div>
        <div class="right">
            <form method="POST">
              <h3>Get more things done with Loggin platform.</h3>
              <p>Access to the most powerful tool in the entire design and web industry.</p><br>
              <Label class="ligne"><strong>Login</strong> </label> <br><br>
               
              <p style="color:red;"><?= (isset($error))? $error : "" ?></p>
              <input class="inp" type="text" placeholder="E-mail Address" name="email" /> <br>
              <input class="inp" type="password" placeholder="Password" name="pwd" /> <br><br>
              <input class="btn" type="submit" value="Login"  /> 
              <a href="#"> Forget password ? </a>
              <a href="register.php"> Create account </a>
            </form>
          </div>
      
        </section>
    
</body>
</html>