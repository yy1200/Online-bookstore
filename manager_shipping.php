

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
        right: 104px;;
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

          <br>
          <div class="move_right">
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <form name="form" method="post" action="manager_shipping_search.php">
                <select name="search_attribute" class="my_select">
                    <option value="shipping_ID">shipping_ID</option>
                    <option value="shipping_method">shipping_method</option>
                </select>
                <input type="text" name="search_query" placeholder="請輸入關鍵字" class="my_input">
                <input type="submit" name="button" value="搜尋" class="my_button">
          </form>
          </div>
          <br>
          <div class=move_right1>
          <a href="manager_shipping_add.php" >新增</a>
          </div>
          <br>

<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除

	
	

	//將資料庫裡的所有會員資料顯示在畫面上
	$sql = "SELECT * FROM Shipping";
	$result = mysqli_query($conn,$sql);
	echo "<table border = '1'>
		  <tr>
			<td>shipping_id</td>
			<td>shipping_method</td>
            <td>update</td>
            <td>delete</td>
		  </tr> ";
	
	while($row = mysqli_fetch_row($result))
	{
        $shippingID = $row[0];
        $sm = $row[1];
		echo "
		<tr>
      	  <td>$shippingID</td>
      	  <td>$sm</td>
          <td><a href='manager_shipping_update_copy.php?shipping_ID=$shippingID'>修改</a></td>
          <td><a href='manager_shipping_delete_copy.php?table=".urlencode('Shipping')."&shipping_ID=$shippingID' onclick=\"return confirm('確定要刪除這筆資料嗎？')\">刪除</a></td>
    	</tr>";
	}
    
/*
}

else
{
	echo '您無權限觀看此頁面!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
*/	
	
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
</html>

