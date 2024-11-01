<?php
/*// 启动会话
session_start();

// 调试输出 $_POST 数组
print_r($_POST);

// 检查是否已提交表单
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据并进行检查
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_pass = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // 检查两次密码是否一致
    if ($pass !== $confirm_pass) {
        echo "两次输入的密码不一致！";
        exit();
    }

    // 数据库连接信息
    $servername = "localhost"; // 数据库服务器地址
    $dbname = "zyh"; // 数据库名称
    $dbuser = "root"; // 数据库用户名
    $dbpass = "root"; // 数据库密码

    // 创建数据库连接
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 准备SQL语句并绑定参数
    $stmt = $conn->prepare("INSERT INTO zyh.zyh (username, password, confirm_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $pass, $confirm_pass);

    // 执行SQL语句
    if ($stmt->execute()) {
        echo '<script>alert(\'注册成功\');location.href="/html/html/denglu.html"</script>';
       // echo '<script>alert(\'登录成功\');location.href="/html/html/6.16.html"</script>';
        // 重定向到 denglu.html 页
        //exit(); // 确保脚本停止执行
    } else {
        echo "注册失败: " . $stmt->error;
    }

    // 关闭连接
    $stmt->close();
    $conn->close();
} else {
    echo "请求方法不是 POST";
}*/



$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "zyh";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 从表单获取数据
$user = $_POST['username'];
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// 验证密码是否匹配
if ($pass !== $confirm_pass) {
    die("Passwords do not match.");
}

// 对密码进行加密
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// 插入数据到数据库
$sql = "INSERT INTO zyh.zyh (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $hashed_password);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>











