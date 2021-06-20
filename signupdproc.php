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
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script type='text/javascript'>alert('회원정보수정 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='userpage.php?id='$id''</script>";
}
?>