<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost:3308; dbname=qlks;", "root", "");

function fill_select_box($connect,$temp)
{
    if ($temp==0){
    $query = "
    SELECT * FROM loaiphong 
    
    ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '';

    foreach($result as $row)
    {
    $output .= '<option value="'.$row["MaLoaiPhong"].'">'.$row["TenLoaiPhong"].'</option>';
    }

    return $output;
    }
    
    else 
    {
    $output = ' <option value=0>Còn trống</option><option value=2>Đang sửa chữa</option>';
    return $output;
    }
}
?>