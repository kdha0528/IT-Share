<?php
session_start();
include_once('dbconn.php');

$b_idx = $_GET['b_idx'];

$sql = "update board set board.like = (select board.like from board where b_idx = '$b_idx')+1 where b_idx = '$b_idx'";
if(!isset($_SESSION['name'])) {
    echo "<script type='text/javascript'>alert('로그인을 하고 이용해주세요.');</script>";
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}
else{
    if($conn->query($sql)){
        echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
    }else{
        echo "<script type='text/javascript'>alert('좋아요에 실패하였습니다.$conn->error');</script>";
        echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
    }
}

?>