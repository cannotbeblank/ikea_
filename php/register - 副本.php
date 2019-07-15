<?php
    header("Access-Control-Allow-Origin:*");
    require('sqldb.php');

    $uname = $_REQUEST['uname'];
    $upwd = $_REQUEST['upwd'];
    $uckc = $_REQUEST['uck'];
    $ckcName = $_REQUEST['ckcCName'];
    if($ckcName == 'one' && $uckc == 'rp8X'){
        $sql = "select * from two2 where uname='$uname'";
        //执行
        $res = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_assoc($res);
        if($arr){
            echo json_encode(array(
                'state' => '0',
                'info' => '用户名已注册'
            ));
        }else{
            $insert = "insert into two2 (uname,upwd) values ('$uname','$upwd')";
            mysqli_query($connect,$insert);
            echo json_encode(array(
                'state' => '1',
                'info' => '注册成功'
            ));
        }
    }else if($ckcName == 'one' && $uckc != 'rp8X'){
        echo json_encode(array(
            'state' => '-1',
            'info' => '验证码错误'
        ));
    }
    if($ckcName == 'two' && $uckc == 'Nc6E'){
        $sql = "select * from two2 where uname='$uname'";
        //执行
        $res = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_assoc($res);
        if($arr){
            echo json_encode(array(
                'state' => '0',
                'info' => '用户名已注册'
            ));
        }else{
            $insert = "insert into two2 (uname,upwd) values ('$uname','$upwd')";
            mysqli_query($connect,$insert);
            echo json_encode(array(
                'state' => '1',
                'info' => '注册成功'
            ));
        }
    }else if($ckcName == 'two' && $uckc != 'Nc6E'){
        echo json_encode(array(
            'state' => '-1',
            'info' => '验证码错误'
        ));
    }
    
?>