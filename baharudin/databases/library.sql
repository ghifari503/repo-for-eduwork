-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 02:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Concepcion Fahey', 'aliya00@yahoo.com', '08216839842', '4531 Yazmin Underpass Suite 220\nSouth Lola, KS 78435-4925', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(2, 'Geovanny Spencer', 'ike.langworth@hotmail.com', '082161083383', '5577 Durgan Ferry\nNew Steve, MA 89792', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(3, 'Dr. Sincere Stamm', 'julie.rempel@gmail.com', '082191822891', '2735 Karson Flat Apt. 043\nNew Koby, ID 11014', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(4, 'Prof. Berry Luettgen I', 'melvin30@gmail.com', '082159684983', '23363 Michael Mill\nDeshawnmouth, UT 04624', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(5, 'Emmy Schoen', 'breanna37@beahan.com', '082136977062', '34963 Shanon Burgs Suite 682\nLake Sallieland, DE 35232', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(6, 'Jeff Hodkiewicz', 'bonnie.collier@hegmann.com', '082193717904', '8175 Mueller Wells Suite 623\nEast Dorrisshire, WV 68234', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(7, 'Miss Cleta Brekke Sr.', 'durgan.davon@gmail.com', '082159243148', '30097 Maggio Parkways Apt. 475\nBeerside, VA 92829-7626', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(8, 'Jaden Klein', 'mheller@stoltenberg.com', '082121516535', '9224 Ziemann Extension\nNew Clarissa, VA 99566-7280', '2021-12-08 06:17:16', '2021-12-08 06:17:16'),
(9, 'Derek Yost', 'danial.botsford@collier.com', '082174926567', '979 Hansen Land Suite 909\nLake Fredrickport, AL 86881', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(10, 'Prof. Dawn Dach IV', 'viola69@hotmail.com', '082172338423', '104 Magdalen Row\nNew Shakirafurt, MS 95465-6014', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(11, 'Mrs. Samanta Kemmer', 'kieran.haley@yahoo.com', '082167169324', '190 Rosendo River\nNorth Elbertport, WY 99619', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(12, 'Raheem Wiegand', 'edmond.mayer@boyle.com', '082157285973', '97011 Jordane Ports Suite 379\nSouth Tobyside, MS 56468-8231', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(13, 'Silas Connelly Sr.', 'hilbert.shanahan@rosenbaum.com', '082125570732', '622 Dare Street Apt. 454\nLuettgenton, TX 70798', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(14, 'Braden Grimes', 'ward.hickle@hotmail.com', '082132357572', '42816 Grant Ford\nBraunchester, TX 14457-2168', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(15, 'Benedict Deckow', 'tillman.enoch@feil.com', '082166195130', '4709 Marvin Place Suite 248\nWillport, DE 05072-6524', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(16, 'Eunice Sauer', 'lela46@hills.biz', '082121268007', '26239 Lilliana Mission\nErikside, TN 80771-6781', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(17, 'Alberto D\'Amore', 'heather28@gmail.com', '082143733886', '823 Aracely Manors Apt. 272\nPort Cheyannechester, CA 19825', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(18, 'Mrs. Ayla Raynor MD', 'aliza46@yahoo.com', '08217157219', '733 Lawrence Trace Apt. 153\nNorth Joycemouth, MN 20203', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(19, 'Prof. Patricia Hoeger', 'art03@tillman.com', '082130056301', '97539 Brycen Rapids Suite 353\nMerrittton, SC 97678', '2021-12-08 06:17:17', '2021-12-08 06:17:17'),
(20, 'Alberto O\'Hara', 'zparker@feeney.com', '082112195408', '87277 Marquis Row\nFraneckiville, MA 24705-8176', '2021-12-08 06:17:17', '2021-12-08 06:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `books`
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
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(2, 404097462, 'Mr.', 2012, 5, 11, 4, 18, 18841, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(3, 852069162, 'Mrs.', 2011, 13, 13, 3, 14, 10923, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(4, 34421898, 'Mrs.', 2017, 19, 8, 4, 14, 14731, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(5, 180313647, 'Miss', 2017, 6, 11, 4, 20, 12134, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(6, 52715870, 'Dr.', 2015, 19, 19, 3, 18, 12607, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(7, 382662933, 'Mr.', 2020, 14, 18, 1, 16, 17705, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(8, 418916660, 'Prof.', 2018, 7, 5, 3, 20, 13182, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(9, 900128768, 'Dr.', 2021, 1, 12, 3, 19, 10660, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(10, 6845412, 'Miss', 2016, 13, 7, 1, 12, 13551, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(11, 72781258, 'Prof.', 2012, 12, 12, 2, 15, 15755, '2021-12-08 06:37:56', '2021-12-08 06:37:56'),
(12, 310138407, 'Mrs.', 2017, 14, 9, 2, 15, 15111, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(13, 433011939, 'Miss', 2012, 3, 20, 4, 12, 16937, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(14, 36061847, 'Prof.', 2021, 19, 1, 2, 15, 19265, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(15, 47661744, 'Prof.', 2021, 17, 7, 3, 20, 10202, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(16, 496023315, 'Prof.', 2019, 10, 4, 4, 13, 16175, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(17, 520591041, 'Dr.', 2013, 9, 14, 1, 16, 15542, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(18, 629825173, 'Dr.', 2019, 8, 19, 1, 19, 10435, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(19, 575093861, 'Mr.', 2016, 17, 19, 3, 13, 18480, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(20, 814179059, 'Miss', 2015, 6, 19, 2, 10, 16676, '2021-12-08 06:37:57', '2021-12-08 06:37:57'),
(21, 936485013, 'Dr.', 2013, 11, 13, 2, 20, 11646, '2021-12-08 06:37:57', '2021-12-08 06:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Creola Lakin', '2021-12-08 06:37:47', '2021-12-08 06:37:47'),
(2, 'Pedro O\'Reilly', '2021-12-08 06:37:47', '2021-12-08 06:37:47'),
(3, 'Hannah Swift II', '2021-12-08 06:37:47', '2021-12-08 06:37:47'),
(4, 'Frieda Hagenes', '2021-12-08 06:37:47', '2021-12-08 06:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `members`
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
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Brooks Langworth IV', 'f', '082197286780', '745 Edythe Islands Suite 849\nLake Effie, WI 94286-4299', 'dlubowitz@yahoo.com', '2021-12-08 06:45:48', '2021-12-08 06:45:48'),
(2, 'Dr. Emmet Heidenreich', 'm', '082136770022', '923 Kuphal Inlet Suite 379\nLindport, OK 51872', 'miracle.herman@glover.net', '2021-12-08 06:45:48', '2021-12-08 06:45:48'),
(3, 'Ibrahim Pollich', 'm', '082128317102', '7172 McDermott Cove Suite 069\nSengerburgh, TX 23346', 'vwuckert@schinner.com', '2021-12-08 06:45:48', '2021-12-08 06:45:48'),
(4, 'Roberta Gorczany', 'm', '082166075712', '7510 Hermann Haven\nMalliefurt, UT 68283', 'tristin.parker@boyle.info', '2021-12-08 06:45:48', '2021-12-08 06:45:48'),
(5, 'Jordy O\'Reilly', 'f', '082189064549', '187 Kelsi Turnpike\nClaudinetown, TN 56478', 'strosin.abe@yahoo.com', '2021-12-08 06:45:48', '2021-12-08 06:45:48'),
(6, 'Bria Eichmann', 'f', '082198875528', '2932 Larson Ford\nPort Marjorie, CA 51411', 'yasmine.osinski@yahoo.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(7, 'Marta Tremblay', 'm', '082138253713', '95065 Jerde Brooks Suite 987\nEast Aprilview, KY 90341', 'ledner.dewayne@yahoo.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(8, 'Isaiah Kulas', 'm', '08216407266', '9953 Darion Way Apt. 244\nNapoleonview, IL 80041', 'maude.walsh@raynor.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(9, 'Antonietta McClure', 'm', '08217059896', '354 Michale Forge\nSchneiderberg, CT 33912', 'marcella.rolfson@glover.net', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(10, 'Nikki Shields', 'm', '082194160381', '733 Abbigail Circle\nEast Raoulstad, TN 71119-6335', 'jocelyn.wisoky@mosciski.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(11, 'General Terry', 'f', '08217625968', '5273 Hamill Square\nLake Henri, MT 10582-1154', 'rwillms@gmail.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(12, 'Lenore Prosacco', 'f', '082120913318', '474 Spinka Road Apt. 957\nLinnealand, OH 53908', 'blubowitz@hotmail.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(13, 'Chadrick Gulgowski', 'f', '082129516581', '93238 Alene Plains\nNew Giovannymouth, NC 12599-1746', 'slindgren@hotmail.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(14, 'Bailee Zieme V', 'f', '082123940135', '246 Ethelyn Crescent Suite 831\nEast Jaylon, MI 24281', 'brekke.leopoldo@greenholt.net', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(15, 'Dejah Littel', 'm', '082189267201', '972 Aaron Throughway\nSouth Gordontown, ID 63371-5258', 'bridie66@aufderhar.info', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(16, 'Lolita Greenfelder', 'f', '0821486081', '54729 Hodkiewicz Meadows\nDanielville, TN 87170-1035', 'ehermiston@mills.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(17, 'Miss Verona Hoeger', 'm', '082179528936', '1419 Marvin Flat\nLake Favianfort, MS 55887', 'rau.maxie@yost.biz', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(18, 'Levi Glover', 'f', '082182377581', '45500 Littel Key\nBruenton, MN 61476', 'kian.corwin@rohan.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(19, 'Ismael Nolan', 'f', '082169842043', '13845 Elda Stravenue\nCieloburgh, NY 32786', 'graham.carli@yahoo.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49'),
(20, 'Percy Goyette', 'f', '082121558002', '476 Summer Street\nNorth Saigeview, CT 51187', 'jleuschke@gmail.com', '2021-12-08 06:45:49', '2021-12-08 06:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_08_103627_create_members_table', 1),
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2021_12_08_114140_create_publishers_table', 1),
(22, '2021_12_08_114146_create_authors_table', 1),
(23, '2021_12_08_114304_create_catalogs_table', 1),
(24, '2021_12_08_114323_create_books_table', 1),
(25, '2021_12_08_114332_create_transactions_table', 1),
(26, '2021_12_08_114343_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Alba Kerluke', 'hmosciski@hotmail.com', '082118171916', '6979 Botsford View Suite 262\nWest Rashadstad, TN 72336-2373', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(2, 'Prof. Otto Flatley IV', 'reba17@hotmail.com', '082112838657', '66741 Heidenreich Turnpike Apt. 570\nMayerville, WY 10005-6996', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(3, 'Koby Smitham', 'theo.bode@gmail.com', '082195079165', '147 Simonis Flats\nLupetown, TX 92178-0746', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(4, 'Brock Williamson', 'letha.langosh@gmail.com', '082145380861', '41864 Pacocha Crossroad Apt. 324\nSouth Omer, KS 52986', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(5, 'Hyman Hoppe', 'qfay@berge.org', '082198397065', '17270 Hills Stream\nEast Gabrielle, ME 85976', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(6, 'Gilda Hintz', 'bashirian.kira@yahoo.com', '082162273442', '302 Senger Coves\nJohannabury, FL 82858-0437', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(7, 'Dr. Annie Baumbach Jr.', 'deion.gerhold@hotmail.com', '082142959948', '616 Funk Harbor Suite 130\nSchustertown, DC 01874-0001', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(8, 'Dr. Arthur Koepp IV', 'kohler.moriah@crooks.com', '082113290973', '52271 Gislason Isle Suite 446\nEast Bradlytown, VT 08333-0631', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(9, 'Dr. Dexter Metz PhD', 'sienna41@thiel.com', '082135115744', '309 Waldo Underpass Apt. 226\nWest Flaviobury, WA 79891-6920', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(10, 'Leslie Hoeger', 'turner.kaci@gmail.com', '082131012364', '30669 Kendrick Turnpike\nLake Jeff, RI 68533-4909', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(11, 'Prof. Arjun Gerhold', 'andreane13@yahoo.com', '082168958213', '29406 Guadalupe Fords Apt. 494\nNew Harmony, AZ 82181-7053', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(12, 'Dr. Wilburn Romaguera', 'linda.mayer@wyman.com', '082182791871', '5728 Pollich Keys Apt. 806\nPort Coleman, MN 85678-8592', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(13, 'Esta O\'Connell', 'mosciski.chanel@jones.com', '082119596689', '922 Adrianna Mission\nRunolfsdottirside, IL 70862-5960', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(14, 'Dr. Leone Bartell', 'krystel11@batz.com', '082171178877', '1950 Lucie Circle Suite 741\nO\'Konberg, IA 05882', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(15, 'Reyes Homenick', 'domingo21@gmail.com', '082149767460', '817 Jean Creek Suite 935\nWest Zack, AK 27022', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(16, 'Rosanna Kohler II', 'ardella33@dibbert.com', '082149876830', '529 Maximillian Plain\nGreenholtside, OR 30875', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(17, 'Prof. Jada Roob', 'douglas86@balistreri.org', '082118130414', '985 Cremin Ranch Apt. 687\nNorth Rashad, OK 68094-2959', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(18, 'Fannie Schulist V', 'grolfson@wintheiser.info', '082169852325', '392 Zula Mission Suite 144\nDibbertstad, TX 01585', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(19, 'Enos Cummings', 'lavern.haag@yahoo.com', '082198751271', '641 Brekke Park Suite 703\nMarioville, NV 95982-3505', '2021-12-08 06:37:41', '2021-12-08 06:37:41'),
(20, 'Josh Johnston', 'schaefer.monserrat@gmail.com', '082180736734', '4031 Satterfield Port Suite 941\nPort Maximilianberg, TX 56560-2080', '2021-12-08 06:37:41', '2021-12-08 06:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
