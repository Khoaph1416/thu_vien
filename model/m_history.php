<?php 
// xử lý dl trong csdl
include_once 'm_pdo.php';

function history_hasCart($MaTK){
    return pdo_query_one("SELECT * from lichsu where MaTK=? and TrangThai=?",$MaTK,'gio-sach');
}
function history_add($MaTK){
    pdo_execute("INSERT INTO lichsu(`MaTK`,`NgayMuon`,`NgayTra`,`TrangThai`) values(?,?,?,?)", $MaTK, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), 'gio-sach');
}
function history_addToCart($MaLS, $MaSach){
    pdo_execute("INSERT INTO chitietlichsu(`MaLS`,`MaSach`) values(?,?)", $MaLS, $MaSach);
}
function history_getCart($MaTK){
   return pdo_query("SELECT * from lichsu ls 
   INNER JOIN chitietlichsu ct on ls.MaLS  = ct.MaLS 
   INNER JOIN sach s on ct.MaSach = s.MaSach 
   where ls.MaTk=? and ls.TrangThai=?", $MaTK, 'gio-sach');
}
function history_removeFromCart($MaLS, $MaSach){
    pdo_execute("DELETE from chitietlichsu where MaLS=? and MaSach=?",$MaLS,$MaSach);
}
function history_removeCart($MaLS){
    pdo_execute("DELETE from chitietlichsu where MaLS=?",$MaLS);
}
function history_updateCart($MaLS, $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai){
    pdo_execute("UPDATE lichsu set NgayMuon=? ,NgayTra=?, SoSachMuon=?,
    TongTien=?, TrangThai=? where MaLS=?", $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai, $MaLS);
}
function history_count(){
    return pdo_query_value("SELECT count(*) from lichsu");
}
function history_stat(){
    return pdo_query("SELECT YEAR(NgayTra) AS Nam, MONTH(NgayTra) AS Thang, 
    COUNT(DISTINCT MaTK) AS SoBanDoc, COUNT(MaLS) AS SoLuotMuon, 
    SUM(SoSachMuon) as SoSachMuon, SUM(TongTien) AS DoanhThu
    FROM lichsu GROUP BY YEAR(NgayTra), MONTH(NgayTra)");
}

?>