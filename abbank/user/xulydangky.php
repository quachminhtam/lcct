<?php 
    
session_start();

require_once '../module/db_module.php';
require_once 'users.php';


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
            dangky($link, $_POST['ma_ns'], $_POST['ten_ns'], $_POST['role'],  $_POST['ma_dvkd'],  $_POST['password']);
            giaiPhongBoNho($link, true);
            header("Location: taotk.php?msg=done");
        }
    }else {
        giaiPhongBoNho($link, true);
        header("Location: taotk.php?msg=unvalidate-data&user=".$_POST['ma_ns']);
    }


?>