-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 12:18 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`) VALUES
(7, 'Abc', 'abc@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `hotelType` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `rangeOfPeople` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `username`, `hotelType`, `start_date`, `end_date`, `rangeOfPeople`) VALUES
(1, 'bILAL', 'Apartments', '5/13/2020', '5/13/2020', '5'),
(2, 'qwe', 'Apartments', '2020-05-20T19:00:00.000Z', '2020-05-28T19:00:00.000Z', '2');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelId` int(200) NOT NULL,
  `HotelName` varchar(20000) NOT NULL,
  `HotelLocation` varchar(200) NOT NULL,
  `HotelImage` varchar(200) NOT NULL,
  `HotelAppartmentCategory` varchar(200) NOT NULL,
  `HotelRooms` int(200) NOT NULL,
  `HotelMessage` varchar(200) NOT NULL,
  `remiaingRooms` int(200) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelId`, `HotelName`, `HotelLocation`, `HotelImage`, `HotelAppartmentCategory`, `HotelRooms`, `HotelMessage`, `remiaingRooms`, `price`) VALUES
(2, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(3, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(4, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(5, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(6, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(7, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(8, 'Awari', 'a to z', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Apartments', 123, 'qwe', 0, 0),
(10, 'Window Inc1', 'abc@gmail.com', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'PrivateVillas', 123, 'qw', 0, 0),
(11, 'YUYU Namba Plaza', 'OSAKA, Japan', 'https://pix5.agoda.net/hotelImages/109/10941418/10941418_19112710290084510021.jpg?s=450x450', 'Apartments', 50, 'none', 0, 0),
(12, 'UK Appartments', 'UK', 'https://wallpapercave.com/wp/wp2449361.jpg', 'Apartments', 100, 'None', 0, 0),
(13, 'New Order', 'a to z', 'https://lh3.googleusercontent.com/proxy/SljZxEsqNGQjTgw0Pob2251GlRp4pkZmKr-VhZeHgn5XP2lnbn_tikIJ0ClreOvuGIkuE98p3zu_eIZgPGJfeAAFiGlkSt6j3fBrPZ6KREV7KS908anybeGsrlMYQ3cLuRc', 'Bungalows', 5, './', 0, 55),
(14, 'bunglaow', 'abc@gmail.com', 'https://lh3.googleusercontent.com/proxy/SljZxEsqNGQjTgw0Pob2251GlRp4pkZmKr-VhZeHgn5XP2lnbn_tikIJ0ClreOvuGIkuE98p3zu_eIZgPGJfeAAFiGlkSt6j3fBrPZ6KREV7KS908anybeGsrlMYQ3cLuRc', 'Bungalows', 10, 'non', 0, 66),
(15, 'new Hotel', 'japan', 'https://pix5.agoda.net/hotelImages/109/10941418/10941418_19112710290084510021.jpg?s=450x450', 'Bungalows', 3, 'Yeah yeah', 3, 20),
(16, 'abc', 'xyz', 'https://q-cf.bstatic.com/images/hotel/max1024x768/116/116785990.jpg', 'Private Villas', 10, 'None', 10, 0),
(17, 'yui', 'yui', 'https://wallpapercave.com/wp/wp2449361.jpg', 'Bungalows', 12, '<h1 mat-dialog-title>Hi {{data.name}}</h1>\n<div mat-dialog-content>\n  <p>What\'s your favorite animal?</p>\n  <mat-form-field>\n    <mat-label>Favorite Animal</mat-label>\n    <input matInput [(ngModel)]=', 12, 56);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
