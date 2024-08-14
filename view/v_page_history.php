<h2>Lịch sử</h2>
<table class="table">
    <thead>
        <tr>
            <th>Mã mượn sách</th>
            <th>Ngày mượn</th>
            <th>Ngày trả</th>
            <th>Số sách mượn</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dsLichSu as $ls): ?>
        <tr>
            <td><?=$ls['MaLS']?></td>
            <td><?=$ls['NgayMuon']?></td>
            <td><?=$ls['NgayTra']?></td>
            <td><?=$ls['SoSachMuon']?></td> 
            <td><?=$ls['TongTien']?></td>
            <td>
                <?php switch ($ls['TrangThai']) {
                    case 'chuan-bi':
                        echo '<span class="badge text-bg-primary">Đã tiếp nhận</span>';
                        break;
                    case 'cho-giao':
                        echo '<span class="badge text-bg-success">Đã có sách</span>';
                        break;
                    
                    default:
                        # code...
                        break;
                }
                ?>
            </td>  
        </tr>
       <?php endforeach; ?>
    </tbody>
</table>