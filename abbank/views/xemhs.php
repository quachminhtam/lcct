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
    <form action=xulyhs.php?id=".$mahs." method = 'post'> ";

    if ($role['role']  == 'dvkd') {
    if (($ttt['ma_tt']!=='thamdinh') and ($ttt['ma_tt']!=='pheduyet') and ($ttt['ma_tt']!=='huy') and ($ttt['ma_tt']!=='xoa')) {
        if ($ttt['ma_tt']=='soan' or $ttt['ma_tt']=='sua'){
            echo"
            <div class='container-fluid'>
                <!-- Button trigger modal -->
                <button class='btn btn-x'><a class='text-decoration-none' style='color:#00aaad' href='suahs.php?id=".$mahs."'>Sửa hồ sơ</a></button>
                <button type='button' class='btn btn-x' data-toggle='modal' data-target='#trinhhoso'>Trình hồ sơ</button>
            ";
        }else echo"
            <div class='container-fluid'>
                <button class='btn btn-x'><a class='text-decoration-none' style='color:#00aaad' href='soan.php'>Soạn mới</a></button>
                ";
                if ($ttt['ma_tt']!=='xoa'){
                echo"
                <button type='button' class='btn btn-x' data-toggle='modal' data-target='#xoahoso'>Xóa hồ sơ</button>
                ";
                }else echo"";
    } else echo"";
    } else echo "";
        ?>
        </div>

            <!-- Modal trình-->
            <div class="modal fade" id="trinhhoso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="trinhLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="luuLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn trình duyệt hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="trinhhoso">Trình hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>

            <!-- Modal xoá-->
            <div class="modal fade" id="xoahoso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="xoaLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn xóa hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="xoahoso">Xóa hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>
    </form>
   

    <div class="container-fluid" style="justify-content:space-between; margin:2rem 0;">
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

    
    <div class="container-fluid lsgd" style="margin: 2rem 0;">
        <div class="container-fluid">
        <h4 style="margin-bottom: 1rem;">Lịch sử giao dịch</h4>
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

    <?php    
    echo"
    <form action=xulyhs.php?id=".$mahs." method='post' class='form' style='padding:0; margin-bottom:2rem;'> ";
    if (($role['role'] == 'cvtd') and ($ttt['ma_tt'] == 'thamdinh')) {echo "
        <div class='container-fluid' style='margin:0'>
            <!-- Button trigger modal -->
            <button type='button' class='btn btn-x' data-toggle='modal' data-target='#thamdinh'>Thẩm định và trình cấp phê duyệt</button> 
            <button type='button' class='btn btn-x' data-toggle='modal' data-target='#tra'>Trả hồ sơ</button> 
        </div>
        ";} else if (($role['role'] == 'cpd')  and ($ttt['ma_tt'] == 'pheduyet')) {
            echo "
            <div class='container-fluid' style='margin:0'>
                <!-- Button trigger modal -->
                <button type='button' class='btn btn-x' data-toggle='modal' data-target='#duyet'>Phê duyệt hồ sơ</button> 
                <button type='button' class='btn btn-x' data-toggle='modal' data-target='#huy'>Từ chối hồ sơ</button> 
            </div>    
        ";}?>

            <!-- Modal trình-->
            <div class="modal fade" id="thamdinh" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="trinhLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="luuLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn trình duyệt hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="thamdinh">Trình</button>
                    </div>
                </div>
            </div>
            </div>

            <!-- Modal trả-->
            <div class="modal fade" id="tra" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="xoaLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center" style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 18px;">Bạn muốn trả hồ sơ này về đơn vị kinh doanh?</p>
                        <div class="form-group">
                            <label class="col-form-label" style="font-size: 18px;">Phản hồi cho ĐVKD</label>
                            <textarea class="form-control" name="yeucau"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" style="font-size: 18px;">Nội dung</label>
                            <textarea class="form-control" name="noidung"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="trahoso">Trả hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>

             <!-- Modal duyệt-->
             <div class="modal fade" id="duyet" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="xoaLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn phê duyệt hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="duyethoso">Duyệt</button>
                    </div>
                </div>
            </div>
            </div>

             <!-- Modal hủy-->
             <div class="modal fade" id="huy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="xoaLabel">Cảnh báo</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn từ chối cấp tín dụng hồ sơ này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="huyhoso">Đóng hồ sơ</button>
                    </div>
                </div>
            </div>
            </div>
    </form>

</body>
</html>