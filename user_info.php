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
                            <a class="nav-link active" aria-current="page" href="BookStore.html">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="RS.html" target="_blank">客製化推薦</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Problem.html" target="_blank">常見問題</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="User.php" target="_blank">&nbsp;<i
                                    class="fa-solid fa-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br /><br />

    <a class="nav-link" href="Setting.php" target="_blank"><i class="fa-solid fa-gear"></i>&nbsp;設定</a><br>
    <a class="nav-link" href="Shopping.html" target="_blank"><i class="fa-solid fa-cart-shopping"></i>&nbsp;購物車</a><br>
    <a class="nav-link" href="Order.html" target="_blank"><i class="fa-solid fa-rectangle-list"></i>&nbsp;歷史訂單</a><br>
    <a class="nav-link" href="logout.php" target="_blank"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;登出</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

    <script>
        var myCarousel = document.getElementById("carouselExampleControls");
        var carousel = new bootstrap.Carousel(myCarousel);
    </script>
    <script src="https://kit.fontawesome.com/85f44df16e.js" crossorigin="anonymous"></script>


</body>

<footer class="footer">
    <!-- Added inline style -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>聯絡我們</h3>
                <p class="contact-info">
                    <i class="fas fa-map-marker-alt"></i> 台北市11區22路33號<br>
                    <i class="fas fa-phone"></i> <a href="tel:0800092000">012-3456789</a><br />
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:nctu.service@gmail.com?subject=關於帳號問題">info@example.com</a>
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