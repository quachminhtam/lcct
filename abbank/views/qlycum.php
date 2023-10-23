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
    ?>


    <div class="container" style="justify-content:space-between;">
        <?php require_once "msg.php" ?>
        <h2 style="text-align: center; margin-top:2rem; color:#00aaad;"">Quản lý danh mục Cụm ĐVKD</h2>
        <form class="form">
        <div class="frm_row">
                <label class="cls_caption">Mã cụm:</label>
                <input class="cls_input" name="macum" type="text" value="" />
        </div> <br style="clear: both;" />
        <div class="frm_row">
            <label class="cls_caption">Tên cụm:</label>
            <input class="cls_input" name="tencum" type="text" value="" />
        </div><br style="clear: both;" />
        <div class="img_row">
            <input type="submit" value="Tìm">
        </div>
        </form>
    </div>

        <?php
         if (isset($_GET['macum']) or isset($_GET['tencum'])) {
            $result = chayTruyVanTraVeDL($link, "select * from cum_dvkd where ten_cum like '%".$_GET['tencum']."%' && ma_cum like '%".$_GET['macum']."%' ");
            if ($result->num_rows > 0) {
                $stt=0;
                echo"
                <div class='container-fluid' style='margin-top:2rem'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>STT</th>
                            <th scope='col'>Mã cụm</th>
                            <th scope='col'>Tên cụm</th>
                            <th scope='col'>Số ĐVKD</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $stt +=1;
                    $count = chayTruyVanTraVeDL($link, "select count(*) from dvkd where ma_cum = {$row['ma_cum']}");
                    $slg = mysqli_fetch_row($count);
                    echo " 
                        <tr>
                            <td>".$stt."</td>
                            <td>".$row['ma_cum']." </td>
                            <td>".$row['ten_cum']."</td>
                            <td>".$slg[0]."</td>
                            <td>
                                <a href='xemcum.php?id=".$row['ma_cum']."'>
                                    <input type='button' value='Xem'>
                                </a>
                            </div>
                            </td>
                        </tr> 
                    ";
                }
            }else {echo "<h5 style='text-align: center;'>Không tìm thấy</h5>";}
        }
        ?>
    </div>

</body>
</html>