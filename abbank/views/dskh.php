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
            <h2 style="margin: 1rem 0">Danh sách tài khoản</h2>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã khách hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Loại khách hàng</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $result = chayTruyVanTraVeDL($link, "select * from khach_hang");
                    $stt=0;
                    while ($kh = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$kh['ma_kh']." </td>
                            <td>".$kh['ten_kh']."</td> ";
                            $timlkh = chayTruyVanTraVeDL($link, "select * from loai_kh where ma_loai_kh = '{$kh['ma_loai_kh']}' ");
                            $lkh = mysqli_fetch_assoc($timlkh);
                            echo"
                            <td>".$lkh['ten_loai_kh']."</td> 
                            <td>
                                <button class='btn' id='suans'>Sửa</button>
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