-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2021 pada 01.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookaja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Coffee'),
(2, 'Indonesian Food'),
(3, 'Western Food'),
(4, 'Dessert'),
(5, 'Chinese Food'),
(6, 'Drink'),
(7, 'Appetizer'),
(8, 'Cake');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nama`, `email`, `isi`) VALUES
(0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fedback`
--

CREATE TABLE `fedback` (
  `Comment_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Customer_Id` int(10) NOT NULL,
  `DateStamp` date NOT NULL,
  `Data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `O_Id` int(11) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Payment_Method` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `StatusAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`O_Id`, `User_Id`, `P_Name`, `Image`, `Payment_Method`, `Address`, `Phone`, `Product_Id`, `Quantity`, `Amount`, `Date`, `Status`, `StatusAdmin`) VALUES
(62, 9, 'Bundle 4', 'images/home/15_06_21_02_40_51_cs.jpeg', '', 'Banjarbaru', 2147483647, 0, 1, 75000, '2021-06-16', 'Checked', 'ok'),
(63, 9, 'Bundle 2', 'images/home/bundle.png', '', 'Banjarbaru', 2147483647, 96, 1, 75000, '2021-06-16', 'Checked', 'notOk'),
(64, 9, 'Bundle 4', 'images/home/15_06_21_02_40_51_cs.jpeg', '', 'Banjarbaru', 2147483647, 0, 1, 75000, '2021-06-16', 'Checked', 'notOk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `B_Id` int(10) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `Stock` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`B_Id`, `P_Name`, `Stock`, `Price`, `Image`, `Deskripsi`) VALUES
(0, 'Bundle 4', 100, 75000, 'images/home/15_06_21_02_40_51_cs.jpeg', 'PROMO BUNDLE 4'),
(95, 'Bundle 1', 100, 75000, 'images/home/bundle.png', 'PROMO BUNDLE 1'),
(96, 'Bundle 2', 100, 75000, 'images/home/bundle.png', 'PROMO BUNDLE 2'),
(97, 'Bundle 3', 100, 75000, 'images/home/bundle.png', 'PROMO BUNDLE 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(1) NOT NULL,
  `vote` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recipe`
--

CREATE TABLE `recipe` (
  `P_Id` int(10) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `RecipeName` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Deskripsi` mediumtext NOT NULL,
  `Made` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `recipe`
--

INSERT INTO `recipe` (`P_Id`, `Model`, `RecipeName`, `Category`, `Image`, `Deskripsi`, `Made`) VALUES
(0, '', 'Teh Manis', 'Drink', 'images/home/06_06_21_05_37_22_teh.jpg', 'Buat Teh Manis', 'Admin CookAja'),
(1, 'resep', 'Garlic Bread', 'Appetizer', 'images/home/appetizer.png', 'Bahan-bahan :\r\n<br> 1 Roti (french) baguette, dipotong menjadi ~16 pcs </br>\r\n\r\n<br> 80 g Unsalted butter, suhu ruang (lembut, bukan cair) </br>\r\n\r\n<br> 5 siung Bawang putih, cincang halus </br>\r\n\r\n<br> 1/2 sdt Bubuk pasley atau 2 sdm Fresh parsley cincang </br>\r\n\r\n<br> 3 sdm Keju cheddar parut </br>\r\n<br></br>\r\n<br> Cara Memasak : <br>\r\n\r\n<br> 1. Roti yang paling cocok dipakai untuk garlic bread adalah French baguette atau sourdough bread. Rotinya tidak manis dan tidak lembut seperti roti tawar yang biasa sudah ditambah gula, telur, dan mentega. Potong sesuai selera, saya biasa potong baguette cukup tebal dan satu baguette dibagi menjadi 16 pcs.\r\n</br>\r\n\r\n<br> 2. Campur bawang putih cincang, butter, dan bubuk parsely di satu mangkuk. Biarkan butter di suhu ruang agar bisa dicampur dengan baik.</br>\r\n\r\n<br> 3. Parut keju cheddar (saya pakai mild cheddar, bisa diganti parmesan) kedalam campuran tadi. Aduk kembali sampai rata. </br>\r\n\r\n<br> 4. Olesi setiap roti dengan garlic butter spread (campuran tadi). Pastikan merata dan taruh roti diatas loyang yang sudah dilapisi alumunium foil.</br>\r\n\r\n<br> 5. Preheat oven ke suhu 200 C. Panggang garlic bread selama 10-12 menit sampai golden brown. Angkat dan sajikan sebagai appetizer untuk pasta, soup </br>\r\n\r\n<br> 6. Dengan ukuran roti baguette yang bervariasi, 2 slice garlic bread akan memiliki sekitar 191 kkal. Dengan butter, jumlah lemak jenuhnya menjadi cukup tinggi. Namun yang terpenting adalah menjadi sumber karbohidrat untuk cream soup atau bahkan salad.\r\n*tabel nutrisi ini hanyalah perkiraan dan akan bervariasi dengan penggunaan bahan yang berbeda. </br>', 'Admin CookAja'),
(3, 'resep', 'Ramen', 'Chinese Food', 'images/home/ramen.jpg', 'Bundle :\r\n<br> Mie telur</br>\r\n<br> 2 buah wortel </br>\r\n<br> 1 daun bawang</br>\r\n<br> Rumput laut 1 porsi</br>\r\n<br> Suwiran daging sapi 1 porsi</br>\r\n<br> Bakso ikan 2 buah</br>\r\n<br> Telur 1 butir </br>\r\n<br> Pokcoy 2 buah</br>\r\n<br> 2 siung bawang putih</br>\r\n<br> 1 buah bawang Bombay</br>\r\n<br> kecap asin 1 sachet</br>\r\n<br> saus tiram 1 sachet</br>\r\n<br> Kecap ikan 1 sachet</br>\r\n<br> Merica 1 sachet</br>\r\n<br> Garam</br>\r\n\r\n<br> Resep :</br>\r\n<br> 1.	Tumis bawang putih dan bombai. Tuang air rebusan daging sapi. Beri bumbu pelengkap, angkat jika sudah mendidih.</br>\r\n<br> 2.	 Rebus mie dan pokcoy.</br>\r\n<br> 3.	Taruh mie dan pokcoy di mangkuk. Siram kuah, beri topping daging suwir, wortel iris, rumput laut, telur rebus, dan bakso ikan.\r\n</br>', 'CA Prisla'),
(4, 'resep', 'Dalgona', 'Coffee', 'images/home/dalgona.jpg', 'Bundle :\r\n<br> 2 sachet kopi instan murni tanpa ampas </br>\r\n<br> 1/2 kg gula pasir </br>\r\n<br> 100 ml susu full cream </br>\r\n\r\nResep :</br>\r\n<br> 1.	Masukkan kopi instan, gula pasir, dan air panas. Aduk memutar dengan saringan hingga foam terbentuk.</br>\r\n<br> 2.	Aduk hingga foam mulai padat, kurang lebih 3-6 menit.</br>\r\n<br> 3.	Tuangkan susu full cream 3/4 dari gelas, jangan sampai foam tenggelam</br>\r\n<br> 4.	Sajikan Dalgona</br>', 'CA Nadilla'),
(7, 'resep', 'Bubur Ayam', 'Indonesian Food', 'images/home/buburayam.jpg', 'Bundle :\r\n<br> 2 cup beras\r\n<br> 1/2 dada ayam\r\n<br> Daun seledri 1 buah\r\n<br> Kunyit 1 buah\r\n<br> Jahe 1 buah\r\n<br> Ketumbar 1 sachet\r\n<br> Kemiri 1 sachet\r\n<br> Bawang merah 2 buah\r\n<br> Bawang putih 2 buah\r\n<br> Serai 1 buah\r\n<br> Daun jeruk 3 buah\r\n<br> Daun salam 3 buah\r\n\r\n<br> Resep :\r\n<br> 1.	Rebus ayam dan ambil kaldunya untuk merebus beras dan untuk kuah kuningnya.goreng ayam lalu suwir, sisihkan\r\n<br> 2.	Rebus beras bersama kaldu tambahkan daun salam dan garam,aduk aduk hingga menjadi bubur\r\n<br> 3.	Kuah kuning : bawang merah,bawang putih,kunyit,jahe,ketumbar,kemiri dihaluskan. Tumis bumbu hingga harum masukan daun jeruk,serai dan sisa kaldu,tunggu sampai mendidih\r\n<br> 4.	Sajikan\r\n', 'CA Aqmal'),
(8, 'resep', 'Batagor', 'Appetizer', 'images/home/batagor.jpg', 'Bundle :\r\n<br> 1 tahu putih\r\n<br> tepung tapioka/aci 2 sachet mini\r\n<br> tepung terigu 1/2 kg\r\n<br> Kulit pangsit 1 pack\r\n<br> Telur 1 butir\r\n<br> Bawang daun 2 buah\r\n<br> Bawang putih 2 buah\r\n<br> Garam\r\n<br> Kaldu jamur 2 sachet\r\n<br> Merica 1 sachet\r\n\r\n<br> Resep : \r\n<br> 1.	Campurkan tepung tapioka, tepung terigu, telur, bawang daun, garam, kaldu jamur, merica ke dalam wadah\r\n<br> 2.	Masukan tahu yang sudah dihaluskan ke dalam wadah\r\n<br> 3.	Haluskan bawang putih, beri air hangat lalu masukan ke dalam adonan aduk hingga rata\r\n<br> 4.	Ambil kulit pangsit beri adonan 1 sendok makan. Bentuk adonan\r\n<br> 5.	Ulangi hingga kulit pangsit habis. Lalu goreng di minyak sedang agar kulit tidak cepat gosong namun matang di dalam.\r\n<br> 6.	Sajikan dengan bumbu kacang.\r\n', 'CA Angel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `specifications`
--

CREATE TABLE `specifications` (
  `Sp_Id` int(10) NOT NULL,
  `P_Id` int(10) NOT NULL,
  `Weight` int(10) NOT NULL,
  `Height` int(10) NOT NULL,
  `Width` int(10) NOT NULL,
  `Shippable` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `specifications`
--

INSERT INTO `specifications` (`Sp_Id`, `P_Id`, `Weight`, `Height`, `Width`, `Shippable`) VALUES
(1, 1, 50, 50, 50, 'Bisa Diantar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8 NOT NULL,
  `website` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pesan` text CHARACTER SET utf8 NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `nama`, `website`, `pesan`, `tanggal`, `time`) VALUES
(15, 'Newbie Cook123', 'Dalgona Coffee', 'Resep ini gampang banget dibuatnya makasih CookAja!!', '2021-01-11', '02:14:56'),
(16, 'prisla', 'Batagor', 'enak banget:)', '2021-06-02', '06:28:44'),
(17, 'prisla', 'Teh Manis', 'good', '2021-06-05', '17:35:53'),
(18, 'prisla', 'testing', 'tes', '2021-06-08', '16:07:14'),
(19, 'prisla', 'Bubur Ayam', 'mantep', '2021-06-16', '05:05:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `UserId` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Re-Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Email`, `Password`, `Address`, `Phone`, `Type`, `Re-Password`) VALUES
(4, 'admin', 'admin@gmail.com', 'admin123', 'Bandung', 511123, 'admin', 'admin123'),
(9, 'prislanovia', 'prisla@gmail.com', '12345678', 'Bandung', 2147483647, 'vip', ''),
(11, 'Rizkyta', 'rizkyta@gmail.com', '12345678', 'Bandung', 2147483647, 'user', ''),
(12, 'nadilla', 'nadilla@gmail.com', '12345678', 'bandung', 812345678, 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_Id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`B_Id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indeks untuk tabel `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`Sp_Id`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `O_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
