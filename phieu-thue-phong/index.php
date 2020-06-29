<?php

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Remove Dynamic Dependent Select Box using Ajax jQuery with PHP</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="js/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typehead.js"></script>
    <style>
      .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: #fff;}
      .tt-menu { width:300px; }
      ul.typeahead{margin:0px;padding:10px 0px;}
      ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;}
      ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
      .demo-label {font-size:1.5em;color: black;font-weight: 500;}
      .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
        text-decoration: none;
        background-color: #ddd;
        color: black;
        outline: 0;
      }
    </style>
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
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <div class="form-group">
            <label >Mã Phiếu Thuê</label>
            <input readonly type="text" class="form-control" name="txtMaPhieuThue" id="txtMaPhieuThue">
          </div>
          <div class="form-group">
            <label >Loại Phòng</label>
            <select name="txtLoaiPhong" id="txtLoaiPhong" class="form-control"  onchange="getPhuThu()"><?php echo fill_loai_phong($connect); ?></select>
          </div>
          <div class="form-group">
            <label >Mã Phòng</label>
            <input type="text" class="typehead form-control" placeholder="Vui lòng nhập mã phòng" name="txtMaPhong" id="txtMaPhong" onchange="getDonGia(this.value)">
            <div id="countryList"></div>
          </div>
          <div class="form-group">
            <label>Đơn giá tiêu chuẩn</label>
            <input readonly type="text" class="form-control" placeholder="Vui lòng nhập mã phòng" name="txtDonGiaTieuChuan" id="txtDonGiaTieuChuan" onchange="getDonGiaDuocTinh()">
          </div>
          <div class="form-group">
            <label>Ngày Bắt Đầu Thuê</label>
            <br>
            <input type="date" class="form-control"  name="txtNgayBdThue" id="txtNgayBdThue">
            <br>
          </div>
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
          <div id="themKhachError"></div>
            <thead>
              <tr>
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>CMND</th>
                <th>Địa Chỉ</th>
                <th>Loại Khách Hàng</th>
                <th><button type="button" name="add" id="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div class="form-group">
            <label>Phụ Thu</label>
            <input readonly value="0%" type="text" class="form-control" name="txtPhuThu" id="txtPhuThu" onchange="getDonGiaDuocTinh()">
          </div>
          <div class="form-group">
            <label>Đơn giá được tính</label>
            <input readonly type="text" class="form-control" placeholder="Vui lòng nhập mã phòng và thông tin khách" name="txtDonGiaDuocTinh" id="txtDonGiaDuocTinh">
          </div>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Tạo Phiếu Thuê" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
