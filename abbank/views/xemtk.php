<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$mans = $_GET['id'];
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
        $result = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns = '{$mans}' ");
        $ns = mysqli_fetch_assoc($result);
        $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
        $role = mysqli_fetch_assoc($timrole);
        $timten = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = '{$ns['ma_dvkd']}' ");
        $ten = mysqli_fetch_assoc($timten);
        echo"
            <p style='font-size:20px'>Tên nhân sự:  ".$ns['ten_ns']."</p>
            <p style='font-size:20px'>Chức vụ:  ".$role['ten_role']."</p>
            <p style='font-size:20px'>Mã đơn vị kinh doanh:  ".$ns['ma_dvkd']."</p>
            <p style='font-size:20px'>Tên đơn vị kinh doanh:  ".$ten['ten_dvkd']."</p>
        ";
        ?>
    </div>

   
    <div class='container-fluid' style='margin:0 4rem;'>
            <!-- Button trigger modal -->
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#chuyendvkd'>Chuyển sang ĐVKD khác</button>
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#chuyenrole'>Chuyển chức vụ</button>
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#capmk'>Cấp mật khẩu mới</button>
    </div>

        <!-- Modal sửa dvkd-->
    <div class="modal fade" id="chuyendvkd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="chuyenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="chuyenLabel">Chuyển đơn vị kinh doanh</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h5>Chọn đơn vị kinh doanh mới</h5>
                            <?php
                            echo"
                            <form  action=xulytk.php?id=".$mans." method='post'>
                            ";?>
                            <div class='row'>
                                <div class='col' style='margin: 0 2rem; '>
                                    <select class='row' name='madvkd' style='width:300px; align-items: center;' >
                                        <option value='null'>-- Chọn --</option>
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
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                        <button type='submit' class='btn btn-primary' name='chuyendvkd'>Chuyển</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal sửa role-->
    <div class="modal fade" id="chuyenrole" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="chuyenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="chuyenLabel">Chuyển chức vụ</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h5>Chọn chức vụ mới</h5>
                            <?php
                            echo"
                            <form  action=xulytk.php?id=".$mans." method='post'>
                            <div class='row'>
                                <div class='col' style='margin: 0 2rem; '>
                                    <select class='row' name='role' style='width:300px; align-items: center;' >
                                        <option value='null'>-- Chọn --</option> ";
                                        $result = chayTruyVanTraVeDL($link, " select * from phan_quyen ");
                                        while ($role = mysqli_fetch_assoc($result)) {
                                        echo"
                                        <option value='".$role['role']."'>".$role['ten_role']."</option>
                                        ";} ?>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type='submit' class='btn btn-primary' name='chuyenrole'>Chuyển</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal cấp mk-->
    <div class="modal fade" id="capmk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="huyLabel">Cảnh báo</h5>
                    <button type="button" class="close align-self-center" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có muốn cấp lại mật khẩu cho tài khoản này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <?php echo"
                    <form  action=xulytk.php?id=".$mans." method='post'>
                    <button type='submit' class='btn btn-primary' name='capmk'>Cấp lại</button>
                    </form>
                    "?>
                </div>
            </div>
        </div>
    </div>


                
</body>
</html>