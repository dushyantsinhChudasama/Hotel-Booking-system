-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2026 at 06:15 AM
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
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `arrival` int(11) DEFAULT 0,
  `refund` int(11) DEFAULT 0,
  `booking_status` varchar(10) DEFAULT 'pending',
  `order_id` varchar(20) DEFAULT NULL,
  `trans_amt` int(11) DEFAULT NULL,
  `trans_resp_msg` varchar(30) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `datentime` date DEFAULT current_timestamp(),
  `room_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_pay` int(11) DEFAULT NULL,
  `room_no` varchar(11) DEFAULT NULL,
  `user_name` varchar(300) DEFAULT NULL,
  `phonenum` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_amt`, `trans_resp_msg`, `payment_id`, `datentime`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenum`) VALUES
(8, 1, 3, '2026-01-01', '2026-01-03', 0, 1, 'refunded', 'order_RujR85GBM4LvE9', 3800, 'Payment Successful', 'pay_RujREsZudm8hVF', '2025-12-22', 'Simple Room', 1900, 3800, NULL, 'Dushyantsinh Chudasama', '9712802041'),
(9, 1, 4, '2026-01-03', '2026-01-05', 1, 0, 'booked', 'order_RujRgPzNov4kHp', 15000, 'Payment Successful', 'pay_RujRr68fSYDl2C', '2025-12-22', 'Modern Room', 7500, 15000, 'A5', 'Dushyantsinh Chudasama', '9712802041'),
(10, 7, 3, '2025-12-22', '2025-12-24', 1, 0, 'booked', 'order_RukoyreEcO4Rh8', 3800, 'Payment Successful', 'pay_Rukp9o5VPpka4L', '2025-12-22', 'Simple Room', 1900, 3800, 'A5', 'Tofik', '9712802041');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gmap` varchar(250) NOT NULL,
  `pn1` varchar(200) NOT NULL,
  `pn2` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(300) NOT NULL,
  `insta` varchar(300) NOT NULL,
  `tw` varchar(300) NOT NULL,
  `ifrmae` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `ifrmae`) VALUES
(1, 'Rajkot', 'https://maps.app.goo.gl/nXTmpY6mnSyWMiCm8', '66778343434', '121212121212', 'contact@dchotels.com', 'https://facebook.com', 'https://instagram.com', 'https://x.com/', 'https://maps.app.goo.gl/nXTmpY6mnSyWMiCm8');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `image`, `desc`) VALUES
(4, 'Geyser', '6903ae42a50c0IMG_1637.svg', 'Get instant access to hot water anytime with our energy-efficient geyser, ensuring a refreshing and soothing bathing experience.'),
(5, 'Heater', '6903ae5e20b1dIMG_20855.svg', 'Enjoy a cozy and comfortable stay with our high-performance heater that keeps your room perfectly warm even on the coldest days.'),
(6, 'Wifi', '6903ae7251b70IMG_8589.svg', 'Stay connected effortlessly with our high-speed WiFi service, allowing you to browse, stream, and work without any interruptions'),
(7, 'Spa', '6903aea6bd692IMG_47816.svg', 'Relax and rejuvenate your senses with our luxurious spa facility designed to provide peace, comfort, and complete body relaxation.'),
(8, 'Television', '6903aec4aad61IMG_84712.svg', 'Catch up on your favorite shows and movies with our modern LED television offering crystal-clear picture quality and premium channels.'),
(9, 'Room AC', '6903aed558323IMG_91676.svg', 'Experience cool and fresh air throughout your stay with our advanced air conditioning system ensuring perfect indoor comfort.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(5, 'Heater'),
(8, 'Coffe Maker'),
(10, 'Free Parking'),
(12, 'Pick Up');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_details`
--

CREATE TABLE `password_reset_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired` tinyint(4) NOT NULL DEFAULT 0,
  `lastAccessed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(1, '', 0, 0, 0, 0, 0, '', 1, 1),
(2, '', 0, 0, 0, 0, 0, '', 1, 1),
(3, 'Simple Room', 1200, 1900, 12, 5, 2, 'Simple room', 1, 0),
(4, 'Modern Room', 5000, 7500, 10, 3, 2, 'Modern Room', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_default_image`
--

CREATE TABLE `room_default_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_default_image`
--

INSERT INTO `room_default_image` (`id`, `image`) VALUES
(0, '69149e1a4fc2d_thumbnail.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`id`, `room_id`, `facilities_id`) VALUES
(54, 4, 4),
(55, 4, 5),
(56, 4, 8),
(60, 3, 4),
(61, 3, 5),
(62, 3, 6),
(63, 3, 7),
(64, 3, 8),
(65, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`id`, `room_id`, `features_id`) VALUES
(41, 4, 5),
(42, 4, 10),
(43, 4, 11),
(47, 3, 5),
(48, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room_image`
--

CREATE TABLE `room_image` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_image`
--

INSERT INTO `room_image` (`id`, `room_id`, `image`, `thumb`) VALUES
(1, 3, '6914a158decc7_2.jpg', 1),
(5, 4, '6914a2a904d28_IMG_74924.png', 0),
(6, 4, '6914a2acba104_IMG_92300.jpg', 0),
(7, 4, '6914a2b0e074a_IMG_65019.png', 1),
(9, 3, '6914a95cc969b_IMG_78422.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_about` text NOT NULL,
  `shutdown` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_about`, `shutdown`) VALUES
(1, ' DC Hotels', 'This is demo description\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `status` char(10) DEFAULT 'active',
  `role` char(6) DEFAULT 'user',
  `token` text NOT NULL,
  `verified` int(11) DEFAULT 0,
  `datentime` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `full_name`, `email`, `mobile`, `pincode`, `password`, `address`, `profile_picture`, `status`, `role`, `token`, `verified`, `datentime`) VALUES
(1, 'Dushyantsinh Chudasama', 'dchudasama509@rku.ac.in', 9712802041, 364004, 'D1602214@d', 'RK University, Kasturbadham, Tramba, Bhnvnagar highway', '68dd4124396c4icon.png', 'active', 'user', 'dfa6191def10bf29bbd92edfca9d6db59b1bca4f20c56e298e4cff922c956c1fda2bfdd6cf5a13578502e3e17d04f358dc33', 1, '2025-10-23'),
(6, NULL, 'admin@dchotel.com', NULL, NULL, 'admin', NULL, NULL, 'active', 'admin', '', 1, '2025-11-20'),
(7, 'Tofik', 'tmultani343@rku.ac.in', 9712802041, 360005, 'D1602214@d', 'Tramba', '694909cfbc5304545.jpg', 'active', 'user', '7ea81320d79dbc2d48e25f7caa21ed7d5a7c56ff6349e4ed88b0993ffc95747e7b094069151574174098a53fe360052c3267', 0, '2025-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `subject`, `message`, `seen`, `date`) VALUES
(28, 'Dushyantsinh Chudasama', 'dushyant9803@gmial.com', 'Hello', 'sdfsdfsdfsdf', 1, '2025-10-23'),
(29, 'Tofik Multani', 'tmultani343@rku.ac.in', 'slfkjsf', 'sdkjflsdkfjs;dklfj sdf dlfj ; dfsdkf jsd;f', 1, '2025-10-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_details`
--
ALTER TABLE `password_reset_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_default_image`
--
ALTER TABLE `room_default_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_reset_details`
--
ALTER TABLE `password_reset_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
