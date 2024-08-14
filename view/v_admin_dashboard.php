<h2 class="my-3">Tổng quan</h2>
    <div class="row">
      <div class="col-md-3">
        <div class="card text-primary mb-3" >     
          <div class="card-body">
            <h5 class="card-title">Đầu sách</h5>
            <p class="card-text fs-1 text-center"><?=$tkSach?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-success mb-3" >     
          <div class="card-body">
            <h5 class="card-title">Bạn đọc</h5>
            <p class="card-text fs-1 text-center"><?=$tkBanDoc?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-warning mb-3" >     
          <div class="card-body">
            <h5 class="card-title">Chủ đề</h5>
            <p class="card-text fs-1 text-center"><?=$tkChuDe?></p>
          </div>                  
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-success mb-3" >     
          <div class="card-body">
            <h5 class="card-title">Lượt nượn</h5>
            <p class="card-text fs-1 text-center"><?=$tkLuotMuon?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <strong>Thống kê sách theo chủ đề</strong>
          </div>
          <div class="card-body">
          <div id="myChart" style=" height:400px"></div>
            <table class="table text-end">
              <thead>
                <tr>
                  <th class="text-start">Chủ đề</th>
                  <th>Số lượng sách</th>
                  <th>Giá trung bình</th>
                  <th>Giá cao nhất</th>
                  <th>Giá thấp nhất</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($tkSachTheoChuDe as $cd): ?>
                  <tr>
                    <td class="text-start"><?=$cd['TenChuDe']?></td>
                    <td><?=$cd['SoLuong']?></td>
                    <td><?=number_format(round(max(500,$cd['TrungBinh']*0.5/100)))?>đ</td>
                    <td><?=number_format(round(max(500,$cd['ThapNhat']*0.5/100)))?>đ</td>
                    <td><?=number_format(round(max(500,$cd['CaoNhat']*0.5/100)))?>đ</td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <strong>Thống kê doanh thu</strong>
          </div>
          <div class="card-body">
          <div id="myChart2" style=" height:400px"></div>
            <table class="table text-end">
              <thead>
                <tr>
                  <th>Tháng/Năm</th>
                  <th>Số bạn đọc</th>
                  <th>Lượt mượn</th>
                  <th>Số sách mượn</th>
                  <th>Doanh thu</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($tkDoanhThu as $dt): ?>
                <tr>
                  <td><?=$dt['Thang']?>/<?=$dt['Nam']?></td>
                  <td><?=$dt['SoBanDoc']?></td>
                  <td><?=$dt['SoLuotMuon']?></td>
                  <td><?=$dt['SoSachMuon']?></td>
                  <td><?=number_format($dt['DoanhThu'])?>đ</td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      google.charts.load('current',{packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      // Your Function
      function drawChart() {
        // Set Data
          const data = google.visualization.arrayToDataTable([
            ['Chủ đề', 'Số Lượng'],
          <?php foreach($tkSachTheoChuDe as $cd){
            echo " ['".$cd['TenChuDe']."',".$cd['SoLuong']."],";
          } ?>
           
          ]);

          // Set Options
          const options = {
            title:'Biểu đồ số lượng sách theo chủ đề',
            is3D:true
          };

          // Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);


          //biểu đồ cột
          // Set Data
          const data2 = google.visualization.arrayToDataTable([
            ['Tháng/năm', 'Doanh thu'],
            <?php foreach($tkDoanhThu as $dt){
            echo "['".$dt['Thang']."/".$dt['Nam']."',".$dt['DoanhThu']."],";
          } ?>
          ]);

          // Set Options
          const options2 = {
            title:'Biểu đồ thống kê doanh thu theo tháng'
          };

          // Draw
          const chart2 = new google.visualization.ColumnChart(document.getElementById('myChart2'));
          chart2.draw(data2, options2);


      }
     </script>