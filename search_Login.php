<!DOCTYPE html>
<html>

<head>
    <!--meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet" />
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <title>竹狐書局 - 搜尋結果</title>
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

    .price {
        font-size: 20px;
        color: red;
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
                            <a class="nav-link" href="User.php">&nbsp;<i class="fa-solid fa-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br /><br />

    <?php
    include 'user_connect.php';

    // 獲取搜尋關鍵字
    $booktype = $_GET['booktype'];
    $keyword = $_GET['keyword'];
    $keyword = mysqli_real_escape_string($conn, $keyword);

    // 執行搜尋查詢
    if ($booktype != 'all') {
        $sql = "SELECT * FROM book WHERE category='$booktype' AND (name LIKE '%$keyword%' OR author LIKE '%$keyword%')";
    } else {
        $sql = "SELECT * FROM book WHERE name LIKE '%$keyword%' OR author LIKE '%$keyword%'";
    }

    $queryResult = $conn->query($sql);

    // 儲存合併後的書籍
    $mergedBooks = array();

    // 合併 category
    foreach ($queryResult as $result) {
        $isbn = $result['isbn'];
        $name = $result['name'];
        $author = $result['author'];
        $format = $result['format'];
        $category = $result['category'];
        $price = $result['price'];
        $img_paths = $result['img_paths'];

        // 檢查是否已有相同 ISBN 的書籍
        if (isset($mergedBooks[$isbn])) {
            // 若已有相同 ISBN 的書籍，將 category 加入到該本書的最後category
            $mergedBooks[$isbn]['category'] .= ', ' . $category;
        } else {
            // 若尚未有相同 ISBN 的書籍，新增一本書籍
            $mergedBooks[$isbn] = array(
                'isbn' => $isbn,
                'name' => $name,
                'author' => $author,
                'format' => $format,
                'category' => $category,
                'price' => $price,
                'img_paths' => $img_paths
            );
        }
    }

    // 處理查詢結果
    if ($queryResult->num_rows > 0) {
        // 顯示搜尋結果
        echo '<div class="container">';

        // 計數器
        $count = 0;

        // 顯示合併後的書籍
        foreach ($mergedBooks as $isbn => $book) {
            // 每三個書籍換行
            if ($count % 3 === 0) {
                echo '<div class="row">';
            }

            $bookName = $book["name"];
            $bookLink = 'book_details_Login.php?isbn=' . $isbn;
            echo '<div class="col-md-4">';
            echo '<div class="card mb-4 card-with-shadow">';
            echo '<div class="row g-0">';

            echo '<div class="col-md-8">';
            echo '<div class="card-body">';
            echo '<strong>書名:</strong> <a href="' . $bookLink . '">' . $bookName . '</a><br>';
            echo '<strong>作者:</strong> ' . $book["author"] . '<br>';
            echo '<strong>版本:</strong> ' . $book["format"] . '<br>';
            echo '<strong>類型:</strong> ' . $book["category"] . '<br>';

            // 判斷是否有售價
            if (!empty($book["price"])) {
                echo '<strong>售價:</strong> <span class="price">' . $book["price"] . ' USD</span><br>';
            }

            echo '</div>';
            echo '</div>';

            $imagePath = $book["img_paths"];
            echo '<div class="col-md-4">';
            echo '<a href="' . $bookLink . '">';
            echo '<img src="' . $imagePath . '" alt="圖片" class="card-img">';
            echo '</a><br><br>';
            echo '</div>';

            echo '<div class="book-action">';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';

            // 每三個書籍換行
            if ($count % 3 === 2 || $count === ($queryResult->num_rows - 1)) {
                echo '</div>';
            }

            $count++;
        }

        echo '</div>';
        echo '</div>'; // 關閉 mx-4 的 div
    } else {
        echo "沒有找到相關書籍。";
    }

    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>


    <script>
        var myCarousel = document.getElementById("carouselExampleControls");
        var carousel = new bootstrap.Carousel(myCarousel);
    </script>
    <script src="https://kit.fontawesome.com/85f44df16e.js" crossorigin="anonymous"></script>

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