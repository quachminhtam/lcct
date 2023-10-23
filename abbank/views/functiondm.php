<?php

function themcum($link, $ma_cum, $ten_cum, $ma_mien){
    chayTruyVanKhongTraVeDL($link, "insert into cum_dvkd values ('".$ma_cum."', '".mysqli_real_escape_string($link, $ten_cum)."', '".$ma_mien."' )"
    );
}

function themdvkd($link, $ma_dvkd, $ten_dvkd, $ma_cum){
    chayTruyVanKhongTraVeDL($link, "insert into dvkd values ('".$ma_dvkd."', '".mysqli_real_escape_string($link, $ten_dvkd)."', '".$ma_cum."' )"
    );
}

function xoacum($link, $ma_cum){
    chayTruyVanKhongTraVeDL($link, "DELETE FROM cum_dvkd WHERE ma_cum = '".$ma_cum."' ");
}

function xoadvkd($link, $ma_dvkd){
    chayTruyVanKhongTraVeDL($link, "DELETE FROM dvkd WHERE ma_dvkd = '".$ma_dvkd."' ");
}

function suacum($link, $ma_cum, $ten_cum){
    chayTruyVanKhongTraVeDL($link, "UPDATE cum_dvkd SET ten_cum ='".$ten_cum."'  WHERE  ma_cum = '".$ma_cum."' ");
}

function suadvkd($link, $ma_dvkd, $ten_dvkd){
    chayTruyVanKhongTraVeDL($link, "UPDATE dvkd SET ten_dvkd ='".$ten_dvkd."'  WHERE  ma_dvkd = '".$ma_dvkd."' ");
}

function taokh($link, $ma_kh, $ten_kh, $ma_loai_kh, $ma_dvkd){
    chayTruyVanKhongTraVeDL($link, "insert into khach_hang values ('".$ma_kh."', 
                                                                    '".mysqli_real_escape_string($link, $ten_kh)."',
                                                                    '".$ma_loai_kh."',
                                                                    '".$ma_dvkd."')"
    );
}

function chuyendvkd($link, $ma_dvkd, $ma_kh){
    chayTruyVanKhongTraVeDL($link, "UPDATE khach_hang SET ma_dvkd='".$ma_dvkd."'  WHERE  ma_kh = '".$ma_kh."' ");
}
?>