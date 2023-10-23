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
    require_once "msg.php"; 
    ?>

    <div class="container" style="justify-content:space-between;">
        <h2 style="text-align: center; margin-top: 2rem;">Tài khoản</h2>
        <form action="xulytk.php" method="post" class="form">
            <div class="frm_row">
                <label class="cls_caption">Mật khẩu cũ:</label>
                <input class="cls_input" name="password" type="password"/>
            </div> <br style="clear: both;" />

            <div class="frm_row">
                <label class="cls_caption">Mật khẩu mới:</label>
                <input class="cls_input" name="new_pw" type="password" />
            </div> <br style="clear: both;" />

            <div class=" frm_row">
                <label class="cls_caption">Nhập lại mật khẩu mới:</label>
                <input class="cls_input" name="new_pw2" type="password"/>
            </div> <br style="clear: both;" />

            <div class="img_row">
                <input type="submit" name="dmk" value="Đổi mật khẩu">
            </div> 
        </form>
    </div>
</body>
</html>

