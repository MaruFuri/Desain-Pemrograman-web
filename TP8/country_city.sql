-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2022 pada 17.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `country_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `country_city`
--

CREATE TABLE `country_city` (
  `id` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `countryCode` varchar(100) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `cityPopulation` varchar(100) NOT NULL,
  `platNomor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `country_city`
--

INSERT INTO `country_city` (`id`, `countryName`, `countryCode`, `cityName`, `cityPopulation`, `platNomor`) VALUES
(1, 'Indonesia', '001', 'Sukabumi', '20.000', 'F'),
(2, 'Indonesia', '002', 'Cianjur', '21.000', 'F'),
(3, 'Indonesia', '003', 'Bogor', '22.000', 'F'),
(4, 'Indonesia', '004', 'Bandung', '23.000', 'D'),
(5, 'Indonesia', '005', 'Jakarta', '24.000', 'B');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `country_city`
--
ALTER TABLE `country_city`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `country_city`
--
ALTER TABLE `country_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