<script>
  var DonGiaTieuChuan = 0, DonGiaDuocTinh = 0;
  function getDonGia(value) {
      var str = String(value);
      $.ajax({
        url: "phieu_thue_fetch.php",
        method: "POST",
        dataType: "json",
        data: {
          "txtMaPhong": str
        },
        success: function(data)
        {
          if (data)
          {
            $('#txtLoaiPhong').val(data.LoaiPhong);
            $('#txtDonGiaTieuChuan').val(new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(data.DonGiaTieuChuan));
            getDonGiaDuocTinh(Number(data.DonGiaTieuChuan));
          }
        }
      });
    }

    function getDonGiaDuocTinh(donGia) {
      DonGiaTieuChuan = donGia;
      var x = $('#txtPhuThu').val();
      x = Number(x.replace('%','')) / 100;
      DonGiaDuocTinh = donGia * (1 + x);
      $('#txtDonGiaDuocTinh').val(new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(DonGiaDuocTinh));
    }
    
    var numRow = 0;
    var PhuThuKhachToiDa = <?php echo getPhuThuKhachToiDa($connect); ?>;
    var PhuThuKhachNN = <?php echo getPhuThuKhachNN($connect); ?>;
    PhuThuKhachToiDa = Math.round(Number(PhuThuKhachToiDa) * 100 - 100) + "%";
    PhuThuKhachNN = Math.round(Number(PhuThuKhachNN) * 100 - 100) + "%";

    var PhuThuArr = <?php echo getPhuThu($connect); ?>;

    var PhuThu = {};

    PhuThu = PhuThuArr.reduce(function(acc, curr) {

      acc[curr.MaLoaiKh] = Number(curr.HeSoPhuThu) * 100 - 100 + "%";
      return acc;
      }, {});

    console.log(PhuThu); 

    
    var maxRow = <?php echo getKhachToiDa($connect); ?>;

    function getPhuThu() {
      var arr = $('.MaLoaiKh');
      var coKhachNN = false;
      for (var i = 0; i < arr.length; i++) {
        if (arr[i].value !== 'ND') {
          coKhachNN = true;
          break;
        }
      }
      if (coKhachNN) {
        $('#txtPhuThu').val(PhuThuKhachNN);
      } else if (numRow === maxRow) {
        $('#txtPhuThu').val(PhuThuKhachToiDa);
      } else {
        $('#txtPhuThu').val('0%');
      }

      getDonGiaDuocTinh(Number(DonGiaTieuChuan));
    }

    $(document).ready(function(){
      $('#txtNgayBdThue').val(new Date().toJSON().slice(0,10));
      $.ajax({
          url: "phieu_thue_fetch.php",
          method: "POST",
          dataType: "json",
          data: {
            "txtMaPhieuThue": "TRUE"
          },
          success: function(data)
          {
            if (data)
            {
              $('#txtMaPhieuThue').val(data);
            }
          }
        });
    
    $('#txtMaPhong').attr("autocomplete", "off");
    $('#txtMaPhong').typeahead({
        source: function (query, result) {
            loai = $('#txtLoaiPhong').val();
            $.ajax({
                url: "ma_phong_search.php",
                data: 'query=' + query + '&loai=' + loai,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                  result($.map(data, function(item) {
                      return item;
                  }));
                }
            });
        }
    });
      
      var count = 0;
      var maKhach = <?php echo fill_ma_khach($connect); ?>;
      var tempMaKhach = Number(maKhach);
      

      $('#add').click(function(){
        if (numRow < maxRow) {
          maKhach = tempMaKhach + numRow;
          numRow++;
          count++;
          var html = '';
          html += '<tr>';
          html += '<td><input readonly type="text" name="txtMaKhachHang[]" class="form-control MaKhachHang" value="'+ maKhach + '"/></td>';
          html += '<td><input type="text" name="txtTenKh[]" class="form-control TenKh" /></td>';
          html += '<td><input type="text" name="txtCMND[]" class="form-control CMND" /></td>';
          html += '<td><input type="text" name="txtDiaChi[]" class="form-control DiaChi" /></td>';
          html += '<td><select name="txtMaLoaiKh[]" class="form-control MaLoaiKh"  onchange="getPhuThu()"><?php echo fill_select_box($connect); ?></select></td>';
          html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
          $('tbody').append(html);
        } else {
          $('#themKhachError').html('<div class="alert alert-danger">Vượt quá khách tối đa</div>');
        }

        getPhuThu();
      });

      
      $('#add').click();

  $(document).on('click', '.remove', function(){
    $('#themKhachError').html('');
    $(this).closest('tr').remove();
    numRow--;
    var arr = $('.MaKhachHang');
    console.log(arr);
    for (var i = 0; i < arr.length; i++) {
      arr[i].value = tempMaKhach + i;
    }

    getPhuThu();
  });

  $('#insert_form').on('submit', function(event){
    event.preventDefault();
    var error = '';
    $('.MaKhachHang').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += '<p>Thiếu thông tin ở ô Mã Khách Hàng</p>';
        return false;
      }
      count = count + 1;
    });
    $('.TenKh').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += '<p>Thiếu thông tin ở ô Tên Khách Hàng</p>';
        return false;
      }
      count = count + 1;
    });

    $('.CMND').each(function(){
      var count = 1;

      if($(this).val() == '')
      {
        error += '<p>Thiếu thông tin ở ô CMND</p>';
        return false;
      }

      count = count + 1;

    });

    $('.DiaChi').each(function(){
      var count = 1;

      if($(this).val() == '')
      {
        error += '<p>Thiếu thông tin ở ô Địa Chỉ</p>';
        return false;
      }

      count = count + 1;

    });

    $('.MaLoaiKh').each(function(){
      var count = 1;
      if($(this).val() == '')
      {
        error += '<p>Thiếu thông tin ở ô Mã Loại Khách Hàng</p>';
        return false;
      }
      count = count + 1;
    });

    $('#txtDonGiaTieuChuan').val(DonGiaTieuChuan);
    $('#txtDonGiaDuocTinh').val(DonGiaDuocTinh);

    var form_data = $(this).serialize();

    console.log(form_data);

    if(error == '')
    {
      $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          if(data == 'ok')
          {
            $('#item_table').find('tr:gt(0)').remove();
            $('#error').html('<div class="alert alert-success">Dữ liệu khách hàng đã được thêm vào</div>');
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