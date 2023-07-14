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

  <title>忘記密碼</title>
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
      margin-left: 750px;
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
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="BookStore.html"
                  >首頁</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="RS.html" target="_blank"
                  >客製化推薦</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Problem.html">常見問題</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">登入</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <br /><br />
<div class="form-container">
  <h2>忘記密碼</h2><br>
  <?php
  $errorMessage = "";
  $passwordMatch = false;

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'user_connect.php';

    $username = $_POST["username"];
    $newPassword = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";

      if ($conn->query($updateSql) === TRUE) {
        echo "密碼重設成功，請重新登入。將在 3 秒後自動跳轉";

        echo '<script>
          setTimeout(function() {
            window.location.href = "login.html";
          }, 3000);
        </script>';
      } else {
        echo "密碼重設失敗，請稍後重試";
      }
      exit();
    } else {
      $errorMessage = "帳號不存在，請重新輸入";
    }

    // 关闭数据库连接
    $conn->close();
  }
  ?>
    
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
    <label for="username">使用者名稱:</label>
    <input type="text" id="username" name="username" required /><br /><br />

    <label for="password">新密碼:</label>
    <input type="password" id="password" name="password" required />
    <span>&nbsp;(可填寫英文與數字)</span><p></p>

    <label for="confirm_password">確認密碼:</label>
    <input type="password" id="confirm_password" name="confirm_password" required />
    <span id="password_match"></span><br /><br />
    <input type="submit" value="重設密碼" />
  </form>

  <script>
    // 確認密碼一致性的函數
    function checkPasswordMatch() {
      var password = document.getElementById("password").value;
      var confirm_password =
        document.getElementById("confirm_password").value;
      var password_match = document.getElementById("password_match");

      if (password === confirm_password) {
        password_match.innerHTML = "相同";
        password_match.style.color = "green";
      } else {
        password_match.innerHTML = "不正確";
        password_match.style.color = "red";
      }
    }

    // 監聽確認密碼欄位的輸入事件
    document
      .getElementById("confirm_password")
      .addEventListener("input", checkPasswordMatch);
  </script>

  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirm_password = document.getElementById("confirm_password").value;

      // 檢查密碼是否相同
      if (password !== confirm_password) {
        alert("資料有誤，重設密碼失敗");
        window.location.href = "forgot_password.php";
        return false;
      }

      return true;
    }
  </script>

  <?php if ($errorMessage): ?>
    <span class="error">
      <?php echo $errorMessage; ?>
    </span>
  <?php endif; ?>
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