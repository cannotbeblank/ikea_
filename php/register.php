<?php
    header("Access-Control-Allow-Origin:*");
    require('sqldb.php');

    $uname = $_REQUEST['uname'];
    $upwd = $_REQUEST['upwd'];
    $uckc = $_REQUEST['uck'];
    $ckcName = $_REQUEST['ckcCName'];

    function mainN($uname,$upwd,$connect){
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
        };
    };
    

    switch($ckcName){
        case 'one' : if($uckc == 'rp8X'){
            mainN($uname,$upwd,$connect);
            }else{
                echo json_encode(array(
                    'state' => '-1',
                    'info' => '验证码错误'
                ));
        };
        break;
        case 'two' : if($uckc == 'Nc6E'){
            mainN($uname,$upwd,$connect);
            }else{
                echo json_encode(array(
                    'state' => '-1',
                    'info' => '验证码错误'
                ));
            };
        break;
        default : echo '纳尼?';
    };
    
?>