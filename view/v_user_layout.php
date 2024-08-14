<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>template/css/bootstrap.min.css">
    <title>Thư viện thành phố</title>
</head>
<body>
<nav  class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=$base_url?>page/home">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=$base_url?>page/home">Trang chủ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chủ đề
          </a>
          <ul class="dropdown-menu bg-dark">
          <?php foreach($dsChuDe as $chude): ?>
          <li> 
            <a href="<?=$base_url?>category/detail/<?=$chude['MaCD']?>" class="dropdown-item">
              <?=$chude['TenChuDe']?></a>
          </li>
          <?php endforeach; ?>
          </ul>
        </li>
      </ul>
       <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=$base_url?>page/cart">Giỏ sách</a>
        </li>
        <?php if( !isset($_SESSION['user'])):?>
          <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?=$base_url?>user/login">Đăng nhập</a>
                </li>
          <?php else:?>
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            xin chào, <?=$_SESSION['user']['HoTen']?>
          </a>
          <ul class="dropdown-menu end-0 bg-dark" style="left:auto">
            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
            <li><a class="dropdown-item" href="<?=$base_url?>page/history">Lịch sử mượn sách</a></li>

            <?php if($_SESSION['user']['Quyen']>=1):?>
            <li><hr class="dropdown-divider"></li>        
            <li><a class="dropdown-item text-warning" href="<?=$base_url?>admin/dashboard">Trang quản lý</a></li>
            <?php endif;?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=$base_url?>user/logout">Đăng xuất</a></li>
          </ul>
        </li>
          <?php endif;?>
       
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <!-- carousel -->
<?php if($view_name=='page_home'): ?>
  <div id="carouselExample" class="carousel slide my-3">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?=$base_url?>template/img/bn1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?=$base_url?>template/img/bn2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?=$base_url?>template/img/bn3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<?php endif;?>

<!-- search -->
      <div class="row">
        <div class="col-md-3">
          <form action="<?=$base_url?>book/search" method="POST" >
          <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Nhập tên sách cần tìm" >
            <button class="btn btn-primary" type="submit" id="serch">Tìm kiếm</button>
          </div>
          </form>

          <ul class="list-group">
          <li class="list-group-item active" aria-current="true">Sách đọc nhiều</li>
          <?php foreach($dsDocNhieu as $sach): ?>
          <li class="list-group-item"><?=$sach['TuaSach']?></li>
          <?php endforeach; ?>
        </ul>
        </div>
        <div class="col-md-9">
          <!-- ruột của website -->
          <?php include_once 'view/v_'.$view_name.'.php' ?>
        </div>
      </div>

  </div>


<footer class="text-center text-bg-primary p-3 rounded-3">
    Bản quyên &copy; 2023, thuộc về khoa
</footer>
<script src="<?=$base_url?>template/js/bootstrap.bundle.min.js"></script>
</body>

</html>
