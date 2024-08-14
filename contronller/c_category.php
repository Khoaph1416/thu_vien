<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':
            //xữ lý dữ liệu
           include_once 'model/m_book.php';
           include_once 'model/m_category.php';
           $ctChuDe = category_getById($_GET['id']);
           $dsSachCungChuDe = book_getByCategory($_GET['id']);
            //hiển thị dữ liệu 
            $view_name ='category_detail'; 
            break;
        
        default:
            # code...
            break;
    }include_once 'view/v_user_layout.php';
}
?>