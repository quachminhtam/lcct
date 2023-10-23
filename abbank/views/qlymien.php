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
</head>

<body>

    <?php
    include ("header.php");
    require_once "msg.php"; 
    ?>

    <div class="container" style="justify-content:space-between;">
        <h2 style="text-align: center; margin-top:2rem; color:#00aaad;"">Quản lý danh mục Miền</h2>
        <form class="form">
        <div class="frm_row">
                <label class="cls_caption">Mã miền:</label>
                <input class="cls_input" name="mamien" type="text" value="" />
        </div> <br style="clear: both;" />
        <div class="frm_row">
            <label class="cls_caption">Tên Miền:</label>
            <input class="cls_input" name="tenmien" type="text" value="" />
        </div> <br style="clear: both;" />
        <div class="img_row">
            <input type="submit" value="Tìm">
        </div>
        </form>
    </div>


        <?php
        if (isset($_GET['mamien']) or isset($_GET['tenmien'])) {
            $result = chayTruyVanTraVeDL($link, "select * from mien where ten_mien like '%".$_GET['tenmien']."%' && ma_mien like '%".$_GET['mamien']."%' ");
            if ($result->num_rows > 0) {
                $stt=0;
                echo"
                <div class='container-fluid' style='margin-top:2rem'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                        <th scope='col'>STT</th>
                        <th scope='col'>Mã miền</th>
                        <th scope='col'>Tên miền</th>
                        <th scope='col'>Số cụm ĐVKD</th>
                        </tr>
                    </thead>
                    <tbody>";
                while ($row=mysqli_fetch_assoc($result)) {
                    $stt +=1;
                    $count = chayTruyVanTraVeDL($link, "select count(*) from cum_dvkd where ma_mien = {$row['ma_mien']}");
                    $slg = mysqli_fetch_row($count);
                    echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$row['ma_mien']." </td>
                            <td>".$row['ten_mien']."</td>
                            <td>".$slg[0]."</td>
                            <td>
                                <a href='xemmien.php?id=".$row['ma_mien']."'>
                                    <input type='button' value='Xem'>
                                </a>
                            </td>
                        </tr> 
                    ";
                }
            }else {echo "<h5 style='text-align: center;'>Không tìm thấy</h5>";}
        }               
        ?>
        </form>
    </div>


</body>
</html>