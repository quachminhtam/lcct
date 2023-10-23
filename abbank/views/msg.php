<?php
    if(isset($_GET['msg'])) {
        if($_GET['msg']=="success"){
            echo " <div class='msg' style='background-color:green; color:white;'>
                    Tạo mới thành công ! 
                    </div> ";
        }else if($_GET['msg']=="unvalidate-data") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Vui lòng kiểm tra dữ liệu nhập vào !      
                    </div> ";
        }else if($_GET['msg']=="duplicate") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Đã tồn tại !      
                    </div> ";
        }else if($_GET['msg']=="login-fail") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng kiểm tra lại!      
                    </div> ";
        }else if($_GET['msg']=="xuly-fail") {
            echo " <div class='msg' style='background-color:orange; color:white;'>
                    Hãy đăng nhập để sử dụng chức năng này!      
                    </div> ";
        }else if($_GET['msg']=="miss-info") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Vui lòng nhập đủ các trường thông tin!      
                    </div> ";
        }else if($_GET['msg']=="done") {
            echo " <div class='msg' style='background-color:green; color:white;'>
                    Đổi mật khẩu thành công!      
                    </div> ";
        }else if($_GET['msg']=="wrongpw") {
            echo " <div class='msg' style='background-color:orange; color:white;'>
                    Mật khẩu cũ sai!      
                    </div> ";
        }else if($_GET['msg']=="add") {
            echo " <div class='msg' style='background-color:green; color:white;'>
                    Thêm mới thành công!      
                    </div> ";
        }else if($_GET['msg']=="request") {
            echo " <div class='msg' style='background-color:green; color:white;'>
                    Gửi yêu cầu thành công!      
                    </div> ";
        }else if($_GET['msg']=="cancel") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Không thể xóa!      
                    </div> ";
        }else if($_GET['msg']=="delete") {
            echo " <div class='msg' style='background-color:orange; color:white;'>
                    Xóa thành công!      
                    </div> ";
        };
    }
?>
