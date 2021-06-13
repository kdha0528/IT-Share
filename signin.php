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
        <title>Sign In</title>
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
        <!--SigninPage-->
        <div class="container">
            <h1 class="login">로그인</h1>
            <div class="container_contents">
                <h3 class="welcome"><span class="itshare">IT SHARE</span>에 오신 것을 환영합니다.</h3>

                <form class="sign" action="signinproc.php" method="POST" target="_self">
                    <div class="sign_items">
                        <label>아이디</label>
                        <input type="text" name="id" />
                    </div>
                    <div class="sign_items">
                        <label>비밀번호</label>
                        <input type="password" name="pw" />
                    </div>
                    <div>
                        <input type="submit" value="로그인" style="border: none; background-color: #5dacbd; color: white; margin-top: 30px" />
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
    </body>
</html>
