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
        <title>Find ID</title>
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
        <!--FindidPage-->
        <div class="container">
            <h1 class="login">아이디 찾기</h1>
            <div class="container_contents">
                <h3 class="welcome" class="">가입하신 전화번호를 입력해주세요</h3>

                <form class="sign" action="findidproc.php" method="POST" target="_self">
                    <div class="sign_items">
                        <label>전화번호</label>
                        <input type="tel" name="tel" />
                    </div>
                    <div>
                        <input type="submit" value="아이디 찾기" style="border: none; background-color: #5dacbd; color: white; margin-top: 30px" class="submit"/>
                    </div>
                </form>
                <div class="find_info">
                    <a href="findid.php" style="color: #a5a5a7">아이디 찾기</a>
                    <span class="bar" aria-hidden="true">|</span>
                    <a href="findpw.php" style="color: #a5a5a7">비밀번호 찾기</a>
                    <span class="bar" aria-hidden="true">|</span>
                    <a href="signup.php" style="color: #a5a5a7">회원가입</a>
                </div>
            </div>
        </div>
        <!--footer -->
        <footer id = "footer">
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
