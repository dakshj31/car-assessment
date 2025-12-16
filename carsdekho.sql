-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 08:31 AM
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
-- Database: `carsdekho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@carsdekho.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`) VALUES
(1, 'Find Your Dream Car', 'porsche.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `variants` varchar(100) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `fuel_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `price`, `image`, `category`, `description`, `variants`, `engine`, `mileage`, `transmission`, `fuel_type`) VALUES
(1, 'Maruti Swift', '₹6.5 Lakh', 'swift.jpg', 'most_searched', 'The Maruti Swift is a midsize hatchback in India which offers a good balance of features, performance, and fuel efficiency. It is available with Suzuki’s new 1.2-litre Z series 3- cylinder petrol engine in both 5-speed manual or 5-speed AMT transmission. The Swift is now also available in CNG offering a claimed fuel efficiency of 32.85 km/kg.', '', '1197 cc', '24.8 - 25.75 kmpl', 'Manual / Automatic', 'CNG / Petrol/Diesel'),
(2, 'Hyundai Creta', '₹11 Lakh', 'creta.jpg', 'most_searched', 'The Hyundai Creta, Hyundai’s bestseller in India and the top performer in compact SUV sales for an extended period received a comprehensive update at the start of the year. Renowned for its extensive feature list, the Creta is provided with options of a petrol engine, a turbo-petrol engine, and a diesel engine, catering to a wide range of driving preferences and needs. It also comes loaded with the latest features and includes an extensive suite of autonomous driver assistance features to improve', '', '1482 cc - 1497 cc', '19.1 kmpl', 'Automatic/Manual', 'Diesel/Petrol'),
(3, 'Kia Seltos', '₹10.5 Lakh', 'seltos.jpg', 'most_searched', 'The Kia Seltos is known for its European car-like design and an upmarket cabin that is feature loaded. \r\n\r\nIts sharp lines, a well proportionate design and modern LED lighting elements, giving the Kia Seltos a classy look.  \r\n\r\nThe cabin is upmarket and comes in different colour schemes depending on the variant. It’s also spacious, where it can seat 5 occupants in decent comfort. ', '', '1482 cc - 1497 cc', '17 - 20.7 kmpl', 'Automatic/Manual', 'Diesel/Engine'),
(4, 'Tata Curvv', '₹12 Lakh', 'curvv.jpg', 'latest', 'The Tata Curvv 2025 is an SUV-coupe that is based on the Tata Nexon. It sits on the popular compact SUV segment, but sets itself apart with a different design. \r\n\r\nSince it has an SUV-coupe design, the 2025 Tata Curvv looks unique with its sloping roofline and boasts a striking design. \r\n\r\nThe interior design is shared with the Tata Nexon, which isn’t a bad thing. It has also been updated with a new four-spoke steering wheel and different variant-specific colour themes. ', '', '1199 cc - 1497 cc', '15 kmpl', 'Automatic/Manual', 'Petrol/Diesel'),
(5, 'Mahindra Thar 5 Door', '₹15 Lakh', 'thar.jpg', 'latest', '', '', '', '', '', ''),
(6, 'Maruti eVX', '₹18 Lakh', 'evx.jpg', 'latest', '', '', '', '', '', ''),
(9, 'Honda Elevate', '12.94 Lakh', 'elevate.jpg', 'latest', 'The Honda Elevate is an all-rounder known for its simple design, a well-appointed interior and a comfortable ride. \r\nIts boxy design combined with modem design touches like LED lighting and dual-tone alloy wheels makes the Elevate a neat looking Honda. ', 'SV, V', '1498 cc', '15.31 - 16.92 kmpl', 'Manual/Transmission', 'Petrol/Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `car_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `phone`, `email`, `address`, `car_type`) VALUES
(2, 'daksh', '817258550', 'daksh@gmail.com', 'meerut', 'Hatchback, Sedan'),
(3, 'Daksh Joshi', '56848464', 'himanshu@gmail.com', 'knfklwnefkl', 'Hatchback');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
