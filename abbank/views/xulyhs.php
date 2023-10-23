<?php 
    session_start();

    require_once ('../module/db_module.php');
    require_once ('functionhs.php');

    $link = NULL;
    taoKetNoi($link);
    date_default_timezone_set("Asia/Bangkok");

    if(isset($_POST['luuhoso'])){
        if ( (($_POST["ma_sp"])!= 'null') &&  (($_POST["ma_tien"])!= 'null') ){
            luuhs($link, $_POST["ma_kh"], $_POST["ma_sp"], $_POST["ma_tien"], $_POST["so_tien"], $_POST["tsdb"], $_POST["gt_tsdb"], $_POST["muc_dich"]);
            $time = date("Y-m-d G:i:s");
            $result = chayTruyVanTraVeDL($link, "select max(ma_hs) as ma_hs from hs_td");
            $timmahs =  mysqli_fetch_assoc($result);
            ttsoan($link, $timmahs['ma_hs'], $_SESSION['ma_ns'],$time );
            giaiPhongBoNho($link, true);
            header("Location: soan.php?msg=success");
        }else {
        header("Location: soan.php?msg=miss-info");
        }
    }else {

        if(isset($_POST['trinhmoi'])){
            if ( (($_POST["ma_sp"])!= 'null') &&  (($_POST["ma_tien"])!= 'null') ){
                luuhs($link, $_POST["ma_kh"], $_POST["ma_sp"], $_POST["ma_tien"], $_POST["so_tien"], $_POST["tsdb"], $_POST["gt_tsdb"], $_POST["muc_dich"]);
                $time1 = date("Y-m-d G:i:s");
                $timestamp = strtotime($time1);
                $timestamp += 1;
                $time2 = date("Y-m-d G:i:s", $timestamp);
                $result = chayTruyVanTraVeDL($link, "select max(ma_hs) as ma_hs from hs_td");
                $timmahs =  mysqli_fetch_assoc($result);
                ttsoan($link, $timmahs['ma_hs'], $_SESSION['ma_ns'],$time1 );
                tttrinh($link, $timmahs['ma_hs'], $_SESSION['ma_ns'],$time2 );
                giaiPhongBoNho($link, true);
                header("Location: xulydvkd.php");
            }else {
            header("Location: soan.php?msg=miss-info");
            }
        }
        
        else {
            if(isset($_POST['trinhhoso'])){
                    $time = date("Y-m-d G:i:s");
                    $timmahs = $_GET['id'];
                    tttrinh($link, $timmahs, $_SESSION['ma_ns'],$time );
                    giaiPhongBoNho($link, true);
                    header("Location: xulydvkd.php");
            }else {
                if(isset($_POST['xoahoso'])){
                    $time = date("Y-m-d G:i:s");
                    $timmahs = $_GET['id'];
                    ttxoa($link, $timmahs, $_SESSION['ma_ns'],$time );
                    giaiPhongBoNho($link, true);
                    header("Location: xulydvkd.php");
                }else {
                    if(isset($_POST['thamdinh'])){
                        $time = date("Y-m-d G:i:s");
                        $timmahs = $_GET['id'];
                        tttd($link, $timmahs, $_SESSION['ma_ns'],$time );
                        giaiPhongBoNho($link, true);
                        header("Location: xulycvtd.php");
                    }else {
                        if(isset($_POST['trahoso'])){
                            $time = date("Y-m-d G:i:s");
                            $timmahs = $_GET['id'];
                            $timns = chayTruyVanTraVeDL($link, "select * from ls_gd where ma_hs = '{$timmahs}' and ma_tt = 'soan'");
                            $ma_ns = mysqli_fetch_assoc($timns);
                            tttra($link, $timmahs, $_SESSION['ma_ns'],$time );
                            yctra($link, $ma_ns['ma_ns'], $_POST['yeucau'], $_POST['noidung']);
                            giaiPhongBoNho($link, true);
                            header("Location: xulycvtd.php");
                        }else {
                            if(isset($_POST['duyethoso'])){
                                $time = date("Y-m-d G:i:s");
                                $timmahs = $_GET['id'];
                                $timns = chayTruyVanTraVeDL($link, "select * from ls_gd where ma_h s= '{$timmahs}' and ma_tt='soan' ");
                                $ma_ns = mysqli_fetch_assoc($timns);
                                ttduyet($link, $timmahs, $_SESSION['ma_ns'],$time );
                                ycduyet($link, $ma_ns['ma_ns'], $timmahs);
                                giaiPhongBoNho($link, true);
                                header("Location: xulycpd.php");
                            }else{
                                if(isset($_POST['huyhoso'])){
                                    $time = date("Y-m-d G:i:s");
                                    $timmahs = $_GET['id'];
                                    $timns = chayTruyVanTraVeDL($link, "select * from ls_gd where ma_h s= '{$timmahs}' and ma_tt='soan' ");
                                    $ma_ns = mysqli_fetch_assoc($timns);
                                    tthuy($link, $timmahs, $_SESSION['ma_ns'],$time );
                                    ychuy($link, $ma_ns['ma_ns'], $timmahs);
                                    giaiPhongBoNho($link, true);
                                    header("Location: xulycpd.php");
                                }else{
                                    if(isset($_POST['luumoi'])){
                                        $timmahs = $_GET['id'];
                                        update($link, $timmahs, $_POST["ma_tien"], $_POST["so_tien"], $_POST["tsdb"], $_POST["gt"], $_POST["muc_dich"]);
                                        $time = date("Y-m-d G:i:s");
                                        ttsua($link, $timmahs, $_SESSION['ma_ns'],$time );
                                        giaiPhongBoNho($link, true);
                                        header("Location: xemhs.php?id=".$timmahs);
                                    }else {
                                    giaiPhongBoNho($link, true);
                                    echo "lỗi rồi !!!";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    ?>