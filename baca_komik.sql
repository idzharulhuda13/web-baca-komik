-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baca_komik`
--

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Naruto', 'naruto', 'Masashi Kishimoto', 'Shonen Jump', 'naruto-sampul.jpg', '2021-04-28 17:56:09', '2021-04-28 17:56:09'),
(2, 'One Piece', 'one-piece', 'Eichiro Oda', 'Gramedia', 'one-piece.jpeg', '2021-04-28 17:56:09', '2021-04-28 17:56:09'),
(17, 'Conan', 'conan', 'Gosho Aoyama', 'Shogakukan', 'conan_sampul.jpg', '2021-04-29 04:16:40', '2021-04-29 18:25:04'),
(18, 'Doraemon', 'doraemon', 'Fujiko Fujio', 'Shogakukan', 'doraemon-sampul.jpg', '2021-04-29 04:16:48', '2021-04-29 18:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-04-29-132257', 'App\\Database\\Migrations\\Pengunjung', 'default', 'App', 1619702858, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Raina?Mansur?David', '3 Hill Field Street', NULL, NULL),
(2, 'Nikifor?Hebe?Fulton', 'Ashtabula, OH 44004', NULL, NULL),
(3, 'Clovis?Veerke?Alunni', '458 Hill Field Court', NULL, NULL),
(4, 'Iacchus?An?elika?O\'Berne', 'La Porte, IN 46350', NULL, NULL),
(5, 'Aravind?Pedro?Szarka', '430 Miller St.', NULL, NULL),
(6, 'Bairre?Turnus?Deacon', 'Jonesborough, TN 37659', NULL, NULL),
(7, 'Piotr?Manoj?Laukkanen', '9789 Madison Rd.', NULL, NULL),
(8, 'Hedviga?Andronikos?Kova?i?', 'West Fargo, ND 58078', NULL, NULL),
(9, 'Anita?Fathi?O\'Hannegan', '16 Shipley Street', NULL, NULL),
(10, 'Ona?Lubov?Mac an Bhaird', 'Park Ridge, IL 60068', NULL, NULL),
(11, 'Alexander?Anacletus?Hibbert', '527 Glenridge Ave.', NULL, NULL),
(12, 'Evelin?Ludvik?Merritt', 'Antioch, TN 37013', NULL, NULL),
(13, 'Elijas?Danila?Stacks', '496 S. Mulberry Dr.', NULL, NULL),
(14, 'Antonieta?Dymphna?Trengove', 'Laurel, MD 20707', NULL, NULL),
(15, 'Calogera?Vasilios?Alders', '85 North Shadow Brook Ave.', NULL, NULL),
(16, 'Steinarr?Sander?Wen', 'Springfield Gardens, NY 11413', NULL, NULL),
(17, 'Arn??r?Rosalva?Schr?der', '364 Bridge Ave.', NULL, NULL),
(18, 'Rold?n?Fraser?? Conaire', 'Jackson, NJ 08527', NULL, NULL),
(19, 'Ska?i?Sirje?Gr??el', '8249 Buttonwood St.', NULL, NULL),
(20, 'Regula?Lycus?Schwangau', 'Grovetown, GA 30813', NULL, NULL),
(21, 'Gilberto?Efisio?Van der Beek', '427 Manor Station St.', NULL, NULL),
(22, 'Zakiya?Mikael?Lundin', 'Arlington Heights, IL 60004', NULL, NULL),
(23, 'Tottie?Celyn?Abrams', '178 North Cherry Hill St.', NULL, NULL),
(24, 'Matheus?Rasul?Szweda', 'Wappingers Falls, NY 12590', NULL, NULL),
(25, 'I\'timad?Linn?Dobson', '409 New Saddle Ave.', NULL, NULL),
(26, 'Brando?Shiva?Albrektson', 'Brookline, MA 02446', NULL, NULL),
(27, 'Christiane?Mika?Antuma', '30 Homestead Ave.', NULL, NULL),
(28, 'Marianita?Amadi?Sevriens', 'Waltham, MA 02453', NULL, NULL),
(29, 'Eyal?Mil?na?Zientek', '9 Strawberry Street', NULL, NULL),
(30, 'Yevgeniya?Babatunde?Neville', 'Morgantown, WV 26508', NULL, NULL),
(31, 'Enver?Gargi?Petrauskas', '74 East Andover Drive', NULL, NULL),
(32, 'Simba?Branka?Offermans', 'Lenoir, NC 28645', NULL, NULL),
(33, 'Verissimus?Tereza?Baggins', '588 Ramblewood Drive', NULL, NULL),
(34, 'Marjolein?Anacleto?Maestri', 'Deerfield, IL 60015', NULL, NULL),
(35, 'Magali?Paraskeve?Dreyer', '453 Lake View St.', NULL, NULL),
(36, 'Kudret?Fiera?Reid', 'Bloomington, IN 47401', NULL, NULL),
(37, 'Jenny?Jay?Richards', '36 Linda St.', NULL, NULL),
(38, 'Hafiz?Osberht?Cassidy', 'Buford, GA 30518', NULL, NULL),
(39, 'Rolande?Ruslan?Baum', '907 S. Lookout Lane', NULL, NULL),
(40, 'Tisiphone?Revaz?Yoshida', 'Elkton, MD 21921', NULL, NULL),
(41, 'Ivan?Hasan?Adriaansen', '82 Center Road', NULL, NULL),
(42, 'Vi?eslav?Blodeuyn?Aldershof', 'Upper Darby, PA 19082', NULL, NULL),
(43, 'Jyoti?Jonas?Valenta', '8478 Temple St.', NULL, NULL),
(44, 'Jonas?Mehtap?Mercier', 'Torrington, CT 06790', NULL, NULL),
(45, 'Nihal?Gwena?lle?Appleton', '8018 Sleepy Hollow Drive', NULL, NULL),
(46, 'Halfdan?Gra?ina?Kuntz', 'Eden Prairie, MN 55347', NULL, NULL),
(47, 'Shakuntala?Sarita?Aartsen', '7 Iroquois St.', NULL, NULL),
(48, 'Dimitrios?Miloslava?Batts', 'Willoughby, OH 44094', NULL, NULL),
(49, 'Milton?Haruki?Aleksandrov', '52 Sheffield Ave.', NULL, NULL),
(50, 'Yohan?Cr?ost?ir?F?rstner', 'Marshalltown, IA 50158', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
