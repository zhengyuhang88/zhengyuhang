<?php
/*// 启动会话
session_start();

// 调试输出 $_SERVER 数组
print_r($_SERVER);

// 检查是否已提交表单
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // 准备和绑定
    $stmt = $conn->prepare("SELECT * FROM zyh.zyh WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // 验证用户
    if ($result->num_rows > 0) {
        // 获取用户数据
        $row = $result->fetch_assoc();
        // 验证密码
        if (password_verify($password, $row['password'])) {
            // 密码正确，设置会话变量
            $_SESSION['username'] = $username;
            echo '<script>alert(\'登录成功\');location="html/6.16.html"</script>';
            //header("Location: welcome.php"); // 重定向到欢迎页面
            //header("Location:html/6.16.html");
            exit();
        } else {
            echo "密码错误";
        }
    } else {
        echo "用户名不存在";
    }

    // 关闭连接
    $stmt->close();
    $conn->close();
} else {
    echo "请求方法不是 POST";
}*/

// 设置数据库连接参数
$servername = "localhost"; // 数据库服务器地址
$username = "root"; // 数据库用户名
$password = "root"; // 数据库密码
$dbname = "zyh"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取表单数据
$user = $_POST['username'];
$pass = $_POST['password'];

// 防止SQL注入
$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

// 查询数据库中是否有匹配的用户名和密码
$sql = "SELECT * FROM zyh.zyh WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 登录成功，可以进行跳转或其他操作
    echo '<script>alert(\'登录成功\');location.href="/html/html/6.16.html"</script>';
    echo "登录成功！欢迎回来。";
} else {
    // 登录失败，显示错误信息
   // echo "用户名或密码错误！";
    echo '<script>alert(\'登录失败\');location.href="/html/html/denglu.html"</script>';
}

// 关闭数据库连接
$conn->close();


?>
