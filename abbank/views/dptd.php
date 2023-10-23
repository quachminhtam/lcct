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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include ("header.php");
    ?>

    <div class="container-fluid tab-content">
        <h1 style="margin: 2rem 0">Danh sách hồ sơ</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID hồ sơ</th>
                    <th>Sản phẩm</th>
                    <th>ID khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Giá trị</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT hs_td.*  FROM hs_td INNER JOIN (
                            SELECT ma_tt, ma_hs FROM ls_gd 
                            WHERE (ma_hs, thoi_gian) IN ( SELECT ma_hs, MAX(thoi_gian) 
                            FROM ls_gd GROUP BY ma_hs)
                            ) AS tb2 ON hs_td.ma_hs = tb2.ma_hs WHERE ma_tt = 'dieuthamdinh' ";
                $result = chayTruyVanTraVeDL($link, $query);
                while ($hs = mysqli_fetch_assoc($result)){
                echo"
                    <tr>
                        <td>".$hs['ma_hs']."</td> ";

                        $timtsp = chayTruyVanTraVeDL($link, "select * from loai_sp where ma_loai_sp = '{$hs['ma_loai_sp']}' ");
                        $tsp = mysqli_fetch_assoc($timtsp);
                        echo"
                        <td>".$tsp['ten_loai_sp']."</td>
                        <td>".$hs['ma_kh']."</td> ";

                        $timtkh = chayTruyVanTraVeDL($link, "select * from khach_hang where ma_kh = '{$hs['ma_kh']}' ");
                        $tkh = mysqli_fetch_assoc($timtkh);
                        echo"
                        <td>".$tkh['ten_kh']."</td>
                        <td>".number_format($hs['so_tien'])."</td>
                        <td>
                        <a href='hsdptd.php?id=".$hs['ma_hs']."'>  <input type='button' value='Chọn'> 
                        </td>
                    </tr>
                ";}
            ?>
            </tbody>
        </table>
    </div>

</body>

<script  src="/abbank/js/script.js"></script>

</html>