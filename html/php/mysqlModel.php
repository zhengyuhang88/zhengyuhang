<?php
    //将php操作Mysql封装成函数
        /*
         * 以下操作会返回影响行
            //1.添加函数
            //2.修改数据
            //4.删除数据
        */
        /*
         * 查询数据会返回查询到的行数
         * //3.查询链接
        * */
        //统计会有多少条数据的功能
        //查询单体数据的功能
MySQLModel();
//$sql = "INSERT INTO zyh1(`username`,`pwd`) VALUES ('aaa','aaa')";
//$sql = "SELECT FROM zyh1 WHERE id = 2";
//$int = $dml($sql);
//var_dump($int);
//测试select查询操作
//$sql = "SELECT * FROM zyh1";
//$result = $select($sql);
//var_dump($result);
//测试查询总条数
//$sql = "SELECT * FROM zyh1";
//$t = $total($sql);
//var_dump($t);

//测试单条数据
//$sql = "SELECT * FROM zyh1 WHERE id =1";
//$result =$get($sql);

//var_dump($result);
        function MySQLModel(){
            $link = null;
            //函数 帮助我们执行链接数据库的功能
            function construct(){
                //包含数据库配置文件
                include './config.php';
                $link = mysqli_connect(HOST,USER,PWD,DBNAME)or die('连接或者选择数据库失败');
                return $link;
            };
            //将链接数据库的结果赋值给父级变量
            $link = construct();
            //var_dump($link);
            //函数 帮助我们执行增、删、改的功能
            //声明全局变量让函数外部可以直接使用变量名调用该函数
            GLOBAL $dmlModel;
            $dml = function ($sql) use($link){
              $result = mysqli_query($link,$sql);
              if($result && mysqli_affected_rows($link)>0){
                  $id = mysqli_insert_id($link);
                  $affected = mysqli_affected_rows($link);
                  //关闭数据库
                  mysqli_close($link);

                  //如果是插入操作则会有ID的出现则返回ID，如果没有执行插入操作则返回影响行
                  return !empty($id)?$id:$affected;
              }else{
                  mysqli_close($link);
                  return  false;
              }
            };
            //函数 帮我们执行查询数据的功能(返回的二维数组)
            GLOBAL $selectModel;
            $select = function ($sql) use($link){
                $result = mysqli_query($link,$sql);
                $arr = array();
                if($result && mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)) {
                        $arr[] = $row;
                    }
                }
                mysqli_close($link);
                return $arr;
            };
            //函数 帮我们统计数据有多少条的功能
            GLOBAL $totalModel;
            $total = function ($sql) use($link){
                $result = mysqli_query($link,$sql);
                if($result && mysqli_num_rows($result)>0){
                    //return mysqli_num_rows($result);
                    mysqli_close($link);
                    return mysqli_num_rows($result);
                }else{
                    mysqli_close($link);
                    return 0;
                }
            };
            //函数 帮我们查询单条数据的功能(返回的一维数组)
            GLOBAL $getModel;
            $get = function ($sql) use($link){
                $result = mysqli_query($link,$sql);
                if($result && mysqli_num_rows($result)>0){
                    mysqli_close($link);
                    return mysqli_fetch_assoc($result);
                }else{
                    mysqli_close($link);
                    return array();
                }
            };

            //关闭数据库
        }