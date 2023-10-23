<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$mamien = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LCCT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/abbank/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script  src="/abbank/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include ("header.php");
    ?>
   <div class='container-fluid' style='margin: 2rem 4rem;'>
        <?php
        $result = chayTruyVanTraVeDL($link, "select * from mien where ma_mien = {$mamien} ");
        $row = mysqli_fetch_assoc($result);
        echo"
            <p style='font-size:20px'>Tên miền:  ".$row['ten_mien']."</p>
            <p style='font-size:20px'>Mã miền:  ".$row['ma_mien']."</p>
        ";
    ?>
    </div>

    <div class='container-fluid'>
        <table class='table table-bordered'>
                    <thead>
                        <tr>
                        <th scope='col'>STT</th>
                        <th scope='col'>Mã cụm</th>
                        <th scope='col'>Tên cụm</th>
                        <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            $result = chayTruyVanTraVeDL($link, "select * from cum_dvkd where ma_mien = {$mamien} ");
            $stt=0;
            while ($cum = mysqli_fetch_assoc($result)) {
                $stt +=1;
                echo " 
                <tr>
                        <td>".sprintf("%02d", $stt)."</td>
                        <td>".$cum['ma_cum']." </td>
                        <td>".$cum['ten_cum']."</td>
                        <td> <a href='xemcum.php?id=".$cum['ma_cum']."'>  <input type='button' value='xem'> </td> 
                </tr> 
                ";}
            ;
            ?>
            </tbody>
        </table>
    </div>

    <?php
        echo"
        <form action=xulydm.php?id=".$mamien." method='post'>
    ";?>
    <div class='container-fluid' style='margin-bottom: 2rem;'>
        <!-- Button trigger modal -->
        <button type='button' class='btn btn-x' data-toggle='modal' data-target='#themcum'>Thêm cụm ĐVKD</button> 
    </div>

        <!-- Modal thêm-->
    <div class="modal fade" id="themcum" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="themLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="themLabel">Thêm mới cụm ĐVKD</h5>
                <button type="button" class="close align-self-center"  style="padding: 0;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">Mã cụm ĐVKD:</div>
                            <div class="col"> <input type="text" name="ma_cum" required/> </div>
                        </div>
                            
                        <div class="row">
                            <div class="col">Tên ĐVKD:</div>
                            <div class="col"> <input type="text" name="ten_cum" required/> </div>
                        </div>
                    </div>
                </div>
            </div>                    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary" name="themcum">Thêm mới</button>
            </div>
        </div>
    </div>
    </div>
    </form>
        
</body>
</html>