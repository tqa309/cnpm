<?php

include('../Database.php');

try {
  $query = "INSERT INTO loaiphong
    VALUES (:MaLoaiPhong, :TenLoaiPhong, :DonGiaTieuChuan, :SoLuong)";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':MaLoaiPhong' => $_POST['MaLoaiPhong'],
    ':TenLoaiPhong' => $_POST['TenLoaiPhong'],
    ':DonGiaTieuChuan' => $_POST['DonGiaTieuChuan'],
    ':SoLuong' => $_POST['SoLuong']
  ));
  echo "okay";
} catch (PDOException $e) {
  echo $e->getMessage();
}