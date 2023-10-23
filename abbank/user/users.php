<?php 
function dangky($link, $ma_ns, $ten_ns, $role, $ma_dvkd, $password){
    chayTruyVanKhongTraVeDL($link, "insert into nhan_su values ('".$ma_ns."',
                                                                '".mysqli_real_escape_string($link, $ten_ns)."',
                                                                '".$role."',
                                                                '".$ma_dvkd."',
                                                                '".$password."'
                                                                )"
    );
}

function dangnhap($link, $ma_ns, $password,){
    $result = chayTruyVanTraVeDL($link, "select * from nhan_su where ma_ns='".($ma_ns)."'                                                                
                                                                            and password='".($password)."'");
    $row = mysqli_fetch_array($result);
    mysqli_free_result($result);
    if ($row==NULL)
    return false;
    if (count($row)>0) {
        $_SESSION['ma_ns'] = $row['ma_ns'];
        return true;
    }else
        return false;                                                                        
}

function dangxuat(){
    if(isset($_SESSION['ma_ns'])){
        unset($_SESSION['ma_ns']);
        return true;
    }else
        return false;
}

function doimk($link, $new_pw, $ma_ns){
    chayTruyVanKhongTraVeDL($link, "UPDATE nhan_su SET password = '".$new_pw."' where ma_ns = '".$ma_ns."' ");
}
?>