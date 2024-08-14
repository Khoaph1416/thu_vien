<?php 
// xử lý dl trong csdl
include_once 'm_pdo.php';
function user_login($phone, $pass){
    return pdo_query_one("SELECT * FROM taikhoan Where SoDienThoai=? and MatKhau=?",$phone, $pass);
}
function user_getAll(){
    return pdo_query("SELECT * from taikhoan");
}
function user_checkPhone($SoDienThoai){
    return pdo_query_one("SELECT * from taikhoan where SoDienThoai=?", $SoDienThoai);
}
function user_add($SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen, $HinhAnh){
    return pdo_execute("INSERT into taikhoan(`SoDienThoai`,`HoTen`, `MatKhau`, `ViTien`, `Quyen`, `HinhAnh`) values(?,?,?,?,?,?)", $SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen, $HinhAnh);
}
function user_getById($MaTK){
    return pdo_query_one("SELECT * from taikhoan where MaTK=?", $MaTK);
}
function user_edit($MaTK, $SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen){
    return pdo_execute("UPDATE taikhoan SET SoDienThoai=?, HoTen=?, MatKhau=?, ViTien=?, Quyen=? 
   where MaTK=?", $SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen, $MaTK);
}
function user_delete($MaTK){
    return pdo_execute("DELETE from taikhoan where MaTK=?", $MaTK);
}
function user_count(){
    return pdo_query_value("SELECT count(*) from taikhoan where Quyen=0");
}
?>