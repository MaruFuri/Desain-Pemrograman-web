<?php
include('db.php'); // code untuk mengakses file db.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic & Crud</title>
    <link rel="stylesheet" href="style.css"> <!-- kode untuk mengakses file style.css -->
</head>

<body>
    <!-- Code untuk membuat sebuah form yang berisi nama negara, kode negara, nama kota, populasi, dan plat nomor -->
    <form action="process.php" method="get">
        <h3>Country - City Data Entry</h3>
        <div class="container">
            <label for="countryName">Country Name</label>
            <input name="countryName" type="text">

            <label for="countryCode">Country Code</label>
            <input name="countryCode" type="text">

            <label for="cityName">City Name</label>
            <input name="cityName" type="text">

            <label for="cityPopulation">City Population</label>
            <input name="cityPopulation" type="number">

            <label for="platNomor">Plat Nomor</label>
            <input name="platNomor" type="text">
        </div>

        <!-- Kode untuk tombol submit dan reset -->
        <div>
            <input id="submit" type="submit" value="Submit">
            <input id="reset" type="reset" value="Reset">
        </div>
    </form>
    <hr>
    <!-- Kode untuk memunculkan tabel sesuai isi dibawah -->
    <table>
        <tr>
            <th>No</th>
            <th>Country Name</th>
            <th>Country Code</th>
            <th>City Name</th>
            <th>City Population</th>
            <th>Plat Nomor</th>
        </tr>
        <!-- Kode yang digunakan untuk mengisi database yang nanti dibuat -->
        <?php
        $db = new Database();

        $datas = $db->getCountryCityData();
        foreach ($datas as $index => $data) {
            echo "<tr>" .
                "<td>" . ($index + 1) . "</td>" . // Nomor
                "<td>" . $data['countryName'] . "</td>" . // nama negara
                "<td>" . $data['countryCode'] . "</td>" . // kode negara
                "<td>" . $data['cityName'] . "</td>" . // nama kota
                "<td>" . $data['cityPopulation'] . "</td>" . // populasi
                "<td>" . $data['platNomor'] . "</td>" . // plat nomor
                "</tr>";
        }
        ?>
    </table>
</body>

</html>