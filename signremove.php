<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$sql = "delete from user where id = '$id'";

if($conn->query($sql)){
    echo "<script>location.href='board.php?board=$b_board'</script>";
    session_destroy();
}else{
    echo "<script type='text/javascript'>alert('회원탈퇴 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='userpage.php?id='$id''</script>";
}
?>