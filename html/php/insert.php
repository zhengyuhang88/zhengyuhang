<?php
    //使用php链接mysql实现插入数据
    //1.连接数据库并且选择数据库
    $link = mysqli_connect('localhost','root','root','zyh') or die('链接或者选择数据库失败');
    //设置字符集
    mysqli_set_charset($link,'utf8mb4');
    $id = '2';
    $username = 'ggbond';
    $pwd = md5('321');
    $name = '大帅';
    $sex = '1';
    $age = '21';
    $phone = '123456789';

    //准备插入sql语句
    $sql ="INSERT INTO zyh1(id,username,pwd,name,sex,age,phone) VALUES ('{$id}','{$username}','{$pwd}','{$name}','{$sex}','{$age}','{$phone}')";
    //4.发送sql语句
    $result = mysqli_query($link,$sql);
    //var_dump($result);
    //5.判断并处理结果
    if($result && mysqli_affected_rows($link)>0){
        echo mysqli_insert_id($link);
    }
    //获取数据的影响行
    //$affected = mysqli_affected_rows($link);
    //var_dump($affected);
    //关闭数据库
    mysqli_close($link);