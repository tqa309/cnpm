<?php

include('../Database.php');

try {
  $query = "UPDATE thamso
    SET GiaTri = :SoKhachToiDa 
    WHERE TenThamSo = 'SoKhachToiDa'";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':SoKhachToiDa' => $_POST['SoKhachToiDa']
  ));
  echo "okay";
} catch (PDOException $e) {
  echo $e->getMessage();
}