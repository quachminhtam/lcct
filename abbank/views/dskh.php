<?php
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LCCT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/abbank/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="/abbank/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include ("header.php");
    ?>

    <div class='container' style='justify-content:space-between;'>
        <?php require_once 'msg.php' ?>
        <h2 style='text-align: center; margin-top:2rem; color:#00aaad;''>Quản lý Khách hàng</h2>
        <form class='form'>
        <div class='frm_row'>
                <label class='cls_caption'>Mã khách hàng: </label>
                <input class='cls_input' name='makh' type='text' value='' />
        </div> <br style='clear: both;' />
        <div class='frm_row'>
            <label class='cls_caption'>Tên khách hàng:</label>
            <input class='cls_input' name='tenkh' type='text' value='' />
        </div><br style='clear: both;' />
        <div class='frm_row'>
            <label class='cls_caption'>Mã ĐVKD:</label>
            <input class='cls_input' name='madvkd' type='text' value='' />
        </div><br style='clear: both;' />
        <div class='img_row'>
            <input type='submit' value='Tìm'>
        </div>
        </form>
    </div>

    <?php
        if (isset($_GET['makh']) or isset($_GET['tenkh']) or isset($_GET['madvkd']) ) {
            $result = chayTruyVanTraVeDL($link, "select * from khach_hang where ma_kh like '%".$_GET['makh']."%' && ten_kh like '%".$_GET['tenkh']."%' && ma_dvkd like '%".$_GET['madvkd']."%' ");
            if ($result->num_rows > 0) {
                $stt=0;
                echo"
                <div class='container-fluid' style='margin-top:2rem'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>STT</th>
                            <th scope='col'>Mã khách hàng</th>
                            <th scope='col'>Tên khách hàng</th>
                            <th scope='col'>Mã ĐVKD</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $stt +=1;
                    echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$row['ma_kh']." </td>
                            <td>".$row['ten_kh']."</td>
                            <td>".$row['ma_dvkd']." </td>
                            <td>
                                <a href='xemkh.php?id=".$row['ma_kh']."'>
                                    <input type='button' value='Xem'>
                                </a>
                            </div>
                            </td>
                        </tr> 
                    ";
                }
            }else {echo "<h5 style='text-align: center;'>Không tìm thấy</h5>
    </div> ";}}
    ?>
</body>
</html>