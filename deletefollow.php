<?php
session_start();
include_once('dbconn.php');
$id = $_SESSION['id'];
$followerid = $_GET['followerid'];

$sql = "delete from follow where id = '$id' and followerid = '$followerid'";
$sql2 = "update user set follow = follow-1 where id = '$id'";
$sql3 = "update user set follower = follower -1 where id = '$followerid'";

if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
    echo "<script>location.href='userpage.php?id=$id'</script>";
}else{
    echo "<script type='text/javascript'>alert('팔로우 취소 도중에 오류가 발생하였습니다.$conn->error');</script>";
    echo "<script>location.href='userpage.php?id=$id'</script>";
}

?>