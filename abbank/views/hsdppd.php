<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$mahs = $_GET['id'];
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

    <div class="container-fluid" style="justify-content:space-between; margin: 2rem 0;">
        <form style="width: 900px">
            <h3 style="text-align: center;">Chi tiết hồ sơ</h3>
            <?php
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
                    <label class='row' for='tsdb'>Tài sản đảm bảo: </label>
                    <input class='row' id='tsdb' name='tsdb' type='text' value='".$cths['tsdb']."' disabled/>
                </div>
                <div class='col'>
                    <label class='row' for='gt'>Giá trị tài sản đảm bảo: </label>
                    <input class='row' id='gt' name='gt' type='numberic' value='".$cths['gt_tsdb']."' disabled/>
                </div>
            </div>

            <div class='row' >
                <div class='col'>
                    <label class='row' >Loại tiền</label>
                    <input class='row' name='ma_tien' type='text' value='".$cths['ma_tien']."' disabled/>
                </div>     
                <div class='col'>
                    <label class='row'>Tiền đề nghị cấp: </label>
                    <input class='row' name='so_tien' type='numberic' value='".$cths['so_tien']."' disabled/>
                </div>
            </div>

            <div class='row' >
                <div class='col'>
                    <label class='row'>Mục đích vay: </label>
                    <input class='row' name='muc_dich' type='text' value='".$cths['muc_dich']."' disabled/>
                </div>
            </div>
            "?>
        </form>
    </div>

    
    <div class="container-fluid" style="margin: 2rem 0;">
        <div class="container-fluid">
        <h4>Lịch sử giao dịch</h4>
        <table class="table table-bordered" style="padding: 0 30px;">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Phụ trách</th>
                <th scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from ls_gd where ma_hs = {$mahs} order by thoi_gian ");
                    $stt=0;
                    while ($lshs = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>";
                            $timtt = chayTruyVanTraVeDL($link, "select * from trang_thai where ma_tt = '{$lshs['ma_tt']}' ");
                            $tentt = mysqli_fetch_assoc($timtt);
                            echo"
                            <td>".$tentt['ten_tt']." </td>";
                            $timten = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns = '{$lshs['ma_ns']}' ");
                            $tenns = mysqli_fetch_assoc($timten);
                            echo"
                            <td>".$tenns['ten_ns']."</td>
                            <td>".$lshs['thoi_gian']."</td> 
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

    <div class="container-fluid" style="margin-bottom: 2rem;">
        <div class="container-fluid">
        <h4>Chọn Cấp phê duyệt tín dụng</h4>
            <?php
            echo"
            <form  action=xulydp.php?id=".$mahs." method='post'>
            ";?>
            <div class="row">
                <div class="col align-self-center" style="margin: 0 2rem; ">
                    <select class="row" name="ma_ns" style="width:300px; align-items: center;" >
                        <option value="null">-- Chọn --</option>
                            <?php
                                 $result = chayTruyVanTraVeDL($link, " select * from nhan_su where role='cpd' ");
                                 while ($ns = mysqli_fetch_assoc($result)) {
                                     $query = "SELECT * FROM `dieu_phoi` INNER JOIN (
                                         SELECT hs_td.*  FROM hs_td INNER JOIN (
                                                             SELECT * FROM ls_gd 
                                                             WHERE (ma_hs, thoi_gian) IN ( SELECT ma_hs, MAX(thoi_gian) 
                                                             FROM ls_gd GROUP BY ma_hs)
                                                             ) AS tb2 ON hs_td.ma_hs = tb2.ma_hs WHERE ma_tt = 'pheduyet'
                                         ) as tb3 
                                         ON tb3.ma_hs = dieu_phoi.ma_hs  WHERE ma_ns='{$ns['ma_ns']}' GROUP by dieu_phoi.ma_hs";
                                     $demhs = chayTruyVanTraVeDL($link, $query);
                                     $count = mysqli_num_rows($demhs);
                                     mysqli_free_result($demhs);
                                     echo"
                                     <option value='".$ns['ma_ns']."'>".$ns['ten_ns']." (".$count.")</option>
                                ";}?>
                    </select>
                </div>
                <div class='col align-self-center' style='margin:0;'>
                    <button type='submit' class='btn-x btn' name='dppheduyet'>Phân xử lý</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</body>
</html>