<?php
    //删除数据
    //1.链接或者选择数据库
    $link = mysqli_connect('localhost','root','root','zyh') or die('链接或者选择数据库失败');
    //2.设置字符集
    mysqli_set_charset($link,'utf8mb4');
    //3.准备删除的sql语句
    $sql = "DELETE FROM zyh1 WHERE id = {$_GET['id']}";
    //4.发送SQL语句
    $result = mysqli_query($link,$sql);
    //5.判断并且处理结果
    if($result && mysqli_affected_rows($link)>0){
        echo '<script>alert(\'删除成功\');location="./mysqli_func.php"</script>';
    }else{
        echo '删除失败';
    }
    //6.关闭数据库
    mysqli_close($link);
