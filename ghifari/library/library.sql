-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2023 pada 00.24
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `authors`
--

INSERT INTO `authors` (`id`, `name`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Isabel Bosco', '081249627853', '526 Stiedemann Fields\nEffertzmouth, AL 37087', 'grimes.dane@gleichner.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(2, 'Gaylord Jacobs', '081260148410', '553 McCullough Forges\nKrysteltown, GA 80243-4791', 'syble.weissnat@yahoo.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(3, 'Keira Krajcik', '081291975700', '4126 Mckayla Mission\nCarissafurt, IL 96785', 'ureichert@ritchie.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(4, 'Fannie Schroeder', '081279975351', '617 Fadel Roads\nSouth Vivianberg, NH 19078-0269', 'paula.mertz@bashirian.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(5, 'Destiney Pollich', '081264612713', '5228 Francis Key\nLake Janick, ID 47003', 'blick.noah@nienow.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(6, 'Jevon Bergnaum', '08127401248', '18547 Gerlach Bypass Apt. 364\nTyreseberg, NV 25490-0577', 'percy.moore@yahoo.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(7, 'Dr. Viva Langosh', '081235026108', '2471 Conn Garden\nNew Mckennachester, IA 54513-0917', 'makayla.zieme@mills.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(8, 'Avery Murray', '081265127903', '745 Esther Loop Apt. 615\nWest Brice, DC 22107-3915', 'lcartwright@pacocha.info', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(9, 'Hipolito Pagac', '08125687633', '134 Wehner Vista\nWest Jarvisstad, CT 20330', 'zharber@hotmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(10, 'Mrs. Mireille Brown IV', '081266509586', '193 Murphy Island Apt. 438\nSantinaland, MN 30399', 'lowe.josie@gmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(11, 'Alysa Rau', '08129293483', '602 Nettie Stream Suite 182\nKingstad, RI 64767', 'johnston.heather@towne.biz', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(12, 'Mrs. Janiya Schneider', '081293738667', '3333 Wolf Avenue\nAlethahaven, HI 31944', 'grimes.andy@gmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(13, 'Brennan Toy', '08128539032', '8770 Hand Island Suite 652\nRussside, MA 91579', 'kian44@gmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(14, 'London Hudson', '081233283302', '81063 Adam Junction Apt. 231\nSpinkaburgh, MT 46237', 'vklein@hotmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(15, 'River Greenholt', '081247529958', '86457 Millie Divide Suite 193\nPort Omariborough, NY 62955', 'shayna.wintheiser@yahoo.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(16, 'Stanton Davis', '081241016820', '2760 Murphy Forges Apt. 376\nSouth Tobinport, NE 31173-7321', 'abdiel40@hotmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(17, 'Esta Dickens', '08122588702', '805 Wehner Path\nSouth Romaborough, PA 86712', 'qstroman@yahoo.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(18, 'Candice Carroll', '0812187082', '599 Friesen Neck Suite 971\nAmericoberg, WI 39772-9549', 'okon.elvie@schneider.biz', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(19, 'Tania Hayes', '081246185051', '576 Stamm Station\nEast Beth, CT 96934-9958', 'anderson79@hotmail.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(20, 'Alva Wunsch', '081272701736', '4946 Beer Glen Apt. 820\nWest Marianna, CA 39555', 'yundt.hazle@franecki.com', '2022-12-12 07:11:42', '2022-12-12 07:11:42'),
(21, 'yudha', '0812-8204-5696', 'Jl.Riung Galin no.7a kel.cisaranten kidul Kec.GedeBage Kota BANDUNG JAWA BARAT', 'cobasaja@gmail.com', '2023-01-09 08:10:26', '2023-01-09 08:10:26'),
(22, 'rosneli', '082177796100', 'bandung', 'mungkin@gmail.com', '2023-01-09 08:49:34', '2023-01-09 08:49:34'),
(23, 'tessaa', '085888', 'bandung', 'coba@gmail.com', '2023-01-09 23:30:50', '2023-01-10 00:06:39'),
(24, 'yudd', '55655', 'bdg', 'aja@gmail.com', '2023-01-14 00:34:54', '2023-01-14 00:34:54'),
(25, 'wqwq', '585959', 'bdggg', 'cobaaaaa@gmail.com', '2023-01-14 00:40:54', '2023-01-14 00:53:57'),
(26, 'ffiirraass', '5899956', 'bkl', 'we@gmail.com', '2023-01-14 01:34:52', '2023-01-14 03:51:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 9368202, 'Et animi ea error dolores.', 2008, 17, 10, 1, 19, 40933, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(2, 8689586, 'Omnis tempore nostrum dolorum eum qui.', 2018, 10, 12, 3, 13, 41615, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(3, 6435740, 'Et incidunt minima voluptas id.', 2012, 1, 13, 1, 15, 22033, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(4, 8096783, 'Ut voluptatem alias dicta tempore.', 2013, 2, 1, 2, 10, 33449, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(5, 5339462, 'Dolores qui optio laudantium.', 2021, 5, 4, 4, 14, 35313, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(6, 1601172, 'Dicta voluptatem ex omnis et.', 2021, 13, 6, 2, 16, 15946, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(7, 8698384, 'Corporis et maxime eos.', 2014, 17, 4, 3, 15, 22579, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(8, 5340242, 'Magni sunt nesciunt optio ut et expedita.', 2013, 12, 3, 2, 20, 18944, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(9, 4989456, 'Et aut vero enim corrupti.', 2021, 1, 8, 2, 20, 27330, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(10, 1786162, 'At quas totam enim et.', 2018, 8, 5, 4, 13, 24501, '2022-12-12 07:17:29', '2023-01-24 14:41:08'),
(11, 4888251, 'Blanditiis quod illo quam ut.', 2022, 5, 9, 3, 10, 37899, '2022-12-12 07:17:29', '2023-01-24 14:48:13'),
(12, 779762, 'Id et corrupti quia qui enim in.', 2008, 1, 3, 2, 13, 32593, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(13, 5815965, 'Omnis iure accusamus quasi.', 2009, 12, 16, 4, 20, 16229, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(14, 7088330, 'Aut in ut perspiciatis iure quos sed.', 2010, 11, 1, 2, 10, 9983, '2022-12-12 07:17:29', '2023-01-24 14:49:37'),
(15, 4072258, 'Dolorum eum veniam corrupti aut dolor expedita.', 2020, 11, 19, 4, 15, 21965, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(16, 2352996, 'Ea et ut qui voluptatem explicabo.', 2020, 8, 5, 4, 11, 28178, '2022-12-12 07:17:29', '2023-01-24 14:34:52'),
(17, 3531587, 'Dicta nam debitis commodi.', 2007, 19, 6, 2, 20, 31721, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(18, 9733000, 'Expedita excepturi sequi voluptate nostrum id vel.', 2022, 3, 13, 3, 19, 26506, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(19, 528020, 'Omnis esse quo non atque consequatur id.', 2012, 12, 6, 1, 19, 33184, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(20, 4750228, 'Non consequuntur non libero est neque.', 2008, 4, 6, 3, 16, 36590, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(21, 9056369, 'Vero tenetur voluptatem saepe deserunt laboriosam.', 2016, 4, 11, 1, 11, 8450, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(22, 3681620, 'Nobis et exercitationem adipisci consequatur et.', 2011, 6, 16, 1, 10, 16082, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(23, 6876652, 'Est sunt minus fuga vitae.', 2017, 18, 14, 1, 11, 18792, '2022-12-12 07:17:29', '2023-01-21 04:18:45'),
(24, 1978914, 'Ut minus esse vel nesciunt eum molestiae.', 2017, 1, 1, 3, 12, 34639, '2022-12-12 07:17:29', '2022-12-12 07:17:29'),
(25, 7772561, 'Eum ipsum ea est ducimus ut.', 2019, 2, 19, 4, 11, 27354, '2022-12-12 07:17:29', '2022-12-12 07:17:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Doris Gibsonnn', '2022-12-12 07:12:38', '2023-01-03 05:22:54'),
(2, 'Janessa Dickiii', '2022-12-12 07:12:38', '2023-01-03 03:07:01'),
(3, 'Edna Osinski DDS', '2022-12-12 07:12:38', '2022-12-12 07:12:38'),
(4, 'Aditya Hill', '2022-12-12 07:12:38', '2022-12-12 07:12:38'),
(5, 'developer', '2023-01-03 01:41:05', '2023-01-03 01:41:05'),
(6, 'developer', '2023-01-03 01:41:08', '2023-01-03 01:41:08'),
(7, 'programming', '2023-01-03 01:41:30', '2023-01-03 01:41:30'),
(8, 'programming', '2023-01-03 01:42:19', '2023-01-03 01:42:19'),
(10, 'laravell', '2023-01-03 01:47:00', '2023-01-04 02:00:18'),
(12, 'test', '2023-01-09 06:08:10', '2023-01-09 06:08:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Wilton Gibson', 'L', '08128142355', '459 Violette Streets\nNew Arvilla, CO 07232', 'ruecker.derick@marvin.info', '2022-12-12 07:13:29', '2022-12-12 07:13:29'),
(2, 'Prof. Francesco Lubowitz IV', 'P', '081218309821', '25966 Wunsch Point\nRasheedside, NY 85522', 'kaylin.connelly@damore.com', '2022-12-12 07:13:29', '2022-12-12 07:13:29'),
(3, 'Dylan Breitenberg', 'L', '081221895420', '10856 Verlie Mission Apt. 954\nBenniehaven, CT 76865-9045', 'dina.rath@herzog.com', '2022-12-12 07:13:29', '2022-12-12 07:13:29'),
(4, 'Brannon Effertz', 'L', '081297123686', '649 Bins Center Suite 418\nGreenholtchester, ND 51145-4856', 'abshire.herminio@boehm.com', '2022-12-12 07:13:29', '2022-12-12 07:13:29'),
(5, 'Christelle Ledner', 'P', '081268483790', '806 Gorczany Island Suite 470\nWest Ozellastad, CO 32299', 'assunta12@mcglynn.com', '2022-12-12 07:13:29', '2022-12-12 07:13:29'),
(6, 'Dr. Caesar Lynch PhD', 'P', '081254854995', '2106 Felix Mills\nNorth Kip, AL 92096-2359', 'agislason@yahoo.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(7, 'Neal Lebsack', 'L', '081241036224', '6339 Modesta Highway\nMichealborough, LA 53214', 'mclaughlin.jennings@yahoo.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(8, 'Keanu Morar', 'P', '08125825811', '895 Gia Fall\nNorth Kalihaven, RI 01241-1648', 'oberbrunner.mario@yahoo.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(9, 'Ruben Bartell', 'L', '081218678594', '6883 Stamm Heights\nRiceshire, TX 97798', 'schaefer.ressie@yahoo.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(10, 'Mr. Arnaldo McCullough I', 'P', '081250671429', '6922 Torrance Corner\nGleasonville, MS 13142', 'rose.schroeder@hotmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(11, 'Patience Marvin', 'L', '081224594887', '752 Dibbert Trail Suite 012\nDeckowchester, WV 86908-1014', 'kassulke.alexie@rowe.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(12, 'Hilma Murazik', 'L', '081276713780', '982 Heaney Club Suite 452\nWest Brannonberg, ID 35248-1783', 'sabina57@hotmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(13, 'Mr. Merl Harber', 'L', '081226800082', '13452 Oda Skyway\nWest Donato, AZ 30536-1588', 'kaylah.kshlerin@tillman.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(14, 'Ms. Else Gottlieb', 'L', '081230680682', '7588 Anderson Mission\nSouth Marleeview, MS 29736', 'tflatley@hotmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(15, 'Prof. Chyna Gusikowski PhD', 'L', '081250212541', '990 Trudie Mountain\nLake Elverafurt, CA 49764', 'towne.elinor@bruen.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(16, 'Al Reilly', 'P', '081232627135', '3287 Roberts Junctions\nBorermouth, ND 27908', 'carter.monroe@jacobs.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(17, 'Alessandra Harber DDS', 'L', '081261113908', '73963 Bert Key\nJalonborough, TN 57913', 'rmills@gmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(18, 'Damion Lowe Jr.', 'L', '081245643685', '498 Lang Cove Suite 043\nFraneckifurt, PA 31247-7380', 'daniel.michelle@hotmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(19, 'Gino D\'Amore', 'P', '081249857828', '3120 Jarret Plaza\nMaximostad, OK 23393-3506', 'august92@lemke.org', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(20, 'Dr. Leon Braun', 'P', '081283619542', '1654 Shanny Villages Suite 270\nEast Jana, IL 10893', 'vsawayn@hotmail.com', '2022-12-13 05:17:50', '2022-12-13 05:17:50'),
(22, 'paa', 'M', '05541848', 'bkl', 'gan@gmail.com', '2023-01-14 03:26:17', '2023-01-14 03:53:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_12_12_061055_create_members_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'more', '081278174881', '358 Leffler Isle Apt. 984\nNew Aurelio, SD 92426-7092', 'mavis.bogan@stracke.info', '2022-12-12 07:12:04', '2023-01-03 06:09:24'),
(2, 'Shanny Hagenesss', '081261763960', '490 Arlene Canyon\nBlockstad, TX 91511-5087', 'mozelle.doyle@bruen.com', '2022-12-12 07:12:04', '2023-01-03 05:30:49'),
(3, 'Johnny Wyman DVM', '081274804934', '171 McGlynn Centers Apt. 510\nNorth Audra, NY 38963-2935', 'derrick.gutmann@gmail.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(4, 'Deborah Klocko', '081292398671', '686 Lurline Knoll Apt. 549\nSigmundstad, KS 58839', 'bgutkowski@bahringer.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(5, 'Elissa McClure', '081248129293', '581 Ritchie Rue\nWest Matilda, AK 42616', 'rocky09@gmail.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(6, 'Paolo Ledner', '081243253099', '5243 Robin Street Suite 360\nEast Durward, NY 66385', 'smorar@yahoo.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(7, 'eva.spinka@gmail.com', '081286901552', '58414 Jacobs Lodge\nDareville, MT 50936', 'eva.spinka@gmail.com', '2022-12-12 07:12:04', '2023-01-03 04:30:22'),
(8, 'Dr. Rubie Rolfson', '081241979785', '6804 Goodwin Union\nSouth Hailieberg, NC 35094', 'qstracke@yahoo.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(9, 'Ms. Vivian Rath', '081288664390', '672 Walker Passage Suite 453\nNorth Gideon, DC 27102', 'felicity.schiller@mitchell.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(10, 'Mrs. Liza Haag IV', '081238442541', '662 Kerluke Camp Apt. 693\nMorissetteport, IL 35839', 'ulises93@roberts.biz', '2022-12-12 07:12:04', '2023-01-03 06:09:07'),
(11, 'Aimee Weimann', '081220216276', '49262 Blick Islands Suite 606\nEast Anyaborough, ID 11032', 'lgoodwin@dooley.biz', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(12, 'Mckenzie Williamson', '081270866017', '3296 Gabriella Unions\nSchummbury, WI 11547-2339', 'karli.lang@gmail.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(13, 'Leslie Simonis', '081234103913', '497 Schulist Stream Suite 631\nStephentown, SD 42732', 'spinka.seamus@boyer.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(14, 'Clare Swaniawski Sr.', '081247824110', '183 Kaelyn Pass\nBechtelarmouth, NE 30420-5224', 'mosciski.adriana@barrows.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(15, 'Mr. Clint Luettgen', '081251795639', '9339 Beverly Circles\nNew Ernie, NJ 59693', 'lurline.block@hotmail.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(16, 'Jeffry Gibson', '081298147533', '9502 Emard Plaza\nNew Davonteton, CT 66971', 'mikayla.bailey@mccullough.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(17, 'Maybelle Flatley', '081223719514', '46329 Oda Extensions\nSouth Candace, MI 82583-9923', 'jensen56@mosciski.net', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(18, 'Asa Welch', '081259701033', '815 Sienna Overpass\nBotsfordville, TN 89236-1576', 'rippin.emilie@yahoo.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(19, 'Joan Reinger', '081293622455', '3282 Rosamond Extension Apt. 724\nSouth Wilton, NM 25772-8869', 'kziemann@armstrong.com', '2022-12-12 07:12:04', '2022-12-12 07:12:04'),
(26, 'paa', '08555', 'bandung', '123@gmail.com', '2023-01-13 23:20:53', '2023-01-14 03:52:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, '2023-01-17', '2023-01-23', 0, '2023-01-18 23:18:24', '2023-01-18 23:18:24'),
(2, 9, '2023-01-16', '2023-01-24', 0, '2023-01-18 23:18:24', '2023-01-18 23:18:24'),
(3, 15, '2023-01-18', '2023-01-22', 0, '2023-01-18 23:18:24', '2023-01-18 23:18:24'),
(4, 8, '2023-01-17', '2023-01-22', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(5, 3, '2023-01-18', '2023-01-24', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(6, 7, '2023-01-17', '2023-01-24', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(7, 4, '2023-01-18', '2023-01-23', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(8, 2, '2023-01-16', '2023-01-24', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(10, 14, '2023-01-17', '2023-01-23', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(11, 17, '2023-01-16', '2023-01-23', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(12, 2, '2023-01-16', '2023-01-25', 0, '2023-01-19 00:36:26', '2023-01-19 00:36:26'),
(14, 17, '2023-01-01', '2023-01-03', 0, '2023-01-21 04:18:45', '2023-01-21 04:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 8, 24, 1, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(2, 12, 10, 3, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(3, 3, 7, 1, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(4, 8, 17, 2, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(6, 12, 13, 3, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(7, 7, 18, 2, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(9, 12, 5, 1, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(10, 3, 5, 3, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(11, 5, 15, 1, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(12, 11, 12, 1, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(13, 6, 10, 3, '2023-01-20 13:33:48', '2023-01-20 13:33:48'),
(14, 14, 23, 1, '2023-01-21 04:18:45', '2023-01-21 04:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'putra', 'ghifari.v.putra@gmail.com', NULL, '$2y$10$NP8dJ/Enh6/YVakTAzhVAe1du88T5JATP5Ym8daXtZsyO8x9TCAii', NULL, NULL, '2022-12-12 07:55:31', '2022-12-12 07:55:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indeks untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`),
  ADD KEY `status` (`status`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
