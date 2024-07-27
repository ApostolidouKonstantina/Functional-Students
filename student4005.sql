-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 07:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student4005`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Counter` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Subject` varchar(40) NOT NULL,
  `Text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Counter`, `Date`, `Subject`, `Text`) VALUES
(1, '2008-12-12', 'Έναρξη μαθημάτων', 'Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008.'),
(2, '2008-12-15', 'Ανάρτηση εργασίας', 'Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a class=\"buttons2\" href=\"homework.html\" role=\"button\">«Εργασίες»</a>. Η ημερομηνία παράδοσης της εργασίας είναι 2008-05-12.'),
(3, '2023-12-27', 'Ανάρτηση εργασίας 3', 'Η εργασία 3 έχει ανακοινωθεί στην ιστοσελίδα <a class=\"buttons2\" href=\"homework.php\" role=\"button\">«Εργασίες»</a>. Η ημερομηνία παράδοσης της εργασίας είναι 2024-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `Counter` int(11) NOT NULL,
  `Goals` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Requirements` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`Counter`, `Goals`, `Description`, `Requirements`, `Date`) VALUES
(1, '<ol><li>Στόχος 1</li><li>Στόχος 2</li></ol>', 'extra_files/ergasia1.doc', '<ol><li>Γραπτή αναφορά σε word</li><li>Παρουσίαση σε powerpoint</li></ol>', '2009-05-12'),
(2, '<ol><li>Στόχος 1</li><li>Στόχος 2</li><li>Στόχος 3</li></ol>', 'extra_files/ergasia2.doc', '<ol><li>Γραπτή αναφορά σε word</li> <li>Παρουσίαση σε powerpoint</li></ol> ', '2009-05-12'),
(3, '<ol><li>Στόχος 1\r</li><li>Στόχος 2</li></ol>', 'extra_files/ergasia1.doc', '<ol><li>Αναφορά\r</li><li>Παρουσίαση</li></ol>', '2024-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `Counter` int(11) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `File_location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`Counter`, `Title`, `Description`, `File_location`) VALUES
(1, 'Τίτλος Εγγράφου 1', 'HTML', 'extra_files/file1.doc'),
(2, 'Τίτλος Εγγράφου 2', 'CSS', 'extra_files/file2.doc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(40) NOT NULL,
  `Surname` varchar(40) NOT NULL,
  `Loginame` varchar(40) NOT NULL,
  `Passwords` varchar(40) NOT NULL,
  `Role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Surname`, `Loginame`, `Passwords`, `Role`) VALUES
('Vasilis', 'Papadopoulos', 'vpapadopoulos@csd.auth.gr', 'p2303v', 'Student'),
('Maria', 'Petrou', 'mpetrou@csd.auth.gr', 'mar14p', 'Tutor'),
('Elena', 'Xatzi', 'xatzi@csd.auth.gr', 'elena2020', 'Student');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
