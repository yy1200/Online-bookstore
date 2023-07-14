<?php
session_start();

// 檢查使用者是否已登入
if (!isset($_SESSION["user_ID"])) {
  // 如果未登入，重新導向回登入頁面或其他處理方式
  header("Location: login.html");
  exit();
}

// 獲取使用者的user_ID
$user_ID = $_SESSION["user_ID"];
include 'user_connect.php';
// 使用user_ID查詢使用者的名稱
$sql = "SELECT name FROM users WHERE user_ID = '$user_ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $name = $row["name"];
  // echo "使用者名稱： " . $name;
}

$conn->close();

// 在此之後，您可以使用$user_ID來查詢資料庫或執行其他操作

// 顯示使用者首頁
?>

<!-- <!DOCTYPE html> -->
<!-- <html> -->

<!-- <head> -->
<!-- <title>使用者首頁</title> -->
<!-- </head> -->

<!-- <body> -->
<!-- <h1>歡迎回來，使用者 -->
<!-- <?php echo $user_ID; ?> -->
<!-- </h1> -->
<!-- 在這裡添加其他使用者首頁的內容 -->

<!-- <a href="logout.php">登出</a> 提供登出的連結 -->
<!-- </body> -->

<!-- </html> -->


<!DOCTYPE html>
<html>

<head>
  <!--meta tags-->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- our project just needs Font Awesome Solid + Brands -->
  <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet" />
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <title>竹狐書局</title>
</head>

<style>
  body {
    min-height: 100vh;
  }

  /*body {
        background-image: url("_image/背景.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-color: rgba(0, 0, 0, 0.3);
    }*/
  h1 {
    color: cadetblue;
    font-size: 70px;
  }

  h3 {
    color: darkslateblue;
    font-size: 30px;
  }

  p {
    color: slategray;
  }

  li {
    color: black;
    text-align: center;
  }

  nav {
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
    background: rgba(18, 19, 49, 0.7);
    padding: 20px;
  }

  .navbar-nav {
    margin-left: auto;
    /* 將選單項目置於右側 */
  }

  .navbar-toggler {
    margin-left: auto;
    /* 將漢堡選單按鈕置於右側 */
  }

  fieldset {
    border: 5px solid lightsteelblue;
  }

  .ranking-item {
    display: flex;
    align-items: flex-end;
    justify-content: center;
    text-align: center;
    margin-right: 10px;
  }

  .ranking-item .ranking-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-right: 50px;
    /* 調整項目之間的間距 */
  }

  .ranking-item img {
    width: 200px;
    /* 調整圖片寬度 */
    height: auto;
    /* 自動計算圖片高度 */
    object-fit: contain;
    /* 圖片自適應容器大小 */
    margin-bottom: 30px;
    /* 調整圖片和文字之間的間距 */
  }

  #autocompleteList {
    list-style-type: none;
    padding-left: 0;
    margin: 0;
  }

  #autocompleteList li {
    text-align: inherit;
    padding: 5px 205px;
  }

  #autocompleteContainer {
    height: 300px;
    /* 设置固定高度 */
    overflow-y: auto;
    /* 添加垂直滚动条 */
  }

  footer {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 240, 0.1);
    color: cadetblue;
    font-size: 20px;
    padding: 20px;
    width: 100%;
    bottom: 0;
  }

  .row {
    margin-bottom: 20px;
    /* Adjust spacing between sections */
  }

  footer i {
    font-size: 30px;
    vertical-align: left;
  }

  .col-md-4 {
    text-align: left;
    /* Align the text to the left */
  }

  .move {
    font-size: 25px;
    color: rgb(0, 0, 0);
    text-decoration: none;
    padding: 0px 25px;
  }

  .move:hover {
    color: brown;
  }

  .zd {
    position: fixed;
    bottom: 50px;
    right: 10px;
  }

  a.zdd {
    display: block;
    background-image: url(../database/_image/%E7%AE%AD%E9%A0%AD.PNG);
    width: 60px;
    height: 60px;
    background-size: cover;
  }
</style>

