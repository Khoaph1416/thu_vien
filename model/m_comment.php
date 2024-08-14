<?php 

    // xử lý dl trong csdl
    include_once 'm_pdo.php';
    function comment_add($MaTK, $MaSach, $NoiDung){
        pdo_execute("INSERT into camnghi(`MaTK`, `MaSach`,`NoiDung`)
        values(?,?,?)",$MaTK, $MaSach, $NoiDung);
    }
    include_once 'm_pdo.php';
    function comment_getByBook($MaSach){
     return   pdo_query("SELECT * FROM camnghi cn INNER JOIN taikhoan tk on cn.MaTK = tk.MaTK
        where cn.MaSach=?",$MaSach);
    }

?>