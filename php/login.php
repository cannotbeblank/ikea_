<?php
    header("content-type:text/html;charset=utf8");
    include('sqldb.php');

    $userName = $_REQUEST['uname'];
    $uPwd = $_REQUEST['upwd'];

    $sql = "select * from two2 where uname='$userName'";

    $res = mysqli_query($connect,$sql);
    $arr = mysqli_fetch_assoc($res);

    // print_r($arr);
    // print_r($arr['password']);

    if(count($arr)){
        if($arr['upwd'] == $uPwd){
            // echo "
            //     <script>alert('登陆成功');location.href='https://www.baidu.com'</script>
            // ";
            echo json_encode(array(
                    'state' => '0',
                    'info' => '登陆成功'
                ));
        }else{
            // echo "<script>alert('密码错误，重新登陆');location.href='login.html'</script>";
            echo json_encode(array(
                'state' => '1',
                'info' => '密码错误，请重新登陆'
            ));
        }
    }else{
        // echo "
        //     <script>alert('用户名不存在，重新登陆');location.href='login.html'</script>
        // ";
        echo json_encode(array(
            'state' => '2',
            'info' => '用户名不存在'
        ));
    }
?>