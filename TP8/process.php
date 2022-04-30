<?php
include('db.php'); // mengakses file db.php
// Kode proses mengisi data masing-masing bagian isi database dan menyimpan datanya
if (isset($_GET["countryName"])) 
{
    $countryName = $_GET["countryName"];
    $countryCode = $_GET["countryCode"];
    $cityName = $_GET["cityName"];
    $cityPopulation = $_GET["cityPopulation"];
    $platNomor = $_GET["platNomor"];

    $db = new Database();

    $db->saveCountryCityData($countryName, $countryCode, $cityName, $cityPopulation, $platNomor);

    back();
} else {
    back();
}

function back()
{
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
