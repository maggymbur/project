<?php
session_start();
include "login/db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname= validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)) {
        header("location: login/logins.php?error=User Name is required");
        exit();
    } elseif(empty($pass)){
        header("location: login/logins.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $result = mysqli_query($conn, $sql);
        echo "Number of rows: " . mysqli_num_rows($result);


        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $uname && $row['password'] === $pass) {
                echo "logged in!";
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("location: logout/logout.php");
                exit();
            } else{
                header("location: login/logins.php?error=Incorrect User Name or password");
                exit();
            }
        } else {
            header("location: login/logins.php?error=Incorrect User Name or password");
            exit();
        }
    }
}
?>
