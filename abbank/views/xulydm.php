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

    $link = NULL;
    taoKetNoi($link);
    $timmamien = $_GET['id'];
    $timmacum = $_GET['id'];
    $timmadvkd = $_GET['id'];


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
        suadvkd($link, $_POST['ma_dvkd'], $_POST['ten_dvkd'], $_POST['ma_cum']);
        giaiPhongBoNho($link, true);
        header("Location: xemdvkd.php?id=".$_POST['ma_dvkd']);

    } else if(isset($_POST['suacum'])){
        suacum($link, $timmacum, $_POST['ten_cum']);
        giaiPhongBoNho($link, true);
        header("Location: xemcum.php?id=".$timmacum);

    } else if(isset($_POST['xoadvkd'])){
        xoadvkd($link, $timmadvkd);
        giaiPhongBoNho($link, true);
        header("Location: qlydvkd.php");
    
    } else if(isset($_POST['xoacum'])){
        xoacum($link, $timmacum);
        giaiPhongBoNho($link, true);
        header("Location: qlydvkd.php");

        }else {
            giaiPhongBoNho($link, true);
            echo "lỗi rồi !!!";
        }
    
            
?>