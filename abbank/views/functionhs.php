<?php
function luuhs($link, $ma_kh, $ma_sp, $ma_tien, $so_tien, $tsdb, $gt_tsdb, $muc_dich){
    chayTruyVanKhongTraVeDL($link, "insert into hs_td values (NULL,
                                                                '".mysqli_real_escape_string($link, $ma_kh)."',
                                                                '".$ma_sp."',
                                                                '".mysqli_real_escape_string($link, $ma_tien)."',
                                                                '".$so_tien."',
                                                                '".mysqli_real_escape_string($link, $tsdb)."',
                                                                '".$gt_tsdb."',
                                                                '".mysqli_real_escape_string($link, $muc_dich)."'
                                                                )"
    );
}

function update($link, $ma_hs, $ma_tien, $so_tien, $tsdb, $gt_tsdb, $muc_dich){
    chayTruyVanKhongTraVeDL($link, "update hs_td set ma_tien = '".mysqli_real_escape_string($link, $ma_tien)."',
                                                     so_tien = '".$so_tien."',
                                                        tsdb = '".mysqli_real_escape_string($link, $tsdb)."',
                                                     gt_tsdb = '".$gt_tsdb."',
                                                    muc_dich = '".mysqli_real_escape_string($link, $muc_dich)."'
                                    where ma_hs = '".$ma_hs."' "
    );
}

function ttsoan($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'soan', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ttsua($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'sua', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttrinh($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'dieuthamdinh', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ttxoa($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'xoa', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function dptd($link, $ma_hs, $ma_ns){
    chayTruyVanKhongTraVeDL($link, "insert into dieu_phoi values (NULL, '".$ma_hs."', '".$ma_ns."', 'thamdinh' )"
    );
}

function ttchotd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'thamdinh', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'dieupheduyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function tttra($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'tra', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function yctra($link, $ma_ns, $yeu_cau, $noi_dung){
    chayTruyVanKhongTraVeDL($link, "insert into yeu_cau values (NULL, '".$ma_ns."' , 
                                                                '".mysqli_real_escape_string($link, $yeu_cau)."' , 
                                                                '".mysqli_real_escape_string($link, $noi_dung)."' ,
                                                                'NULL',
                                                                '2')");
}

function dppd($link, $ma_hs, $ma_ns){
    chayTruyVanKhongTraVeDL($link, "insert into dieu_phoi values (NULL, '".$ma_hs."', '".$ma_ns."', 'pheduyet' )"
    );
}

function ttchopd($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'pheduyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ttduyet($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'duyet', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ycduyet($link, $ma_ns, $ma_hs){
    chayTruyVanKhongTraVeDL($link, "insert into yeu_cau values (NULL, '".$ma_ns."' , 
                                                                'Hồ sơ ".$ma_hs." ' , 
                                                                'Hồ sơ đã được duyệt' ,
                                                                'NULL',
                                                                '2')");
}

function tthuy($link, $ma_hs, $ma_ns, $thoi_gian){
    chayTruyVanKhongTraVeDL($link, "insert into ls_gd values (NULL, '".$ma_hs."', 'huy', '".$ma_ns."', '".$thoi_gian."' )"
    );
}

function ychuy($link, $ma_ns, $ma_hs){
    chayTruyVanKhongTraVeDL($link, "insert into yeu_cau values (NULL, '".$ma_ns."' , 
                                                                'Hồ sơ ".$ma_hs." ' , 
                                                                'Hồ sơ không được duyệt' ,
                                                                'NULL',
                                                                '2')");
}
?>