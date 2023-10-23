<?php 
    session_start();

    require_once ('../module/db_module.php');
    require_once ('functiondm.php');

    function existcum($link, $ma_cum){
        $result = chayTruyVanTraVeDL($link, "select count(*) from cum_dvkd where ma_cum='".$ma_cum."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0]>0;
    }

    function existdvkd($link, $ma_dvkd){
        $result = chayTruyVanTraVeDL($link, "select count(*) from dvkd where ma_dvkd='".$ma_dvkd."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0]>0;
    }

    function existUser($link, $ma_kh){
        $result = chayTruyVanTraVeDL($link, "select count(*) from khach_hang where ma_kh='".$ma_kh."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0]>0;
    }

    $link = NULL;
    taoKetNoi($link);

    $timmamien = $_GET['id'];
    $timmacum = $_GET['id'];
    $timmadvkd = $_GET['id'];
    $timmakh = $_GET['id'];

    if(isset($_POST['taokh'])) {
        if (existUser($link, $_POST['makh'])){
            giaiPhongBoNho($link, true);
            header("Location: taokh.php?msg=duplicate&user=".$_POST['makh']);
        }else {
            $timdvkd = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns = '{$_SESSION['ma_ns']}'");
            $madvkd = mysqli_fetch_assoc($timdvkd);
            taokh($link, $_POST['makh'], $_POST['tenkh'], $_POST['lkh'],  $madvkd['ma_dvkd']);
            giaiPhongBoNho($link, true);
            header("Location: xemkh.php?id=".$_POST['makh']);
        }
    } else
    if(isset($_POST['themdvkd'])){
        if (existdvkd($link, $_POST['ma_dvkd'])){
            giaiPhongBoNho($link, true);
            header("Location: qlycum.php?msg=duplicate&madvkd=".$_POST['ma_dvkd']);
        }else {
            themdvkd($link, $_POST['ma_dvkd'], $_POST['ten_dvkd'], $timmacum);
            giaiPhongBoNho($link, true);
            header("Location: xemcum.php?id=".$timmacum);
            }

    } else if(isset($_POST['themcum'])){
        if (existcum($link, $_POST['ma_cum'])){
            giaiPhongBoNho($link, true);
            header("Location: qlymien.php?msg=duplicate&macum=".$_POST['ma_cum']);
        }else {
            themcum($link, $_POST['ma_cum'], $_POST['ten_cum'], $timmamien);
            giaiPhongBoNho($link, true);
            header("Location: xemmien.php?id=".$timmamien);
            } 

    } else if(isset($_POST['suadvkd'])){
        suadvkd($link, $timmadvkd, $_POST['ten_dvkd']);
        giaiPhongBoNho($link, true);
        header("Location: xemdvkd.php?id=".$timmadvkd);

    } else if(isset($_POST['suacum'])){
        suacum($link, $timmacum, $_POST['ten_cum']);
        giaiPhongBoNho($link, true);
        header("Location: xemcum.php?id=".$timmacum);

    } else if(isset($_POST['xoadvkd'])){
        $count1 = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_dvkd = {$timmadvkd}");
        $ns = mysqli_num_rows($count1);
        $count2 = chayTruyVanTraVeDL($link, "select * from khach_hang where ma_dvkd = {$timmadvkd}");
        $kh = mysqli_num_rows($count2);
        if (($ns = 0) && ($kh = 0)){
            xoadvkd($link, $timmadvkd);
            giaiPhongBoNho($link, true);
            header("Location: qlydvkd.php?msg=delete");
        } else {
            giaiPhongBoNho($link, true);
            header("Location: qlydvkd.php?msg=cancel");
        }
    
    } else if(isset($_POST['xoacum'])){
        $count = chayTruyVanTraVeDL($link, "select * from dvkd where ma_cum = {$timmacum}");
        $slg = mysqli_num_rows($count);
        if ($slg = 0) {
            xoacum($link, $timmacum);
            giaiPhongBoNho($link, true);
            header("Location: qlycum.php?msg=delete");
        } else {
            giaiPhongBoNho($link, true);
            header("Location: qlycum.php?msg=cancel");
        }

    } else if(isset($_POST['chuyendvkd'])){
        chuyendvkd($link, $_POST['madvkd'], $timmakh);
        giaiPhongBoNho($link, true);
        header("Location: xemkh.php?id=".$timmakh);

        }else {
            giaiPhongBoNho($link, true);
            echo "lỗi rồi !!!";
        }
    
            
?>