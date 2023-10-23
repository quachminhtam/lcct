<?php 
    session_start();

    require_once ('../module/db_module.php');
    require_once ('users.php');

    $link = NULL;
    taoKetNoi($link);

    if(isset($_POST['ma_ns']) && isset($_POST['password'])) {
        if (dangnhap($link, $_POST["ma_ns"], $_POST["password"])) {
            giaiPhongBoNho($link, true);
            header("Location: /abbank/views/index.php");
        }else {
            giaiPhongBoNho($link, true);
            header("Location: login.php?msg=login-fail");
        }
    }
?>