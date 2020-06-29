<?php
include('../data_acess/Database.php');




    $result= "INSERT INTO hoadon (MaHD,TriGia,TenKh,DiaChi,NgayLap) 
    VALUES (:mahoadon,:trigia,:khachhang,:diachi,:ngay) ";
    $data = array(
        ':mahoadon' => $_POST["mahd"],
        ':trigia' => $_POST["tongtien"],
        ':khachhang' => $_POST["coquan"],
        ':diachi' => $_POST["add"],
        'ngay'=> $_POST["ngaylaphoadon"]
    );
    $statement = $conn->prepare($result);
    $statement->execute($data);



?>