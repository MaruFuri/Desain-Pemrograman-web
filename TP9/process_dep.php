<!-- Isi departemen data sesuai yang diminta form terlebih dahulu sebelum mengisi employee data agar tidak terjadi error-->
<!-- Ketika departemen data telah diisi, maka id tersebut digunakan pada saat mengisi form employee -->

<?php
// Kode untuk mengakses db.php
include('db.php');

//Memasukan data sesuai inputan
if (isset($_POST["department_id"])) 
{
    $department_id = $_POST["department_id"];
    $department_name = $_POST["department_name"];
    $department_address = $_POST["department_address"];

    //Membuat databse
    $db = new department();
    // Memanggil fungsi berikut
    $db->saveDepartmentData($department_id, $department_name, $department_address);

    back();
} 
else 
{
    back();
}

function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
