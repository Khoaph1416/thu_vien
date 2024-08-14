<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'dashboard':
            //xữ lý dữ liệu
            include_once 'model/m_book.php';
            include_once 'model/m_user.php';
            include_once 'model/m_category.php';
            include_once 'model/m_history.php';
            $tkSach = book_count();
            $tkBanDoc = user_count();
            $tkChuDe = category_count();
            $tkLuotMuon = history_count();
            $tkSachTheoChuDe = category_satatByBook();
            $tkDoanhThu = history_stat();
            //hiển thị dữ liệu
            $view_name ='admin_dashboard'; 
            break;
        case 'user':
            //xữ lý dữ liệu
            include_once 'model/m_user.php';
            $dsTK = user_getAll();
            //hiển thị dữ liệu
            $view_name ='admin_user'; 
            break;
        case 'user-add':
            //xữ lý dữ liệu
            include_once 'model/m_user.php';
            if (isset($_POST['submit'])) {
                $SoDienThoai = $_POST['SoDienThoai'];
                $HoTen = $_POST['HoTen'];
                $ViTien = $_POST['ViTien'];
                $Quyen = $_POST['Quyen'];
                $kq = user_checkPhone($SoDienThoai);
                if ($kq) {
                      $_SESSION['loi']='Không thể tạo tài khoản với số điện thoại <strong>'.$SoDienThoai.'</strong>.' ;
                }
                else {// sai, ko trùng thêm tài khoản
                    $MatKhau = 12345;
                    $HinhAnh = 'default.png';
                    user_add($SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen, $HinhAnh);
                    $_SESSION['thongbao'] ='Đã tạo tài khoản với số điện thoại <strong>'.$SoDienThoai.'</strong> và mật khẩu là<strong>'.$MatKhau.'</strong>.';
                  }
            }
            //hiển thị dữ liệu
            $view_name ='admin_user_add'; 
            break;

        case 'user-edit':
            //xữ lý dữ liệu
            include_once 'model/m_user.php';
            $MaTK = $_GET['id'];
            if (isset($_POST['submit'])) {
                $SoDienThoai = $_POST['SoDienThoai'];
                $HoTen = $_POST['HoTen'];
                $ViTien = $_POST['ViTien'];
                $Quyen = $_POST['Quyen'];
                $kq = user_checkPhone($SoDienThoai);
                if ($kq && $kq['MaTK']!=$MaTK) {
                        $_SESSION['loi']='Đã tồn tại số điện thoại <strong>'.$SoDienThoai.'</strong>.' ;
                }
                else {// sai, ko trùng, Sửa tài khoản
                    $MatKhau = 12345;
                    $HinhAnh = 'default.png';
                    user_edit($MaTK, $SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen);
                    $_SESSION['thongbao'] ='Thay đổi thành công';
                    }
            }
            $tk = user_getById($MaTK);
            //hiển thị dữ liệu
            $view_name ='admin_user_edit'; 
            break;
            case 'user-delete':
                include_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('location: '.$base_url.'admin/user');
            break;
        case 'category':
            //xữ lý dữ liệu
            
            //hiển thị dữ liệu
            $view_name ='admin_category'; 
            break;
        case 'book':
            //xữ lý dữ liệu
            
            //hiển thị dữ liệu
            $view_name ='admin_book'; 
            break;
        case 'history':
            //xữ lý dữ liệu
            
            //hiển thị dữ liệu
            $view_name ='admin_history'; 
            break;
                 case 'history':
            //xữ lý dữ liệu
            
            //hiển thị dữ liệu
            $view_name ='admin_history'; 
            break;
        default:
            # code...
            break;
    }include_once 'view/v_admin_layout.php';
}
?>