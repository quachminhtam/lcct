<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$madvkd = $_GET['id'];
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
        $result = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = '{$madvkd}' ");
        $row = mysqli_fetch_assoc($result);
        echo"
            <p style='font-size:20px'>Tên đơn vị kinh doanh:  ".$row['ten_dvkd']."</p>
            <p style='font-size:20px'>Mã đơn vị kinh doanh:  ".$row['ma_dvkd']."</p>
            <p style='font-size:20px'>Mã cụm:  ".$row['ma_cum']."</p>
        ";
    ?>
    </div>

    
   
    <div class='container-fluid' style='margin:0 4rem;'>
            <!-- Button trigger modal -->
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#suadvkd'>Sửa thông tin ĐVKD</button>
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#xoadvkd'>Xóa ĐVKD</button> 
    </div>

        <!-- Modal sửa-->
    <div class="modal fade" id="suadvkd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="suaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="suaLabel">Điều chỉnh</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <?php
                            echo"
                            <form action=xulydm.php?id=".$madvkd." method='post' style='max-width: 100%'>
                            <div class='frm_row row'>
                                <div class='cls_caption col'>Tên ĐVKD:</div>
                                <div class='cls_input col'> <input type='text' name='ten_dvkd' required/> </div>
                            </div>
                    </div>
                </div>                    
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                    <button type='submit' class='btn btn-primary' name='suadvkd'>Sửa</button>
                        </form>
                    ";?>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal xóa-->
    <div class="modal fade" id="xoadvkd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="xoaLabel">Xóa</h5>
                    <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có muốn xóa đơn vị kinh doanh này?
                </div>                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <?php
                    echo"
                        <form action=xulydm.php?id=".$madvkd." method='post'>
                        <button type='submit' class='btn btn-primary' name='xoadvkd'>Xóa</button>
                        </form>
                    ";?>
                </div>
            </div>
        </div>
    </div>

                
</body>
</html>