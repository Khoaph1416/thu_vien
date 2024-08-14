<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            //xữ lý dữ liệu
           include_once 'model/m_book.php';
           $dsMoi = book_getNew(4);
           $dsGhim = book_getPin(4);
         
            //hiển thị dữ liệu
            $view_name ='page_home'; 
            break;
            case 'cart':
                //lấy dũ liệu
                if (!isset($_SESSION['user'])) {
                    $_SESSION['loi'] = 'Bạn cần đăng nhập để vào giỏ hàng!';
                    header('location: '.$base_url.'user/login');
                    return;
                }
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if ($GioSach) {
                    $ctGioSach = history_getCart($MaTK);
                }
                else {
                    $ctGioSach = [];
                }
                //hiển thị dữ liệu
                $view_name = 'page_cart';
                break;
            case 'history':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $dsLichSu = history_getAllByAccount($MaTK);
                $view_name = 'page_history';
                break;
        default:
            # code...
            break;
    }include_once 'view/v_user_layout.php';
}
?>