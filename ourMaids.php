<?php
// Set database connection variables
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$dbname = "our maids"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a button was clicked
$clicked_button = null;
$button_names = ['submit-1', 'submit-2', 'submit-3', 'submit-4', 'submit-5', 'submit-6'];
foreach ($button_names as $button_name) {
    if (isset($_POST[$button_name])) {
        $clicked_button = $button_name;
        break;
    }
}

if ($clicked_button) {
    // Get mobile number from user input
    $mobile_no = $_POST['mobile_no'];

    // Insert data into database
    $sql = "INSERT INTO button_clicks (button_name, mobile_no) VALUES ('$clicked_button', '$mobile_no')";
    if ($conn->query($sql) === TRUE) {
        echo  "<script>alert('thank you for booking we shall contact you');</script>";
       
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
