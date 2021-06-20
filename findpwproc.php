<?php
session_start();
include_once('dbconn.php');

$tel = $_POST['tel'];

$sql = "select pw, name from user where tel = $tel";

$result = $conn->query($sql);
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $pw = $row['pw'];
    $_SESSION ['pw'] = $row['pw'];    //세션 키 생성해서 로그인한 사용자의 아이디와 이름을 저장
    $_SESSION ['name'] = $row['name'];
    echo  "$name 회원님의 비밀번호는 $pw 입니다.<br>";
    echo "<a href='signin.php'>로그인 화면으로 돌아가기</a>";
}else{
    echo "<script type='text/javascript'>alert('존재하지 않는 전화번호 입니다.$conn->error');</script>";
    echo "<script>location.href='findpw.php'</script>";
}
?>