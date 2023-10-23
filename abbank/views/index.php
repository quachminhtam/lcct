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

    if (isset($_SESSION['ma_ns'])){
    $timten = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns = '{$_SESSION['ma_ns']}'");
    $ten = mysqli_fetch_assoc($timten);
    $timrole = chayTruyVanTraVeDL($link, "select * from phan_quyen where role = '{$ten['role']}' ");
    $role = mysqli_fetch_assoc($timrole);
    $timdvkd = chayTruyVanTraVeDL($link, "select * from dvkd where ma_dvkd = '{$ten['ma_dvkd']}' ");
    $dvkd = mysqli_fetch_assoc($timdvkd);
    echo"
    <div class='container-fluid' style='margin:2rem;'>
    <p>Tên: ".$ten['ten_ns']."</p>
    <p>Chức vụ: ".$role['ten_role']."</p>
    <p>Đơn vị kinh doanh: ".$dvkd['ten_dvkd']." - ".$dvkd['ma_dvkd']."</p>
    </div>
    ";}?>
	
</body>
</html>
