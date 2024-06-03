<?php
if(empty($_POST["name"])){
    die("用户名不能为空！");
}
if(strlen($_POST["pass"])<10){
    die("密码不能小于10位！");
}
if($_POST["pass"]!==$_POST["qpass"]){
    die("两次输入的密码不一致！");
}

$pass_hash=password_hash($_POST["pass"],PASSWORD_DEFAULT);
$name=$_POST["name"];

$mysqli=new mysqli("localhost","root","root","tuser");
if($mysqli->connect_errno){
    die("数据库连接错误!".$mysqli->connect_errno);
}

if(isset($_POST["reg"])){
    $sql="INSERT INTO mima(name,password) VALUES ('$name','$pass_hash')";
    $mysqli->query($sql);
    
    if($mysqli->affected_rows>0){
        echo "<script>alert('恭喜你，注册成功，马上转入登录界面');window.location.href='regsister.html'</script>";
    }else if($mysqli->affected_rows<0){
        echo "<script>alert('注册失败')</script>";
    }
}