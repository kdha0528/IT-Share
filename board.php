<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css?after" type="text/css" media="screen" charset="utf-8"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet" />
        <script src="main.js" defer></script>
        <title>Posting Board</title>
    </head>
    <body>
        <?php
        session_start();
        include_once('dbconn.php');
        if(isset($_SESSION['name'])){
            $id = $_SESSION['id'];
        }
        $board = $_GET['board'];
        $order = $_GET['order'];
        if($order){
            if($order == '최신순' || $order == null){
                if($board =='전체게시판'){
                    $sql = "SELECT * from board";
                }else{
                    $sql = "SELECT * from board where b_board = '$board'";
                }
            }
            elseif($order == '조회순'){
                if($board =='전체게시판'){
                    $sql = "SELECT * from board  order by viewnum desc";
                }else{
                    $sql = "SELECT * from board where b_board = '$board' order by viewnum desc";
                }
            }
            else{
                if($board =='전체게시판'){
                    $sql = "SELECT * from board  order by board.like desc";
                }else{
                    $sql = "SELECT * from board where b_board = '$board' order by board.like desc";
                }
            }
        }else{
            if($board =='전체게시판'){
                $sql = "SELECT * from board";
            }else{
                $sql = "SELECT * from board where b_board = '$board'";
            }
        }
        
        $result = $conn->query($sql);
        if(!isset($result)) die($conn->error);
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
                    <li><a class="navbar_menu_item" href='userpage.php?id=<?=$_SESSION['id']?>'>마이페이지</a></li>
                <li><a class="navbar_menu_item" href='signout.php'>로그아웃</a></li>
                <?php } ?>
            </ul>
        </nav>
        <!--BoardPage-->
        <div class="container">
            <div class="board_top">
                <h1 class="login" class="board_title"><?= $board ?></h1>
                <a href="writing.php?board=<?=$board?>" class="board_writing">글쓰기</a>
            </div>
            <div class="board_second">
                <div class="find_info">
                    <a href="board.php?board=<?=$board?>&order=최신순" class="" style="color: #a5a5a7">최신순</a>
                    <span class="bar" aria-hidden="true">|</span>
                    <a href="board.php?board=<?=$board?>&order=조회순" class="" style="color: #a5a5a7">조회순</a>
                    <span class="bar" aria-hidden="true">|</span>
                    <a href="board.php?board=<?=$board?>&order=추천순" class="" style="color: #a5a5a7">추천순</a>
                </div>
                <form class="search" action="search.php" method="POST" target="_self">
                    <input type="text" name="search" value="" placeholder=" 검색어를 입력해주세요." class="search_bar" />
                    <input type="image" src="image/iconfinder_search-find-magnify-glass_2203508.png" class="search_icon" />
                </form>
            </div>
            
            <section id = "posts">
                <form action="showremove.php" method="get" class="posts"> 
                    <table id="postboard">
                        <tr class="postboard_header">
                            <th class="postboard_header_1">게시판</th><th class="postboard_header_2">제목</th><th class="postboard_header_3">글쓴이</th><th class="postboard_header_4">작성일</th><th class="postboard_header_5">조회수</th>
                        </tr>
                        <?php while($row = $result->fetch_assoc()){ ?>
                        <tr class="postboard_content">
                            <td class="postboard_content_1"><a href="board.php?board=<?=$row['b_board']?>" class=""><?=$row['b_board']?></a></td>
                            <td class="postboard_content_2"><a href="post.php?b_idx=<?=$row['b_idx']?>" class=""><?=$row['b_title'] ?>(<?=$row['commentnum']?>)</a></td>
                            <td class="postboard_content_3"><a href="userpage.php" class=""><?=$row['id']?></a></td>
                            <td class="postboard_content_4"><?=$row['b_date']?></td>
                            <td class="postboard_content_5"><?=$row['viewnum']?></td>
                         </tr>
                        <?php } ?>
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
