<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css?after" type="text/css" media="screen" charset="utf-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet" />
    <title>Post</title>
</head>
<body>
    <?php
    session_start();
    include_once('dbconn.php');
    $count = 0;
    if(isset($_SESSION['name'])){
        $id = $_SESSION['id'];
        $sql = "select count(*) rowcnt from user where id = '$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $count = $row['rowcnt'];
        }
    }
    ?>
    <!-- NavBar -->
    <nav id="navbar">
        <div class="navbar_logo">
            <a href="index.php"><img src="image/logo/logo_transparent2.png" class="navbar_logo_img" /></a>
        </div>
        <ul class="navbar_menu">
            <?php if(!isset($_SESSION['name'])){ ?>
            <li><a class="navbar_menu_item" href="signup.php">회원가입</a></li>
            <li><a class="navbar_menu_item" href='signin.php'>로그인</a></li>
            <?php }else{ ?>
            <li><a class="navbar_menu_item" href='mypage.php'>마이페이지</a></li>
            <li><a class="navbar_menu_item" href='signout.php'>로그아웃</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class="container">
        <h1 class="login">게시판</h1>
        <table id="postbox">
            <tr class="postbox_header">
                <th class="postbox_header_1"><a href="user.php">작성자</a></th><th class="postbox_header_2">댓글</th><th class="postbox_header_3">조회수</th><th class="postbox_header_4">추천수</th>
            </tr>
            <tr class="postbox_title">
                <th class="postbox_title_1">제목</th>
            </tr>
            <tr class="postbox_content">
                <th class="postbox_content_1">내용</th>    
            </tr>
        </table>
        <table id="commentbox">
            <tr class="commentbox_top">
                <th>댓글 </th>
            </tr>
            <tr class="commentbox_header">
                <th class="commentbox_header_1">작성자</th><th class="commentbox_header_2">댓글내용</th><th class="commentbox_header_3">작성일</th>
            </tr>
            <tr class="commentbox_content">
                <td class="commentbox_content_1"><a href="userpage.php" class="">작성자</a></td>
                <td class="commentbox_content_2">내용</td>
                <td class="commentbox_content_3">작성일</td>
            </tr>
        </table>
    </div>

    <!--footer -->
    <footer id="footer">
        <ul class="contact">
            <li><i class="fas fa-mobile-alt" style="width: 26px"></i> Phone : 010 7544 4357</li>
            <li>
                <img src="image/kakaotalk.png" alt="kakao talk" />
                Kakao : kdha4585
            </li>
            <li class="contact__mail">
                <a href="mailto:kdha4585@gmail.com" target="_balnk">
                    <i class="far fa-envelope"> Email : kdha485@gmail.com</i>
                </a>
            </li>
            <li class="contact__git">
                <a href="https://github.com/kdha0528" target="_balnk">
                    <i class="fab fa-github" alt="GitHub"> https://github.com/kdha0528</i>
                </a>
            </li>
        </ul>
        <p class="footer__description"><i class="far fa-copyright"> 2021 Dale Kim - All rights reserved. </i></p>
    </footer>
</body>
</html>