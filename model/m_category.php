<?php 

    // xử lý dl trong csdl
    include_once 'm_pdo.php';
    function category_getAll(){
        return pdo_query("SELECT * FROM chude");
    }

    function category_getById($id){
        return pdo_query_one("SELECT * from chude where MaCD = ? ",$id);
    }

    function category_count(){
        return pdo_query_value("SELECT count(*) from chude");
    }

    function category_satatByBook(){
        return pdo_query("SELECT cd.MaCD, cd.TenChuDe, count(s.MaSach) as SoLuong,
        AVG(s.GiaTri) as TrungBinh, min(GiaTri) as ThapNhat, max(s.GiaTri) as CaoNhat
        FROM chude cd left join sach s on cd.MaCD = s.MaCD group by cd.MaCD, cd.TenChuDe");
    }

?>