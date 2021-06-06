<?php

session_start();
session_destroy();
echo "로그아웃되었습니다.<br>";
echo "<a href='index.php'>홈으로 돌아가기</a>";

?>