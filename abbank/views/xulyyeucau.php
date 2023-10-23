<?php 
    
session_start();

require_once '../module/db_module.php';
require_once 'functionyc.php';


$link = NULL;
taoKetNoi($link);

if(isset($_POST['yeucau'])){
    taoyc($link, $_POST['ma_ns'], $_POST['yeu_cau'], $_POST['noi_dung']);
    giaiPhongBoNho($link, true);
    header("Location: dsyc.php");

} else if(isset($_POST['yeucaumk'])){
    capmk($link, $_POST['ma_ns'], $_POST['noi_dung']);
    giaiPhongBoNho($link, true);
    header("Location: index.php");

} else if(isset($_POST['hoantat'])){
    xlyc($link,$_POST['phan_hoi'], $_GET['id']);
    giaiPhongBoNho($link, true);
    header("Location: qlyyc.php");
}


?>