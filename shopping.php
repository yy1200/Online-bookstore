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
    <meta charset="utf-8">
    <title>購物車</title>
    <script>
        function openPopup() {
            // 打开弹出窗口
            // window.open('coupon_popup.php', 'popup', 'width=400,height=300');
            window.location.href = 'coupon_popup.php';
        }
    </script>
    <script src="https://kit.fontawesome.com/85f44df16e.js" crossorigin="anonymous"></script>
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
    </style>
    <style>
        /* CSS 樣式設定 */
        #checkout-title {
            background-color: #5599FF;
            color: #ffffff;
            padding: 10px;
            font-size: 24px;
        }

        #checkout-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #5599FF;
            color: #ffffff;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .selected-items {
            background-color: rgb(211, 211, 211);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        th,
        td {
            border: none;
            padding: 10px;
        }

        th.name,
        td.name {
            text-align: left;
            /* 將名稱欄位靠左對齊 */
        }

        .name {
            width: 40%;
        }

        .value {
            width: 15%;
        }

        /* CSS 樣式設定 */
        .payment-option {
            display: inline-block;
            padding: 8px;
            border: 1px solid lightgray;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
        }

        .selected-payment-option {
            color: #ffffff;
            background-color: rgba(18, 19, 49, 0.7);
            border: 2px solid rgba(18, 19, 49, 0.7);
        }

        .invoice-option {
            display: inline-block;
            padding: 8px;
            border: 1px solid lightgray;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
        }

        .selected-invoice-option {
            color: #ffffff;
            background-color: rgba(18, 19, 49, 0.7);
            border: 2px solid rgba(18, 19, 49, 0.7);
        }

        .shipping-option {
            display: inline-block;
            padding: 8px;
            border: 1px solid lightgray;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
        }

        .selected-shipping-option {
            color: #ffffff;
            background-color: rgb(125, 125, 232);
            border: 2px solid rgb(125, 125, 232);
        }
    </style>
    <script>
        function selectPaymentOption() {
            var paymentOption = document.getElementById("paymentOption");
            paymentOption.classList.toggle("selected-payment-option");
            var additionalText = document.getElementById("additionalText");
            additionalText.style.display = paymentOption.classList.contains("selected-payment-option") ? "block" : "none";
        }
        function selectInvoiceOption(type) {
            var electronicInvoiceOption = document.getElementById("electronicInvoiceOption");
            var paperInvoiceOption = document.getElementById("paperInvoiceOption");
            var invoiceAdditionalText = document.getElementById("invoiceAdditionalText");

            if (type === "electronic") {
                invoiceAdditionalText.innerText = "\n 電子發票         付完款才會寄送至信箱內";
                <?php $_SESSION['invoice_method'] = 'Electronic'; ?>
            } else if (type === "paper") {
                invoiceAdditionalText.innerText = "\n 紙本發票         附在箱子裡";
                <?php $_SESSION['invoice_method'] = 'Paper'; ?>
            }

            invoiceAdditionalText.style.display = "block";
            electronicInvoiceOption.classList.remove("selected-invoice-option");
            paperInvoiceOption.classList.remove("selected-invoice-option");
            document.getElementById(type + "InvoiceOption").classList.add("selected-invoice-option");
        }

        function selectShippingOption(type) {
            var currentURL = window.location.href; // 获取当前页面的URL
            var newURL; // 用于存储新的链接

            if (type === "convenienceStore") {
                newURL = "convenientstore_detail.php" + getCurrentURLParameters(currentURL);
                window.location.href = newURL; // 跳转到新的链接
            } else if (type === "home") {
                var addressInput = document.getElementById("addressInput");
                addressInput.style.display = "block";
            }
        }

        function getCurrentURLParameters(url) {
            var params = url.split("?")[1]; // 获取URL中的参数部分

            if (params) {
                return "?" + params;
            } else {
                return "";
            }
        }
    </script>

    <script>
        function updateSelectedStore(storeName) {
            var selectedStoreElement = document.getElementById("selectedStore");
            selectedStoreElement.innerHTML = storeName;
        }
    </script>



