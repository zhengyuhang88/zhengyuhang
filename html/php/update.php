<?php
    //修改数据
    //1.连接并且选择数据库
    $link = mysqli_connect('localhost','root','root','zyh') or die('连接或选择数据库失败');
    //2.设置字符集
    mysqli_set_charset($link,'utf8mb4');
    $username = 'meimei';
    $sex = '0';
    $age = '23';

    //3.准备修改数据的sql命令
    $sql = "UPDATE zyh1 SET username='{$username}',sex='{$sex}',age='{$age}' WHERE id = 1";
    //4.发送sql命令
    $result = mysqli_query($link,$sql);
    //var_dump($result);
    //5.判断并且处理数据
    if($result && mysqli_affected_rows($link)>0){
        echo '修改成功';
    }else{
        echo '修改失败';
    }
    //6.关闭数据库
    mysqli_close($link);