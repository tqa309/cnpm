<html>
 <head>
  <title>Báo Cáo Doanh Thu Theo Loại Phòng</title>
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bao-cao.css">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- thanh điều hướng -->
    <div class="sidenav" >
	  
  	<a href="../danh-muc-phong"><i class="fa fa-table"></i> Danh mục phòng</a>
  	<a href="../phieu-thue-phong"><i class="fa fa-address-book"></i> Phiếu thuê phòng</a>
    <a data-toggle="collapse" data-target="#collapse1"><i class="fa fa-search"></i> Tra cứu</a>
    <div id="collapse1" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item"><a href="../tra-cuu/Tracuu_phong.php">  Phòng</a></li>
          <li class="list-group-item"><a href="../tra-cuu/Tracuu_phieuthue.php"> Phiếu Thuê</a></li>
          <li class="list-group-item"><a href="../tra-cuu/Tracuu_loaiphong.php"> Loại Phòng</a></li>
          <li class="list-group-item"><a href="../tra-cuu/Tracuu_khachhang.php"> Khách Hàng</a></li>
          <li class="list-group-item"><a href="../tra-cuu/Tracuu_hoadon.php"> Hóa Đơn</a></li>
        </ul>
    </div>
  	<a href="../hoa-don-thanh-toan"><i class="fa fa-credit-card"></i> Hóa đơn thanh toán</a>
  	<a href="../bao-cao-doanh-thu"><i class="fas fa-chart-bar mr-1"></i> Báo cáo doanh thu</a>
  	<a href="../chinh-sua"><i class="fa fa-cog"></i>  Chỉnh sửa</a>
    </div>
    <div class="main">
	<div class ="menu">
		<div class="menu-header">
			<a class="active" >Quản Lý Khách Sạn</a>
		</div>
        <ul id="header_bar" style="z-index:999">
            <li class = "header"><a href="../trang-chu"> Trang chủ</a>
  			<li class = "header"><a data-toggle="modal" data-target="#myModal">Liên Hệ</a></li>
		</ul>
    </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thông tin liên hệ</h4>
        </div>
        <div class="modal-body"> 
            <p>Phạm Hồ Anh Quân      - MSSV: 18521286 - Gmail: 18521286@gm.uit.edu.vn </p>
            <p>Trần Quốc Anh         - MSSV: 18520472 - Gmail: 18520472@gm.uit.edu.vn </p>
            <p>Vòng Thủy Thùy Trang  - MSSV: 18521525 - Gmail: 18521525@gm.uit.edu.vn </p>
            <p>Trịnh Minh Phát       - MSSV: 18520125 - Gmail: 18520125@gm.uit.edu.vn </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>
	<div class ="content" style="float:right">
  <h4>Báo Cáo Doanh Thu Theo Loại Phòng</h4>
    <form id="baocao">
    <div class="col-sm-2" style="padding: 0;">
        <select name="thang" id="thang">
          <option>- Tháng -</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
        
        <select name="nam" id="nam">
          <option>- Năm -</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
        </select>
      </div>
      <input class="btn btn-success" type="submit" id="LoaiPhongSubmit" value="Xem báo cáo">
    </form>
    <table id="doanh_thu" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>STT</th>
          <th>Loại Phòng</th>
          <th>Doanh Thu</th>
          <th>Tỉ lệ (%)</th>   
        </tr>
      </thead>
      <tbody id="ctbc"></tbody>
    </table>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
  $('#baocao').on('submit', () => {
    event.preventDefault();
    var formData = $('#baocao').serialize();

    $.ajax({
    url: 'data_access/bc/bao_cao_fetch.php',
    type: 'POST',
    data: formData,
    success: function(data)
    {
      $('#ctbc').html(data);
    }});
  });
}); 
</script>
