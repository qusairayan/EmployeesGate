-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 09:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movenpick`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `RoleID` int(5) NOT NULL,
  `Password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `Name`) VALUES
(1, 'Aqaba City'),
(2, 'Tala Bay'),
(3, 'Managment');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `BranchID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Name`, `BranchID`) VALUES
(10, 'Front Office', 1),
(11, 'Housekeeping', 1),
(12, 'Kitche', 1),
(13, 'Stewarding', 1),
(14, 'F&B ', 1),
(16, 'SPA', 1),
(17, 'Recreations', 1),
(18, 'Transportatio', 1),
(19, 'GM Office ', 1),
(20, 'FRONT OFFICE', 2),
(21, 'HOUSEKEEPING', 2),
(22, 'KITCHEN', 2),
(23, 'STEWARDING', 2),
(24, 'F&B', 2),
(26, 'SPA', 2),
(27, 'RECREATIONS', 2),
(28, '', 2),
(29, 'GM\'s Office ', 2),
(30, 'L&D', 3),
(110, 'Accounting', 1),
(111, 'Human Resource', 1),
(112, 'Security', 1),
(113, 'IT', 1),
(114, 'Laundry', 1),
(115, 'Restaurant', 1),
(116, 'Engineering', 1),
(117, 'Sales', 1),
(210, 'ACCOUNTING', 2),
(211, 'HUMAN RESOURCES', 2),
(212, 'SECURITY', 2),
(213, 'IT', 2),
(216, 'ENGINEERING', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DepID` int(5) NOT NULL,
  `Rate` double DEFAULT NULL,
  `Pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `firstName`, `LastName`, `DepID`, `Rate`, `Pic`) VALUES
