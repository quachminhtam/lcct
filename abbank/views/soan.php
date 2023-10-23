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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
</head>

<body>

	<?php
    include ("header.php");
    ?>

    <div class="container-fluid" style="justify-content:space-between; margin-bottom: 2rem">
        <?php require_once "../user/msg.php" ?>
        <form action="xulyhs.php" method = "post" style="width: 900px">
        <h2 style="text-align: center;">Soạn hồ sơ</h2>
        <div class="row">
            <div class="col">
                <label class="row">Chọn loại Khách hàng:</label>
                <select class="row" name="ma_loai_kh">
                    <option value="null">-- Chọn --</option>
                    <?php
                        $result = chayTruyVanTraVeDL($link, " select * from loai_kh");
                        while ($kh = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$kh['ma_loai_kh']."'>".$kh['ten_loai_kh']."</option>
                        ";}            
                    ?>
                </select>
            </div>
            <div class="col">
                <label class="row">Chọn loại sản phẩm:</label>
                <select class="row" name="ma_loai_sp">
                    <option value="null">-- Chọn --</option>
                    <?php
                        $result = chayTruyVanTraVeDL($link, " select * from loai_sp");
                        while ($lsp = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$lsp['ma_loai_sp']."'>".$lsp['ten_loai_sp']."</option>
                        ";}            
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="row">ID Khách hàng:</label>
                <input  class="row" name="ma_kh" type="text" value=""<?php echo isset($_GET['ma_kh'])?$_GET['ma_kh']:""; ?>"" required/>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <label class="row">Miền</label>
                <select class="row" name="ma_mien" onchange="getcumbymien()" >
                    <option value="null">-- Chọn --</option>
                    <?php
                    $result = chayTruyVanTraVeDL($link, " select * from mien");
                        while ($mien = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$mien['ma_mien']."'>".$mien['ten_mien']."</option>
                        ";}
                        ?>
                </select>
            </div> 
            <div class="col">
                <label class="row" for="cum">Cụm Đơn vị kinh doanh</label>
                <select class="row" id="cum" name="cum" >
                    <option value="null">-- Chọn --</option>
                    <!--
                    <?php
                    $result = chayTruyVanTraVeDL($link, " select * from cum_dvkd ");
                        while ($cum = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$cum['ma_cum']."'>".$cum['ten_cum']."</option>
                    ";}?>
                    -->                
                </select>
            </div>

            <div class="col">
                <label class="row" for="dvkd">Đơn vị kinh doanh</label>
                <select class="row" id="dvkd" name="dvkd" disabled >
                    <option value="null">-- Chọn --</option>
                    <?php
                    $result = chayTruyVanTraVeDL($link, " select * from dvkd ");
                        while ($dvkd = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$dkvd['ma_dvkd']."'>".$dvkd['ten_dvkd']."</option>
                    ";}?>
                </select>
            </div>       
        </div>

        <div class="row" >
            <div class="col">
                <label class="row" for="tsdb">Tài sản đảm bảo: </label>
                <input class="row" id="tsdb" name="tsdb" type="text"/>
            </div>
            <div class="col">
                <label class="row" for="gt">Giá trị tài sản đảm bảo: </label>
                <input class="row" id="gt" name="gt_tsdb" type="numberic"/>
            </div>
        </div>

        <div class="row" >
            <div class="col">
                <label class="row" for="matien">Loại tiền</label>
                <select class="row" id="matien" name="ma_tien">
                    <option value="null">-- Chọn --</option>
                    <?php
                    $result = chayTruyVanTraVeDL($link, " select * from loai_tien");
                    while ($tien = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$tien['ma_tien']."'>".$tien['ten_tien']."</option>
                    ";}?>                
                </select>
            </div>     
            <div class="col">
                <label class="row" for="sotien">Tiền đề nghị cấp: </label>
                <input class="row" id="sotien" name="so_tien" type="numberic" required/>
            </div>
        </div>

        <div class="row" >
            <div class="col">
                <label class="row" for="mucdich">Mục đích vay: </label>
                <input class="row" id="mucdich" name="muc_dich" type="text" value=""/>
            </div>
        </div>
    
        <div class="row" style="justify-content:space-between; padding-right: 2rem">
            <!-- Button trigger modal -->
            <button type="button" class="col" data-toggle="modal" data-target="#huysoan">Hủy soạn thảo</button>
            <button type="button" class="col" data-toggle="modal" data-target="#luuhoso">Lưu hồ sơ</button>
            <button type="button" class="col" data-toggle="modal" data-target="#trinhhoso">Trình hồ sơ</button>
        </div>

            <!-- Modal hủy-->
            <div class="modal fade" id="huysoan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="huyLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="huyLabel">Cảnh báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn hủy soạn thảo hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="reset" class="btn btn-primary" data-dismiss="modal">Hủy soạn thảo</button>
                    </div>
                </div>
            </div>
            </div>

            <!-- Modal lưu-->
            <div class="modal fade" id="luuhoso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="luuLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="luuLabel">Cảnh báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn lưu hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="luuhoso">Lưu hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>

             <!-- Modal trình-->
             <div class="modal fade" id="trinhhoso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="trinhLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="luuLabel">Cảnh báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn trình duyệt hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="trinhmoi">Trình hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>

        </form>
    </div>

</body>
</html>
