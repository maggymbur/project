
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>
   <link rel="stylesheet" href="./login/login.css">
   <script src="https://kit.fontawesome.com/3f3b37584c.js" crossorigin="anonymous"></script>
   
   <style>
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
       
        <form action="login/login.php"  method="post">
        <h2></h2>
        <?php if(isset($_GET['error'])) {?>
            <p cass="error"> <?php echo $_GET['error'];?></p>
        <?php } ?>
        <label> User Name </label>
        <input type="email" name="uname" placeholder="email"><br>
        <label> password </label>
        <input type="password" name="password" placeholder="password">
          <div class="text-center">
            <p>Not a member? <a href="./signup.htm">signup</a></p>
          </div>
          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a><br><br>
          <input type="submit" value="Login">
          
      </form>
      
      </div>
   </div>
   
</body>
</html>