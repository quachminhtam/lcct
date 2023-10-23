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
                    <a class="nav-link" data-toggle="tab" href="#mota"  style="color: #00aaad;">Hồ sơ đợi xử lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#chitiet"  style="color: #00aaad;">Hồ sơ đã xử lý</a>
                </li>
            </ul>
        </div>

        <div id="mota" class="container-fluid tab-pane active"><br>
            <h1>Danh sách hồ sơ</h1>
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
                $result = chayTruyVanTraVeDL($link, "select * from hs_td");
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

    <div id="chitiet" class="container-fluid tab-pane fade"><br>
    <div class="container-fluid" style="justify-content:space-between;" id="suahs" >
        <h2 style="text-align: center;">Sửa hồ sơ</h2>
        <form>
            <div class="row">
                <div class="col">
                    <label class="row" for="kh">Chọn loại Khách hàng:</label>
                    <select class="row" id="kh" name="kh" onchange="updatesp()" required>
                        <option value="null">-- Chọn --</option>
                        <option value="SME">SME</option>
                        <option value="LE">LE</option>
                    </select>
                </div>
        
                <div class="col">
                    <label class="row" for="sp">Chọn Sản phẩm:</label>
                    <select class="row" id="sp" name="sp" required disabled>
                        <option value="">-- Chọn --</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label class="row" for="mien">Miền</label>
                    <select class="row" id="mien" name="mien" onchange="updatecum()" required>
                        <option value="null">-- Chọn --</option>
                        <option value="01">Miền Bắc</option>
                        <option value="02">Miền Trung</option>
                        <option value="03">Miền Nam</option>
                    </select>
                </div> 
                <div class="col">
                    <label class="row" for="cum">Cụm Đơn vị kinh doanh</label>
                    <select class="row" id="cum" name="cum" onchange="updatedvkd()" required disabled >
                        <option value="null">-- Chọn --</option>
                        <option value="01">01</option>
                    </select>
                </div>
                <div class="col">
                    <label class="row" for="dvkd">Đơn vị kinh doanh</label>
                    <select class="row" id="dvkd" name="dvkd" required >
                        <option value="null">-- Chọn --</option>
                    </select>
                </div>       
            </div>

            <div class="row" >
                <div class="col">
                    <label class="row" for="tsdb">Tài sản đảm bảo: </label>
                    <input class="row" id="tsdb" name="tsdb" type="text" required />
                </div>
                <div class="col">
                    <label class="row" for="gt">Giá trị tài sản đảm bảo: </label>
                    <input class="row" id="gt" name="gt" type="numberic" required/>
                </div>
            </div>

            <div class="row" >
                <div class="col">
                    <label class="row" for="liten">Loại tiền</label>
                    <select class="row" id="ltien" name="ltien" required>
                        <option value="null">-- Chọn --</option>
                        <option value="VND">VND</option>
                    </select>
                </div>     
                <div class="col">
                    <label class="row" for="tiencap">Tiền đề nghị cấp: </label>
                    <input class="row" id="tiencap" name="tiencap" type="numberic" required/>
                </div>
            </div>

            <div class="row" >
                <label for="mucdich">Mục đích vay: </label>
                <input id="mucdich" name="mucdich" type="text" required/>
            </div>

            <div class="row" style="justify-content:space-between;">
                <button class="col" id="luu">Lưu hồ sơ</button>
            </div>
        </form>
    </div>
    </div>



</body>

<script  src="/abbank/js/script.js"></script>

</html>