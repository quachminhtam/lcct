<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$mahs = $_GET['id'];
$timtt = chayTruyVanTraVeDL($link, "SELECT ma_tt FROM ls_gd WHERE ma_hs = {$mahs} ORDER BY thoi_gian DESC LIMIT 1");
$ttt = mysqli_fetch_assoc($timtt);
$timrole = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns = '{$_SESSION['ma_ns']}'");
$role = mysqli_fetch_assoc($timrole);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LCCT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/abbank/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include ("header.php");

    echo"
        
    <div class='container-fluid' style='justify-content:space-between; margin: 2rem 0;'>
        <form action=xulyhs.php?id=".$mahs." method = 'post' style='width: 900px;'> 
            <h2 style='text-align: center;'>Sửa hồ sơ</h2> ";
            $result = chayTruyVanTraVeDL($link, " select * from hs_td where ma_hs={$mahs}");
            $cths = mysqli_fetch_assoc($result);
            echo"
            <div class='row' >
                <div class='col'>
                    <label class='row'>ID Hồ sơ:</label>
                    <input class='row' name='idhs' type='text' value='".$cths['ma_hs']."' disabled/>
                </div>
            </div> ";

            $timkh = chayTruyVanTraVeDL($link, "select * from khach_hang where ma_kh = '{$cths['ma_kh']}' ");
            $tkh = mysqli_fetch_assoc($timkh);
            
            $timlkh = chayTruyVanTraVeDL($link, "select * from loai_kh where ma_loai_kh = '{$tkh['ma_loai_kh']}' ");
            $lkh = mysqli_fetch_assoc($timlkh);
            
            echo"
            <div class='row'>
                <div class='col'>
                    <label class='row'>Khách hàng:</label>
                    <input class='row' name='kh' type='text' value='".$lkh['ten_loai_kh']."' disabled/>
                </div> ";

                $timtsp = chayTruyVanTraVeDL($link, "select * from loai_sp where ma_sp = '{$cths['ma_sp']}' ");
                $tsp = mysqli_fetch_assoc($timtsp);
                echo"
                <div class='col'>
                    <label class='row'>Sản phẩm:</label>
                    <input class='row' name='sp' type='text' value='".$tsp['ten_sp']."' disabled/>
                </div>
            </div>

            <div class='row'>
                <div class='col'>
                    <label class='row'>ID Khách hàng:</label>
                    <input class='row' name='idkh' type='text' value='".$cths['ma_kh']."' disabled/>
                </div>
                <div class='col'>
                    <label class='row'>Tên Khách hàng:</label>
                    <input class='row' name='tenkh' type='text' value='".$tkh['ten_kh']."' disabled/>
                </div>
            </div>

            <div class='row' >
                <div class='col'>
                    <label class='row' >Tài sản đảm bảo: </label>
                    <input class='row' name='tsdb' type='text' value='".$cths['tsdb']."' />
                </div>
                <div class='col'>
                    <label class='row' >Giá trị tài sản đảm bảo: </label>
                    <input class='row' name='gt' type='numberic' value='".$cths['gt_tsdb']."' />
                </div>
            </div>

            <div class='row' >
                <div class='col'>
                    <label class='row' >Loại tiền</label>
                    <select class='row' name='ma_tien'>
                    <option value='".$cths['ma_tien']."'>".$cths['ma_tien']."</option> ";
                    $result = chayTruyVanTraVeDL($link, " select * from loai_tien");
                    while ($tien = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$tien['ma_tien']."'>".$tien['ten_tien']."</option>
                    ";}
                echo"               
                </select>
                </div>  

                <div class='col'>
                    <label class='row'>Tiền đề nghị cấp: </label>
                    <input class='row' name='so_tien' type='numberic' value='".$cths['so_tien']."' />
                </div>
            </div>

            <div class='row' >
                <div class='col'>
                    <label class='row'>Mục đích vay: </label>
                    <input class='row' name='muc_dich' type='text' value='".$cths['muc_dich']."' />
                </div>
            </div>
            ";?>

        <div class='row justify-content-center'>
                <!-- Button trigger modal -->
            <button type='button' class='btn btn-x' data-toggle='modal' data-target='#sua'>Lưu thay đổi</button> 
        </div>


            <!-- Modal sửa-->
        <div class="modal fade" id="sua" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="suaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="luuLabel">Cảnh báo</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có muốn lưu lại những thay đổi trên hồ sơ này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" name="luumoi">Lưu</button>
                </div>
            </div>
        </div>
        </div>

    </form>
    </div>

</body>
</html>