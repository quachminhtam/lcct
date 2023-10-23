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
    ?>
    
    <div class="container-fluid tab-content" style="margin-top: 1rem">
        <div class="container-fluid" style="margin: right 1rem;">
            <ul class="nav nav-tabs" style="background-color: #fff;">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#all"  style="color: #00aaad;">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dvkd"  style="color: #00aaad;">Đơn vị kinh doanh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cvdp"  style="color: #00aaad;">Chuyên viên điều phối</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cvtd"  style="color: #00aaad;">Chuyên viên Thẩm định tín dụng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cpd"  style="color: #00aaad;">Cấp phê duyệt</a>
                </li>
            </ul>
        </div>

        <div id="all" class="container-fluid tab-pane active">
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên nhân sự</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Đơn vị kinh doanh</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from nhan_su");
                    $stt=0;
                    while ($ns = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$ns['ten_ns']." </td> ";
                            $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
                            $role = mysqli_fetch_assoc($timrole);
                            echo"
                            <td>".$role['ten_role']."</td> ";
                            $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = {$ns['ma_dvkd']} ");
                            $dvkd = mysqli_fetch_assoc($timdvkd);
                            echo"
                            <td>".$dvkd['ten_dvkd']."</td> 
                            <td>
                                <a href='xemtk.php?id=".$ns['ma_ns']."'> <input type='button' value='Sửa'>  </a>
                            </td>
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
            </table>
        </div>

        <div id="dvkd" class="container-fluid tab-pane">
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên nhân sự</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Đơn vị kinh doanh</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where role = 'dvkd' ");
                    $stt=0;
                    while ($ns = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$ns['ten_ns']." </td> ";
                            $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
                            $role = mysqli_fetch_assoc($timrole);
                            echo"
                            <td>".$role['ten_role']."</td> ";
                            $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = {$ns['ma_dvkd']} ");
                            $dvkd = mysqli_fetch_assoc($timdvkd);
                            echo"
                            <td>".$dvkd['ten_dvkd']."</td> 
                            <td>
                                <a href='xemtk.php?id=".$ns['ma_ns']."'> <input type='button' value='Xem'>  </a>
                            </td>
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
            </table>
        </div>

        <div id="cvdp" class="container-fluid tab-pane">
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên nhân sự</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Đơn vị kinh doanh</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where role = 'cvdp' ");
                    $stt=0;
                    while ($ns = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$ns['ten_ns']." </td> ";
                            $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
                            $role = mysqli_fetch_assoc($timrole);
                            echo"
                            <td>".$role['ten_role']."</td> ";
                            $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = {$ns['ma_dvkd']} ");
                            $dvkd = mysqli_fetch_assoc($timdvkd);
                            echo"
                            <td>".$dvkd['ten_dvkd']."</td> 
                            <td>
                                <a href='xemtk.php?id=".$ns['ma_ns']."'> <input type='button' value='Xem'>  </a>
                            </td>
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
            </table>
        </div>

        <div id="cvtd" class="container-fluid tab-pane">
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên nhân sự</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Đơn vị kinh doanh</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where role = 'cvtd' ");
                    $stt=0;
                    while ($ns = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$ns['ten_ns']." </td> ";
                            $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
                            $role = mysqli_fetch_assoc($timrole);
                            echo"
                            <td>".$role['ten_role']."</td> ";
                            $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = {$ns['ma_dvkd']} ");
                            $dvkd = mysqli_fetch_assoc($timdvkd);
                            echo"
                            <td>".$dvkd['ten_dvkd']."</td> 
                            <td>
                                <a href='xemtk.php?id=".$ns['ma_ns']."'> <input type='button' value='Xem'>  </a>
                            </td>
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
            </table>
        </div>

        <div id="cpd" class="container-fluid tab-pane">
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên nhân sự</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Đơn vị kinh doanh</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where role = 'cpd' ");
                    $stt=0;
                    while ($ns = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$ns['ten_ns']." </td> ";
                            $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ns['role']}' ");
                            $role = mysqli_fetch_assoc($timrole);
                            echo"
                            <td>".$role['ten_role']."</td> ";
                            $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = {$ns['ma_dvkd']} ");
                            $dvkd = mysqli_fetch_assoc($timdvkd);
                            echo"
                            <td>".$dvkd['ten_dvkd']."</td> 
                            <td>
                                <a href='xemtk.php?id=".$ns['ma_ns']."'> <input type='button' value='Xem'>  </a>
                            </td>
                        </tr> 
                    ";};
                ?>
                </tr>
            </tbody>
            </table>
        </div>

    </div>
</body>
</html>