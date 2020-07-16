<?php
//error_reporting(0);
require_once "Checklog.php";
require_once "functions.php";

$conn = ConnectDB('yii2_admin');
if (!$conn) {
    echo "<script>alert('数据库连接错误')</script>";
    die();
}

//$symbol = text_input(@$_GET['id']);
//$sql = "select * from recommend where ID='$symbol'";
//$result = $conn->query($sql)->fetch_assoc();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Action Center 推荐后台管理</title>
    </head>
    <body>
    <div class="inline left">
        <strong>
            <span>Action Center 推荐后台管理</span>
        </strong>
    </div>
    <div class="inline right">
        <span><a href="index.php?state=logout">退出</a></span>
    </div>
    <br>
    <div>
<!--        <center>-->
<!--            <table>-->
<!--                <form method="post">-->
<!--                    <tr>-->
<!--                        <td align="right">ID:</td>-->
<!--                        <td><input type="text" name="id" size="100" required="required"-->
<!--                                   value="--><?php //echo $symbol ? $result['ID'] : ''; ?><!--"></td>-->
<!--                        <td>*必填信息</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td align="right">推荐程序地址:</td>-->
<!--                        <td><input type="text" name="url" size="100" required="required"-->
<!--                                   value="--><?php //echo $symbol ? $result['url'] : ''; ?><!--"></td>-->
<!--                        <td>*必填信息</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td align="right">文件大小:</td>-->
<!--                        <td><input type="text" name="size" size="100" required="required"-->
<!--                                   value="--><?php //echo $symbol ? $result['size'] : ''; ?><!--"></td>-->
<!--                        <td>*必填信息</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td align="right">MD5:</td>-->
<!--                        <td><input type="text" name="md5" size="100" required="required"-->
<!--                                   value="--><?php //echo $symbol ? $result['md5'] : ''; ?><!--"></td>-->
<!--                        <td>*必填信息</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td align="right">描述:</td>-->
<!--                        <td><input type="text" name="info" size="100"-->
<!--                                   value="--><?php //echo $symbol ? $result['info'] : ''; ?><!--"></td>-->
<!--                        <td>-可选信息</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td align="right"></td>-->
<!--                        <td><input type="submit" name="sub" value="提交&更新"-->
<!--                                   style="border-radius:9px;width: 100px;height: 40px"></td>-->
<!--                    </tr>-->
<!---->
<!--                </form>-->
<!--            </table>-->
    </div>
    <div>
        <p><strong>现有产品列表</strong></p>
        <fieldset>
            <center>
                <div>
                    <table>
                        <tr>
                            <td class="tdcenter">ID</td>
                            <td class="tdcenter">user</td>
                            <td class="tdcenter">title</td>
                            <td class="tdcenter">create_at</td>
                            <td class="tdcenter">update_at</td>
                        </tr>
                        <?php
                        $sql = "select id, user, article_title, created_at, updated_at from article";
                        $row = $conn->query($sql);
                        $details = $row->fetch_all();
                        foreach ($details as $detail) : ?>
                            <tr>
                                <td class="tdcenter"><a href="../viewpage.php?id=<?php echo $detail['0']; ?>">
                                        <?php echo $detail['0'] ?></a></td>
                                <td class="tdcenter"><a href="?id=<?php echo $detail['0']; ?>">
                                        <?php echo $detail['1'] ?></a></td>
                                <td class="tdcenter"><a href="?id=<?php echo $detail['0']; ?>">
                                        <?php echo $detail['2'] ?></a></td>
                                <td class="tdcenter"><a href="?id=<?php echo $detail['0']; ?>">
                                        <?php echo $detail['3'] ?></a></td>
                                <td class="tdcenter"><a href="?id=<?php echo $detail['0']; ?>">
                                        <?php echo $detail['4'] ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
        </fieldset>
    </div>
    </body>
</html>
<?php
//if (isset($_POST['sub'])) {
//    if (!empty($_POST["id"])) {
//        $id = text_input($_POST["id"]);
//        if (!preg_match('/^[A-Za-z0-9\/_.:-]+$/', $id)) {
//            echo "<script>alert('ID格式输入错误')</script>";
//            die();
//        }
//    }
//    if (!empty($_POST["url"])) {
//        $url = text_input($_POST["url"]);
//        if (!preg_match('/^[A-Za-z0-9\/_.:-]+$/', $url)) {
//            echo "<script>alert('推荐程序地址格式输入错误')</script>";
//            die();
//        }
//    }
//    if (!empty($_POST["size"])) {
//        $size = text_input($_POST["size"]);
//        if (!preg_match('/^[0-9]+$/', $size)) {
//            echo "<script>alert('文件大小格式输入错误')</script>";
//            die();
//        }
//    }
//    if (!empty($_POST["md5"])) {
//        $md5 = text_input($_POST["md5"]);
//        if (!preg_match('/^[A-Za-z0-9\/.:-_]+$/', $md5)) {
//            echo "<script>alert('MD5格式输入错误')</script>";
//            die();
//        }
//    }
//    $info = text_input($_POST['info']);
//
//    if (isset($symbol)) {
//        $sql = "update recommend set ID='$id', url='$url', size='$size', md5='$md5', info='$info' where ID='$symbol'";
//    } else {
//        $sql = "insert into recommend (id, url, size, md5, info) values ('$id', '$url', '$size', '$md5', '$info')";
//    }
//    $result = $conn->query($sql);
//    if ($result) {
//        echo "<script>alert('提交&更新成功');window.location.href='homepage.php'</script>";
//    } else {
//        echo "<script>alert('提交&更新失败" . $conn->error . "')</script>";
//    }
//
//}
