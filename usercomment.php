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
        <script src="main.js" defer></script>
        <title>User Comments</title>
    </head>
    <body>
        <?php
        session_start();
        include_once('dbconn.php');
        $id = $_GET['id'];
        $sql = "SELECT * from comment where id = '$id'";
        $result = $conn->query($sql);
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
                <h1 class="login" class="board_title"><?=$id?>님이 쓴 댓글</h1>
            </div>
            
            <section id = "posts">
            <div class="commentbox">
                <table id="commenttable">
                    <tr class="commentbox_header">
                        <th class="commentbox_header_1">작성자</th><th class="commentbox_header_2">댓글내용</th><th class="commentbox_header_3">작성일</th>
                    </tr> 
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <tr class="commentbox_content">
                        <th class="commentbox_content_1"><a href="userpage.php?id=<?=$id?>" class=""><?=$row['id']?></a></th>
                        <th class="commentbox_content_2"><?=$row['c_contents']?>
                        <?php 
                        if(isset($_SESSION['id'])){
                            if($row['id'] == $_SESSION['id']){ ?>
                                <a class="deletecomment_btn" href="deletecomment.php?c_idx=<?=$row['c_idx']?>&b_idx=<?=$row2['b_idx']?>">삭제</a>
                            <?php } ?>
                        <?php } ?>
                        </th>
                        <th class="commentbox_content_3"><?=$row['c_date']?></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
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
