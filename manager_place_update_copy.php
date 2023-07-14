<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!--Bootstrap CSS-->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
          <link rel="stylesheet" href="css/index.css">
          <title>竹狐書局管理系統</title>
     <head>
     <style>
          /*body {
              background-image: url("_image/背景.jpg");
              background-size: cover;
              background-repeat: no-repeat;
              background-color: rgba(0, 0, 0, 0.3);
          }*/
          h1 {
              color: cadetblue;
              font-size: 70px
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
              background:rgba(18, 19, 49, 0.7);
              padding: 20px;
          }
          .navbar-nav {
              margin-left: auto; /* 將選單項目置於右側 */
          }
          .navbar-toggler {
              margin-left: auto; /* 將漢堡選單按鈕置於右側 */
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
              margin-right: 50px; /* 調整項目之間的間距 */
          }
          .ranking-item img {
              width: 200px; /* 調整圖片寬度 */
              height: auto; /* 自動計算圖片高度 */
              object-fit: contain; /* 圖片自適應容器大小 */
              margin-bottom: 30px; /* 調整圖片和文字之間的間距 */
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
          /* 自定义按钮样式 */
          .my_button {
            background-color: #4b6ba6; /* 设置背景颜色 */
            border: none; /* 去除边框 */
            color: white; /* 设置文字颜色 */
            padding: 7px 15px; /* 设置内边距 */
            text-align: center; /* 文字居中对齐 */
            text-decoration: none; /* 去除下划线 */
            display: inline-block; /* 设置为行内块元素 */
            font-size: 16px; /* 设置文字大小 */
             /* 设置字体样式 */
            border-radius: 4px; /* 设置圆角边框 */
            cursor: pointer; /* 鼠标样式为手型 */
        }

        /* 鼠标悬停时的效果 */
        .my_button:hover {
            background-color: #162977; /* 改变背景颜色 */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* 添加阴影效果 */
        }

         /* 自定义输入框样式 */
         .my_input {
            width: 250px;
            padding: 6px; /* 设置内边距 */
            border: 2px solid #ccc; /* 设置边框 */
            border-radius: 4px; /* 设置圆角边框 */
            font-size: 16px; /* 设置文字大小 */
             /* 设置字体样式 */
        }

        /* 鼠标悬停时的效果 */
        .my_input:hover {
            border-color: #999; /* 改变边框颜色 */
        }

        /* 获得焦点时的效果 */
        .my_input:focus {
            outline: none; /* 去除默认的聚焦样式 */
            border-color: #5b9ad5a1; /* 改变边框颜色 */
            box-shadow: 0 0 5px #5b9bd5; /* 添加阴影效果 */
        }
        /*select */
        .my_select {
        background-color: ##fffdfd;
        border: 2px solid #ccc;
        border-radius: 4px;
        color: #333;
        font-size: 14px;
        width: 135px;
        height: 40px;
    }

    .my_select:hover {
        background-color: #bec3c7;
    }

    .my_select:focus {
        outline: none;
        border-color: #6c757d;
        box-shadow: 0 0 5px #5b9bd5;
    }
    .center {
        display: flex;
        justify-content: center; /* 调整右边距的数值，根据需要进行调整 */
    }
    .move_right{
        position: relative;
        left: 20px;
    }
    .samerow {
    display: flex;
    align-items: center;
    
}
    .move_right1{
        position: absolute;
        right: 70px;;
    }

 /* 设置表单容器的样式 */
        form {
            max-width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            margin-left: 600px;
                
        }
        
        /* 设置表单字段的样式 */
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        
        /* 设置提交按钮的样式 */
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        /* 设置标签的样式 */
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
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
                                        <a class="nav-link active" aria-current="page" href="manager.php">首頁</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="logout.php" target="_blank">登出</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </nav>
          </div>

<?php
session_start();
include("user_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $storeCode = $_POST['store_code'];
    $storeName = $_POST['store_name'];
    $storeAddress = $_POST['store_address'];

    $sql = "UPDATE convenient_store SET store_name='$storeName', store_address='$storeAddress' WHERE store_code=$storeCode";

    if (mysqli_query($conn, $sql)) {
        echo '更新成功！';
        echo '<meta http-equiv="refresh" content="2;url=manager_place.php">';
        exit;
    } else {
        echo '更新失败！';
    }

    
} else {
    $storeCode = $_GET['store_code'];

    $sql = "SELECT * FROM convenient_store WHERE store_code=$storeCode";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo '找不到要更新的數據！';
        exit;
    }

    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="store_code" value="<?php echo $row['store_code']; ?>">
        store_code: <?php echo $row['store_code']; ?><br>
        store_name: <input type="text" name="store_name" value="<?php echo $row['store_name']; ?>"><br>
        store_address: <input type="text" name="store_address" value="<?php echo $row['store_address']; ?>"><br>
        <input type="submit" name="button" value="確定" >
    </form>

    <?php
}
?>


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
    </body>
</html>

