<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$makh = $_GET['id'];
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
    <script  src="/abbank/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include ("header.php");
    ?>

   <div class='container-fluid' style='margin: 2rem 4rem;'>
        <?php
        $result = chayTruyVanTraVeDL($link, "select * from khach_hang where ma_kh = '{$makh}' ");
        $row = mysqli_fetch_assoc($result);
        $timlkh = chayTruyVanTraVeDL($link, "select * from loai_kh where ma_loai_kh = '{$row['ma_loai_kh']}' ");
        $lkh = mysqli_fetch_assoc($timlkh);
        $timten = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = '{$row['ma_dvkd']}' ");
        $ten = mysqli_fetch_assoc($timten);
        echo"
            <p style='font-size:20px'>Tên khách hàng:  ".$row['ten_kh']."</p>
            <p style='font-size:20px'>Mã khách hàng:  ".$row['ma_kh']."</p>
            <p style='font-size:20px'>Loại khách hàng:  ".$lkh['ten_loai_kh']."</p>
            <p style='font-size:20px'>Mã đơn vị kinh doanh:  ".$row['ma_dvkd']."</p>
            <p style='font-size:20px'>Tên đơn vị kinh doanh:  ".$ten['ten_dvkd']."</p>
    </div> ";
    
    $timdvkd = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns ='{$_SESSION['ma_ns']}' ");
    $ma_dvkd = mysqli_fetch_assoc($timdvkd);
    if (($row['ma_dvkd'] == $ma_dvkd['ma_dvkd']) or ($_SESSION['ma_ns'] == 'admin'))
    {echo"
    <div class='container-fluid' style='margin:0 4rem;'>
            <!-- Button trigger modal -->
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#chuyendvkd'>Chuyển sang ĐVKD khác</button>
    </div>
    ";} else echo"";
    ?>

        <!-- Modal sửa-->
    <div class="modal fade" id="chuyendvkd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="chuyenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="suaLabel">Chuyển đơn vị kinh doanh</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h5>Chọn đơn vị kinh doanh mới</h5>
                            <?php
                            echo"
                            <form  action=xulydm.php?id=".$makh." method='post'>
                            ";?>
                            <div class="row">
                                <div class="col" style="margin: 0 2rem; ">
                                    <select class="row" name="madvkd" style="width:300px; align-items: center;" >
                                        <option value="null">-- Chọn --</option>
                                            <?php
                                                $result = chayTruyVanTraVeDL($link, " select * from dvkd ");
                                                while ($dvkd = mysqli_fetch_assoc($result)) {
                                                    echo"
                                                    <option value='".$dvkd['ma_dvkd']."'>".$dvkd['ten_dvkd']."</option>
                                                ";}?>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type='submit' class='btn btn-primary' name='chuyendvkd'>Chuyển</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class='container-fluid' style='padding: 2rem 5rem;'>
    <h4>Danh sách hồ sơ</h4>
    <?php
      $result = chayTruyVanTraVeDL($link,"select * from hs_td where ma_kh = '$makh'");
      $count = mysqli_num_rows($result);
      if ($count>0) {
        echo"
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID hồ sơ</th>
                        <th>Sản phẩm</th>
                        <th>Giá trị</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> ";
                while ($hs = mysqli_fetch_assoc($result)){
                echo"
                    <tr>
                        <td>".$hs['ma_hs']."</td> ";

                        $timtsp = chayTruyVanTraVeDL($link, "select * from loai_sp where ma_sp = '{$hs['ma_sp']}' ");
                        $tsp = mysqli_fetch_assoc($timtsp);
                        echo"
                        <td>".$tsp['ten_sp']."</td>
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
                } else echo"<p style='font-size:18px'>Khách hàng chưa có hồ sơ tín dụng nào</p>";
                ?>
                </tbody>
            </table>
    </div>
                
</body>
</html>