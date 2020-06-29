<?php

//action.php
include('Database.php');
//edit

    $sql="
    SELECT TinhTrangPhong FROM danhmucphong 
    WHERE MaPhong = 'A121' 
    ";
    echo $sql.'<br>';
    foreach ($connect->query($sql) as $row) {
        echo $row['TinhTrangPhong'];
    }
    $res=$connect->query($sql);
    echo $res['TinhTrangPhong'];
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  echo "Connected successfully";

?>