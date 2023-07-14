<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("user_connect.php"); ?>

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

  <title>超商門市選擇</title>
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

  fieldset {
    border: 5px solid lightsteelblue;
  }

  .arrow-link {
    color: #ffffff;
  }
</style>
<script>
  function goBack() {
    history.back(); // 调用浏览器的返回上一页功能
  }
</script>

<body>
  <!--選單-->
  <div class="top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a href="javascript:void(0);" onclick="goBack()" class="arrow-link">
        <i class="fa-solid fa-circle-arrow-left"></i></a>
      <div class="container-fluid">
        <a class="navbar-brand" href="#">超商門市選擇</a> <!-- 在这里添加超商門市選擇的文字 -->
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
              <a class="nav-link" href="User.php">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;個人資訊</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <br /><br />
  <title>超商門市選擇</title>
  <style>
    /* CSS 樣式設定 */
    #checkout-title {
      background-color: #5599FF;
      color: #ffffff;
      padding: 10px;
      font-size: 24px;
    }

    h1 {
      color: #333333;
      text-align: left;
      /* 將文字靠左對齊 */
      margin: 10px;
      /* 設置 h1 元素的 margin */
    }

    table {
      width: 100%;
      /* 讓表格佔滿整個寬度 */
      border-collapse: collapse;
      /* 折疊表格邊框 */
    }

    table td {
      padding: 5px;
      /* 設置格子的 padding */
      text-align: center;
      /* 將內容置中對齊 */
    }

    /*table*/
    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid lightgray;
    }

    th,
    td {
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
  <script src="https://kit.fontawesome.com/85f44df16e.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <?php
    $sql = "SELECT * FROM convenient_store";
    $result = mysqli_query($conn, $sql);

    echo "<table border='1'>
      <tr>
        <td>店號</td>
        <td>門市</td>
        <td>地址</td>
        <td>選擇此門市</td>
      </tr>";

    while ($row = mysqli_fetch_row($result)) {
      $store_code = $row[0];
      $store_name = $row[1];
      $store_address = $row[2];

      echo "
    <tr>
      <td>$store_code</td>
      <td>$store_name</td>
      <td>$store_address</td>
      <td><a href='shopping.php?store_name=$store_name" . getCurrentURLParameters() . "'>選擇</a></td>
    </tr>";
    }

    function getCurrentURLParameters()
    {
      $params = $_SERVER['QUERY_STRING']; // 获取当前页面的参数部分
    
      if ($params) {
        return "&" . $params;
      } else {
        return "";
      }
    }


    //   echo "
//     <tr>
//       <td>$store_code</td>
//       <td>$store_name</td>
//       <td>$store_address</td>
//       <td><a href='shopping.php?store_name=$store_name'>選擇</a></td>
//     </tr>";
// }
    
    echo "</table>";
    ?>

  </body>

</html>