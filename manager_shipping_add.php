
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

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <form name="form" method="post" action="manager_shipping_a_f.php">
                    shipping_method: <input type="text" name="shipping_method"/><br/>
            <input type="submit" name="button" value="確定" />
            </form>

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

