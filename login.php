<?php
session_start(); 

require_once 'dbconnect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql); 
    mysqli_stmt_bind_param($stmt, 's', $email); 
    mysqli_stmt_execute($stmt); 
    $result = mysqli_stmt_get_result($stmt); 

    $user = mysqli_fetch_assoc($result); 

    if ($user) {
        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['email'] = $user['email']; 

            
            header("Location: index.php");
            exit;
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь с таким email не найден.";
    }
}
?>
