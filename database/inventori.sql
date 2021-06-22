-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Jun 2021 pada 00.20
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'operator', NULL, NULL);

--
-- Dumping data untuk tabel `stock_ins`
--

INSERT INTO `stock_ins` (`id`, `kode_brg`, `nama_brg`, `tanggal_masuk`, `jumlah`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '001', 'ABC Squash Delight', '2021-06-21 00:00:00', 1, '001-1624256271.jpg', 'Barang baru diubah', '2021-06-20 21:55:07', '2021-06-21 06:00:15'),
(9, '002', 'shfsjkdhfsdhf', '2021-06-11 00:00:00', 0, '002-1624257532.jpg', 'sdfs sfsdfsdf sddf sd', '2021-06-20 22:38:52', '2021-06-21 05:35:27'),
(10, '003', 'sdfsd sdf sfsd', '2021-06-16 00:00:00', 5, '003-1624346170.jpg', 'barang baru masuk', '2021-06-22 07:16:10', '2021-06-22 07:16:47');

--
-- Dumping data untuk tabel `stock_outs`
--

INSERT INTO `stock_outs` (`id`, `kode_brg`, `nama_brg`, `tanggal_keluar`, `jumlah`, `penerima`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '001', 'ABC Squash Delight', '2021-06-21 00:00:00', 5, 'Faisal', 'sdfsd sdf sdfsd f sd', '2021-06-21 04:58:07', '2021-06-21 06:00:15'),
(2, '001', 'ABC Squash Delight', '2021-06-21 00:00:00', 3, 'Setang', 'sdfsdf sdf sdfs dsdfsdf', '2021-06-21 05:29:57', '2021-06-21 05:29:57'),
(4, '003', 'sdfsd sdf sfsd', '2021-06-22 00:00:00', 5, 'dsfsdfsdf sdf', 'sdf sdf sdf', '2021-06-22 07:16:47', '2021-06-22 07:16:47');

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `nama`, `email`, `password`, `remember_token`, `gambar`, `login_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'abdi', 'Fark Abdi Rani Waris', 'abdiarteta@gmail.com', '67e34fe76af250318a4861410a238e63859b5e90', NULL, 'default.png', '2021-06-22 15:15:28', '2021-06-21 02:46:05', '2021-06-22 07:15:28'),
(2, 2, 'faisal', 'Faisal A. Kadir', 'faisal@gmail.com', '9c817a550f82810aa948f2961ab695a5a26367e8', NULL, '1624345460.jpg', '2021-06-22 15:14:31', '2021-06-22 07:04:20', '2021-06-22 07:14:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
