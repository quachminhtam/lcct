<?php
function luuhs($link, $ma_kh, $ma_loai_sp, $ma_tien, $so_tien, $tsdb, $gt_tsdb, $muc_dich){
    chayTruyVanKhongTraVeDL($link, "insert into hs_td values ('NULL',
                                                                '".mysqli_real_escape_string($link, $ma_kh)."',
                                                                '".$ma_loai_sp."',
                                                                '".mysqli_real_escape_string($link, $ma_tien)."',
                                                                '".$so_tien."',
                                                                '".mysqli_real_escape_string($link, $tsdb)."',
                                                                '".$gt_tsdb."',
                                                                '".mysqli_real_escape_string($link, $muc_dich)."'
                                                                )"
    );
}

function ttsoan($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'soan', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttrinh($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'dieuthamdinh', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ttxoa($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'xoa', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function dptd($link, $ma_hs, $ma_ns){
    chayTruyVanKhongTraVeDL($link, "insert into dieu_phoi values ('NULL', '".$ma_hs."', '".$ma_ns."', 'thamdinh' )"
    );
}

function ttchotd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'thamdinh', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'dieupheduyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttra($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'tra', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function dppd($link, $ma_hs, $ma_ns){
    chayTruyVanKhongTraVeDL($link, "insert into dieu_phoi values ('NULL', '".$ma_hs."', '".$ma_ns."', 'pheduyet' )"
    );
}

function ttchopd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'pheduyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ttduyet($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'duyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tthuy($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values ('NULL', '".$ma_hs."', 'huy', '".$ma_ns."', '".$thoi_gian."' )"
    );
}
?>