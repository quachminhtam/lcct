<?php
function taoyc($link, $ma_ns, $yeu_cau, $noi_dung){
    chayTruyVanKhongTraVeDL($link, "insert into yeu_cau values (NULL, '".$ma_ns."' , 
                                                                '".mysqli_real_escape_string($link, $yeu_cau)."' , 
                                                                '".mysqli_real_escape_string($link, $noi_dung)."' ,
                                                                '',
                                                                '0')");
}

function xlyc($link, $phan_hoi, $stt){
    chayTruyVanKhongTraVeDL($link, "update yeu_cau set phan_hoi = '".mysqli_real_escape_string($link, $phan_hoi)."' ,
                                                     trang_thai = '1'  where stt = '".$stt."' ");
}

function capmk($link, $ma_ns, $noi_dung){
    chayTruyVanKhongTraVeDL($link, "insert into yeu_cau values (NULL,
                                                                '".mysqli_real_escape_string($link, $ma_ns)."',
                                                                'CẤP LẠI MẬT KHẨU' , 
                                                                '".mysqli_real_escape_string($link, $noi_dung)."' ,
                                                                '',
                                                                '0')");
}
?>