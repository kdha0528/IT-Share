<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$b_idx = $_GET['b_idx'];
$b_board = $_GET['b_board'];

$sql = "delete from board where b_idx = '$b_idx'";
$sql2 = "update user set post = (select post from user where id = '$id')-1 where id = '$id'";

if($conn->query($sql) && $conn->query($sql2)){
    echo "<script>location.href='board.php?board=$b_board'</script>";
}else{
    echo "<script type='text/javascript'>alert('글삭제 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='board.php?board=$b_board'</script>";
}

?>