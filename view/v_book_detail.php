<div class="col-md-9">
          <div class="row">
          <div class="col-md-6">
            <img src="<?=$base_url?>upload/product/<?=$ctSach['HinhAnh']?>" alt="" class="w-100">
          </div>
          <div class="col-md-6">
            <h2>
            <?=$ctSach['TuaSach']?> 
            </h2>
            <div class="row">
              <div class="col-md-6">
                Tác Giả: 
                <strong><?=$ctSach['TacGia']?> </strong>
              </div>
              <div class="col-md-6">Chủ đề:
                <strong>  <?=$ctSach['TenChuDe']?> </strong>
              </div> 
            </div>  
             <div class="text-danger fs-1">  <?=$ctSach['GiaTri']?> </div>
             <small>Còn <strong>  <?=$ctSach['SoLuong']?> </strong> quyển trong thư viện</small> 
             <br>
             <a href="<?=$base_url?>book/addToCart/<?=$ctSach['MaSach']?>" class="btn btn-outline-primary btn-lg">
             Mượn Sách
            </a> 
            <?php if(isset($_SESSION['thongbao'])):?>
              <div class="alert alert-success" role="alert">
              <?=$_SESSION['thongbao']?>
            </div>
            <?php endif; unset($_SESSION['thongbao']);?>
            <?php if(isset($_SESSION['loi'])):?>
              <div class="alert alert-danger " role="alert">
              <?=$_SESSION['loi']?>
            </div>
            <?php endif; unset($_SESSION['loi']);?>
             <hr> 
            <h3>Mô tả</h3>
            <p class="my-3">
            <?=$ctSach['MoTa']?> 
            </p>           
           </div>
        </div>
        <h2>Có thể bạn thích đọc</h2>
        <div class="row"> 
          <?php foreach($dsNgauNhienCungChuDe as $sach): ?>
          <div class="col-sm-3">
            <div class="card mb-3" >
                <img src="<?=$base_url?>upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?>đ</p>
                  <a href="<?=$base_url?>book/detail/<?=$sach['MaSach']?>" class ="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
            <?php endforeach;?>

          </div>
           <h2>Cảm nghỉ của bạn đọc</h2>
           <?php if(isset($_SESSION['user'])): ?>
            <form action="<?=$base_url?>book/comment" method="post">
                <input type="text" name="NoiDung" class="form-control form-contrl-lg" placeholder="Bạn nghĩ gì về cuốn sách này?">
                <input type="hidden" name="MaSach" value="<?=$ctSach['MaSach']?>">
                <button class="btn btn-primary btn-lg mt-2 ">Gửi</button>
            </form>
           <?php endif;?>
           
          <?php foreach($dsCamNghi as $cn): ?>
            <div class="row my-3 border rounded-3">
                <div class="col-sm-3">
                  <strong><?=$cn['HoTen']?></strong><br>
                  <?=$cn['NgayGui']?> <br>
                  <i>Đã mượn 1 lần</i>
                </div>
                <div class="col-sm-9">
                <?=$cn['NoiDung']?>
                </div>
              </div> 
          <?php endforeach; ?>
         
 </div>
        