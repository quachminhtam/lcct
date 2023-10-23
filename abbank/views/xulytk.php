<?php 
    
session_start();

require_once '../module/db_module.php';
require_once 'functiontk.php';


function existUser($link, $ma_ns){
    $result = chayTruyVanTraVeDL($link, "select count(*) from nhan_su where ma_ns='".$ma_ns."'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $row[0]>0;
}

$link = NULL;
taoKetNoi($link);

    if(isset($_POST['taotk'])) {
        if (existUser($link, $_POST['ma_ns'])){
            giaiPhongBoNho($link, true);
            header("Location: taotk.php?msg=duplicate&user=".$_POST['ma_ns']);
        }else {
            dangky($link, $_POST['ma_ns'], $_POST['ten_ns'], $_POST['role'],  $_POST['ma_dvkd']);
            giaiPhongBoNho($link, true);
            header("Location: taotk.php?msg=success");
        }

    } else if(isset($_POST['dangnhap'])) {
        if (dangnhap($link, $_POST["ma_ns"], $_POST["password"])) {
            giaiPhongBoNho($link, true);
            header("Location: index.php");
        }else {
            giaiPhongBoNho($link, true);
            header("Location: login.php?msg=login-fail");
        }

    }else if(isset($_POST['chuyendvkd'])){
        $timmans = $_GET['id'];
        chuyendvkd($link, $_POST['madvkd'], $timmans);
        giaiPhongBoNho($link, true);
        header("Location: xemtk.php?id=".$timmans); 
        
    }else if(isset($_POST['chuyenrole'])){
        $timmans = $_GET['id'];
        chuyenrole($link, $_POST['role'], $timmans);
        giaiPhongBoNho($link, true);
        header("Location: xemtk.php?id=".$timmans);

    } else if(isset($_POST['dmk'])) {
        $result = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns='{$_SESSION['ma_ns']}'");
        $row = mysqli_fetch_assoc($result);
        $valid = $_POST['new_pw']==$_POST['new_pw2'];
        if ($valid) {
            if ($_POST['password'] != $row['password'] ){
                giaiPhongBoNho($link, true);
                header("Location: dmk.php?msg=wrongpw");
            } else {
                doimk($link, $_POST['new_pw'], $_SESSION['ma_ns']);
                giaiPhongBoNho($link, true);
                header("Location: dmk.php?msg=done");
            }
        } else {
            giaiPhongBoNho($link, true);
            header("Location: dmk.php?msg=unvalidate-data&user");
        }

    } else if(isset($_POST['capmk'])){
        $timmans = $_GET['id'];
        capmk($link, $timmans);
        giaiPhongBoNho($link, true);
        header("Location: xemtk.php?id=".$timmans);

    }else {
        giaiPhongBoNho($link, true);
        echo "lỗi rồi !!!";
    }

?>