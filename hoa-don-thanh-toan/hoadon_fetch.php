<?php
$conn = new PDO("mysql:host=localhost:3308; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



$sql = "SELECT * FROM `phieuthue`";
$statement = $conn->prepare($sql);
$statement->execute();

$result=$statement->fetchAll();




  // output data of each row
  foreach($result as $row) {
    echo '<tr id="'.$row["MaPhieuThue"]. '1'.'"><td>' . $row["MaPhieuThue"]. "</td>" .
    "<td>".$row["NgayBdThue"]."</td>".
    "<td>".$row["DonGiaTieuChuan"]."</td>".
    "<td>".$row["DonGiaDuocTinh"]."</td>".
    "<td>".$row["SoLuongKh"]."</td>".
    "<td>".$row["MaPhong"]."</td><td>". 
    '<button onclick="xuatphieu('."'".$row["MaPhieuThue"]. '1'."'".",'".$row["NgayBdThue"]. "'".')">chon</button></td><tr>';
     
}