('000025', 'Mohammad', 'Al Harahsheh', 212, 1, 'jpeg'),
('000028', 'Khaled', 'Al Nawaysheh', 212, 2, 'jpeg'),
('000030', 'Arwaq', 'Al Thunaibat', 212, 0, 'jpeg'),
('000032', 'Mohammad', 'Al Trawneh', 212, 0, 'jpeg'),
('000033', 'Omar', 'Al Rawadyah', 20, 0, 'jpeg'),
('000045', 'Ahmad', 'Habahbeh', 23, 0, 'jpeg'),
('000058', 'Tamer', 'Salma', 22, 0, 'jpeg'),
('000064', 'Awad', 'Abduljawad', 216, 0, 'jpeg'),
('000081', 'Ra\'ed', 'Al Salamee', 24, 0, 'jpeg'),
('000186', 'Fadi', 'Noush', 10, 5, 'jpeg'),
('000214', 'Agnetah', 'Makokha', 27, 0, 'jpeg'),
('000265', 'Raqi', 'Lasasmeh', 112, 4, 'jpeg'),
('000312', 'Nour', 'AlDee', 20, 0, 'jpeg'),
('000335', 'Osama', 'Al Sharadqah', 212, 0, 'jpeg'),
('000343', 'Sadam', 'Al Khalayleh', 212, 0, 'jpeg'),
('000354', 'Sakher', 'Al Odainat', 212, 0, 'jpeg'),
('000370', 'Raddad', 'Al Qatamee', 216, 0, 'jpeg'),
('000385', 'Sameer', 'AL Khza\'leh', 24, 0, 'jpeg'),
('000411', 'Anas', 'Al kiswani', 216, 0, 'jpeg'),
('000412', 'Sabri', 'Mahra', 211, 0, 'jpeg'),
('000457', 'Yahya', 'Yahya', 216, 0, 'jpeg'),
('000492', 'Feda\'a', 'Abu Ghnaim', 212, 0, 'jpeg'),
('000583', 'Kayed', 'Al Twaissi', 20, 0, 'jpeg'),
('000589', 'Jom\'ah', 'Nawaysheh', 12, 0, 'jpeg'),
('000651', 'Ahmad', 'Nawasrah', 20, 0, 'jpeg'),
('000656', 'Peter', 'Kinoti', 24, 0, 'jpeg'),
('000671', 'Mohammad', 'Abu Tho\'abeh', 216, 0, 'jpeg'),
('000682', 'Sulima', 'Sulima', 23, 0, 'jpeg'),
('000695', 'Ahmad', 'Attyah', 114, 0, 'jpeg'),
('000705', 'Sufia', 'Dababneh', 216, 0, 'jpeg'),
('000706', 'Shankararaj', 'Subbaiya', 26, 0, 'jpeg'),
('000707', 'Yaser', 'Quzah', 22, 0, 'jpeg'),
('000771', 'Amer', 'Dghaimat', 17, 11, 'jpeg'),
('000794', 'Attia', 'Mos\'ad', 23, 0, 'jpeg'),
('000801', 'Alfredo', 'Matias', 24, 0, 'jpeg'),
('000813', 'Jocely', 'Catubig', 24, 0, 'jpeg'),
('000823', 'Mohammad', 'Al Sakra', 216, 0, 'jpeg'),
('000834', 'Fadel', 'Shourbasi', 11, 1, 'jpeg'),
('000839', 'Medhat', 'Ali', 21, 0, 'jpeg'),
('000863', 'Joseph', 'Odhiambo', 20, 0, 'jpeg'),
('000881', 'Ayma', 'Ishaq', 21, 0, 'jpeg'),
('000906', 'Taha', 'Al Helalat', 210, 0, 'jpeg'),
('000919', 'Ayad', 'Tous', 23, 0, 'jpeg'),
('000924', 'Melanie', 'Abarientos', 24, 0, 'jpeg'),
('000960', 'Mousa', 'Al Hshoush', 27, 0, 'jpeg'),
('001014', 'Yousef', 'Yousef', 22, 0, 'jpeg'),
('001020', 'Som', 'BK', 24, 0, 'jpeg'),
('001040', 'Mohammad', 'AbdulBaqi', 23, 0, 'jpeg'),
('001057', 'Razel', 'Dumopoy', 24, 0, 'jpeg'),
('001068', 'Mohannad', 'Al Ja\'bari', 22, 0, 'jpeg'),
('001077', 'Wagdi', 'Al Twaissi', 212, 0, 'jpeg'),
('001094', 'Firas', 'Abdelqader', 12, 0, 'jpeg'),
('001118', 'Qassem', 'Al Rafay\'ah', 212, 0, 'jpeg'),
('001124', 'Mohammad', 'Al Latayfeh', 22, 0, 'jpeg'),
('001126', 'Khaled', 'Ambarah', 212, 0, 'jpeg'),
('001140', 'Ligaya', 'Sante', 11, 0, 'jpeg'),
('001142', 'Baha\'', 'Al Junaidat', 216, 0, 'jpeg'),
('001207', 'Ashraf', 'Jerjes', 23, 0, 'jpeg'),
('001211', 'Marites', 'Pontillas', 11, 0, 'jpeg'),
('001225', 'Mousa', 'Farou', 20, 0, 'jpeg'),
('001227', 'Omar', 'Reyati', 12, 0, 'jpeg'),
('001229', 'Jamal', 'Salem', 21, 0, 'jpeg'),
('001233', 'Ahmad', 'Al Ahmad', 24, 0, 'jpeg'),
('001237', 'Yaser', 'Mohammad', 211, 0, 'jpeg'),
('001246', 'Ala\'a', 'Al Madadha', 21, 0, 'jpeg'),
('001251', 'Tareq', 'Fahoum', 11, 0, 'jpeg'),
('001268', 'AbdulQawi', 'AbdulJalil', 216, 0, 'jpeg'),
('001277', 'Shadi', 'Al Azzam', 210, 0, 'jpeg'),
('001281', 'Mousa', 'Mustafa', 116, 0, 'jpeg'),
('001295', 'Samuel', 'Njoroge', 27, 0, 'jpeg'),
('001302', 'Saed', 'Hasouneh', 210, 0, 'jpeg'),
('001304', 'Mohammad', 'Jadallah', 210, 0, 'jpeg'),
('001314', 'Leevia', 'Elemos', 21, 0, 'jpeg'),
('001327', 'Abdullah', 'Al Khattab', 27, 0, 'jpeg'),
('001332', 'Nasser', 'Al Qaralleh', 212, 0, 'jpeg'),
('001339', 'Fadi', 'Al Shehadat', 27, 0, 'jpeg'),
('001342', 'Michell', 'Casais', 24, 0, 'jpeg'),
('001350', 'Ahmad', 'Mahmoud', 210, 0, 'jpeg'),
('001355', 'Mongi', 'Badir', 21, 0, 'jpeg'),
('001356', 'Ramada', 'Al Qedreh', 27, 0, 'jpeg'),
('001373', 'Zeyad', 'Nasser', 10, 0, 'jpeg'),
('001374', 'Milad', 'Tawdros', 21, 0, 'jpeg'),
('001378', 'Attallah', 'Gabriel', 21, 0, 'jpeg'),
('001386', 'Eid', 'Al Athamneh', 20, 0, 'jpeg'),
('001393', 'Naser', 'Al Momani', 212, 0, 'jpeg'),
('001400', 'Majdi', 'Al Foqara', 210, 0, 'jpeg'),
('001401', 'Mahmoud', 'Al Qawasmeh', 22, 0, 'jpeg'),
('001402', 'Ali', 'Al Khatib', 22, 0, 'jpeg'),
('001407', 'Khaled', 'Al Khawaldeh', 212, 0, 'jpeg'),
('001411', 'Sa\'ad', 'Mohammad', 23, 0, 'jpeg'),
('001422', 'AbdulMo\'em', 'AbdulRaheem', 23, 0, 'jpeg'),
('001423', 'Kare', 'Roqueno', 21, 0, 'jpeg'),
('001424', 'Ali', 'Al Najdawi', 210, 0, 'jpeg'),
('001425', 'Qusai', 'Al Aqayleh', 20, 0, 'jpeg'),
('001432', 'Hamzeh', 'Musallam', 211, 0, 'jpeg'),
('001435', 'Ziad', 'Al Khatatbeh', 212, 0, 'jpeg'),
('001436', 'Daifallah', 'Al Shehadat', 23, 0, 'jpeg'),
('001438', 'Emad', 'Gabrial', 23, 0, 'jpeg'),
('001441', 'Yaser', 'Al Khanazreh', 23, 0, 'jpeg'),
('001451', 'Yasmi', 'Khalaf', 22, 0, 'jpeg'),
('001460', 'Ala\'a', 'Shubaitee', 10, 0, 'jpeg'),
('001462', 'Joh', 'Gultiano', 21, 0, 'jpeg'),
('001467', 'AbdulRaheem', 'Al Mawajdeh', 212, 0, 'jpeg'),
('001475', 'Michelle', 'Duque', 21, 0, 'jpeg'),
('001478', 'Ali', 'AlAnanzeh', 20, 0, 'jpeg'),
('001480', 'Bashar', 'Yousef', 22, 0, 'jpeg'),
('001481', 'Hassa', 'Ahmad', 24, 0, 'jpeg'),
('001489', 'Yaser', 'AbdulSalam', 21, 0, 'jpeg'),
('001494', 'Shayne', 'Santos', 21, 0, 'jpeg'),
('001496', 'Royd', 'Kathurima', 24, 0, 'jpeg'),
('001498', 'Marti', 'Muriithi', 27, 0, 'jpeg'),
('001499', 'Leah', 'Castro', 21, 0, 'jpeg'),
('001609', 'Lindsay', 'Ann Nati', 24, 0, 'jpeg'),
('001620', 'Rawa', 'Al Kabariti', 22, 0, 'jpeg'),
('001625', 'Murad', 'Al Battah', 22, 0, 'jpeg'),
('001629', 'Hubert', 'Brian Ladao', 21, 0, 'jpeg'),
('001630', 'Pawa', 'Kumar', 22, 0, 'jpeg'),
('001645', 'Fate', 'Isma\'el', 212, 0, 'jpeg'),
('001648', 'Sarah', 'Galpao', 26, 0, 'jpeg'),
('001649', 'Fadi', 'Silawi', 12, 0, 'jpeg'),
('001654', 'Lucy', 'Muriithi', 24, 0, 'jpeg'),
('001657', 'Kristine', 'Reyes', 24, 0, 'jpeg'),
('001658', 'Jeruzza', 'Lim', 24, 0, 'jpeg'),
('001659', 'Betty', 'Carino', 24, 0, 'jpeg'),
('001671', 'Ala\'a', 'Ankash', 22, 0, 'jpeg'),
('001676', 'Mohammad', 'Salameh', 22, 0, 'jpeg'),
('001678', 'Dea\'a', 'Al Qatamee', 216, 0, 'jpeg'),
('001680', 'Muhannad', 'Al Shareef', 20, 0, 'jpeg'),
('001681', 'Ihab', 'S\'efa', 216, 0, 'jpeg'),
('001686', 'Mahmoud', 'Azzam', 216, 0, 'jpeg'),
('001688', 'Bajes', 'Abu Al', 27, 0, 'jpeg'),
('001701', 'Adel', 'Shahi', 24, 0, 'jpeg'),
('001714', 'Yaser', 'AlTakreety', 21, 0, 'jpeg'),
('001719', 'Ahmad', 'No\'ma', 211, 0, 'jpeg'),
('001725', 'Ahmad', 'Badawi', 21, 0, 'jpeg'),
('001726', 'Salma', 'Al Helalat', 212, 0, 'jpeg'),
('001734', 'Anas', 'Salma', 12, 0, 'jpeg'),
('001743', 'Felix', 'Sihombing', 21, 0, 'jpeg'),
('001749', 'Misbha', 'Rahma', 21, 0, 'jpeg'),
('001750', 'Ni', 'Kadek Pradnyani', 26, 0, 'jpeg'),
('001751', 'Saif', 'Al Ahmad', 27, 0, 'jpeg'),
('001752', 'Neema', 'Kihara', 24, 0, 'jpeg'),
('001757', 'Aires', 'Apawa', 21, 0, 'jpeg'),
('001759', 'Ahmad', 'Omar', 216, 0, 'jpeg'),
('001762', 'Mohammad', 'Al Khoja', 20, 0, 'jpeg'),
('001764', 'Mustafa', 'Al Zaqh', 20, 0, 'jpeg'),
('001776', 'Omar', 'Al Haddad', 21, 0, 'jpeg'),
('001777', 'Montasir', 'Al Halabi', 22, 0, 'jpeg'),
('001780', 'Salma', 'Al Helalat', 211, 0, 'jpeg'),
('001782', 'Hussei', 'Al Omari', 22, 0, 'jpeg'),
('001786', 'Abdelrahma', 'Al Quab\'ah', 22, 0, 'jpeg'),
('001787', 'Maher', 'Sha\'la', 116, 0, 'jpeg'),
('001789', 'Mohammad', 'Ali', 27, 0, 'jpeg'),
('001791', 'Amro', 'Najeb', 21, 0, 'jpeg'),
('001800', 'Tahani', 'Biltaji', 114, 0, 'jpeg'),
('001801', 'Al', 'Sayed Abduljawad', 23, 0, 'jpeg'),
('001802', 'Omar', 'Rusla', 20, 0, 'jpeg'),
('001803', 'Tareq', 'Samara', 24, 0, 'jpeg'),
('001816', 'Radi', 'Mohammad', 23, 0, 'jpeg'),
('001819', 'Fares', 'Khader', 21, 0, 'jpeg'),
('001820', 'Raza', 'Al Rahahleh', 26, 0, 'jpeg'),
('001821', 'Mohammad', 'Al Qadi', 20, 0, 'jpeg'),
('001822', 'Hiram', 'Murage', 24, 0, 'jpeg'),
('001825', 'Mohammad', 'Zaloum', 12, 0, 'jpeg'),
('001829', 'Ihab', 'Al Tamimi', 216, 0, 'jpeg'),
('001831', 'Ibrahim', 'Al \'eimat', 20, 0, 'jpeg'),
('001835', 'Lydia', 'Bitinisa', 27, 0, 'jpeg'),
('001837', 'Faisal', 'Bilal', 20, 0, 'jpeg'),
('001838', 'Ahmad', 'Al Saifi', 213, 0, 'jpeg'),
('001842', 'Ireneo', 'Dela Cruz', 24, 0, 'jpeg'),
('001843', 'Abdullah', 'Ahmad', 22, 0, 'jpeg'),
('001844', 'Atef', 'Al Jundi', 216, 0, 'jpeg'),
('001847', 'Osama', 'Zalloum', 22, 0, 'jpeg'),
('001849', 'Abdullah', 'Abu Zahra', 21, 0, 'jpeg'),
('001852', 'Zeyad', 'Al Zaghaybeh', 22, 0, 'jpeg'),
('001854', 'Mahmoud', 'Abdelgawwad', 21, 0, 'jpeg'),
('001855', 'Diana', 'Puno', 24, 0, 'jpeg'),
('001857', 'Mahmoud', 'Rahhal', 24, 0, 'jpeg'),
('001863', 'Jemima', 'Ramos', 24, 0, 'jpeg'),
('001867', 'Abdallah', 'Al Gharabli', 27, 0, 'jpeg'),
('001868', 'Eddie', 'Bartolome', 21, 0, 'jpeg'),
('001869', 'Qais', 'Al Tawalbeh', 21, 0, 'jpeg'),
('001870', 'Salem', 'Kabbaha', 21, 0, 'jpeg'),
('001873', 'Tahsee', 'Adas', 27, 0, 'jpeg'),
('001877', 'Ezz', 'Aldeen Al', 24, 0, 'jpeg'),
('001881', 'Nouh', 'Fayad', 22, 0, 'jpeg'),
('001882', 'Ammar', 'Al Sharqawi', 216, 0, 'jpeg'),
('001886', 'Mahmoud', 'Mohammed', 21, 0, 'jpeg'),
('001887', 'Medhat', 'Kaliny', 21, 0, 'jpeg'),
('001890', 'Sakher', 'Al Hujeileh', 21, 0, 'jpeg'),
('001891', 'Abdelmaliek', 'Mohammed', 211, 0, 'jpeg'),
('001892', 'Mohammad', 'Al Rawashdeh', 212, 0, 'jpeg'),
('001895', 'Murad', 'Al Tawarah', 210, 0, 'jpeg'),
('001898', 'Hasa', 'Badra', 22, 0, 'jpeg'),
('001900', 'Shaker', 'Al Titi', 21, 0, 'jpeg'),
('001902', 'Abedelkhalik', 'Abu Al', 21, 0, 'jpeg'),
('001903', 'Mo\'ath', 'Al Gharabli', 27, 0, 'jpeg'),
('001905', 'Basil', 'Theeb', 24, 0, 'jpeg'),
('001907', 'Ayma', 'Mohamed', 211, 0, 'jpeg'),
('001908', 'Mamdouh', 'Abu Alela', 21, 0, 'jpeg'),
('001910', 'Yaza', 'Ikhmaes', 23, 0, 'jpeg'),
('001913', 'Omar', 'Miehiar', 20, 0, 'jpeg'),
('001914', 'Seif', 'Al Kresheh', 23, 0, 'jpeg'),
('001916', 'Fadi', 'Abu Baker', 24, 0, 'jpeg'),
('001917', 'Radwa', 'Al Nsour', 24, 0, 'jpeg'),
('001918', 'Dua\'a', 'Al Qorom', 22, 0, 'jpeg'),
('001920', 'Ahmed', 'Mahmoud', 21, 0, 'jpeg'),
('001921', 'Mohammad', 'Abu Rayya', 22, 0, 'jpeg'),
('001923', 'Shadi', 'Saqallah', 22, 0, 'jpeg'),
('001924', 'Mohammad', 'Abu Azzab', 22, 0, 'jpeg'),
('001925', 'Ahmad', 'Al Riyati', 21, 0, 'jpeg'),
('001928', 'Nawras', 'Al', 20, 0, 'jpeg'),
('001930', 'Ramez', 'Jadoory', 216, 0, 'jpeg'),
('001931', 'Mohammad', 'Hussai', 11, 0, 'jpeg'),
('001932', 'Afna', 'Abu Mahfouz', 24, 0, 'jpeg'),
('001935', 'Ghufra', 'Hamadeh', 20, 0, 'jpeg'),
('001936', 'Ahmad', 'Al Saharee', 27, 0, 'jpeg'),
('001937', 'Omar', 'Sari', 210, 0, 'jpeg'),
('001938', 'Ghaith', 'Mdallal', 24, 0, 'jpeg'),
('001939', 'Saja', 'Al Momani', 22, 0, 'jpeg'),
('001940', 'Abdelrazzaq', 'Al Ni\'mat', 21, 0, 'jpeg'),
('001941', 'Ni', 'Made Ari', 26, 0, 'jpeg'),
('001942', 'Sameera', 'Al Bakri', 211, 0, 'jpeg'),
('001943', 'Ibrahim', 'Al Ja\'arat', 24, 0, 'jpeg'),
('001944', 'Ma\'i', 'Abu Hani', 21, 0, 'jpeg'),
('001945', 'Farah', 'Al Sabbagh', 20, 0, 'jpeg'),
('001947', 'Hamza', 'Al eid', 24, 0, 'jpeg'),
('001948', 'Hanidya', 'Marifah', 24, 0, 'jpeg'),
('001949', 'Sa\'ad', 'Al Ghnmee', 212, 0, 'jpeg'),
('001950', 'Faisal', 'Al Kiswani', 22, 0, 'jpeg'),
('001951', 'Shaaba', 'Mohamed', 21, 0, 'jpeg'),
('001952', 'Mohammad', 'Othma', 20, 0, 'jpeg'),
('001953', 'Diya\'', 'Awad', 22, 0, 'jpeg'),
('001954', 'Ashraf', 'Abdeljawad', 23, 0, 'jpeg'),
('001994', 'Muhannad', 'Ramada', 116, 0, 'jpeg'),
('001995', 'Zeyad', 'Fehmawi', 116, 0, 'jpeg'),
('002004', 'Melad', 'Qastah', 11, 0, 'jpeg'),
('002005', 'Yousri', 'Ghabryal', 11, 0, 'jpeg'),
('002063', 'Ali', 'Atyah', 13, 0, 'jpeg'),
('002066', 'Abdelrazeq', 'Abdelsamea\'', 17, 0, 'jpeg'),
('002109', 'Mohammad', 'Amarah', 12, 0, 'jpeg'),
('002203', 'Fayez', 'Mohammad', 114, 0, 'jpeg'),
('002224', 'Tha\'er', 'Rawajfeh', 116, 0, 'jpeg'),
('002256', 'Khaled', 'Na\'anah', 112, 0, 'jpeg'),
('002275', 'Shareef', 'Ayyad', 11, 0, 'jpeg'),
('002284', 'Ra\'ed', 'Awasa', 112, 0, 'jpeg'),
('002287', 'Abu', 'Khalil Mohammad', 17, 0, 'jpeg'),
('002318', 'Abdelhamid', 'Obisat', 18, 0, 'jpeg'),
('002364', 'Monther', 'Jaradat', 112, 0, 'jpeg'),
('002377', 'Ashraf', 'Jayed', 11, 0, 'jpeg'),
('002393', 'Mohammad', 'Hasanat', 112, 0, 'jpeg'),
('002406', 'Murzaq', 'Salieb', 12, 0, 'jpeg'),
('002514', 'Hussam', 'Batineh', 10, 0, 'jpeg'),
('002541', 'Mayle', 'Navarrete', 11, 0, 'jpeg'),
('002583', 'Ahmad', 'Hamed', 111, 0, 'jpeg'),
('002612', 'Rhodora', 'Cabugnaso', 14, 0, 'jpeg'),
('002640', 'Omar', 'Dyab', 12, 0, 'jpeg'),
('002641', 'Ahmad', 'Ahmad', 14, 0, 'jpeg'),
('002648', 'Saleh', 'Mohammad', 11, 0, 'jpeg'),
('002670', 'Yaser', 'Abbas', 114, 0, 'jpeg'),
('002679', 'Samer', 'Smadi', 112, 0, 'jpeg'),
('002769', 'Khalil', 'Mashalah', 112, 0, 'jpeg'),
('002771', 'Yahya', 'Hilalat', 112, 0, 'jpeg'),
('002861', 'Mohammad', 'Rawashdeh', 112, 0, 'jpeg'),
('002911', 'Ibrahim', 'Zu\'bi', 14, 0, 'jpeg'),
('002928', 'Mohammad', 'Saber', 11, 0, 'jpeg'),
('002963', 'Ibrahim', 'Amer', 11, 0, 'jpeg'),
('002988', 'Ashraf', 'Nofal', 10, 0, 'jpeg'),
('002992', 'Waheed', 'Abdelkareem', 14, 0, 'jpeg'),
('003029', 'Shirley', 'Jane Viray', 14, 0, 'jpeg'),
('003035', 'Mona', 'Antido', 14, 0, 'jpeg'),
('003087', 'Osama', 'Ababneh', 112, 0, 'jpeg'),
('003136', 'Ahmad', 'Hloul', 14, 0, 'jpeg'),
('003142', 'Hira', 'Lal', 11, 0, 'jpeg'),
('003143', 'Jamaledea', 'Smadi', 110, 0, 'jpeg'),
('003145', 'Hamzeh', 'Hamzat', 14, 0, 'jpeg'),
('003147', 'Oday', 'Khawajeh', 110, 0, 'jpeg'),
('003186', 'Abdeljawad', 'Katteah', 11, 0, 'jpeg'),
('003189', 'Hussaie', 'Ali', 114, 0, 'jpeg'),
('003224', 'Ala`a', 'Sharari', 112, 0, 'jpeg'),
('003226', 'Fayez', 'Al-Njadat', 112, 0, 'jpeg'),
('003239', 'Salah', 'Al-Hadares', 112, 0, 'jpeg'),
('003248', 'Nooreldea', 'Hmoud', 13, 0, 'jpeg'),
('003278', 'Saad', 'Momani', 18, 0, 'jpeg'),
('003290', 'Khalid', 'Amro', 112, 0, 'jpeg'),
('003312', 'Ahmad', 'Oqaila', 14, 0, 'jpeg'),
('003313', 'Muhyeldea', 'Abu Harthyeh', 14, 0, 'jpeg'),
('003346', 'Mohammad', 'Mahareeq', 116, 0, 'jpeg'),
('003353', 'Abdullah', 'Salem', 14, 0, 'jpeg'),
('003368', 'Mohammad', 'Alawneh', 112, 0, 'jpeg'),
('003370', 'Faris', 'Raiha', 10, 0, 'jpeg'),
('003383', 'Nasha\'at', 'Abdullah Jaber', 12, 0, 'jpeg'),
('003414', 'Lourdes', 'Dacles', 14, 0, 'jpeg'),
('003422', 'Cecilia', 'Trino', 14, 0, 'jpeg'),
('003450', 'Sakher', 'Iyal Salma', 112, 0, 'jpeg'),
('003464', 'Moynal', 'Hossai', 11, 0, 'jpeg'),
('003470', 'Hudaifah', 'Hamda', 14, 0, 'jpeg'),
('003476', 'Omar', 'Shgairat', 112, 0, 'jpeg'),
('003479', 'Izzat', 'Shamaileh', 110, 0, 'jpeg'),
('003481', 'Malek', 'Bani Amer', 11, 0, 'jpeg'),
('003491', 'Mustafa', 'Abu Ghalio', 10, 0, 'jpeg'),
('003494', 'Abdullah', 'Mansour', 112, 0, 'jpeg'),
('003497', 'Yousef', 'Salah', 110, 0, 'jpeg'),
('003531', 'Obada', 'Dawodeah', 116, 0, 'jpeg'),
('003532', 'Sulta', 'Shafe`e', 10, 0, 'jpeg'),
('003548', 'Malek', 'Alalawneh', 14, 0, 'jpeg'),
('003549', 'Khaldou', 'Haboush', 12, 0, 'jpeg'),
('003552', 'Ahmad', 'Almadadha', 12, 0, 'jpeg'),
('003561', 'Thaer', 'Maghasbeh', 11, 0, 'jpeg'),
('003563', 'Mohammad', 'Mahasneh', 12, 0, 'jpeg'),
('003580', 'Karem', 'Shlouh', 13, 0, 'jpeg'),
('003584', 'Mohammad', 'Banat', 14, 0, 'jpeg'),
('003585', 'Issam', 'Qaralleh', 112, 0, 'jpeg'),
('003589', 'Assa\'d', 'Abulsoud', 11, 0, 'jpeg'),
('003591', 'Hamzeh', 'Abu Hartheh', 14, 0, 'jpeg'),
('003601', 'Sana\'a', 'Sharabati', 112, 0, 'jpeg'),
('003606', 'Ahmad', 'Yacuob', 116, 0, 'jpeg'),
('003613', 'Leonie', 'Malinis', 11, 0, 'jpeg'),
('003619', 'Abdelrhma', 'Kfawee', 112, 0, 'jpeg'),
('003631', 'Hamzih', 'Momani', 12, 0, 'jpeg'),
('003632', 'Malek', 'Salih', 12, 0, 'jpeg'),
('003635', 'Ali', 'Onaizat', 14, 0, 'jpeg'),
('003641', 'Ibrahim', 'Deghemat', 13, 0, 'jpeg'),
('003642', 'Mohammad', 'Habahbeh', 116, 0, 'jpeg'),
('003651', 'Amandeep', 'Kumar', 13, 0, 'jpeg'),
('003652', 'Jatinder', 'Kumar', 13, 0, 'jpeg'),
('003654', 'Rajesh', 'Kumar', 13, 0, 'jpeg'),
('003655', 'Sama\'el', 'Faqer Abualwfa', 116, 0, 'jpeg'),
('003657', 'Fusayhah', 'Kaafi', 14, 0, 'jpeg'),
('003662', 'Omar', 'Suleima', 116, 0, 'jpeg'),
('003671', 'Hussei', 'Faqieh', 11, 0, 'jpeg'),
('003674', 'AbdelRahma', 'Radaideh', 111, 0, 'jpeg'),
('003684', 'Bassam', 'Alawneh', 112, 0, 'jpeg'),
('003692', 'Yaser', 'Bani Hani', 112, 0, 'jpeg'),
('003693', 'Ahmad', 'Obeid', 10, 0, 'jpeg'),
('003698', 'Johnrose', 'Cainong', 16, 0, 'jpeg'),
('003704', 'Saif', 'Alla Qaraleh', 17, 0, 'jpeg'),
('003708', 'Yousef', 'Hanini', 12, 0, 'jpeg'),
('003713', 'Ali', 'Fuqara', 116, 0, 'jpeg'),
('003718', 'Mo\'tasem', 'Sabah', 11, 0, 'jpeg'),
('003719', 'Mohammad', 'Nabulsi', 114, 0, 'jpeg'),
('003722', 'ShamesAldea', 'Abdelrazzaq', 10, 0, 'jpeg'),
('003725', 'Obaidah', 'Hassa', 12, 0, 'jpeg'),
('003726', 'Abdullah', 'Bothom', 116, 0, 'jpeg'),
('003738', 'Bader', 'Emra', 112, 0, 'jpeg'),
('003740', 'Mo\'me', 'Rashda', 11, 0, 'jpeg'),
('003756', 'Anas', 'Mujahed', 12, 0, 'jpeg'),
('003757', 'Omar', 'Rayya', 11, 0, 'jpeg'),
('003769', 'Naim', 'Sezer', 12, 0, 'jpeg'),
('003771', 'Anas', 'Abuteifor', 112, 0, 'jpeg'),
('003775', 'HabeebAlRahma', 'Mohaidat', 10, 0, 'jpeg'),
('003776', 'Abdullah', 'Abu Aradah', 113, 0, 'jpeg'),
('003798', 'Cretchie', 'Tedios', 14, 0, 'jpeg'),
('003804', 'Ailee', 'Casakit', 14, 0, 'jpeg'),
('003806', 'Hisham', 'AlTwassi', 19, 0, 'jpeg'),
('003807', 'Alaa', 'Azzam', 14, 0, 'jpeg'),
('003810', 'Abdullah', 'Bani Awwad', 110, 0, 'jpeg'),
('003811', 'Mohammad', 'Battah', 12, 0, 'jpeg'),
('003814', 'Nawras', 'Obidat', 17, 0, 'jpeg'),
('003817', 'Mohammad', 'Hunaihe', 13, 0, 'jpeg'),
('003820', 'Murad', 'Hammad', 12, 0, 'jpeg'),
('003821', 'Obadah', 'Maraieh', 17, 0, 'jpeg'),
('003822', 'Amer', 'Malahmeh', 10, 0, 'jpeg'),
('003823', 'Hadeel', 'Khader', 10, 0, 'jpeg'),
('003824', 'Wesam', 'Sawalgah', 12, 0, 'jpeg'),
('003825', 'Rajab', 'Sha\'th', 14, 0, 'jpeg'),
('003826', 'Saleh', 'Njadat', 14, 0, 'jpeg'),
('003827', 'Jebreel', 'Qawasmeh', 12, 0, 'jpeg'),
('003828', 'Atallah', 'Majdoub', 14, 0, 'jpeg'),
('003829', 'Laith', 'Qatamee', 14, 0, 'jpeg'),
('003830', 'Mahmoud', 'AlHyasat', 116, 0, 'jpeg'),
('003831', 'AbdelKareem', 'Khaldi', 114, 0, 'jpeg'),
('003832', 'Ibrahim', 'Naji', 13, 0, 'jpeg'),
('003833', 'Mohammad', 'Khalaf', 112, 0, 'jpeg'),
('003834', 'Hanee', 'Mushtaha', 10, 0, 'jpeg'),
('003835', 'Ayham', 'Msallam', 12, 0, 'jpeg'),
('003837', 'Mahmoud', 'Nusir', 14, 0, 'jpeg'),
('003839', 'Ghaith', 'Qatami', 112, 0, 'jpeg'),
('003840', 'Shareef', 'Barbari', 114, 0, 'jpeg'),
('003842', 'Ahmad', 'Ibrahim', 11, 0, 'jpeg'),
('003844', 'Mohammad', 'Afifi', 14, 0, 'jpeg'),
('003845', 'Khaldou', 'Zabe', 14, 0, 'jpeg'),
('003846', 'Taima', 'Qudah', 12, 0, 'jpeg'),
('003847', 'Mousa', 'Gharabli', 12, 0, 'jpeg'),
('003848', 'Osama', 'Alidmat', 112, 0, 'jpeg'),
('003849', 'Mo\'me', 'AlMashahreh', 13, 0, 'jpeg'),
('003852', 'Tariq', 'AlHawawreh', 112, 0, 'jpeg'),
('003853', 'Mohammad', 'AlThheirat', 110, 0, 'jpeg'),
('003854', 'Mohammad', 'AlAzzam', 110, 0, 'jpeg'),
('003855', 'Feras', 'AlSaber', 12, 0, 'jpeg'),
('003856', 'Tarfa', 'AlShobaki', 10, 0, 'jpeg'),
('003857', 'Mohammad', 'Elouneh', 14, 0, 'jpeg'),
('003858', 'Loay', 'Thalji', 11, 0, 'jpeg'),
('003859', 'Ahmad', 'AlJarrah', 112, 0, 'jpeg'),
('003860', 'Adel', 'Salah', 12, 0, 'jpeg'),
('003863', 'Yaza', 'Ikbarieh', 12, 0, 'jpeg'),
('003864', 'Navi', 'Kumar', 13, 0, 'jpeg'),
('003865', 'Amninder', 'Jeet', 13, 0, 'jpeg'),
('003866', 'Mohinder', 'Kumar', 13, 0, 'jpeg'),
('003867', 'Aslam', 'Ali', 11, 0, 'jpeg'),
('003868', 'Afaf', 'Shalada', 12, 0, 'jpeg'),
('003870', 'Jwa', 'AlBataineh', 10, 0, 'jpeg'),
('003871', 'Sandra', 'Febiola', 14, 0, 'jpeg'),
('003872', 'Qusai', 'Alkhawaldeh', 17, 0, 'jpeg'),
('003873', 'Lana', 'AlMadanat', 14, 0, 'jpeg'),
('003874', 'Mohammad', 'AlDarwish', 17, 0, 'jpeg'),
('003875', 'AbdulKareem', 'AlFarajat', 110, 0, 'jpeg'),
('003876', 'Abdallah', 'AlTurky', 17, 0, 'jpeg'),
('003877', 'Youssef', 'Youssef', 11, 0, 'jpeg'),
('003878', 'Dunia', 'AlRashaideh', 111, 0, 'jpeg'),
('003879', 'Ahmad', 'Alataywi', 12, 0, 'jpeg'),
('003882', 'Mohammad', 'Alhelo', 17, 0, 'jpeg'),
('003883', 'Sa\'ed', 'Al-Battah', 14, 0, 'jpeg'),
('003886', 'Karim', 'Abdelnaser', 11, 0, 'jpeg'),
('003887', 'Mohammad', 'Alkabarity', 10, 0, 'jpeg'),
('003889', 'Mishael', 'Qatami', 112, 0, 'jpeg'),
('003893', 'Hamzeh', 'Alhellawi', 17, 0, 'jpeg'),
('003895', 'Mohammad', 'Almitwali', 112, 0, 'jpeg'),
('003896', 'Hussei', 'Abu Raje', 116, 0, 'jpeg'),
('003897', 'Yasmee', 'Ambra', 114, 0, 'jpeg'),
('003898', 'Ahmad', 'Alqassab', 116, 0, 'jpeg'),
('003899', 'Ahmad', 'Alfadol', 12, 0, 'jpeg'),
('111112', 'test', 'test', 10, NULL, 'jpeg'),
('111113', 'test', 'test', 10, NULL, 'jpeg'),
('11116', 'test6', 'test6', 113, NULL, 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Manager_ID` varchar(7) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ID` int(7) NOT NULL,
  `RoleID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Manager_ID`, `password`, `ID`, `RoleID`) VALUES
