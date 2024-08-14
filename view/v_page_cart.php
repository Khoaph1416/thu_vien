<h2>Giỏ hàng</h2>
<?php if(isset($_SESSION['thongbao'])):?>
        <div class="alert alert-success" role="alert">
    <?=$_SESSION['thongbao']?>
    </div>
<?php endif; unset($_SESSION['thongbao']);?>
<form action="<?=$base_url?>book/updateCart" method="post">
<input type="hidden" name="SoSachMuon" id="SoSachMuon">
<input type="hidden" name="TongTien" id="TongTien">
<div class="row">
    <div class="col-md-6">
        <div class="input-group flex-nowrap">
            <span class="input-group-text">Ngày dự kiến mượn</span>
            <input type="datetime-local" name="NgayMuon" id="NgayMuon" value="<?=$GioSach['NgayMuon']?>" class="form-control" onchange="tinhThanhTien()">
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group flex-nowrap">
            <span class="input-group-text">Ngày dự kiến trả</span>
            <input type="datetime-local" name="NgayTra" id="NgayTra" value="<?=$GioSach['NgayTra']?>" class="form-control" onchange="tinhThanhTien()">
        </div>
    </div>
    </div>
<table class="table text-center">
    <thead>
        <tr>
            <th>Ảnh</th>
            <th class="text-start" >Tựa sách</th>
            <th class="text-end" >Giá trị</th>
            <th class="text-end">Giá mượn</th>
            <th class="text-end">Thành tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ctGioSach as $item): ?>
            <tr>
                <td>
                    <img src="<?=$base_url?>upload/product/<?=$item['HinhAnh']?>" alt="" class="rounded-3" style="width:50px">
                </td>
                <td class="text-start"><?=$item['TuaSach']?></td>
                <td class="text-end"><?=$item['GiaTri']?>đ</td>
                <td class="text-end">
                    <!-- max(1000,500) =1000
                    max(450,500) = 500 -->
                    <?=max($item['GiaTri']*0.5/100,500)?>đ
                </td>
                <td class="text-end"></td>
                <td>
                    <a href="<?=$base_url?>book/removeFromCart/<?=$item['MaSach']?>" class="btn btn-outline-danger btn-sm">
                        Xóa
                    </a>            
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-end"  colspan="4">Tổng thành tiền</th>
            <th class="text-end">0đ</th>
            <th>
            <a href="<?=$base_url?>book/removeCart" class="btn btn-outline-danger btn-sm">
                Xóa hết
            </a>  
            </th>
        </tr>
    </tfoot>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Xác nhận mượn
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Xác nhận mượn</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Bấm xác nhận để mượn.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Đồng ý</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
    function tinhThanhTien() {
    var dsSach = document.querySelectorAll('table tbody tr');
    var ngayMuon = document.querySelector('#NgayMuon').value;
    var ngayTra = document.querySelector('#NgayTra').value;
    var SoNgayMuon = (new Date(ngayTra)-new Date(ngayMuon))/(24*60*60*1000);
    var tong = 0;
    for (const sach of dsSach) {
        var gia = Number(sach.querySelector('td:nth-child(4)').innerText.replace('đ',''));
        var tien = gia *SoNgayMuon;
        sach.querySelector('td:nth-child(5)').innerText = tien+'đ';
        tong = tong + tien;  
    }
    document.querySelector('tfoot th:nth-child(2)').innerText=tong+'đ';
    document.querySelector('#SoSachMuon').value=dsSach.length;
    document.querySelector('#TongTien').value=tong;   
} 
tinhThanhTien();
</script>
