<div class="container-fluid">
        <div class="row">
            <a class="logo col-6">
                <img src="/abbank/images/logo.png" height="70" width="300" style="padding: 10px;"></a>
                <?php
                if (!isset($_SESSION['ma_ns'])){
                    echo " 
                    </div>
                    <div class='container-fluid' style='margin-top:2rem;'>
                        Xin chào, hãy<a class='login col' href='/abbank/views/login.php'>đăng nhập</a>để tiếp tục</div>
                    ";
                } else {
                $result = chayTruyVanTraVeDL($link, " select * from nhan_su where ma_ns = '{$_SESSION['ma_ns']}' ");
                $ns = mysqli_fetch_assoc($result);
                echo"    
                <div class='align-self-center col-3'>Xin chào, ".$ns['ten_ns']."</div>
                <a class='align-self-center col-3' href='/abbank/views/logout.php'>Đăng xuất</a>          
        </div>
        

    <div class='row' style=' background-color:#00aaad;'>
        <nav class='navbar navbar-expand-lg' >
            <a class='nav-link' href='/abbank/views/index.php'>Trang chủ</a> ";
        if ($ns['role'] == 'dvkd') {echo"
            <a class='nav-link' href='/abbank/views/soan.php'>Soạn, trình hồ sơ</a>
            <a class='nav-link' href='/abbank/views/xulydvkd.php'>Tiến trình xử lý</a>
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Quản lý khách hàng
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/dskh.php'>Danh sách khách hàng</a>
                    <a class='dropdown-item' href='/abbank/views/taokh.php'>Tạo khách hàng mới</a>
                </div>
            </div>
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Tài khoản của tôi
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/dmk.php'>Đổi mật khẩu</a>
                    <a class='dropdown-item' href='/abbank/views/dsyc.php'>Gửi yêu cầu thay đổi</a>
                </div>
            </div>
        </div>            
            
        ";} else if ($ns['role'] == 'admin') {echo"
            <a class='nav-link' href='/abbank/views/dshs.php'>Quản lý hồ sơ</a>
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Quản lý tài khoản
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/dstk.php'>Danh sách tài khoản</a>
                    <a class='dropdown-item' href='/abbank/views/taotk.php'>Tạo tài khoản mới</a>
                </div>
            </div>
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Quản lý danh mục
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/qlymien.php'>Quản lý danh mục miền</a>
                    <a class='dropdown-item' href='/abbank/views/qlycum.php'>Quản lý danh mục cụm</a>
                    <a class='dropdown-item' href='/abbank/views/qlydvkd.php'>Quản lý danh mục ĐVKD</a>
                </div>
            </div>
            <a class='nav-link' href='/abbank/views/dskh.php'>Danh sách khách hàng</a>
            <a class='nav-link' href='/abbank/views/qlyyc.php'>Quản lý yêu cầu</a>

            ";} else if ($ns['role'] == 'cvdp') {echo" 
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Điều phối nhân sự
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/dptd.php'>Chuyên viên TĐTD</a>
                    <a class='dropdown-item' href='/abbank/views/dppd.php'>Cấp phê duyệt</a>
                </div>
            </div>
            <a class='nav-link' href='/abbank/views/dshs.php'>Quản lý hồ sơ</a>
            <div class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Tài khoản của tôi
                </a>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='/abbank/views/dmk.php'>Đổi mật khẩu</a>
                    <a class='dropdown-item' href='/abbank/views/dsyc.php'>Gửi yêu cầu thay đổi</a>
                </div>
            </div>
            ";} else if ($ns['role'] == 'cpd') {echo" 
                <a class='nav-link' href='/abbank/views/xulycpd.php'>Quản lý hồ sơ</a>
                <div class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                        Tài khoản của tôi
                    </a>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                        <a class='dropdown-item' href='/abbank/views/dmk.php'>Đổi mật khẩu</a>
                        <a class='dropdown-item' href='/abbank/views/dsyc.php'>Gửi yêu cầu thay đổi</a>
                    </div>
                </div>
            ";} else echo"
                <a class='nav-link' href='/abbank/views/xulycvtd.php'>Xử lý hồ sơ</a>
                <div class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                        Tài khoản của tôi
                    </a>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                        <a class='dropdown-item' href='/abbank/views/dmk.php'>Đổi mật khẩu</a>
                        <a class='dropdown-item' href='/abbank/views/dsyc.php'>Gửi yêu cầu thay đổi</a>
                    </div>
                </div>
        
        </nav>
    </div>
     ";}?>
    <br style="clear: both;" />

    </div>