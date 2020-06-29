<?php

include('../Database.php');

try {
  $query = "INSERT INTO loaikhach 
    VALUES (:MaLoaiKh, :TenLoaiKh, :HeSoPhuThu)";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':MaLoaiKh' => $_POST['MaLoaiKh'],
    ':TenLoaiKh' => $_POST['TenLoaiKh'],
    ':HeSoPhuThu' => $_POST['HeSoPhuThu']
  ));
  echo "okay";
} catch (PDOException $e) {
  echo $e->getMessage();
}