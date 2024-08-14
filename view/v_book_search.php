<h2> Kết quả tìm kiếm với từ khóa "<?=$_GET['keyword']?>":</h2>
          <div class="row">
          <?php foreach($ketquaTimKiem as $sach): ?>
          <div class="col-sm-3">
            <div class="card mb-3" >
                <img src="<?=$base_url?>upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?>đ</p>
                  <a href="<?=$base_url?>book/detail/<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

          </div>

          <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?=($page<=1)?'disabled':''?>">
      <a class="page-link" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$page-1?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$sotrang;$i++):?>
    <li class="page-item <?=($page==$i)?'active':''?>">
      <a class="page-link" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$i?>"><?=$i?></a>
    </li>
    <?php endfor; ?>
    <li class="page-item <?=($page>=$sotrang)?'disabled':''?>">
      <a class="page-link" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$page+1?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>