<body>
  <!--選單-->
  <div class="top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="BookStore_Login.php">首頁</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="RS.html" target="_blank">客製化推薦</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Problem_Login.html">常見問題</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="User.php">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;個人資訊</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <br /><br />

  <div class="container">
    <div class="row">
      <div class="box text-align">
        <!--主要的內容-->
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="text-center color: cadetblue;">
                <h1>歡迎來到竹狐書局</h1>
                <br />
              </div>
            </div>
          </div>
        </div>
        <div id="_main">
          <form action="search_Login.php" method="GET">
            <fieldset>
              <h3>查詢書籍</h3>
              <select id="bookType" name="booktype">
                <option value="all">全部</option>
                <option value="Medical">醫療</option>
                <option value="Science-Geography">科學、地理</option>
                <option value="Art-Photography">藝術、攝影</option>
                <option value="Biography">自傳</option>
                <option value="Business-Finance-Law">商業、金融、法律</option>
                <option value="Childrens-Books">兒童讀物</option>
                <option value="Computing">電腦</option>
                <option value="Crafts-Hobbies">手工藝</option>
                <option value="Crime-Thriller">犯罪、驚悚</option>
                <option value="Dictionaries-Languages">辭典、語言</option>
                <option value="Entertainment">娛樂</option>
                <option value="Food-Drink">食物、飲料</option>
                <option value="Graphic-Novels-Anime-Manga">
                  圖畫、小說、動漫、漫畫
                </option>
                <option value="Health">健康</option>
                <option value="History-Archaeology">歷史、考古</option>
                <option value="Home-Garden">家庭、花園</option>
                <option value="Humour">幽默</option>
                <option value="Mind-Body-Spirit">身心、精神</option>
                <option value="Natural-History">自然、歷史</option>
                <option value="Personal-Development">個人、發展</option>
                <option value="Poetry-Drama">詩、戲劇</option>
                <option value="Reference">參考</option>
                <option value="Religion">宗教</option>
                <option value="Romance">浪漫</option>
                <option value="Science-Fiction-Fantasy-Horror">
                  科幻、奇幻、恐怖
                </option>
              </select>
              <input type="search" id="searchInput" name="keyword" autocomplete="on" placeholder="標題/作者..." />
              <button type="submit">
                <svg width="30" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="10.76" cy="11.26" r="8.11" stroke="#6B6B6B" stroke-width="1.3"></circle>
                  <rect width="2.20667" height="7.13156" rx="1.10334"
                    transform="matrix(0.692391 -0.721523 0.692391 0.721523 15.7273 17.3545)" fill="#6B6B6B"></rect>
                </svg>
              </button>

              <ul id="autocompleteList"></ul>

              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                $(document).ready(function () {
                  $("#searchInput").on("input", function () {
                    var searchTerm = $(this).val();
                    var bookType = $("#bookType").val();

                    if (searchTerm.length >= 2) {
                      // 发送Ajax请求到服务器端或其他数据源，获取自动填充的选项
                      $.ajax({
                        url: "search_auto.php", // 指向处理自动填充请求的服务器端文件
                        method: "POST",
                        dataType: "json",
                        data: {
                          term: searchTerm,
                          booktype: bookType,
                        },
                        success: function (data) {
                          // 清空自动填充选项列表
                          $("#autocompleteList").empty();

                          // 显示自动填充选项
                          data.forEach(function (option) {
                            var listItem = $("<li>").text(option);
                            listItem.appendTo("#autocompleteList");
                          });
                          $("#autocompleteList").wrap(
                            "<div id='autocompleteContainer'></div>"
                          );
                        },
                      });
                    } else {
                      // 清空自动填充选项列表
                      $("#autocompleteList").empty();
                    }
                  });

                  // 当点击自动填充选项时，将选项填入搜索输入框
                  $(document).on(
                    "click",
                    "#autocompleteList li",
                    function () {
                      var optionText = $(this).text();
                      $("#searchInput").val(optionText);
                      $("#autocompleteList").empty();
                    }
                  );
                });
              </script>
            </fieldset>
          </form>
          <br>

          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="_image/竹狐.jpeg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="_image/竹狐2.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                      <a href="user_coupon.php"><img src="_image/優惠券.png" class="d-block w-100" alt="..." /></a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <br><br>
          <h3>推薦</h3><br>
          <div id="Ranking" class="d-flex justify-content-center">
            <div id="ranking-content"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>

    // 使用AJAX請求獲取PHP檔案的內容
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // 將PHP檔案的內容插入到HTML中
        document.getElementById("ranking-content").innerHTML =
          this.responseText;
      }
    };
    xhttp.open("GET", "book_ranking_Login.php", true);
    xhttp.send();
  </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>

    <script>
      var myCarousel = document.getElementById("carouselExampleControls");
      var carousel = new bootstrap.Carousel(myCarousel);
    </script>
    <script
      src="https://kit.fontawesome.com/85f44df16e.js"
      crossorigin="anonymous"
    ></script>

    <!--返回鍵-->
    <div class="zd" id="ding">
      <a class="zdd" href="#top"></a>
    </div>

    <div data-aos="fade-down"></div>
    <script scr="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
      $("a.move").on("click", function () {
        var to = $(this).attr("href");
        //alert(to);

        $("html,body,div").animate(
          {
            scrollTop: $(to).position().top,
          },
          1500
        );
      });

      $("a.azz").on("click", function () {
        var to_top = $(this).attr("href");
        //alert(to_top);

        $("html,body,div").animate(
          {
            scrollTop: $(to_top).position().top,
          },
          1500
        );
      });
    </script>
  </body>

  <footer class="footer">
    <!-- Added inline style -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h3>聯絡我們</h3>
          <p class="contact-info">
            <i class="fas fa-map-marker-alt"></i> 台北市11區22路33號<br />
            <i class="fas fa-phone"></i> <a href="tel:0800092000">012-3456789</a
            ><br />
            <i class="fas fa-envelope"></i>
            <a href="mailto:nctu.service@gmail.com?subject=關於帳號問題"
              >info@example.com</a
            >
          </p>
        </div>
        <div class="col-md-4">
          <h3>關於我們</h3>
          <p>
            <i class="fa-solid fa-paw"></i>
            竹狐書局致力於提供高品質的書籍和優質的閱讀體驗，我們的使命是啟發人們的智慧和想像力。
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <hr />
          <p class="text-center">
            版權所有 &copy; 2023 竹狐書局. All Rights Reserved.
          </p>
        </div>
      </div>
    </div>
  </footer>
</html>