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
    echo "회원가입이 성공적으로 처리되었습니다.<br>";
    echo "<a href='index.php'>홈으로 돌아가기</a>";
}else{
    echo "회원가입 중에 오류가 발생하였습니다.".$conn->error;
}

?>