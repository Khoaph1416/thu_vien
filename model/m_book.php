<?php 
// xử lý dl trong csdl
include_once 'm_pdo.php';
function book_getNew($limit){
    return pdo_query("SELECT * FROM sach ORDER BY MaSach DESC LIMIT $limit");
}
function book_getPin($limit){
    return pdo_query("SELECT * FROM sach WHERE GhimTrangChu = 1 LIMIT $limit");
}
function book_getMostViewed($limit){
    return pdo_query("SELECT * FROM sach  ORDER BY LuotDoc DESC LIMIT $limit");
}
function book_getById($id){
    return pdo_query_one("SELECT * FROM sach s INNER JOIN chude cd ON S.MaCD = cd.MaCD WHERE s.MaSach = ?", $id);
}
function book_getRanDomByCategory($id){
    return pdo_query(" SELECT * FROM sach Where MaCD = $id Order by rand()  limit 4");
}
function book_getByCategory($id){
    return pdo_query(" SELECT * FROM sach Where MaCD = $id");
}
function book_search($keyword, $page=1){
    $batdau = ($page - 1)*8;
    //1 trang 8 cuốn
    //trang 1 lấy từ 0 
    //trang 2 lấy từ 8
    //trang n lấy từ (n-1)*8
    return pdo_query(" SELECT * FROM sach Where TuaSach like '%$keyword%' limit $batdau,8");
}
function book_searchTotal($keyword){
    return pdo_query_value("SELECT COUNT(*) FROM sach Where TuaSach like '%$keyword%'");
}
function book_decreaseAmount($MaSach){
    pdo_execute("UPDATE sach SET SoLuong = SoLuong - 1
    where MaSach=?",$MaSach);
}
function book_increaseAmount($MaSach){
    pdo_execute("UPDATE sach SET SoLuong = SoLuong + 1
    where MaSach=?",$MaSach);
}
function history_getAllByAccount($MaTK){
    return pdo_query("SELECT * from lichsu where MaTK=?",$MaTK);
}
function book_count(){
    return pdo_query_value("SELECT count(*) from sach");
}
?>