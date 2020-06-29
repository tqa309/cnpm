<?php

include('../Database.php');

try {
    $query = "UPDATE thamso
      SET GiaTri = :HeSoPhuThu 
      WHERE TenThamSo = 'PhuThuKhachNN'";
    $statement = $connect->prepare($query);
    $statement->execute(array(
      ':HeSoPhuThu' => $_POST['phuThuKhachNN']
    ));

    $query = "
    UPDATE loaikhach
    SET HeSoPhuThu = :HeSoPhuThu
    WHERE MaLoaiKh = 'NN'
    ";
    $statement = $connect->prepare($query);
    $statement->execute(array(
      ':HeSoPhuThu' => $_POST['phuThuKhachNN']
    ));
    echo "okay";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }