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

    <div class="container-fluid tab-content">
        <div class="container-fluid" style="justify-content:space-between;">
            <ul class="nav nav-tabs" style="background-color: #fff; margin-top:1rem;">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#chuaxl"  style="color: #00aaad;">Yêu cầu đợi xử lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#daxl"  style="color: #00aaad;">Yêu cầu đã xử lý</a>
                </li>
            </ul>
        </div>

        <div id='chuaxl' class='container-fluid tab-pane active'><br>
            <h2>Danh sách yêu cầu</h2>
                <?php
                $result = chayTruyVanTraVeDL($link, "select * from yeu_cau where trang_thai='0'");
                if ($result->num_rows > 0) {
                    echo"
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Yêu cầu</th>
                                <th>Nhân sự yêu cầu</th>
                                <th>Nội dung</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> ";
                    $stt=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                            <tr>
                                <td>".$stt."</td>
                                <td>".$row['yeu_cau']." </td>
                                <td>".$row['ma_ns']."</td>
                                <td>".$row['noi_dung']."</td>
                                <td>
                                    <form action=xulyyeucau.php?id=".$row['stt']." method='post'>
                                    <input type='button' name='hoantat' data-toggle='modal' data-target='#done' value='Xử lý'/>
                                </td>
                            </tr> 
                </tbody>
                ";
            }
        }else {echo "<h5 style='text-align: center;'>Không có yêu cầu nào</h5>";}
        ?>
            </table>
        </div>

        <div class="modal fade" id="done" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="trinhLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center" id="luuLabel">Bạn đã xử lý hoàn tất yêu cầu?</h5>
                        <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label" style="font-size: 20px;">Phản hồi về yêu cầu</label>
                            <textarea class="form-control" name="phan_hoi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="hoantat">Hoàn tất</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="daxl" class="container-fluid tab-pane fade"><br>
        <h2>Danh sách yêu cầu</h2>
                <?php
                $result = chayTruyVanTraVeDL($link, "select * from yeu_cau where trang_thai='1'");
                if ($result->num_rows > 0) {
                    echo"
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Yêu cầu</th>
                                <th>Nhân sự yêu cầu</th>
                                <th>Nội dung</th>
                                <th>Phản hồi</th>
                            </tr>
                        </thead>
                        <tbody> ";
                    $stt=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $stt +=1;
                        echo " 
                            <tr>
                                <td>".$stt."</td>
                                <td>".$row['yeu_cau']." </td>
                                <td>".$row['ma_ns']."</td>
                                <td>".$row['noi_dung']."</td>
                                <td>".$row['phan_hoi']."</td>
                            </tr> 
                        ";
                    }
                }else {echo "<h5 style='text-align: center;'>Không có yêu cầu nào</h5>";}
                ?>
                </tbody>
            </table>
    </div>



</body>

<script  src="/abbank/js/script.js"></script>

</html>