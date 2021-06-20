<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$b_board = $_POST['board'];
$b_title = $_POST['title'];
$b_contents = $_POST['contents'];
$b_date = date("Y/m/d");
$commentnum = 0;
$viewnum = 0;
$like = 0;

$sql = "insert into board values('','$id', '$b_board', '$b_title', '$b_contents', '$b_date', $commentnum, $viewnum, $like)";
$sql3 = "update user set post = (select post from user where id = '$id')+1 where id = '$id'";

if($conn->query($sql) && $conn->query($sql3)){
    echo "<script>location.href='board.php?board=$b_board'</script>";
}else{
    echo "<script type='text/javascript'>alert('글쓰기 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='board.php?board=$b_board'</script>";
}

?>