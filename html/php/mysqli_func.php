<?php
//连接数据库
    $link =@mysqli_connect('localhost','root','root','zyh')or die('连接数据库失败');
   // var_dump($link);
    mysqli_set_charset($link,'utf8mb4');
  //  var_dump($r);
    //3.准备需要操作的sql语句
    $sql = "SELECT * FROM zyh1 ORDER BY id DESC ";
    //4.发送sql语句
    $result = mysqli_query($link,$sql);
  //  var_dump($result);
    //5.判断并处理结果
    if($result && mysqli_num_rows($result) > 0) {
        //有数据
        //$row = mysqli_fetch_assoc($result);
        //var_dump($row);
        //$row = mysqli_fetch_assoc($result);
        //var_dump($row);
        echo '<table border="1" align="center" width="800">';
        echo '<tr>';
            echo '<td>编号</td>';
            echo '<td>用户名</td>';
            echo '<td>真实姓名</td>';
            echo '<td>性别</td>';
            echo '<td>年龄</td>';
            echo '<td>电话</td>';
            echo '<td>头像</td>';
            echo '<td>权限</td>';
            echo '<td>添加时间</td>';
            echo '<td>操作</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$row['ID'].'</td>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['sex'].'</td>';
            echo '<td>'.$row['age'].'</td>';
            echo '<td>'.$row['phone'].'</td>';
            echo '<td>'.$row['pic'].'</td>';
            echo '<td>'.$row['level'].'</td>';
            echo '<td>'.$row['addtime'].'</td>';
            echo '<td>
    <a href="./delete.php?id='.$row['ID'].'">删除</a>
    <a href="">修改</a>
</td>';
            echo '</tr>';
        }
    }
    //关闭数据库
    mysqli_close($link);