</head>

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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <h4 style='text-align: center;'><b>訂單詳情</b></h4>

    <?php
    // include("user_connect.php");
    // include("shopping_test.php");
    ?>
    <?php
    session_start();
    include("user_connect.php");

    $sql = "SELECT user_ID, isbn AS isbns, count(isbn) AS quantity FROM shoppingcart GROUP BY user_ID, isbn";
    $result = mysqli_query($conn, $sql);

    echo "<table border='1'>
  <tr>
    <th class='name'>名稱</th>
    <th class='value' style='text-align: center;'>單價</th>
    <th class='value' style='text-align: center;'>數量</th>
    <th class='value' style='text-align: center;'>總計</th>
  </tr>";

    $total_amount = 0;
    while ($row = $result->fetch_assoc()) {
        $user = $row['user_ID'];
        $isbns = $row['isbns'];
        $quantity = $row['quantity'];

        $bookQuery = "SELECT DISTINCT name, price FROM book WHERE isbn IN ($isbns)";
        $bookResult = mysqli_query($conn, $bookQuery);

        if (mysqli_num_rows($bookResult) > 0) {
            while ($bookRow = $bookResult->fetch_assoc()) {
                $name = $bookRow['name'];
                $price = $bookRow['price'];

                // Calculate the value based on price and quantity
                $value = $price * $quantity;
                $total_amount = round($total_amount + $value, 2);


                echo "<tr>
                    <td>{$name}</td>
                    <td style='text-align: center;'>{$price}</td>
                    <td style='text-align: center;'>
                        <button class='qtyminus' field='quantity{$user}{$isbns}' onclick='updateQuantity(this, -1)'>-</button>
                        <input type='text' name='quantity{$user}{$isbns}' value='{$quantity}' onchange='updateQuantityInput(this)'>
                        <button class='qtyplus' field='quantity{$user}{$isbns}' onclick='updateQuantity(this, 1)'>+</button>
                    </td>
                    <td style='text-align: center;' class='value'>{$value}</td>
                </tr>";
            }
        }
    }

    echo "<table border='1'>
    <hr>
    <tr>
        <th class='name'></th>
        <th class='value' style='text-align: center;'></th>
        <th class='value' style='text-align: center;'></th>
        <th class='value' style='font-size: 20px; text-align: center;'>訂單總金額&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th class='value' style='font-size: 20px; text-align: center;' id='total_amount'>{$total_amount}</th>
    </tr>";

    echo "<script>
        function updateQuantity(button, increment) {
            var inputField = document.querySelector('input[name=' + button.getAttribute('field') + ']');
            var quantity = parseInt(inputField.value);
            quantity += increment;
            if (quantity < 1) {
                quantity = 1;
            }
            inputField.value = quantity;
            updateValue(inputField, increment);
        }

        function updateQuantityInput(input) {
            var quantity = parseInt(input.value);
            if (quantity < 1) {
                quantity = 1;
                input.value = quantity;
            }
            updateValue(input);
        }

        function updateValue(input, increment) {
            var price = parseFloat(input.parentNode.previousElementSibling.innerHTML);
            var quantity = parseInt(input.value);
            var value = price * quantity;
            input.parentNode.nextElementSibling.innerHTML = value;

            // Calculate the new total amount
            var totalAmountElement = document.getElementById('total_amount');
            var totalAmount = parseFloat(totalAmountElement.innerHTML);
            totalAmount += (value - (price * (quantity - 1)))*increment;
            totalAmountElement.innerHTML = totalAmount;

            // Calculate the new discount total if applicable
            var urlParams = new URLSearchParams(window.location.search);
            var discount = parseFloat(urlParams.get('discount'));

            if (!isNaN(discount)) {
                var discountTotalElement = document.getElementById('discount');
                var discountTotal = (1 - discount) * totalAmount;
                discountTotalElement.innerHTML = discountTotal;

                var finalTotalElement = document.getElementById('final_amount');
                var finalAmount = discount * totalAmount;
                finalTotalElement.innerHTML = finalAmount;
            }
        }
        </script>";





    echo "<a href='javascript:void(0);' onclick='openPopup();'>使用優惠券</a>";
    $discount = $_GET['discount'];

    if ($discount != null) {
        $discount_total = round((1 - $discount) * $total_amount, 2);
        echo "<tr>
            <th class='name'></th>
            <th class='value' style='text-align: center;'></th>
            <th class='value' style='text-align: center;'></th>
            <th class='value' style='font-size: 20px; text-align: center;'>折扣金額&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th class='value' style='font-size: 20px; text-align: center;' id='discount'>" . number_format((float) $discount_total, 2) . "</th>
        </tr>";

        $final_amount = round($discount * $total_amount, 2);
        echo "<tr>
            <th class='name'></th>
            <th class='value' style='text-align: center;'></th>
            <th class='value' style='text-align: center;'></th>
            <th class='value' style='font-size: 20px; text-align: center;'>總金額&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th class='value' style='font-size: 20px; text-align: center;' id='final_amount'>" . number_format((float) $final_amount, 2) . "</th>
        </tr>";
    }

    echo "</table>";
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        $(function () {
            // This button will increment the value
            $('.qtyplus').click(function (e) {
                e.preventDefault();
                var fieldName = $(this).attr('field');
                var quantityElement = $('input[name=' + fieldName + ']');
                var valueElement = quantityElement.closest('tr').find('.value');

                var currentVal = parseInt(quantityElement.val());
                if (!isNaN(currentVal)) {
                    quantityElement.val(currentVal + 1);
                    var price = parseFloat(valueElement.text()) / currentVal;
                    var newValue = price * (currentVal + 1);
                    currentVal += 1;
                    valueElement.text(newValue.toFixed(2));

                    updateTotalAmount(currentVal);
                }
            });

            // This button will decrement the value till 0
            $(".qtyminus").click(function (e) {
                e.preventDefault();
                var fieldName = $(this).attr('field');
                var quantityElement = $('input[name=' + fieldName + ']');
                var valueElement = quantityElement.closest('tr').find('.value');

                var currentVal = parseInt(quantityElement.val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    quantityElement.val(currentVal - 1);
                    var price = parseFloat(valueElement.text()) / currentVal;
                    var newValue = price * (currentVal - 1);
                    valueElement.text(newValue.toFixed(2));

                    updateTotalAmount();
                }
            });


            function updateTotalAmount(currentVal) {
                var table = document.getElementsByTagName('table')[1];
                var rows = table.rows;
                var totalAmount = 0;
                var quantity = currentVal;

                for (var i = 1; i < rows.length - 1; i++) {
                    var quantityElement = rows[i].querySelector('input[type="text"]');
                    var valueElement = rows[i].querySelector('.value');

                    var quantity = parseInt(quantityElement.value);
                    var price = parseFloat(valueElement.innerText) / quantity;

                    if (!isNaN(quantity) && !isNaN(price)) {
                        var newValue = price * quantity;
                        valueElement.innerText = newValue.toFixed(2);
                        totalAmount += newValue;
                    }
                }

                var totalAmountElement = rows[rows.length - 1].cells[4];
                total_amount = totalAmount.toFixed(2);



            }

        }
        );


    </script> -->

    <div class="selected-items">
        <label><span style="font-size: 20px;"><b>寄送方式</b></span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="shipping-option" id="convenienceStoreOption" onclick="selectShippingOption('convenienceStore')">超商取貨
        </div>&nbsp;&nbsp;
        <div class="shipping-option" id="homeOption" onclick="selectShippingOption('home')">宅配到府</div>
        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $address = $_POST['address'];
        }
        $store_name = $_GET['store_name'];

        if ($address != null) {
            $store_name = null;
        }
        if ($store_name != null) {
            $address = NULL;
            echo "  抵達門市：", $store_name, "門市";
        }
        if ($address != null) {
            echo "收件地址:", $address;
        }

        ?>
        <div id="shippingAdditionalText" style="display: none;"></div>
        <div id="selectedStore"></div>
        <br>
        <div id="addressInput" style="display: none;">
            <form name="form" method="post">
                <label for="address">請輸入收件地址：</label>
                <input type="text" name="address" id="address" required>
                <input type="submit" value="確認" onclick="goBack()">
            </form>
        </div>
    </div>
    <script>
        function goBack() {
            document.form.submit(); // 提交表单数据
            history.back(); // 返回上一页
        }
    </script>


    <script>
        function handleSelection() {
            var selectElement = document.getElementById("select1");
            var inputBox = document.getElementById("inputBox");
            var addressInput = document.getElementById("address");
            var form = document.querySelector("form[action='address.php']");

            if (selectElement.value === "option2") {
                inputBox.style.display = "block";
                addressInput.value = ""; // 清空地址输入框的值
                form.action = "address.php";
            } else {
                inputBox.style.display = "none";
                form.action = ""; // 或设置为其他不需要处理地址的页面
            }
        }
    </script>

    <div class="selected-items">
        <label><span style="font-size: 20px;"><b>付款方式</b></span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="payment-option" id="paymentOption" onclick="selectPaymentOption()">
            貨到付款
        </div>
        <div id="additionalText" style="display: none;"><br>
            <p>貨到付款&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;現付</p>
        </div>
    </div>

    <div class="selected-items">
        <label><span style="font-size: 20px;"><b>發票形式</b></span>&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="invoice-option" id="electronicInvoiceOption" onclick="selectInvoiceOption('electronic')">電子發票</div>
        &nbsp;&nbsp;
        <div class="invoice-option" id="paperInvoiceOption" onclick="selectInvoiceOption('paper')">紙本發票</div>
        <div id="invoiceAdditionalText" style="display: none;"></div>

        <br>


        <form action="checkout.php" method="POST">
            <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
            <input type="hidden" name="payment_method" value="貨到付款">
            <input type="hidden" name="invoice_method" value="<?php echo $_SESSION['invoice_method']; ?>">
            <input type="hidden" name="shipping_ID" value="<?php echo $store_name; ?>">
            <input type="hidden" name="location_ID" value="<?php echo $address; ?>">
            <button id="checkout-btn" onclick="redirectToHomePage()" type="submit"><b>結帳</b></button>
        </form>
        <script>
            function redirectToHomePage() {
                window.location.href = "checkout.php";
            }

            document.getElementById("checkout-btn").addEventListener("click", redirectToHomePage);
        </script>

</body>

</html>