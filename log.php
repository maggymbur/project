<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the input values from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a SQL statement to retrieve the user data
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    // Execute the query and store the results in a variable
    $result = $conn->query($sql);

    // Check if there is only one row of user data
    if ($result->num_rows == 1) {
        // Fetch the user data as an associative array
        $row = $result->fetch_assoc();

        // Start a new session for the logged-in user
        session_start();

        // Set the session variables for the logged-in user
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        // Redirect the logged-in user to a new page
        header("location: index.php");
    } else {
        // Display an error message for an invalid login
        echo "Invalid login credentials";
    }
}

// Close the database connection
$conn->close();

?>






 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>
   
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
  
 
  
.login-form {
    margin: 50px auto 50px auto;
    width: 80%;
    background-color: white;
    padding: 50px 50px 50px 50px;
    box-shadow: 1px 5px 2px #330000;
    z-index: -1;
  }
  h1{
      align-content: center;
      color: blueviolet;
      margin-top: 80px;
      margin-left: 100px;
  }


   
    
    form {
        background-color: #ffffff;
        width: 300px;
        padding: 20px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    
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
       
        <form action="log.php"  method="post">
        <h2></h2>
            <p cass="error"> </p>
       
            <label> email </label>
        <input type="email" name="email" placeholder="email"><br>
        <label> password </label>
        <input type="password" name="password" placeholder="password">
          <div class="text-center">
            <p>Not a member? <a href="./signup.php">signup</a></p>
          </div>
          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a><br><br>
          

          <button class="btn-1"> login</button>
          
      </form>
      
      </div>
   </div>
   
</body>
</html>

  
