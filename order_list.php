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

  <title>優惠券</title>
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
    font-size: 40px;
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

    /*table*/
          table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid lightgray;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid lightgray;
        }

        th {
            background-color: lightsteelblue;
        }

        tr:nth-child(even) {
            background-color: whitesmoke;
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
              <a class="nav-link" href="RS.html">客製化推薦</a>
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
    
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
include("user_connect.php");
    $order_ID = $_GET['order_ID'];

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
$user_id = $_SESSION['user_ID'];

$sql = "SELECT order_ID, isbn, quantity, total_price FROM order_list WHERE order_ID=$order_ID";

$result = mysqli_query($conn, $sql);

echo "<table border>
      <tr>
        <td>訂單編號</td>
        <td>書籍ISBN</td>
        <td>數量</td>
        <td>總額</td>
      </tr>";

while ($row = mysqli_fetch_row($result)) {
    $order_ID = $row[0];
    $isbn = $row[1];
    $quantity = $row[2];
    $total_price = $row[3];
    echo "
        <tr>
          <td>$order_ID</td>
          <td>$isbn</td>
          <td>$quantity</td>
          <td>$total_price</td>
        
        </tr>";
}

echo "</table>";
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
</body>

</html>