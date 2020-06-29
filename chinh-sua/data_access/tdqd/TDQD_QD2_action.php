<?php

include('../Database.php');

if($_POST['action'] == 'edit')
{

 $data = array(
  ':MaLoaiKh'  => $_POST['MaLoaiKh'],
  ':TenLoaiKh'  => $_POST['TenLoaiKh']
 );

 $query = "
 UPDATE loaikhach
 SET TenLoaiKh = :TenLoaiKh
 WHERE MaLoaiKh = :MaLoaiKh
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
