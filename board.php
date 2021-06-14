<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="reset.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet" />
        <title>PostingBoard</title>
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
        $board = $_GET['board'];
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
        <!--BoardPage-->
        <div class="container">
            <div class="board_top">
                <h1 class="login" class="board_title"><?= $board ?> 게시판</h1>
                <a href="writing.php" class="board_writing">글쓰기</a>
            </div>
            <div class="find_info">
                <a href="findid.php" style="color: #a5a5a7">아이디 찾기</a>
                <span class="bar" aria-hidden="true">|</span>
                <a href="findpw.php" style="color: #a5a5a7">비밀번호 찾기</a>
                <span class="bar" aria-hidden="true">|</span>
                <a href="signup.php" style="color: #a5a5a7">회원가입</a>
            </div>
            <section id="search" class="section">
                <form class="search" action="search.php" method="POST" target="_self">
                    <input type="text" name="search" value="" placeholder=" 검색어를 입력해주세요." class="search_bar" />
                    <input type="image" src="image/iconfinder_search-find-magnify-glass_2203508.png" class="search_icon" />
                </form>
            </section>
            <section id = "posts">
                <form action="showremove.php" method="get" class="posts"> 
                    <table id="postboard">
                        <tr class="postboard_header">
                            <th class="postboard_header_1">게시판</th><th class="postboard_header_2">제목</th><th class="postboard_header_3">글쓴이</th><th class="postboard_header_4">작성일</th><th class="postboard_header_5">조회수</th>
                        </tr>
                        <tr class="postboard_content">
                            <td class="postboard_content_1"><a href="" class="">전체게시판</a></td>
                            <td class="postboard_content_2"><a href="" class="">아니 이게 말이되냐???</a></td>
                            <td class="postboard_content_3"><a href="" class="">kdha0528</a></td>
                            <td class="postboard_content_4">2020-04-08</td>
                            <td class="postboard_content_5">333</td>
                        </tr>
                    </table>
                </form>
            </section>
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
