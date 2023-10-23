<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link)
?>

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
    include ('header.php');
    require_once "msg.php"; 
    ?>
    
    <form action="xulytk.php" method="post" class="form">
        <h2 style="text-align:center; color:#00aaad;">Tạo tài khoản</h2>

        <div class="frm_row">
            <div class="cls_caption">Mã nhân sự:</div>
            <div class="cls_input">
                <input type="text" name="ma_ns" />
            </div>
        </div><br style="clear: both;" />
        
        <div class="frm_row">
            <div class="cls_caption">Tên nhân sự:</div>
            <div class="cls_input">
                <input type="text" name="ten_ns" />
            </div>
        </div><br style="clear: both;" />

        <div class="frm_row">
            <div class="cls_caption">Role</div>
            <div class="cls_input">
                <select name="role">
                        <option value="null">-- Chọn --</option>
                        <?php
                        $result = chayTruyVanTraVeDL($link, " select * from phan_quyen");
                        while ($role = mysqli_fetch_assoc($result)) {
                            echo"
                            <option value='".$role['role']."'>".$role['ten_role']."</option>
                        ";}?>                
                </select>   
            </div>     
        </div><br style="clear: both;" />

        <div class="frm_row">
            <div class="cls_caption">Đơn vị kinh doanh</div>
            <div class="cls_input">
                <select name="ma_dvkd">
                    <option value="null">-- Chọn --</option>
                    <?php
                    $result = chayTruyVanTraVeDL($link, " select * from dvkd");
                    while ($dvkd = mysqli_fetch_assoc($result)) {
                        echo"
                        <option value='".$dvkd['ma_dvkd']."'>".$dvkd['ten_dvkd']."</option>
                    ";}?>                
                </select>        
            </div>
        </div><br style="clear: both;" />

        <div class="img_row">
            <input type="submit" name="taotk" value="Tạo tài khoản"/>
        </div>
        </div><br style="clear: both;" />
    
    </form>

</body>
</html>