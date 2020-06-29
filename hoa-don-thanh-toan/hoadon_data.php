<?php
include('../data_acess/Database.php');




    $result= "INSERT INTO hoadon (MaHD,TriGia,TenKh,DiaChi,NgayLap) 
    VALUES (:MaHD,:TriGia,:TenKh,:DiaChi,:NgayLap) ";
    $data = array(
        ':MaHD' => $_POST['txtMaHD'], 
       ':TriGia' => $_POST['txtTriGia'],
       ':TenKh' => $_POST['txtCoQuan'],
       ':DiaChi' => $_POST['txtDiaChi'],
       ':NgayLap' => $_POST['txtNgayLapHD']
    );
    $statement = $conn->prepare($result);
    $statement->execute($data);



?>