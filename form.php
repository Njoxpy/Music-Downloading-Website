<?php

// Database connection
define("$SERVER_NAME","localhost");
define("$USER_NAME","root");
define("$PASWORD","");
define("$DATABASE_NAME","ZikiFy");

// Try connection
$conn = new mysqli($SERVER_NAME,$USER_NAME,$PASWORD);

// check if connected 
if($conn->connect_error){
    die("Connection Failed"->$conn->connect_error)
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security
    $email = $_POST['email'];

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
