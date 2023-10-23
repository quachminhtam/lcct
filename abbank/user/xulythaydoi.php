<?php 
    
session_start();

require_once '../module/db_module.php';
require_once 'users.php';


$link = NULL;
taoKetNoi($link);

if(isset($_POST['dmk'])) {
    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns={$_SESSION['ma_ns']}");
    $row = mysqli_fetch_row($result);
    $pw = $row['password'];
    $valid = $_POST['new_pw']==$_POST['new_pw2'];
    if ($valid) {
        if ($pw !== $_POST['password']){
            giaiPhongBoNho($link, true);
            header("Location: profile.php?msg=wrongpw");
        }else {
            doimk($link, $_POST['new_pw'], $_SESSION['ma_ns']);
            giaiPhongBoNho($link, true);
            header("Location: profile.php?msg=done");
        }
    }else {
        giaiPhongBoNho($link, true);
        header("Location: signin.php?msg=unvalidate-data&user");
    }
}

?>