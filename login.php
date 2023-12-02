<?php
require_once('config.php');

$utilisateurConnecte = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    
    if ($result && $result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $utilisateurConnecte = $row['username'];

        
        header("Location: redi.html");
        exit(); 
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