('001689', 'a12345', 1, 1),
('002943', 'a12345', 2, 1),
('002570', 'a12345', 3, 1),
('003384', 'a12345', 4, 1),
('003681', 'a12345', 5, 1),
('001598', 'a12345', 6, 1),
('003680', 'a12345', 7, 1),
('003537', 'a12345', 8, 1),
('003257', 'a12345', 9, 1),
('000716', 'a12345', 10, 1),
('002225', 'a12345', 11, 1),
('003455', 'a12345', 12, 1),
('003620', 'a12345', 13, 1),
('000212', 'a12345', 14, 1),
('000013', 'a12345', 15, 2),
('001956', 'a12345', 16, 1),
('000787', 'a12345', 17, 1),
('003453', 'a12345', 18, 1),
('003638', 'a12345', 19, 1),
('001368', 'a12345', 20, 1),
('001710', 'a12345', 21, 1),
('000444', 'a12345', 22, 1),
('000458', 'a12345', 23, 1),
('000474', 'a12345', 24, 1),
('000702', 'a12345', 25, 1),
('001773', 'a12345', 26, 1),
('001845', 'a12345', 27, 1),
('000209', 'a12345', 28, 1),
('000445', 'a12345', 29, 1),
('001091', 'a12345', 30, 1),
('001506', 'a12345', 31, 1),
('001571', 'a12345', 32, 1),
('001771', 'a12345', 33, 1),
('001794', 'a12345', 34, 1),
('001568', 'a12345', 35, 1),
('000787', 'a12345', 36, 1),
('1704', 'a12345', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` varchar(7) NOT NULL,
  `DepID` int(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `DepID`, `FirstName`, `LastName`, `Email`, `Phone`, `Pic`) VALUES
('000013', 30, 'Yahya ', 'Al Hasanat', 'a@A.A', '00000', 'jpeg'),
('000209', 212, 'Mahmoud ', 'Al Rawashdeh ', '', '', 'jpeg'),
('000212', 17, 'Mahmoud ', ' Mus\'ad', 'a@A.A', '0', 'Jpeg'),
('000444', 21, 'Tareq ', 'Al Saber', '', '', 'jpeg'),
('000445', 20, 'Tareq ', 'Al Helalat', '', '', 'jpeg'),
('000458', 211, 'Mohammad', ' Abu Alez', '', '', 'jpeg'),
('000474', 212, 'Abdelkareem ', 'Al Helalat', '', '', 'jpeg'),
('000702', 213, 'Nawras', 'Jaradat ', '', '', 'jpeg'),
('000716', 112, 'Abdullah ', ' Abu-Hamato', '', '', 'jpeg'),
('000787', 19, 'Hisham', ' Al Twassi', '', '', 'jpeg'),
('001091', 22, 'Tal\'at', ' Al Olaimi ', '', '', 'jpeg'),
('001368', 216, 'Wael ', 'Al Jundi ', '', '', 'jpeg'),
('001506', 27, 'Adel ', 'Abdelmalik ', '', '', 'jpeg'),
('001568', 29, 'Amer ', 'Mustafa', '', '', 'jpeg'),
('001571', 210, 'Mahmoud ', 'Khalil ', '', '', 'jpeg'),
('001598', 14, 'Ahmad ', ' Ibrahim', '', '', 'jpeg'),
('001689', 10, 'Majdi', 'Bicaen', '', '', 'jpeg'),
('001710', 210, 'Yaser ', 'Al Khatib', '', '', 'jpeg'),
('001771', 24, 'Rani ', 'Battah', '', '', 'jpeg'),
('001773', 22, 'Mohammad ', 'Alqam ', '', '', 'jpeg'),
('001794', 26, 'Tha\'er ', 'Zaid Al Kilani ', '', '', 'jpeg'),
('001845', 20, 'Sharif ', 'Ayyoub', '', '', 'jpeg'),
('001956', 30, 'Mariam ', 'Sirbel ', '', '', 'jpeg'),
('002225', 112, 'Mohammad ', ' Majali', '', '', 'jpeg'),
('002570', 11, 'Khaled ', ' Haboush', '', '', 'jpeg'),
('002943', 10, 'Esraa ', ' Istanbuli', '', '', 'jpeg'),
('003257', 111, 'Firas', 'Momani', '', '', 'jpeg'),
('003384', 12, 'Mohammad ', ' Mousa', '', '', 'jpeg'),
('003453', 117, 'Layali ', 'Nashashibi', '', '', 'jpeg'),
('003455', 116, 'Mohammad ', ' Mehdawi', '', '', 'jpeg'),
('003537', 110, 'Raad ', ' Tawil', '', '', 'jpeg'),
('003620', 116, 'Emad ', 'Dahmous', '', '', 'jpeg'),
('003638', 117, 'Roxanne ', 'Thaddeus  Yanzon', '', '', 'jpeg'),
('003680', 14, 'Odeza', ' Uligan', '', '', 'jpeg'),
('003681', 12, 'Waleed ', ' Sara', '', '', 'jpeg'),
('1704', 29, 'Sami ', 'Ounalli ', '', '', 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `ID` int(11) NOT NULL,
  `ManagID` varchar(7) NOT NULL,
  `EmpID` varchar(7) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_review` text CHARACTER SET latin1 NOT NULL,
  `Rate` int(1) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`ID`, `ManagID`, `EmpID`, `date_time`, `user_review`, `Rate`, `Category`, `Pic`) VALUES
