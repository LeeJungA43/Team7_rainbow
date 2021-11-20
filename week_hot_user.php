<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ./login.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/search_result.css">

    <title>RAINBOW</title>
</head>
<!-- 반응형 사이드바 -->
<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="home_user.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="home_user.php" class="nav__link">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot_user.php" class="nav__link active">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="User_custom.php" class="nav__link">
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

    <!-- 로그인 줄 -->
    <div style="font-size:15px;float:right;">
            <?php echo $_SESSION['user_id'];?>님
        </div>
    <p style="clear:both;">&nbsp;</p>

    <div class="image"><img src="img/week_hot.jpg" alt="today rank" style="display: block; margin: 0 auto;width:100%">
        <div class="today">
            <b>WEEK RANK</b>
        </div>
        <!-- 오늘 날짜로부터 일주일 전까지 순위로 windows veiw 생성해 사용 -->
        <!-- 각 날짜의 랭킹들을 다 더해서 7로 나눈 것이 평균 랭킹. 랭킹으로 정렬 -->

        <?php
            $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
                if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
                $sql = "INSERT Week SELECT * FROM (SELECT * FROM search_rank ORDER BY date DESC LIMIT 70) AS a ORDER BY date, rank ASC";
                $res = mysqli_query($mysqli, $sql);
            }
        mysqli_close($mysqli);
        ?>


        <div class="text1">
            <?php
                $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
                    if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                } else {
                    $sql = "SELECT DISTINCT topic, large_category, small_category,
				AVG(rank) OVER (PARTITION BY topic) AS week_rank
		      FROM Week
		      ORDER BY week_rank;";
                    $res = mysqli_query($mysqli, $sql);

                    echo '<table class="table table-striped table-bordered table-hover">'; 
                    echo "<tr><th>RANK</th><th>TOPIC</th></tr>"; 
                    $rank = 1;
                    while($row = mysqli_fetch_array($res))
                    {
                        if($rank==1){
                            $_SESSION['Best_large_category'] = $row['large_category'];
                            $_SESSION['Best_small_category'] = $row['small_category'];
                        }

                        if($rank<=5){
                            echo "<tr><td>";
                            echo $rank;
                            echo "</td><td>";
                            echo $row['topic'];
                            echo "</td></tr>";
                         }
                      $rank++;
                    }
                    echo "</table>";    
                }
            mysqli_close($mysqli);
            ?>

        </div>
        <div class="text2">
            <?php
                $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
                    if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                } else {
                    $sql = "SELECT DISTINCT topic, large_category, small_category,
				AVG(rank) OVER (PARTITION BY topic) AS week_rank
		      FROM Week
		      ORDER BY week_rank;";
                    $res = mysqli_query($mysqli, $sql);

                    echo '<table class="table table-striped table-bordered table-hover">'; 
                    echo "<tr><th>RANK</th><th>TOPIC</th></tr>"; 
                    $rank = 1;
                    while($row = mysqli_fetch_array($res))
                    {
                      if($rank>5 && $rank<=10){
                         echo "<tr><td>"; 
                         echo $rank;
                         echo "</td><td>";   
                         echo $row['topic'];
                         echo "</td></tr>";  
                      }
                      $rank++;
                    }
                    echo "</table>";    
                }
            mysqli_close($mysqli);
            ?>
        </div>
    </div>
    <br>

    <!-- 가장 많이 검색된 제품 large_category 랭킹 제품을 보여줌 -->
    <?php 
        $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "SELECT * FROM Cloth_info";
            $res = mysqli_query($mysqli, $sql);
            $row_num = 0;
            while($row = mysqli_fetch_array($res))
            {
                if($_SESSION['Best_large_category'] == $row['large_category']){
                    if($row_num % 4 ==0){
                        echo "<div class=\"one_row\">";
                    }
                    echo "<div class=\"one_goods\">";

                    echo "<h3>". $row['name'] . "</h3>";
                    echo "<div>" . $row['large_category'] . "</div>";
                    echo "<div>" . $row['small_category'] . "</div>";
                    echo "<a href=\"" .$row['link'] . "\">";
                    echo "<img src=\"" . $row['image'] . "\"/>";
                    echo "</a>";
                    echo "<div>" . $row['price'] . "원</div>";
                    echo "<div>" . $row['purchase_num'] . "명이 구매했습니다.</div>";
                    echo" </div>";

                    if($row_num % 4 ==3){
                        echo "</div>";
                    }
                    $row_num++;
                }
            }
        $row_num = 0;
        }
        mysqli_close($mysqli);
    ?>

    <?php
        $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "DELETE FROM Week";
            $res = mysqli_query($mysqli, $sql);
        }
    mysqli_close($mysqli);
    ?>

    <!-- IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>