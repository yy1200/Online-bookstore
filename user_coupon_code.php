<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
//這裡要改：連接方式？
include("user_connect.php");
$user_id=$_SESSION['user_ID'];
//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $search_query = $_POST['search_query'];
}

	
    //將資料庫裡的所有會員資料顯示在畫面上
	$sql = "SELECT coupon_ID,coupon_CODE FROM Coupon";
    $result = mysqli_query($conn, $sql);
    $i=0;



      while ($row = mysqli_fetch_row($result)) {
        $coupon_ID = $row[0];
        $coupon_code = $row[1];
          
        if($search_query==''){
        echo '<meta http-equiv=REFRESH CONTENT=0;url=user_coupon.php>';
        
        exit();
        }
          
        if($coupon_code==$search_query & $search_query!=''){
            $i=$i+1;
            $checkSql = "SELECT * FROM user_coupon WHERE user_ID = '$user_id' AND coupon_ID = '$coupon_ID'";
            $checkResult = mysqli_query($conn, $checkSql);
        
            if (mysqli_num_rows($checkResult) > 0) {
                // 使用者已領取過該優惠券，顯示訊息並跳轉到「已領取過此優惠券」頁面
                echo '您已領取過此優惠券。';
                echo '<meta http-equiv="refresh" content="2;url=user_coupon.php">';
            }


            else{



            $sql1 = "INSERT INTO user_coupon (user_ID,coupon_ID) VALUES ('$user_id','$coupon_ID')";
            
	        if(mysqli_query($conn,$sql1))
	        {
		        echo '新增成功!';
		        echo '<meta http-equiv=REFRESH CONTENT=2;url=user_coupon.php>';
	        }
	        else
	        {
		    echo '新增失敗!';
		    echo '<meta http-equiv=REFRESH CONTENT=2;url=user_coupon.php>';
	        }
            break;
        }
    }
        
    }
   
    
    if($i==0)
        {
        echo '無此優惠碼!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=user_coupon.php>';
        }
    
    




	
	
?>