(1, '000212', '0000000', '2022-05-15 18:04:57', '', 2, 'Team working', ''),
(169, '001689', '000025', '2022-05-07 20:34:30', 'cd', 2, 'Team working', ''),
(170, '001689', '000025', '2022-05-07 20:35:52', 'k,', 2, 'Team working', ''),
(171, '001689', '000028', '2022-05-07 21:23:32', 's', 1, 'Grooming', ''),
(172, '001689', '000025', '2022-05-07 21:25:48', 'sa', 3, 'Guest feedbak', ''),
(173, '001704', '000025', '2022-05-08 18:22:00', 's', 1, 'Grooming', ''),
(174, '001704', '000025', '2022-05-08 18:41:16', '', 1, 'Grooming', ''),
(175, '000013', '000025', '2022-05-09 03:22:28', '', 1, 'Grooming', ''),
(176, '000209', '000033', '2022-05-09 06:36:56', 's', 2, 'Team working', ''),
(177, '000209', '000045', '2022-05-09 09:11:07', 'Service', 2, 'Team working', ''),
(178, '000209', '000064', '2022-05-09 09:12:31', 'Servicewdas', 1, 'Grooming', ''),
(179, '000209', '000412', '2022-05-09 09:43:37', 'good', 2, 'Standards', ''),
(180, '1704', '003847', '2022-05-09 12:48:08', 'jgfhgf', 3, 'Heartist', ''),
(181, '1704', '000030', '2022-05-09 12:51:16', '', 2, 'Team working', ''),
(182, '000209', '000025', '2022-05-13 02:02:41', 'fv', 1, 'Smile', ''),
(183, '000209', '000214', '2022-05-13 02:05:59', 'aaaaaaaaaaaaa', 1, 'Grooming', ''),
(184, '1704', '000025', '2022-05-13 03:09:09', 'cbcxb', 1, 'Smile', ''),
(185, '000212', '003491', '2022-05-15 16:18:37', 'jhyf', 3, 'Guest feedbak', ''),
(189, '000212', '000186', '2022-05-15 17:29:08', 'sa', 2, 'Team working', ''),
(190, '000212', '000186', '2022-05-15 17:30:25', '', 2, 'Team working', ''),
(191, '000212', '0000000', '2022-05-15 18:09:42', '', 2, 'Team working', ''),
(192, '000212', '0000000', '2022-05-15 18:11:00', '', 2, 'Team working', ''),
(193, '000212', '0000000', '2022-05-15 18:11:02', '', 2, 'Team working', ''),
(194, '000212', '0000000', '2022-05-15 18:12:03', '', 2, 'Team working', ''),
(195, '000212', '0000000', '2022-05-15 18:22:21', '', 2, 'Team working', ''),
(196, '000212', '0000000', '2022-05-15 18:22:58', '', 2, 'Team working', ''),
(197, '000212', '0000000', '2022-05-15 18:39:19', '', 2, 'Team working', ''),
(198, '000212', '0000000', '2022-05-15 18:45:23', '', 2, 'Team working', ''),
(199, '000212', '000265', '2022-05-15 18:45:54', '', 1, 'Grooming', ''),
(200, '000212', '000265', '2022-05-15 18:47:08', '', 1, 'Grooming', ''),
(201, '000212', '000265', '2022-05-15 18:47:09', '', 1, 'Grooming', ''),
(202, '000212', '000265', '2022-05-15 18:47:24', '', 1, 'Grooming', ''),
(203, '000212', '000265', '2022-05-15 18:59:34', '', 2, 'Team working', 'jpeg'),
(204, '000212', '000265', '2022-05-15 19:01:46', '', 2, 'Team working', 'jpeg'),
(205, '000212', '000265', '2022-05-15 19:01:47', '', 2, 'Team working', 'jpeg'),
(206, '000212', '000265', '2022-05-15 19:01:57', '', 2, 'Team working', 'jpeg'),
(207, '000212', '000265', '2022-05-15 19:02:42', '', 2, 'Team working', 'jpeg'),
(208, '000212', '000265', '2022-05-15 19:03:22', '', 1, 'Smile', 'jpeg'),
(209, '000212', '000186', '2022-05-18 03:09:37', '', 2, 'Team working', 'jpeg'),
(210, '000212', '000186', '2022-05-18 03:10:29', 'l', 1, 'Grooming', 'jpeg'),
(211, '000212', '000186', '2022-05-18 03:12:17', 'l', 2, 'Team working', 'jpeg'),
(212, '000212', '000186', '2022-05-18 03:13:13', 'l', 2, 'Team working', ''),
(213, '000212', '000186', '2022-05-18 03:13:31', 'p', 1, 'Grooming', ''),
(214, '000212', '000186', '2022-05-18 03:13:41', 'p', 1, 'Grooming', 'Jpeg'),
(215, '000212', '000186', '2022-05-18 03:14:21', 'p', 2, 'Team working', 'Jpeg'),
(216, '000212', '000186', '2022-05-18 03:19:17', 'p', 2, 'Team working', 'Jpeg'),
(217, '000212', '000186', '2022-05-18 03:19:35', 'fv', 2, 'Team working', ''),
(218, '000212', '000186', '2022-05-18 03:19:58', 'fv', 3, 'Heartist', 'jpeg'),
(219, '000212', '000186', '2022-05-18 03:21:05', 'fv', 3, 'Heartist', 'Jpeg'),
(220, '000212', '000186', '2022-05-18 03:21:20', 'dfs', 2, 'Standards', ''),
(221, '000212', '000186', '2022-05-18 03:22:15', 'dcs', 1, 'Smile', ''),
(222, '000212', '000771', '2022-05-20 00:42:06', 'ds', 1, 'Grooming', 'jpeg'),
(223, '000212', '000771', '2022-05-20 00:43:09', 'csa', 2, 'Standards', ''),
(224, '000212', '000771', '2022-05-20 00:43:38', 'csa', 3, 'Heartist', 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `Name`) VALUES
(1, 'Manager'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BranchID` (`BranchID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DepID` (`DepID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ManagID` (`Manager_ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DepID` (`DepID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ManagID` (`ManagID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`DepID`) REFERENCES `department` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`DepID`) REFERENCES `department` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
