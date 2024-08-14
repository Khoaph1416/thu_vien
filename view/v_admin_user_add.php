<h2 class="my-3">Thêm tài khoản</h2>
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
        <form action="" method="POST">
        <div class="mb-3">
            <label for="SoDienThoai" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai">
        </div>
        <div class="mb-3">
            <label for="HoTen" class="form-label">Họ tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen">
        </div>
        <div class="mb-3">
            <label for="ViTien" class="form-label">Ví tiền</label>
            <input type="text" class="form-control" id="ViTien" name="ViTien">
        </div>
        <div class="mb-3">
            <label for="Quyen" class="form-label">Quyền</label>
            <select name="Quyen" id="Quyen" class="form-select" aria-label="Default select example">
            <option value="0" selected>Bạn đọc</option>
            <option value="1">Quản lý</option>
            <option value="2">Quản lý cấp cao</option>
            </select>
        </div>
        <button name="submit" value="submit" type="submit" class="btn btn-primary">Xác nhận</button>
        </form> 