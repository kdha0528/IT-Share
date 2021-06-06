<?php
session_start();
include_once('dbconn.php');

$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$tel = $_POST['tel'];

$sql = "update user set pw = '$pw', name = '$name', tel = '$tel' where id = '$id'";

if($conn->query($sql)){
    $_SESSION['name'] = $name;
    echo "$name 회원의 회원정보가 변경되었습니다.<br>";
    echo "<a href='index.php'>홈으로 돌아가기</a>";
}else{
    echo "회원정보수정 중에 오류가 발생하였습니다.".$conn->error;
}
?>