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
    include ('header.php');
    require_once ("msg.php");
    ?>

    <div class="container" style="justify-content:space-between;">
        <h3 style="text-align: center; margin-top: 1rem;">Gửi yêu cầu thay đổi</h3>    
        <form action="xulyyeucau.php" method="post" class="form">
            <div class="form-group">
                <label class="col-form-label" style="font-size: 20px;">Tên tài khoản: </label>
                <input type="text" class="form-control" name="ma_ns" required>
            </div>
            <div class="form-group">
                <label class="col-form-label" style="font-size: 20px;">Yêu cầu: </label>
                <input type="text" class="form-control" name="yeu_cau" required>
            </div>
            <div class="form-group">
                <label class="col-form-label" style="font-size: 20px;">Nội dung</label>
                <textarea class="form-control" name="noi_dung"></textarea>
            </div>
            <div class="img_row">
                <input type="submit" name="yeucau" value="Gửi yêu cầu">
            </div> 
        </form>
    </div>
       