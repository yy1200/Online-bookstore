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

  <title>修改基本資料</title>
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
 .form-container {
      margin-left: 550px;
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
<div class="form-container">
  <h1>修改個人基本資料</h1><br>
  <?php session_start(); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  include("user_connect.php");
  $user_ID = $_SESSION['user_ID'];
  // $user_ID = '4';
  // 建立查詢
  $query = "SELECT * FROM users WHERE user_ID = '$user_ID'";

  // 執行查詢
  $result = mysqli_query($conn, $query);

  // 檢查查詢結果
  if (mysqli_num_rows($result) > 0) {
    // 迴圈讀取每一筆資料
    while ($row = mysqli_fetch_assoc($result)) {
      $username = $row['username'];
      $password = $row['password'];
      $name = $row['name'];
      $email = $row['email'];
      $phone_num = $row['phone_num'];
      $address = $row['address'];
      $sex = $row['sex'];
      $birth = $row['birth'];

      // 這裡可以使用取得的使用者資料進行需要的處理
      // 例如顯示在網頁上或者存儲到變數中等
    }
  } else {
    echo "找不到符合的使用者資料";
  }
  // 關閉連線
  mysqli_close($conn);
  ?>
  <?php
  // 檢查表單是否提交
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取從前端提交的表單資料
    $updatedUsername = $_POST['username'];
    $updatedPassword = $_POST['password'];
    $updatedName = $_POST['name'];
    $updatedEmail = $_POST['email'];
    $updatedPhoneNum = $_POST['phone_num'];
    $updatedAddress = $_POST['address'];
    $updatedSex = $_POST['sex'];
    $updatedBirth = $_POST['birth'];

    // 更新資料庫中的資料
    // 這裡使用假設的更新函式 updateUserData，你需要根據實際的資料庫操作進行更新
  
    updateUserData('username', $updatedUsername);
    updateUserData('password', $updatedPassword);
    updateUserData('name', $updatedName);
    updateUserData('email', $updatedEmail);
    updateUserData('phone_num', $updatedPhoneNum);
    updateUserData('address', $updatedAddress);
    updateUserData('sex', $updatedSex);
    updateUserData('birth', $updatedBirth);
    // 在彈出視窗中顯示訊息
    echo '<script>alert("個人資料已更新");</script>';

    // 跳轉回 login.html
    echo '<script>window.location.href = "User.php";</script>';
  }

  // 更新資料庫的函式
  function updateUserData($field, $value)
  {
    // 執行更新操作
    // 實現更新資料庫的邏輯
    // 根據欄位名稱更新資料
    include("user_connect.php");
    $user_ID = $_SESSION['user_ID'];
    $query = "UPDATE users SET $field = '$value' WHERE user_ID = '$user_ID'";

    // 執行更新操作
    if (mysqli_query($conn, $query)) {
      // echo "更新 $field: $value 成功";
    } else {
      // echo "更新 $field: $value 失敗：" . mysqli_error($conn);
    }
  }

  // 關閉連線
  mysqli_close($conn);
  ?>

  <form action="" method="POST">
    <label for="username">使用者名稱：</label>
    <input type="text" name="username" value="<?php echo $username; ?>"><br><br>

    <!-- <label for="password">密碼：</label>
        <input type="password" name="password" value="<?php echo $password; ?>"><br><br> -->
    <label for="password">密碼：</label>
    <input type="password" name="password" id="passwordInput" value="<?php echo $password; ?>">
    <input type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()">
    <label for="showPasswordCheckbox">顯示密碼</label><br><br>


    <label for="name">姓名：</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>

    <label for="email">電子郵件：</label>
    <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

    <label for="phone_num">電話號碼：</label>
    <input type="text" name="phone_num" value="<?php echo $phone_num; ?>"><br><br>

    <label for="address">地址：</label>
    <input type="text" name="address" value="<?php echo $address; ?>"><br><br>

    <label for="sex">性別：</label>
    <input type="text" name="sex" value="<?php echo $sex; ?>"><br><br>

    <label for="birth">生日：</label>
    <input type="text" name="birth" value="<?php echo $birth; ?>"><br><br>

    <input type="submit" value="確定">
  </form>
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("passwordInput");
      var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

      if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
  </script>
    </div>
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