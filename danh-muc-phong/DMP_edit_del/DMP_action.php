<?php

//action.php
include('Database.php');
//edit
if($_POST['action'] == 'edit')
{
 $data = array(
  ':MaPhong'  => $_POST['txtMaPhongSX'],
  ':TenPhong'  => $_POST['txtTenPhongSX'],
  ':TinhTrangPhong'  => $_POST['cbTinhTrangPhongSX'],
  ':Ghichu'   => $_POST['txtGhiChuSX'],
  ':MaLoaiPhong'    => $_POST['cbMaLoaiPhongSX']
 );
 
  $sql="
  SELECT TinhTrangPhong FROM danhmucphong 
  WHERE MaPhong = '".$_POST["txtMaPhongSX"]."' 
  ";
  $res;
  foreach ($connect->query($sql) as $row) {
    $res=$row['TinhTrangPhong'];
  }
  if($res != '1'){
  $query = "
  UPDATE danhmucphong 
  SET TenPhong = :TenPhong, 
  TinhTrangPhong = :TinhTrangPhong, 
  Ghichu = :Ghichu ,
  MaLoaiPhong = :MaLoaiPhong
  WHERE MaPhong = :MaPhong
  ";
  }
  $statement = $connect->prepare($query);
  $statement->execute($data);
  echo json_encode($_POST);
 
 
}

//delete
if($_POST['action'] == 'delete')
{
    $sql="
    SELECT TinhTrangPhong FROM danhmucphong 
    WHERE MaPhong = '".$_POST["txtMaPhongSX"]."' 
    ";
    $res;
    foreach ($connect->query($sql) as $row) {
      $res=$row['TinhTrangPhong'];
  }

  if($res != '1'){
    $query = "
    DELETE FROM danhmucphong 
    WHERE MaPhong = '".$_POST["txtMaPhongSX"]."'
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
  }
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

?>