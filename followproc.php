<?php
session_start();
include_once('dbconn.php');

$id = $_SESSION['id'];
$followerid = $_GET['followerid'];

if(!isset($_SESSION['name'])){
    echo "<script type='text/javascript'>alert('로그인을 하고 이용해주세요.');</script>";
    echo "<script>location.href='userpage.php?id=$followerid'</script>";
}
else{

    $check = "select * from follow where id = '$id'";
    $result = $conn->query($check);
    $flag = true;
    while($row = $result->fetch_assoc()){
        if($row['followerid'] == $followerid){
            echo "<script type='text/javascript'>alert('이미 팔로우를 하였습니다.');</script>";
            $flag = false;
            echo "<script>location.href='userpage.php?id=$followerid'</script>";
        }
    }
    if($flag){
        $sql = "insert into follow values('','$id', '$followerid')";
        $sql2 = "update user set follow = follow +1 where id = '$id'";
        $sql3 = "update user set follower = follower + 1 where id = '$followerid'";

        if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
            echo "<script>location.href='userpage.php?id=$followerid'</script>";
        }else{
            echo "<script type='text/javascript'>alert('팔로우 도중에 오류가 발생하였습니다.$conn->error');</script>";
            echo "<script>location.href='userpage.php?id=$followerid'</script>";
        }
    }
}
?>