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
        <div class="container-fluid" style="justify-content:space-between;">
            <ul class="nav nav-tabs" style="background-color: #fff; margin-top:1rem;">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#chuaxl"  style="color: #00aaad;">Hồ sơ đợi xử lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#daxl"  style="color: #00aaad;">Hồ sơ đã xử lý</a>
                </li>
            </ul>
        </div>

        <div id="chuaxl" class="container-fluid tab-pane active"><br>
            <h2>Danh sách hồ sơ</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID hồ sơ</th>
                        <th>Sản phẩm</th>
                        <th>ID khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Giá trị</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT hs_td.*  FROM hs_td INNER JOIN (
                    SELECT ma_tt, ma_hs FROM ls_gd 
                    WHERE (ma_hs, thoi_gian) IN ( SELECT ma_hs, MAX(thoi_gian) 
                    FROM ls_gd GROUP BY ma_hs)
                    ) AS tb2 ON hs_td.ma_hs = tb2.ma_hs WHERE (ma_tt != 'xoa' and ma_tt != 'duyet' and ma_tt != 'huy') ";
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
                        <td>".number_format($hs['so_tien'])."</td> ";

                        $timtt = chayTruyVanTraVeDL($link, "SELECT ma_tt FROM ls_gd WHERE ma_hs = {$hs['ma_hs']} ORDER BY thoi_gian DESC LIMIT 1 ");
                        $ttt = mysqli_fetch_assoc($timtt);
                        $timten = chayTruyVanTraVeDL($link, "select ten_tt from trang_thai where ma_tt = '{$ttt['ma_tt']}' ");
                        $tentt = mysqli_fetch_assoc($timten);
                        echo"
                        <td>".$tentt['ten_tt']."</td>
                        <td> <a href='xemhs.php?id=".$hs['ma_hs']."'>  <input type='button' value='xem'> </td>
                    </tr>
                ";}
                ?>
                </tbody>
            </table>
        </div>

    <div id="daxl" class="container-fluid tab-pane fade"><br>
        <h2>Danh sách hồ sơ</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID hồ sơ</th>
                        <th>Sản phẩm</th>
                        <th>ID khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Giá trị</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT hs_td.*  FROM hs_td INNER JOIN (
                    SELECT ma_tt, ma_hs FROM ls_gd 
                    WHERE (ma_hs, thoi_gian) IN ( SELECT ma_hs, MAX(thoi_gian) 
                    FROM ls_gd GROUP BY ma_hs)
                    ) AS tb2 ON hs_td.ma_hs = tb2.ma_hs WHERE (ma_tt = 'xoa' or ma_tt = 'duyet' or ma_tt = 'huy') ";
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
                        <td>".number_format($hs['so_tien'])."</td> ";

                        $timtt = chayTruyVanTraVeDL($link, "SELECT ma_tt FROM ls_gd WHERE ma_hs = {$hs['ma_hs']} ORDER BY thoi_gian DESC LIMIT 1 ");
                        $ttt = mysqli_fetch_assoc($timtt);
                        $timten = chayTruyVanTraVeDL($link, "select ten_tt from trang_thai where ma_tt = '{$ttt['ma_tt']}' ");
                        $tentt = mysqli_fetch_assoc($timten);
                        echo"
                        <td>".$tentt['ten_tt']."</td>
                        <td> <a href='xemhs.php?id=".$hs['ma_hs']."'>  <input type='button' value='xem'> </td>
                    </tr>
                ";}
                ?>
                </tbody>
            </table>
    </div>



</body>

<script  src="/abbank/js/script.js"></script>

</html>