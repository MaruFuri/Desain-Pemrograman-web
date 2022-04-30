<?php

ini_set('display errors', 1);

// konfigurasi database
class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "country_data"; // Database yang kita buat di PHPmyAdmin
    // public $connection = "";

    function __construct()
    {
    }
    function connectDatabase()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$this->connection) {
            die("Could not connect: " . mysqli_error());
        }
    }
    function closeDatabase()
    {
        mysqli_close($this->connection);
    }
    // Fungsi untuk mengisi database
    function getCountryCityData()
    {
        $this->connectDatabase();
        $query = "SELECT * FROM country_city";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $this->closeDatabase();
        return $data;
    }
    // Fungsin untuk menyimpan isian database
    function saveCountryCityData($countryName, $countryCode, $cityName, $cityPopulation, $platNomor)
    {
        $this->connectDatabase();
        $query = "INSERT INTO country_city(countryName, countryCode, cityName, cityPopulation, platNomor) VALUES ('$countryName', '$countryCode', '$cityName', '$cityPopulation', '$platNomor')";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die('Could not get data: ' . mysqli_error());
        }
        $this->closeDatabase();
    }
}
