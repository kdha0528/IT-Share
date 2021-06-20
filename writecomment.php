<?php
session_start();
include_once('dbconn.php');


$id = $_SESSION['id'];
$b_idx = $_POST['b_idx'];
$c_contents = $_POST['c_contents'];
$c_date = date("Y/m/d");

if(!isset($_SESSION['name'])){
    echo "<script type='text/javascript'>alert('로그인을 하고 이용해주세요.');</script>";
    echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
}
else{
    $sql = "insert into comment values('','$id', '$c_date', '$c_contents', '$b_idx')";
    $sql2 = "update user set comment = (select comment from user where id = '$id')+1 where id = '$id'";
    $sql3 = "update board set commentnum = (select commentnum from board where b_idx = '$b_idx')+1 where b_idx = '$b_idx'";

    if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
        echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
    }else{
        echo "<script type='text/javascript'>alert('댓글쓰기 도중에 오류가 발생하였습니다.$conn->error');</script>";
        echo "<script>location.href='post.php?b_idx=$b_idx'</script>";
    }
}
?>