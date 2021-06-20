<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$c_idx = $_GET['c_idx'];
$b_idx = $_GET['b_idx'];

$sql = "delete from comment where c_idx = '$c_idx'";
$sql2 = "update user set comment = (select comment from user where id = '$id')-1 where id = '$id'";
$sql3 = "update board set commentnum = (select commentnum from board where b_idx = '$b_idx')-1 where b_idx = '$b_idx'";

if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}else{
    echo "<script type='text/javascript'>alert('댓글삭제 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}

?>