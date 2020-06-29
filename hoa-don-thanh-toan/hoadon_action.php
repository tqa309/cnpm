<?php
    $conn = new PDO("mysql:host=localhost:3308; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
if(isset($_POST["MaPhieuThueCanXuat"])){
  $query ='SELECT * from `phieuthue` WHERE MaPhieuThue = :MaPhieuThueCanXuat';
  $data = array(
    ':MaPhieuThueCanXuat' => strval($_POST["MaPhieuThueCanXuat"])
  );
  $statement = $conn->prepare($query);
  $statement->execute($data);
  $result=$statement->fetchAll();
  foreach($result as $row) {
    echo '<tr id="' . $row["MaPhieuThue"] . '"><td>' . $row["MaPhieuThue"]. "</td>" .
    "<td>" . $row["NgayBdThue"] . "</td>".
    "<td>" . $row["DonGiaTieuChuan"] . "</td>".
    "<td>" . $row["DonGiaDuocTinh"] . "</td>".
    "<td>" . $row["SoLuongKh"] . "</td>".
    "<td>" . $row["MaPhong"] . "</td>". 
    "<td class='thanhtien'>" . strval(intval($row["DonGiaDuocTinh"]) * intval($_POST["SoNgayThue"])) . "</td><td>".
    '<button onclick="xoaphieu(' . $row["MaPhieuThue"] . ')">drop</button></td></tr>';
     
}

}

?>