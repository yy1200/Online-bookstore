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

    .card-with-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
</body>

</html>


<?php
include 'user_connect.php';

$sql = "SELECT * FROM book ORDER BY book_depository_stars DESC LIMIT 50";
$result = $conn->query($sql);

// 處理查詢結果
if ($result->num_rows > 0) {
    // 顯示搜尋結果
    echo '<div class="container">';
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        if ($count % 3 === 0) {
            // 開始一個新的 row
            echo '<div class="row row-cols-3 g-4">';
        }
        $isbn = $row["isbn"];
        $bookName = $row["name"];
        $bookLink = 'book_details.php?isbn=' . $isbn;
        echo '<div class="col">';
        echo '<div class="card mb-4 card-with-shadow">';
        echo '<div class="card-body">';

        $imagePath = $row["img_paths"];
        echo '<a href="' . $bookLink . '">';
        echo '<img src="' . $imagePath . '" alt="圖片">';
        echo '</a><br>';
        echo '<strong>書名:</strong> <a href="' . $bookLink . '">' . $bookName . '</a><br>';
        echo '<strong>作者:</strong> ' . $row["author"] . '<br>';
        echo '<strong>售價:</strong> <span class="price">' . $row["price"] . ' USD</span><br>';

        echo '<div class="book-action">';
        // echo '<a href="login.html" class="btn btn-primary float-end"><i class="fa-solid fa-cash-register">&nbsp;直接購買</i></a>';
        // echo '<a href="login.html" class="btn btn-success float-end"><i class="fa-solid fa-cart-shopping">&nbsp;添加到購物車</i></a>';



        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        if ($count % 3 === 2 || $count === ($result->num_rows - 1)) {
            // 結束目前的 row
            echo '</div>';
        }

        $count++;
    }
    echo '</div>';
} else {
    echo "沒有找到相關書籍。";
}
?>