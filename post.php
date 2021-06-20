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
    <script src="main.js" defer></script>
    <title>Post</title>
</head>
<body>
        <?php
        session_start();
        include_once('dbconn.php');
        $b_idx = $_GET['b_idx'];
        if(isset($_SESSION['name'])){
            $id = $_SESSION['id'];
        }
        $view = "update board set viewnum = viewnum+1 where b_idx='$b_idx'";
        $conn->query($view);
        $sql = "select * from board where b_idx = '$b_idx'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
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

    <div class="container">
        <h1 class="login"><?=$row['b_board']?></h1>
        <?php
        if(isset($_SESSION['id'])){
            if($row['id'] == $_SESSION['id']){ ?>
            <div class="manage_post">
                <div class="find_info">
                    <a href="modifypost.php?b_idx=<?=$row['b_idx']?>" style="color: #a5a5a7">수정하기</a>
                    <a href="deletepost.php?b_idx=<?=$row['b_idx']?>&b_board=<?=$row['b_board']?>" style="color: #a5a5a7">삭제하기</a>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
        <section id ="postbox">
            <div class="postbox">
                <table id="posttable">
                    <tr class="postbox_header">
                        <th class="postbox_header_1"><a href="userpage.php?id=<?=$row['id']?>"><?=$row['id']?></a></th><th class="postbox_header_2">댓글수</th><th class="postbox_header_3">조회수</th><th class="postbox_header_4">추천수</th>
                    </tr>
                    <tr class="postbox_title">
                        <th class="postbox_title_1"><?=$row['b_title']?></th><th class="postbox_title_2"><?=$row['commentnum']?></th><th class="postbox_title_3"><?=$row['viewnum']?></th><th class="postbox_title_4"><?=$row['like']?></th>
                    </tr>
                    <tr class="postbox_content">
                        <th colspan="4" class="postbox_content_1"><?=$row['b_contents']?></th>    
                    </tr>
                </table>
            </div>
            <input type="button" value="좋아요" onclick="location.href='like.php?b_idx=<?=$row['b_idx']?>'" style="border: none; background-color: orange; color: white; margin-top: 30px; width:15%;" class="submit" />
        </section>

        <?php
        $sql = "select * from comment where b_idx = '$b_idx'";
        $result2 = $conn->query($sql);
        ?>

        <section id ="commentbox">
            <div class="commentbox">
                <table id="commenttable">
                    <tr class="commentbox_header">
                        <th class="commentbox_header_1">작성자</th><th class="commentbox_header_2">댓글내용</th><th class="commentbox_header_3">작성일</th>
                    </tr> 
                    <?php while($row2 = $result2->fetch_assoc()){ ?>
                    <tr class="commentbox_content">
                        <th class="commentbox_content_1"><a href="userpage.php?id=<?=$row2['id']?>" class=""><?=$row2['id']?></a></th>
                        <th class="commentbox_content_2"><?=$row2['c_contents']?>
                        <?php 
                        if(isset($_SESSION['id'])){
                            if($row['id'] == $_SESSION['id']){ ?>
                                <a class="deletecomment_btn" href="deletecomment.php?c_idx=<?=$row2['c_idx']?>&b_idx=<?=$row2['b_idx']?>">삭제</a>
                            <?php } ?>
                        <?php } ?>
                        </th>
                        <th class="commentbox_content_3"><?=$row2['c_date']?></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <form class="input_comment" action="writecomment.php" method="POST" target="_self">
                <input id="input_comment" type="text" name="c_contents" placeholder="댓글을 입력해주세요.">
                <input type="hidden" name="b_idx" value="<?=$row['b_idx']?>">
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