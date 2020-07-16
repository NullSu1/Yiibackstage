<head>
    <meta charset="UTF-8">
    <title>Action Center 推荐后台管理</title>
</head>
<body>
<br>
<div>
    <center>
        <p>
            <strong>
                <span>Action Center 推荐后台管理登录</span>
            </strong>
        </p>
        <table>
            <form method="post">
                <tr>
                    <td align="right">ID:</td>
                    <td><input type="text" name="userid" size="50" required="required" value=""></td>
                    <td>*必填信息</td>
                </tr>
                <tr>
                    <td align="right">password:</td>
                    <td><input type="password" name="passwd" size="50" required="required" value=""></td>
                    <td>*必填信息</td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="center">
                        <input type="submit" name="sub" value="登录"
                               style="border-radius:9px;width: 100px;height: 40px"></td>
                </tr>
            </form>
        </table>
</div>
</body>
<?php
session_start();
require_once "functions.php";

$conn = ConnectDB('ac');
if (!$conn) {
    echo "<script>alert('数据库连接错误')</script>";
    die();
}

if(@$_GET['state'] == 'logout'){
    $_SESSION['log'] = 0;
}
if(isset($_POST['sub'])){
    $userid = text_input($_POST['userid']);
    $passwd = text_input($_POST['passwd']);

    $sql = "select ID from user where ID='$userid'";
    $id = $conn->query($sql)->fetch_assoc();
    if($id){
        $sql = "select password from user where ID='$userid'";
        $result = $conn->query($sql)->fetch_assoc();
        if($result){
            $_SESSION['log'] = 1;
            echo "<script>alert('登录成功');window.location.href='homepage.php'</script>";
        }else{
            echo "<script>alert('密码错误')</script>";
        }
    }else{
        echo "<script>alert('ID不存在')</script>";
    }
}