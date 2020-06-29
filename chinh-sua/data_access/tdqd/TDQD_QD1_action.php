<?php

include('../Database.php');

if($_POST['action'] == 'edit')
{

 $data = array(
  ':MaLoaiPhong'  => $_POST['MaLoaiPhong'],
  ':TenLoaiPhong'  => $_POST['TenLoaiPhong'],
  ':DonGiaTieuChuan'  => $_POST['DonGiaTieuChuan'],
  ':SoLuong'   => $_POST['SoLuong']
 );

 $query = "UPDATE loaiphong
 SET TenLoaiPhong = :TenLoaiPhong, 
 DonGiaTieuChuan = :DonGiaTieuChuan, 
 SoLuong = :SoLuong
 WHERE MaLoaiPhong = :MaLoaiPhong
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM loaiphong 
 WHERE MaLoaiPhong = '".$_POST["MaLoaiPhong"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";