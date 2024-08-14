<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':
            //xữ lý dữ liệu
           include_once 'model/m_book.php';
           $ctSach = book_getById($_GET['id']);
           $dsNgauNhienCungChuDe = book_getRanDomByCategory($ctSach['MaCD']);
           include_once 'model/m_comment.php';
           $dsCamNghi = comment_getByBook($_GET['id']);
            //hiển thị dữ liệu
            $view_name ='book_detail'; 
            break;
        case 'search':
            if (isset($_POST['keyword'])) {
                header("location: ".$base_url."book/search/".$_POST['keyword']);
            }
            //xữ lý dữ liệu
            include_once 'model/m_book.php';
            $page =1;
            if (isset($_GET['page'])) {
                $page = ($_GET['page']);
            }            
            $ketquaTimKiem = book_search($_GET['keyword'], $page);
            $sotrang = ceil(book_searchTotal($_GET['keyword'])/8);
            $view_name ='book_search';
            break;
        case 'addToCart':
            if (!isset($_SESSION['user'])) {
                $_SESSION['loi'] = 'Bạn cần đăng nhập để mượn sách!';
                header('location: '.$base_url.'user/login');
                return;
            }
             $MaSach = $_GET['id'];
             $MaTK = $_SESSION['user']['MaTK'];
             try {
                //kiểm tra giỏ hàng
                include_once 'model/m_history.php';
                $kq = history_hasCart($MaTK);
                if ($kq) {
                 //đúng, dã có giỏ sách, thêm sách vào
                 history_addToCart($kq['MaLS'], $MaSach);
                }
                else {
                    //sai, chưa có giỏ sách
                    // print_r($MaTK);
                    // return;
                    history_add($MaTK);
                    $kq = history_hasCart($MaTK);
                    history_addToCart($kq['MaLS'], $MaSach);
                }
                $_SESSION['thongbao'] = 'Đã thêm sách vào giỏ';
             } catch (\Throwable $th) {
                $_SESSION['loi'] = 'Sách này đã có trong giỏ';
             }
            
             header('location: '.$base_url.'book/detail/'.$MaSach);
            break;
            case 'removeFromCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSach = $_GET['id'];
                $GioSach = history_hasCart($MaTK);
                if ($GioSach) {
                    history_removeFromCart($GioSach['MaLS'],$MaSach);
                }
                header('location: '.$base_url.'page/cart');
                break;
            case 'removeCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if ($GioSach) {
                    history_removeCart($GioSach['MaLS']);
                }
                header('location: '.$base_url.'page/cart');
                break;
            case 'updateCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if ($GioSach) {
                    $NgayMuon = date_format(date_create($_POST['NgayMuon']),"Y-m-d H:i:s");
                    $NgayTra = date_format(date_create($_POST['NgayTra']),"Y-m-d H:i:s");
                    // print_r($NgayMuon);return;
                    $SoSachMuon = $_POST['SoSachMuon'];
                    $TongTien = $_POST['TongTien'];
                    $TrangThai = 'chuan-bi';
                    
                    include_once 'model/m_book.php';
                    $ctGioSach = history_getCart($MaTK);
                    foreach ($ctGioSach as $sach) {
                        book_decreaseAmount($sach['MaSach']);
                    }

                    history_updateCart($GioSach['MaLS'], $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai);
                    $_SESSION['thongbao']='Yêu cầu mượn sách của bạn đã được tiếp nhận!';
                }
                header('location: '.$base_url.'page/cart');
                break;
            case 'comment':
                include_once 'model/m_comment.php';
                comment_add($_SESSION['user']['MaTK'], $_POST['MaSach'], $_POST['NoiDung']);
                header("location: ".$base_url."book/detail/".$_POST['MaSach']);
                break;
        default:
            # code...
            break;
    }include_once 'view/v_user_layout.php';
}
?>