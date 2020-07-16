<?php
//error_reporting(0);
session_start();
if(!$_SESSION['log']){
    echo "<script>alert('请登录!')</script>";
    echo "<script>window.location.href='index.php'</script>";
}