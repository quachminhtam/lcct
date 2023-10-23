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
    <script src="/abbank/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>

	<div class="container-fluid">
        <div class="row">
            <a class="logo col-6">
                <img src="/abbank/images/logo.png" height="70" width="300" style="padding: 10px;"></a>
            <div class="align-self-center col-3">Xin chào</div>
        </div>

    <?php require_once "msg.php" ?>
    <form action="xulydangnhap.php" method="post" class="form">
        <h1 style="text-align:center; padding:5px; color:#00aaad; font-size:30px">Đăng nhập</h1>
        
        <div class="frm_row">
            <div class="cls_caption">Mã nhân viên</div>
            <div class="cls_input"><input type="text" name="ma_ns" /></div>
        </div><br style="clear: both;" />
        
        <div class="frm_row">
        <div class="cls_caption">Mật khẩu</div>
            <div class="cls_input"><input type="password" name="password" /></div>    
        </div><br style="clear: both;" />
        
        <div class="img_row">
            <input type="submit" value="Đăng nhập" />
        </div>

    </form>
    

</body>
</html>