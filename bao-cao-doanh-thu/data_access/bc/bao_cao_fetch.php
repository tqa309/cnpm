<?php

include('../Database.php');

$column = array("MaLoaiPhong", "DoanhThu", "TiLe");

$query = "SELECT * FROM ct_baocaodt LIMIT 3";

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$i = 1;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $i;
 $i++;
 $sub_array[] = $row['MaLoaiPhong'];
 $sub_array[] = number_format($row['DoanhThu']) . 'đ';
 $sub_array[] = $row['TiLe'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM ct_baocaodt LIMIT 3";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
