<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="reset.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet" />
        <title>IT Share</title>
    </head>
    <body>
        <?php
        session_start();
        include_once('dbconn.php');
        $count = 0;
        if(isset($_SESSION['name'])){
            $uid = $_SESSION['uid'];
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
        <!--MainPage-->
        <div class="container">
            <section id="search" class="section">
                <form class="search" action="search.php" method="POST" target="_self">
                    <input type="text" name="search" value="" placeholder=" 검색어를 입력해주세요." class="search_bar" />
                    <input type="image" src="image/iconfinder_search-find-magnify-glass_2203508.png" class="search_icon" />
                </form>
            </section>

            <section id="postingBoard">
                <ul class="postingBoard_items">
                    <li class="postingBoard_item">
                        <a>
                            <img src="image/mycollection/png/all.png" />
                            <p>ALL</p>
                        </a>
                    </li>
                    <li class="postingBoard_item">
                        <a>
                            <img src="image/mycollection/png/free.png" />
                            <p>FREE</p>
                        </a>
                    </li>
                    <li class="postingBoard_item">
                        <a>
                            <img src="image/mycollection/png/qna.png" />
                            <p>Q&A</p>
                        </a>
                    </li>
                    <li class="postingBoard_item">
                        <a>
                            <img src="image/mycollection/png/share.png" />
                            <p>SHARE</p>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
    </body>
</html>