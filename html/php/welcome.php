<?php
// welcome.php
session_start(); // 启动会话管理
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // 如果未登录，重定向到登录页面
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>欢迎</title>
</head>
<body>
<h1>欢迎, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="logout.php">注销</a>
</body>
</html>
