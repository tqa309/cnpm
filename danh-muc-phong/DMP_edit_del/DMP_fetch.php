<?php

//fetch.php

include('Database.php');

$column = array("MaPhong", "TenPhong", "GhiChu", "TinhTrangPhong", "MaLoaiPhong");

$query = "SELECT * FROM danhmucphong ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE TenPhong LIKE "%'.$_POST["search"]["value"].'%" 
 OR MaPhong LIKE "%'.$_POST["search"]["value"].'%" 
 OR TinhTrangPhong LIKE "%'.$_POST["search"]["value"].'%" 
 OR GhiChu LIKE "%'.$_POST["search"]["value"].'%" 
 OR MaLoaiPhong LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY MaPhong DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();


//$connect1 = new PDO("mysql:host=localhost:3308; dbname=qlks", "root", "");
foreach($result as $row)
{
 $sub_array = array();
// $temp='SELECT TenLoaiPhong from loaiphong WHERE MaLoaiPhong='.$row['MaLoaiPhong'].'';
 $sub_array[] = $row['MaPhong'];
 $sub_array[] = $row['TenPhong'];
 //foreach ($connect1->query($temp) as $row1) {
  //$sub_array[] = $row1['TenLoaiPhong'];
//}
 $sub_array[] = $row['MaLoaiPhong'];
 $sub_array[] = $row['TinhTrangPhong'];
 $sub_array[] = $row['GhiChu'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM danhmucphong";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
