<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            //xữ lý dữ liệu
            include_once 'model/m_user.php';
            if (isset($_POST['SoDienThoai']) && isset($_POST['MatKhau'])) {
                $kq =  user_login($_POST['SoDienThoai'],$_POST['MatKhau']);
                if ($kq) {
                    //đúng đăng nhập thành công
                    $_SESSION['user'] = $kq;
                    header('location: '.$base_url.'page/home');
                }
                else{
                    $_SESSION['loi'] = 'Số điện thoại hoặc mật khẩu không đúng!';
                }
            }
           
            //hiển thị dữ liệu
            $view_name ='user_login'; 
            break;
        case 'logout':
           unset($_SESSION['user']);
           header('location: '.$base_url.'page/home');
            break;
        
        default:
            # code...
            break;
    }include_once 'view/v_user_layout.php';
}
?>