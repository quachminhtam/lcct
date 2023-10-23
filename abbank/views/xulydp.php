<?php 
    session_start();

    require_once ('../module/db_module.php');
    require_once ('functionhs.php');

    $link = NULL;
    taoKetNoi($link);
    $mahs = $_GET['id'];
    date_default_timezone_set("Asia/Bangkok");

    if(isset($_POST['dpthamdinh'])){
        dptd($link, $mahs , $_POST['ma_ns']);
        $time = date("Y-m-d G:i:s");
        ttchotd($link, $mahs, $_SESSION['ma_ns'],$time );
        giaiPhongBoNho($link, true);
        header("Location: dptd.php");
    }else  
        if(isset($_POST['dppheduyet'])){
            dppd($link, $mahs , $_POST['ma_ns']);
            $time = date("Y-m-d G:i:s");
            ttchopd($link, $mahs, $_SESSION['ma_ns'],$time );
            giaiPhongBoNho($link, true);
            header("Location: dppd.php");
    }

?>