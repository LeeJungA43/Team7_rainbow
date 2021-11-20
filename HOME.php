<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">

    <title>RAINBOW</title>
</head>
<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="home.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="home.php" class="nav__link active">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot.php" class="nav__link">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="direct_search.php" class="nav__link">
                        <ion-icon name="search-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">검색</span>
                    </a>

                    <a href="User_custom.php" class="nav__link">
                        <ion-icon name="thumbs-up-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">맞춤 추천</span>
                    </a>

                    <a href="user_info.php" class="nav__link">
                        <ion-icon name="person-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">내 정보</span>
                    </a>

                </div>
                <a href="logout.php" class="nav__link">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav_name">Log out</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- 로그인/회원가입 줄 -->
    <div style="font-size:15px;float:right;">
        <form method="post" action="login.php">
            <input type="button" value="Login" onclick="location.href = 'login.html'">
            <input type="button" value="회원가입" style="font-size:11.4px;" onclick="location.href = 'member_join.html'">
        </div>
    <p style="clear:both;">&nbsp;</p>


    <h1>RAINBOW</h1> <!--사이트 이름-->
    <!--사이트 소개-->
    <div class="site_introduce">
        Rainbow site는 패션 정보를 다루는 사이트입니다. 의류를 직접 검색할 수 있고 최근의 인기 추천 및 맞춤 추천을 받아볼 수 있습니다. 블라블라
    </div>
    <!--현재 비교하는 사이트 설명-->
    <h2>다음의 두 사이트 분석 정보를 제공합니다.</h2>
    <div class="site_sort">
        <div class="hotping">
            <h1>HOTPING</h1>
            <a href="https://hotping.co.kr/"><img src="image/HOTPING.png"/></a>
            <div>
                핫핑은 블라블라인 사이트입니다.
            </div>
        </div>
        <div class="attrangs">
            <h1>ATTRANGS</h1>
            <a href="https://attrangs.co.kr/"><img src="image/ATTRANGS.png"/></a>
            <div>
                아뜨랑스는 블라블라인 사이트입니다.
            </div>
        </div>
    </div>

    <h2>사이트 이용 방법</h2>
    <!--개발 완료 후 캡쳐해서 추가-->


    <!-- IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>