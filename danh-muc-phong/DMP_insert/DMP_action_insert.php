<?php

$error1='';
$error2='';
if(isset($_POST["txtMaPhongTP"]))
{
 include('database_connection.php');
 $sql = "SELECT MaPhong FROM danhmucphong";
 foreach ($connect->query($sql) as $row) {
    for($count = 0; $count < count($_POST["txtMaPhongTP"]); $count++){
        if ($row['MaPhong']==$_POST["txtMaPhongTP"][$count])
        $error1.=' | '.$row['MaPhong'].' | ';
    }

}
for($count1 = 0; $count1 < count($_POST["txtMaPhongTP"]); $count1++){
    for($count2 = $count1 +1; $count2 < count($_POST["txtMaPhongTP"]); $count2++){
        if ($_POST["txtMaPhongTP"][$count1]==$_POST["txtMaPhongTP"][$count2]){
            $error2.=' '.$_POST["txtMaPhongTP"][$count1].', ';
            break;
        }
        if ($error2!='') {break;}
    }

}
 

if ($error1=='' and $error2==''){
    for($count = 0; $count < count($_POST["txtMaPhongTP"]); $count++)
    {
    $data = array(
    ':MaPhong'   => $_POST["txtMaPhongTP"][$count],
    ':TenPhong'   => $_POST["txtTenPhongTP"][$count],
    ':MaLoaiPhong'  => $_POST["cbMaLoaiPhongTP"][$count],
    ':TinhTrangPhong'  => $_POST["cbTinhTrangPhongTP"][$count],
    ':GhiChu'   => $_POST["txtGhiChuTP"][$count]
    
    );

    $query = "
    INSERT INTO danhmucphong 
        (MaPhong, TenPhong, MaLoaiPhong, TinhTrangPhong, GhiChu) 
        VALUES (:MaPhong, :TenPhong, :MaLoaiPhong, :TinhTrangPhong, :GhiChu)
    ";

    $statement = $connect->prepare($query);

    $statement->execute($data);
    }
    echo 'ok';
}
else
{
    if ($error1!='') echo 'CÓ Mã Phòng bị trùng với CSDL: '.$error1.'<br>'; 
    if ($error2!='') echo 'CÓ Mã Phòng bị trùng trong quá trình nhập ';
}
 
}


?>