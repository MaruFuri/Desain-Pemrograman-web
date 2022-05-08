<!-- Isi departemen data sesuai yang diminta form terlebih dahulu sebelum mengisi employee data agar tidak terjadi error-->
<!-- Ketika departemen data telah diisi, maka id tersebut digunakan pada saat mengisi form employee -->

<?php
// Kode untuk mengakses db.php
include('db.php');

//Memasukan data sesuai inputan
if (isset($_POST["data"])) 
{
    $data = $_POST["data"];
    $value = $_POST["value"];

    //Membuat database
    $db = new company();
    // Memanggil fungsi berikut
    $db->saveCompanyData($data, $value);

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
