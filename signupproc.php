<?php

include_once('dbconn.php');

$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$tel = $_POST['tel'];
date_default_timezone_set("Asia/Seoul");
$date = date("Y/m/d");
$follow = 0;
$follower = 0;
$post = 0;
$comment = 0;

$sql="insert into user values('$id', '$pw', '$name', '$tel', '$date', $follow, $follower, $post, $comment)";

if($conn->query($sql)){
    echo "<script type='text/javascript'>alert('회원가입에 성공하였습니다.');</script>";
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script type='text/javascript'>alert('회원가입 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='signup.php'</script>";
}

?>