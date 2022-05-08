<!-- Isi departemen data sesuai yang diminta form terlebih dahulu sebelum mengisi employee data agar tidak terjadi error-->
<!-- Ketika departemen data telah diisi, maka id tersebut digunakan pada saat mengisi form employee -->

<?php
// Kode untuk mengakses db.php
include('db.php');

//Memasukan data sesuai inputan
if (isset($_POST["employee_id"])) 
{
    $employee_id = $_POST["employee_id"];
    $employee_name = $_POST["employee_name"];
    $employee_department = $_POST["employee_department"];
    $employee_email = $_POST["employee_email"];

    //Membuat databse
    $db = new employee();
    // Memanggil fungsi berikut
    $db->saveEmployeeData($employee_id, $employee_name, $employee_department, $employee_email);

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
