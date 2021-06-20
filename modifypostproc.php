<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$b_idx = $_POST['b_idx'];
$b_board = $_POST['board'];
$b_title = $_POST['title'];
$b_contents = $_POST['contents'];
$b_date = date("Y/m/d");

$sql = "update board set b_board='$b_board', b_title='$b_title', b_contents='$b_contents', b_date='$b_date' where b_idx='$b_idx'";

if($conn->query($sql)){
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}else{
    echo "<script type='text/javascript'>alert('글수정 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}

?>