<?php 
//điều hướng đến các contronller
include_once 'config.php';
include_once 'model/m_book.php';
include_once 'model/m_category.php';
$dsDocNhieu = book_getMostViewed(6);
$dsChuDe = category_getAll();
if(isset($_GET['mod'])){
    //print_r($_REQUEST);
    switch ($_GET['mod']) {
        case 'page':
            $ctrl_name ='page';
            break;
        case 'user':
          $ctrl_name ='user';
            break;
        case 'book':
          $ctrl_name ='book';
            break;
        case 'category':
          $ctrl_name ='category';
            break;
          case 'admin':
            $ctrl_name ='admin';
              break;
      
        default:
            # code...
            break;
    }
        include_once 'contronller/c_'.$ctrl_name.'.php';
}
else {
  // chuyển về trang chủ
  header('location: page/home');
}
?>