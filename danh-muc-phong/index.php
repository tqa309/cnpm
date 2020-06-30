<?php 
include('DMP_insert/database_connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Danh mục phòng</title>
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
   
    
        
        <h1 align="center">Tạo Phòng</h1>
      <br />
      <h4 align="center">Nhập chi tiết phòng</h4>
      <br />
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table" name="tbTaoPhong">
            <thead>
              <tr>
                <th>Mã Phòng</th>
                <th>Tên Phòng</th>
                <th>Loại Phòng</th>
                <th>Tình Trạng Phòng</th>
                <th>Ghi Chú</th>
                
                <th><button type="button" name="btnThemhang" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span> Thêm phòng</button></th>
              </tr>
            </thead>
            <tbody id="tbody"></tbody>
          </table>
          <div align="center">
            <input type="submit" name="btnLuuTP" class="btn btn-info" value="Lưu" />
          </div>
        </div>
      </form>
<br>
<br>
    <br>
<div style="border-bottom: 0.4px solid #D9D9D9"></div>
    <br>
    <br>
    <br>
    <br>
        <!-- Bảng Edit-Delete -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1 align="center">Bảng sửa xóa chi tiết phòng</h1>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped" name="tbBangSuaXoaChiTietPhong">
                        <thead>
                            <tr>
                                <th>Mã Phòng</th>
                                <th>Tên Phòng</th>
                                <th>Loại Phòng</th>
                                <th>Tình Trạng Phòng</th>
                                <th>Ghi Chú</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />
        <br />
    </div>
</body>

</html>
<!-- for edit & delete -->
<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        var dataTable = $('#sample_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "DMP_edit_del/DMP_fetch.php",
                type: "POST"
            }
        });

        $('#sample_data').on('draw.dt', function () {
            $('#sample_data').Tabledit({
                url: 'DMP_edit_del/DMP_action.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'txtMaPhongSX'],
                    editable:[[1, 'txtTenPhongSX'], [2, 'cbMaLoaiPhongSX','{"A":"Loại phòng A","B":"Loại phòng B","C":"Loại phòng C"}'], [3, 'cbTinhTrangPhongSX','{"0":"Còn Trống","2":"Đang sửa chữa"}'],[4, 'txtGhiChuSX']]
                },
                restoreButton: false,
                onSuccess: function (data, textStatus, jqXHR) {
                    if (data.action == 'delete') {
                        $('#' + data.id).remove();
                        $('#sample_data').DataTable().ajax.reload();
                    }
                }
            });
        });

    }); 
 </script>

<!-- for insert -->
<script>

$(document).ready(function(){ 
      
      var count = 0;

      $(document).on('click', '.add', function(){
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="txtMaPhongTP[]" class="form-control txtMaPhongTP" /></td>';
        html += '<td><input type="text" name="txtTenPhongTP[]" class="form-control txtTenPhongTP" /></td>';
        html += '<td><select name="cbMaLoaiPhongTP[]" class="form-control cbMaLoaiPhongTP" ><option value="">Chọn giá trị</option><?php echo fill_select_box($connect,"0"); ?></select></td>';
        html += '<td><select name="cbTinhTrangPhongTP[]" class="form-control cbTinhTrangPhongTP" ><option value="">Chọn giá trị</option><?php echo fill_select_box($connect,"1"); ?></select></td>';
        html += '<td><input type="text" name="txtGhiChuTP[]" class="form-control txtGhiChuTP" /></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('#tbody').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.txtMaPhongTP').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Thiếu thông tin ở ô Mã Phòng</p>';
            return false;
          }
          count = count + 1;
        });
        $('.txtTenPhongTP').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Thiếu thông tin ở ô Tên Phòng</p>';
            return false;
          }
          count = count + 1;
        });

        $('.cbMaLoaiPhongTP').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Thiếu thông tin ở ô Mã Loại Phòng</p>';
            return false;
          }

          count = count + 1;

        });

        $('.cbTinhTrangPhongTP').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Thiếu thông tin ở ô Tình Trạng Phòng</p>';
            return false;
          }

          count = count + 1;

        });

       


        var form_data = $(this).serialize();

        if(error == '')
        {
          $.ajax({
            url:"DMP_insert/DMP_action_insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              if(data == 'ok')
              {
                $('#item_table').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Dữ liệu đã được thêm vào</div>');
              }
              else{
                $('#error').html('<div class="alert alert-danger">'+data+'</div>');
              }
            }
          });
        }
        else
        {
          $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }

      });
      
    });

   
</script>