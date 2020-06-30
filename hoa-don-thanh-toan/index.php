<?php
    include('database_connection.php');
?>

<html>

<head>
    <title>How to use Tabledit plugin with jQuery Datatable in PHP Ajax</title>
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

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- thanh điều hướng -->
    <div class="sidenav" >
	  
  	<a href="../danh-muc-phong"><i class="fa fa-table"></i> Danh mục phòng</a>
  	<a href="../phieu-thue-phong"><i class="fa fa-txtDiaChiress-book"></i> Phiếu thuê phòng</a>
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
        <div class="panel-heading" style="text-transform:capitalize;display:flex;justify-content:center;">
            <h2>Quản lí hóa đơn</h2>
        </div>

        <form id="ThongTinHoaDon">
            <div class="form-group">
                <label>Mã Hóa Đơn</label>
                <input readonly type="text" class="form-control" name="txtMaHD" value="<?php echo fill_ma_hd($connect)?>">
            </div>
            <div class="form-group">
                <label>Khách Hàng / Cơ Quan:</label>
                <input type="text" class="form-control" name="txtCoQuan">
            </div>
            <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" class="form-control" name="txtDiaChi">
            </div>
            <div class="form-group">
                <label>Ngày Lập Hóa Đơn</label>
                <input class="form-control" type="date" name="txtNgayLapHD" id="txtNgayLapHD">
            </div>

            <!-- Button trigger modal -->
            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Thêm Phiếu Thuê
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Danh sách phiếu thuê chưa thanh toán</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="sample_data" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Mã Phiếu Thuê</th>
                                                <th>Ngày Bắt Đầu Thuê</th>
                                                <th>Đơn Giá Tiêu Chuẩn</th>
                                                <th>Đơn Giá Được Tính </th>
                                                <th>Số Khách</th>
                                                <th>Mã Phòng</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('hoadon_fetch.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Mã Phiếu Thuê</th>
                                <th>Ngày Bắt Đầu Thuê</th>
                                <th>Đơn Giá Tiêu Chuẩn</th>
                                <th>Đơn Giá Được Tính </th>
                                <th>Số Khách</th>
                                <th>Mã Phòng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="hoadon">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label>Tổng hóa đơn</label>
                <input readonly class="form-control" type="text" name="txtTriGia" id="txtTriGia">
            </div>
            <div align="center">
                <input  class="btn btn-success" type="submit" value="Tạo Hóa Đơn">
                <button class="btn btn-primary">In Hóa Đơn</button>
            </div>
        </form>
    </div>





    </div>

</body>

</html>
<script>
    function xuatphieu(maphieuthue, date) {
        var days = dateDiff(date);
        maphieuthue = maphieuthue.slice(0, maphieuthue.length - 1);
        console.log(maphieuthue);
        $.ajax({
            type: "POST",
            url: "hoadon_action.php",
            data: {
                "MaPhieuThueCanXuat": maphieuthue,
                "SoNgayThue": days
            },
            success: function(data) {
                $('#hoadon').append(data);

                tinhtxtTriGia();
            }
        });

    }

    function xoaphieu(xoa) {
        console.log(xoa);
        $('#' + xoa).remove();

        tinhtxtTriGia();
    }


    function tinhtxtTriGia() {
        var tong = 0;
        var arr = $('.thanhtien');
        for (var i = 0; i < arr.length; i++) {
            tong += Number(arr[i].innerText);
        }

        $('#txtTriGia').val(tong);

    }
    $('#ThongTinHoaDon').on('submit', function() {
        event.preventDefault();
        var formData = $(this).serialize();

        
        var maPhieuThue = $('.maPhieuThue');
        var i;
        for (i = 0; i < maPhieuThue.length; i++) {
            formData += '&maPhieuThue[]=' + maPhieuThue[i].innerText;
        }

        var soNgayThue = $('.soNgayThue');
        for (i = 0; i < soNgayThue.length; i++) {
            formData += '&NgayBdThue[]=' + soNgayThue[i].innerText;
        }

        var thanhTien = $('.thanhTien');
        for (i = 0; i < thanhTien.length; i++) {
            formData += '&thanhTien[]=' + thanhTien[i].innerText;
        }

        var donGiaDuocTinh = $('.donGiaDuocTinh');
        for (i = 0; i < donGiaDuocTinh.length; i++) {
            formData += '&donGiaDuocTinh[]=' + donGiaDuocTinh[i].innerText;
        }

        for (i = 0; i < donGiaDuocTinh.length; i++) {
            formData += '&soNgayThue[]=' + Math.round(Number(thanhTien[i].innerText) / Number(donGiaDuocTinh[i].innerText));
        }
        
        var query = formData.replace(/\[/g,"%5B").replace(/\]/g,"%5D");

        console.log(query);
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: query,
            success: function(data) {
                alert('Tạo hóa đơn thành công!');
            }
        });
    });

    function dateDiff(date) {
        var start = date;
        var end = $("#txtNgayLapHD").val();
        var days = (Date.parse(end) - Date.parse(start)) / (1000 * 60 * 60 * 24);
        console.log(days);
        if (days === 0) days++;
        return days;
    }
    $(document).ready(function() {
        $('#txtNgayLapHD').val(new Date().toJSON().slice(0, 10));
    });

</script>