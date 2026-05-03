<?php
session_start();
require_once 'config.php';

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if($checkEmail->num_rows > 0){
        $_SESSION['register_Error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    }
    else{
        $conn->query("INSERT INTO users (nome, email, password) VALUES ('$username', '$email')");
    }

    header("Location: index.php");
    exit();
}

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        header("Location: user_page.php");
        exit();
  
    }
    
    // Login failed
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}
eader("Location: index.php");
    exit();

?>