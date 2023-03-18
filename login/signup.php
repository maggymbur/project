<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // SOMETHING WAS POSTED
     $username = $_POST['username'];
     $password = $_POST['password'];
     $email = $_POST['email'];

     if(!empty($username) && !empty($password) && !empty($email) && is_numeric($username))
     {
          // save to database
          $user_id = random_num(20);
          $password_hash = password_hash($password, PASSWORD_DEFAULT);
          $stmt = mysqli_prepare($con, "INSERT INTO users (user_id, user_name, password, email) VALUES (?, ?, ?, ?)");
          mysqli_stmt_bind_param($stmt, "ssss", $user_id, $username, $password_hash, $email);
          mysqli_stmt_execute($stmt);

          header("location: login.php");
          die;
     } else 
     {
        echo "please enter valid info";
     }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>
   <link rel="stylesheet" href="./login.css">
   <script src="https://kit.fontawesome.com/3f3b37584c.js" crossorigin="anonymous"></script>
   <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }
  
  body{
    background: #f3F5F9;
  
  }
  .wrapper{
    display: flex;
    position: relative;
  }
  .wrapper .sidebar{
    position: fixed;
    width: 200px;
    height: 100%;
    background: rgb(81, 15, 187);
    padding: 30px 0;
  
  }
  .sidebar h2{
    background: chocolate;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 30px;
  }
  .sidebar ul li{
    padding: 15px;
    border-bottom: 1px solid;
    border-top:1px solid floralwhite ;
  }
  .sidebar ul li a{
    color: blanchedalmond;
    display: block;
  }
  .sidebar ul li .fa{
    width: 25px;
  
  }
  .sidebar ul li:hover a{
  color: burlywood;
  }
  
  .wrapper .sidebar .sign-up{
          position: fixed;
          
          bottom: 8px;
          left:0;
          width: 200px;
          height: 120px;
          background-color: rgb(81, 15, 187);
          
          padding: 20px;
         color: darkorange;
         text-align: center;
  
  }
  .wrapper .main-content{
    width: 100%;
    margin-left: 200px;
  }
  .wrapper .main-content .header{
    padding: 20px;
    background: #f3F5F9;
    color: rgb(111, 114, 15);
    border-bottom: 1px solid;
  }
  
    body {
        background-color: #f1f1f1;
    }
    
    form {
        background-color: #ffffff;
        width: 300px;
        padding: 20px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
        background-color: #f1f1f1;
        width: 100%;
        box-sizing: border-box;
        font-size: 16px;
    }
    
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }
    
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
    .btn-1{
        background-color: green;
        font-size: 20px;
        display: block; 
        margin: 0 auto; 
        color: black;
        width: 200px;
        height: 60px;
  }
</style>
</head>
<body>
   <div class="wrapper">
      <div class="sidebar">
         <h2> <i class="fa-solid fa-bars"></i>MENU </h2>
         <br> <br>
         <ul>
            <li><a href="./index.htm">Home</a></li>
            <li><a href="./ourMaids.htm"><i class="fa-thin fa-magnifying-glass"></i>Our maids</a></li>
            
            <li><a href="./services.htm"><i class="fa-regular fa-bell-concierge"></i>Our services</a></li>

            <li><a href="./works.htm"><i class="fa-solid fa-circle-question"></i>How it works</a></li>
            
            <li><a href="./feedback.htm"><i class="fa-regular fa-comments"></i>Feedback</a></li>
            <li> <a href="./rate.htm">Rate Us</a></li>
         
         <div class="reachOut">
          <a href=" https://wa.me/707429670"><img src="./images/whatsapp.avif" style="width: 50px;height:60px"> </a> 
          <a href="www.facebook.com"><img src="./images/facebook.png" style="width: 60px;height:60px"></a> 
         </div>
            <div class="sign-up">
               <ul>
                  <li><a href="./login/logins.php"><i class="fa-duotone fa-right-to-bracket"></i>Login</a></li>
                  <li><a href="./signup.htm"><i class="fa-light fa-user-plus"></i>Sign up</a></li>
               </ul>
            </div>
            
         </ul>
      </div>
      <div class="main-content">
        
        <form action="signup.php" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required>

          <label for="password"> Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your new password" required>
  
  
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email">
  
          

          <div class="row mb-2">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label><br><br>
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> I agree to all terms and conditons </label><br><br>
              </div>
            </div>
          </div>
        
          <button class="btn-1"><a href="./login.php" style="text-decoration:none; color: black;" >sign up</a></button>
         
      </form>
              
      </div>
   </div>
   
</body>
</html>