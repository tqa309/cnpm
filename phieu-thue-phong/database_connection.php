<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost:3308; dbname=qlks;", "root", "");

function fill_select_box($connect)
{
 $query = "
  SELECT * FROM loaikhach 
  
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["MaLoaiKh"].'">'.$row["TenLoaiKh"].'</option>';
 }

 return $output;
}

function fill_loai_phong($connect)
{
 $query = "
  SELECT * FROM loaiphong
  
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["MaLoaiPhong"].'">'.$row["TenLoaiPhong"].'</option>';
 }

 return $output;
}

function fill_ma_khach($connect) {
  $query = "SELECT COUNT(MaKhachHang) AS SoKhachDaCo from khachhang";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = intval($row['SoKhachDaCo']) + 1;
  }

  return $soKhach;
}

function getKhachToiDa($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'SoKhachToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = intval($row['GiaTri']);
  }

  return $soKhach;
}

function getPhuThu($connect) {
  $query = "SELECT MaLoaiKh, HeSoPhuThu from loaikhach";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  $phuthu = [];

  foreach($result as $row) {
    $phuthu[] = array($row['MaLoaiKh'] => $row['HeSoPhuThu']);
  }

  return json_encode($result);
}

function getPhuThuKhachToiDa($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'PhuThuKhachToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = floatval($row['GiaTri']);
  }

  return $soKhach;
}

function getPhuThuKhachNN($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'PhuThuKhachNN'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = floatval($row['GiaTri']);
  }

  return $soKhach;
}
