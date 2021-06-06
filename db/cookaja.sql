-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2021 pada 12.55
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
(11, 6, 'Bundle2', 'images/home/.jpg', '', 'Bandung', 21636881, 8, 4, 120000, '2021-06-01', 'notChecked', 'notOk'),
(13, 9, 'Bundle1', 'images/home/.jpg', '', 'Bandung', 2147483647, 8, 1, 30000, '2021-06-01', 'notChecked', 'notOk'),
(14, 11, 'Bundle2', 'images/home/.jpg', '', 'Bandung', 1234567890, 8, 2, 60000, '2021-06-01', 'notChecked', 'notOk');

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
(1, 'resep', 'Garlic Bread', 'Appetizer', 'images/home/appetizer.png', 'Bahan-bahan :\r\n1 Roti (french) baguette, dipotong menjadi ~16 pcs\r\n80 g Unsalted butter, suhu ruang (lembut, bukan cair)\r\n5 siung Bawang putih, cincang halus\r\n1/2 sdt Bubuk pasley atau 2 sdm Fresh parsley cincang\r\n3 sdm Keju cheddar parut\r\n\r\nCara Memasak :\r\n1. Roti yang paling cocok dipakai untuk garlic bread adalah French baguette atau sourdough bread. Rotinya tidak manis dan tidak lembut seperti roti tawar yang biasa sudah ditambah gula, telur, dan mentega. Potong sesuai selera, saya biasa potong baguette cukup tebal dan satu baguette dibagi menjadi 16 pcs.\r\n\r\n2. Campur bawang putih cincang, butter, dan bubuk parsely di satu mangkuk. Biarkan butter di suhu ruang agar bisa dicampur dengan baik.\r\n\r\n3. Parut keju cheddar (saya pakai mild cheddar, bisa diganti parmesan) kedalam campuran tadi. Aduk kembali sampai rata.\r\n\r\n4. Olesi setiap roti dengan garlic butter spread (campuran tadi). Pastikan merata dan taruh roti diatas loyang yang sudah dilapisi alumunium foil.\r\n\r\n5. Preheat oven ke suhu 200 C. Panggang garlic bread selama 10-12 menit sampai golden brown. Angkat dan sajikan sebagai appetizer untuk pasta, soup\r\n\r\n6. Dengan ukuran roti baguette yang bervariasi, 2 slice garlic bread akan memiliki sekitar 191 kkal. Dengan butter, jumlah lemak jenuhnya menjadi cukup tinggi. Namun yang terpenting adalah menjadi sumber karbohidrat untuk cream soup atau bahkan salad.\r\n*tabel nutrisi ini hanyalah perkiraan dan akan bervariasi dengan penggunaan bahan yang berbeda.', 'Admin CookAja'),
(3, 'resep', 'Ramen', 'Chinese Food', 'images/home/ramen.jpg', 'Bundle :\r\n•	Mie telur\r\n•	2 buah wortel \r\n•	1 daun bawang\r\n•	Rumput laut 1 porsi\r\n•	Suwiran daging sapi 1 porsi\r\n•	Bakso ikan 2 buah\r\n•	Telur 1 butir \r\n•	Pokcoy 2 buah\r\n•	2 siung bawang putih\r\n•	1 buah bawang Bombay\r\n•	kecap asin 1 sachet\r\n•	saus tiram 1 sachet\r\n•	Kecap ikan 1 sachet\r\n•	Merica 1 sachet\r\n•	Garam\r\nResep :\r\n1.	Tumis bawang putih dan bombai. Tuang air rebusan daging sapi. Beri bumbu pelengkap, angkat jika sudah mendidih.\r\n2.	 Rebus mie dan pokcoy.\r\n3.	Taruh mie dan pokcoy di mangkuk. Siram kuah, beri topping daging suwir, wortel iris, rumput laut, telur rebus, dan bakso ikan.\r\n', 'CA Prisla'),
(4, 'resep', 'Dalgona', 'Coffee', 'images/home/dalgona.jpg', 'Bundle :\r\n•	2 sachet kopi instan murni tanpa ampas \r\n•	½ kg gula pasir \r\n•	100 ml susu full cream\r\nResep :\r\n4.	Masukkan kopi instan, gula pasir, dan air panas. Aduk memutar dengan saringan hingga foam terbentuk.\r\n5.	Aduk hingga foam mulai padat, kurang lebih 3-6 menit.\r\n6.	Tuangkan susu full cream ¾ dari gelas, jangan sampai foam tenggelam\r\n7.	Sajikan Dalgona', 'CA Nadilla'),
(7, 'resep', 'Bubur Ayam', 'Indonesian Food', 'images/home/buburayam.jpg', 'Bundle :\r\n•	2 cup beras\r\n•	1/2 dada ayam\r\n•	Daun seledri 1 buah\r\n•	Kunyit 1 buah\r\n•	Jahe 1 buah\r\n•	Ketumbar 1 sachet\r\n•	Kemiri 1 sachet\r\n•	Bawang merah 2 buah\r\n•	Bawang putih 2 buah\r\n•	Serai 1 buah\r\n•	Daun jeruk 3 buah\r\n•	Daun salam 3 buah\r\nResep :\r\n1.	Rebus ayam dan ambil kaldunya untuk merebus beras dan untuk kuah kuningnya.goreng ayam lalu suwir, sisihkan\r\n2.	Rebus beras bersama kaldu tambahkan daun salam dan garam,aduk aduk hingga menjadi bubur\r\n3.	Kuah kuning : bawang merah,bawang putih,kunyit,jahe,ketumbar,kemiri dihaluskan. Tumis bumbu hingga harum masukan daun jeruk,serai dan sisa kaldu,tunggu sampai mendidih\r\n4.	Sajikan\r\n', 'CA Aqmal'),
(8, 'resep', 'Batagor', 'Appetizer', 'images/home/batagor.jpg', 'Bundle :\r\n•	1 tahu putih\r\n•	tepung tapioka/aci 2 sachet mini\r\n•	tepung terigu ½ kg\r\n•	Kulit pangsit 1 pack\r\n•	Telur 1 butir\r\n•	Bawang daun 2 buah\r\n•	Bawang putih 2 buah\r\n•	Garam\r\n•	Kaldu jamur 2 sachet\r\n•	Merica 1 sachet\r\nResep : \r\n1.	Campurkan tepung tapioka, tepung terigu, telur, bawang daun, garam, kaldu jamur, merica ke dalam wadah\r\n2.	Masukan tahu yang sudah dihaluskan ke dalam wadah\r\n3.	Haluskan bawang putih, beri air hangat lalu masukan ke dalam adonan aduk hingga rata\r\n4.	Ambil kulit pangsit beri adonan 1 sendok makan. Bentuk adonan\r\n5.	Ulangi hingga kulit pangsit habis. Lalu goreng di minyak sedang agar kulit tidak cepat gosong namun matang di dalam.\r\n6.	Sajikan dengan bumbu kacang.\r\n', 'CA Angel');

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
(17, 'prisla', 'Teh Manis', 'good', '2021-06-05', '17:35:53');

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
(9, 'prislanovia', 'prisla@gmail.com', '12345678', 'Banjarbaru', 2147483647, 'user', ''),
(11, 'Rizkyta', 'rizkyta@gmail.com', '12345678', 'Bandung', 2147483647, 'user', '');

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
  MODIFY `O_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
