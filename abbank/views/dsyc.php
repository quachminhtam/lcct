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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include ("header.php");
    ?>

    <div class="container-fluid tab-content" style="margin-top: 1rem;">
        <div class='container-fluid '>
        <div class="row"> 
            <h2 class="col-10">Danh sách yêu cầu</h2>
            <a href="yeucau.php">            
                <button type='button' class='col btn btn-x'>Yêu cầu mới</button>
            </a>
        </div>
        </div>
            <div class='container-fluid '>
                <?php
                $result = chayTruyVanTraVeDL($link, "select * from yeu_cau where ma_ns='{$_SESSION['ma_ns']}' order by ma_yc desc");
                if ($result->num_rows > 0) {
                    echo"
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Yêu cầu</th>
                                <th>Nội dung</th>
                                <th>Phản hồi</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody> ";
                    $stt=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        if ($row['trang_thai'] == '0')  {
                            $tt = 'Chờ xử lý';
                        }else if ($row['trang_thai'] == '1') {
                            $tt = 'Đã xử lý';
                        } else if ($row['trang_thai'] == '2')
                                $tt = 'Thông báo';
                          
                        echo " 
                            <tr>
                                <td>".$stt."</td>
                                <td>".$row['yeu_cau']." </td>
                                <td>".$row['noi_dung']."</td>
                                <td>".$row['phan_hoi']."</td>
                                <td>".$tt."</td>
                            </tr> 
                </tbody>
                ";
            }
        }else {echo "<h5 style='text-align: center;'>Không có yêu cầu nào</h5>";}
        ?>
            </table>
        </div>




</body>

<script  src="/abbank/js/script.js"></script>

</html>