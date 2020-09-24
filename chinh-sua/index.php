<?php
include('database_connection.php');
?>
<html>
 <head>
  <title>Thay đổi qui định</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  <link rel="stylesheet" href="css/thay-doi-quy-dinh.css">
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
        <h4>Thay đổi số lượng và đơn giá các loại phòng</h4>      
                <form id="loaiphong">
                  <div class="modal fade" id="loaiPhongModal" role="dialog">
                      <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" style="border:none;">&times;</button>
                                <h4 class="modal-title">Hóa Đơn Mới</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="MaLoaiPhong" class="col-sm-3 col-form-label">Mã loại phòng</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="MaLoaiPhong" id="MaLoaiPhong">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="TenLoaiPhong" class="col-sm-3 col-form-label">Tên loại phòng</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="TenLoaiPhong" id="TenLoaiPhong">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="DonGiaTieuChuan" class="col-sm-3 col-form-label">Đơn giá tiêu chuẩn</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="DonGiaTieuChuan" id="DonGiaTieuChuan">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="SoLuong" class="col-sm-3 col-form-label">Số lượng</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="SoLuong" id="SoLuong">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Tạo">
                            </div>
                          </div>
                      </div>
                  </div>
                </form>
        
        <table id="sample_data1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Mã Loại Phòng</th>
              <th>Tên Loại Phòng</th>
              <th>Đơn Giá</th>
              <th>Số Lượng</th>   
            </tr>
          </thead>
          <tbody></tbody>
          </table>
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#loaiPhongModal">THÊM LOẠI PHÒNG</button>
        <h4>Thay đổi số lượng loại khách, số lượng khách tối đa trong phòng</h4>
        <form id="loaikhach">
          <div class="modal fade" id="loaiKhachModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" style="border:none;">&times;</button>
                  <h4 class="modal-title">Loại khách mới</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="MaLoaiKh" class="col-sm-3 col-form-label">Mã loại khách</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="MaLoaiKh" id="MaLoaiKh">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="TenLoaiKh" class="col-sm-3 col-form-label">Tên loại khách</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="TenLoaiKh" id="TenLoaiKh">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="HeSoPhuThu" class="col-sm-3 col-form-label">Hệ số phụ thu</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="HeSoPhuThu" id="HeSoPhuThu">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Tạo">
                </div>
              </div>
            </div>
        </div>
        </form>
        <table id="sample_data2" class="table table-bordered table-striped" style="width: 740px">
          <thead>
            <tr>
              <th>Mã Loại Khách</th>
              <th>Tên Loại Khách</th>
              <th>Hệ số phụ thu</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#loaiKhachModal" style="margin-bottom: 15px;">THÊM LOẠI KHÁCH</button>
        <form id="khachToiDa">
          <div class="form-group row">
            <label for="SoKhachToiDa" class="col-sm-3 col-form-label">Số lượng khách tối đa trong phòng</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="SoKhachToiDa" id="SoKhachToiDa" placeholder="Hiện tại: <?php echo getKhachToiDa($connect)?>">
            </div>
            <input class="btn btn-success" type="submit" value="Cập nhật">
          </div> 
        </form>       
        <h4>Thay đổi tỉ lệ phụ thu</h4>
        <form id="phuThuKhachToiDa">
        <div class="form-group row">
          <label for="phuThuKhachToiDa" class="col-sm-3 col-form-label">Tỉ lệ phụ thu khách thứ <?php echo getKhachToiDa($connect)?></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="phuThuKhachToiDa" id="phuThuKhachToiDa" placeholder="Hiện tại: <?php echo getPhuThuKhachToiDa($connect)?>">
          </div>
          <input class="btn btn-success" type="submit" value="Cập nhật">
        </div>
        </form>
        <form id="phuThuKhachNN">
        <div class="form-group row">
          <label for="phuThuKhachNN" class="col-sm-3 col-form-label">Tỉ lệ phụ thu khách nước ngoài</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="phuThuKhachNN" id="phuThuKhachNN" placeholder="Hiện tại: <?php echo getPhuThuKhachNN($connect)?>">
          </div>
          <input class="btn btn-success" type="submit" value="Cập nhật">
        </div>
        </form>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

    $("#loaiphong").on('submit', function() {
    var formData = $(this).serialize();
    console.log(formData);

    $.ajax({
      url: 'data_access/tdqd/themloaiphong.php',
      type: 'POST',
      data: formData,
      success: function(data)
      {
      alert('Tạo loại phòng mới thành công');      
      }
    });
    });

$("#loaikhach").on('submit', function() {
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
    url: 'data_access/tdqd/themloaikhach.php',
    type: 'POST',
    data: formData,
    success: function(data)
    {
    alert('Tạo loại khách mới thành công');      
    }});
});


$("#khachToiDa").on('submit', function() {
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
    url: 'data_access/tdqd/khachToiDa.php',
    type: 'POST',
    data: formData,
    success: function(data)
    {
    alert('Cập nhật khách tối đa thành công');      
    }});
});

$("#phuThuKhachToiDa").on('submit', function() {
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
    url: 'data_access/tdqd/phuThuKhachToiDa.php',
    type: 'POST',
    data: formData,
    success: function(data)
    {
    alert('Cập nhật phụ thu khách tối đa thành công');      
    }});
});

$("#phuThuKhachNN").on('submit', function() {
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
    url: 'data_access/tdqd/phuThuKhachNN.php',
    type: 'POST',
    data: formData,
    success: function(data)
    {
    alert('Cập nhật phụ thu khách nước ngoài thành công');      
    }});
});

var dataTable1 = $('#sample_data1').DataTable({
 "processing" : true,
 "serverSide" : true,
 "searching": false,
 "paging": false,
 "info": false,
 "ordering": false,
 "order" : [],
 "ajax" : {
  url:"data_access/tdqd/TDQD_QD1_fetch.php",
  type:"POST"
 }
});

var dataTable2 = $('#sample_data2').DataTable({
 "processing" : true,
 "serverSide" : true,
 "searching": false,
 "paging": false,
 "info": false,
 "ordering": false,
 "order" : [],
 "ajax" : {
  url:"data_access/tdqd/TDQD_QD2_fetch.php",
  type:"POST"
 }
});

$('#sample_data1').on('draw.dt', function(){
 $('#sample_data1').Tabledit({
  url:'data_access/tdqd/TDQD_QD1_action.php',
  dataType:'json',
  columns:{
   identifier : [0, 'MaLoaiPhong'],
   editable:[[1, 'TenLoaiPhong'], [2, 'DonGiaTieuChuanTieuChuan'], [3, 'SoLuong']]
  },
  restoreButton:false,
  onSuccess:function(data, textStatus, jqXHR)
  {
   if(data.action == 'delete')
   {
    $('#' + data.id).remove();
    $('#sample_data1').ajax.reload();
   }
  }
 });
});


$('#sample_data2').on('draw.dt', function(){
 $('#sample_data2').Tabledit({
  url:'data_access/tdqd/TDQD_QD2_action.php',
  dataType:'json',
  columns:{
   identifier : [0, 'MaLoaiKh'],
   editable:[[1, 'TenLoaiKh'], [2, 'HeSoPhuThu']]
  },
  restoreButton:false,
  onSuccess:function(data, textStatus, jqXHR)
  {
   if(data.action == 'delete')
   {
    $('#' + data.id).remove();
    $('#sample_data2').DataTable().ajax.reload();
   }
  }
 });
});
}); 
</script>
