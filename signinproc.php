<?php
session_start(); //세션 처리 시작

include_once('dbconn.php');

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "select * from user where id = '$id' and pw = '$pw' ";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $_SESSION ['id'] = $row['id'];    //세션 키 생성해서 로그인한 사용자의 아이디와 이름을 저장
    $_SESSION ['name'] = $row['name'];
    echo  "$name 님 환영합니다.<br>";
    echo "<a href='index.php'>홈으로 돌아가기</a>";
}else{
    echo "아이디 또는 비밀번호가 맞지 않습니다.";
    echo "<a href='signin.php'>로그인화면으로 돌아가기</a>";
}

?>