-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 12.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_belajar_mysql`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`) VALUES
(1, 'Diah', 'Insani'),
(2, 'Fathie', 'Insanie'),
(3, 'Natalia', 'Isarie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
('C0001', 'Makanan'),
('C0002', 'Minuman'),
('C0003', 'Lain-Lain'),
('C0004', 'Oleh-Oleh'),
('C0005', 'Gadget');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`) VALUES
(1, 'diahinsani@gmail.com', 'diah', 'insani'),
(3, 'fathiinsani@gmail.com', 'fathi', 'insani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guestbooks`
--

CREATE TABLE `guestbooks` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guestbooks`
--

INSERT INTO `guestbooks` (`id`, `email`, `title`, `content`) VALUES
(1, 'guest@gmail.com', 'Hello', 'Hello'),
(2, 'guest2@gmail.com', 'Hello', 'Hello'),
(3, 'guest3@gmail.com', 'Hello', 'Hello'),
(4, 'diahinsani@gmail.com', 'Hello', 'Hello'),
(5, 'diahinsani@gmail.com', 'Hello', 'Hello'),
(6, 'diahinsani@gmail.com', 'Hello', 'Hello'),
(7, 'contoh@gmail.com', 'Contoh', 'Contoh'),
(8, 'contoh2@gmail.com', 'Contoh', 'Contoh'),
(9, 'contoh3@gmail.com', 'Diubah Oleh User 1', 'Contoh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `total`, `order_date`) VALUES
(1, 50000, '2022-06-06 08:41:00'),
(2, 50000, '2022-06-06 08:41:50'),
(3, 50000, '2022-06-06 08:41:52'),
(4, 50000, '2022-06-06 08:41:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_product` varchar(10) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id_product`, `id_order`, `price`, `quantity`) VALUES
('P0001', 1, 25000, 1),
('P0001', 2, 25000, 1),
('P0002', 1, 25000, 1),
('P0003', 2, 25000, 1),
('P0003', 3, 25000, 1),
('P0004', 3, 25000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `created_at`, `id_category`) VALUES
('P0001', 'Mie Ayam Bakso', 'Mie Ayam Bakso + Bakso Besar', 15000, 200, '2022-06-05 04:38:41', 'C0001'),
('P0002', 'Jus Alpucate', NULL, 9000, 100, '2022-06-05 04:38:41', 'C0002'),
('P0003', 'Mie Ayam Special', 'Mie Ayam Special + Ceker', 18000, 300, '2022-06-05 04:38:41', 'C0001'),
('P0004', 'Kerupuk', NULL, 3000, 1000, '2022-06-05 04:38:41', 'C0003'),
('P0005', 'Es Krim', NULL, 7000, 500, '2022-06-05 04:38:41', 'C0003'),
('P0006', 'Jus Jeruk', NULL, 11000, 100, '2022-06-05 04:38:41', 'C0002'),
('P0007', 'Sate Kambing', NULL, 30000, 500, '2022-06-05 04:38:41', 'C0001'),
('P0008', 'Kerupuk Udang', NULL, 5000, 400, '2022-06-05 04:38:41', 'C0003'),
('P0009', 'Jus Anggur', NULL, 13000, 200, '2022-06-05 04:38:41', 'C0002'),
('P0010', 'Mie Ayam Sedap', NULL, 20000, 200, '2022-06-05 04:38:41', 'C0001'),
('P0011', 'Perment', NULL, 1000, 1000, '2022-06-05 05:38:19', 'C0003'),
('X0001', 'X Satu', NULL, 25000, 200, '2022-06-06 06:12:17', NULL),
('X0002', 'X Dua', NULL, 100000, 300, '2022-06-06 06:12:17', NULL),
('X0003', 'X Tiga', NULL, 1000000, 500, '2022-06-06 06:12:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wallet`
--

INSERT INTO `wallet` (`id`, `id_customer`, `balance`) VALUES
(1, 1, 0),
(2, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_products` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_products`, `description`, `id_customer`) VALUES
(1, 'P0001', 'Makanan Kesukaan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indeks untuk tabel `guestbooks`
--
ALTER TABLE `guestbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_product`,`id_order`),
  ADD KEY `fk_orders_detail_orders` (`id_order`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`id_category`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_fulltext` (`name`,`description`);

--
-- Indeks untuk tabel `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `name_index` (`name`);

--
-- Indeks untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_customer_unique` (`id_customer`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wishlist_product` (`id_products`),
  ADD KEY `fk_wishlist_customer` (`id_customer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guestbooks`
--
ALTER TABLE `guestbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_orders_detail_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orders_detail_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `fk_wallet_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wishlist_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_wishlist_product` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
