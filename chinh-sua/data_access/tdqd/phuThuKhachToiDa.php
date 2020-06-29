<?php

include('../Database.php');

try {
    $query = "UPDATE thamso
      SET GiaTri = :HeSoPhuThu 
      WHERE TenThamSo = 'PhuThuKhachToiDa'";
    $statement = $connect->prepare($query);
    $statement->execute(array(
      ':HeSoPhuThu' => $_POST['phuThuKhachToiDa']
    ));
    echo "okay";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }