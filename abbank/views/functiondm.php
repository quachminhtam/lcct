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

function suadvkd($link, $ma_dvkd, $ten_dvkd, $ma_cum){
    chayTruyVanKhongTraVeDL($link, "UPDATE dvkd SET ma_dvkd='".$ma_dvkd."', ten_dvkd ='".$ten_dvkd."', ma_cum ='".$ma_cum."'  WHERE  ma_dvkd = '".$ma_dvkd."' ");
}

?>