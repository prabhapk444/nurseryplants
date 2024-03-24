-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `amount`, `status`) VALUES
(117, 4, 31, 1, '200', 1),
(118, 4, 33, 4, '1400', 1),
(119, 4, 37, 1, '240', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `confirmaddress` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `delivery` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `product`, `email`, `number`, `city`, `address`, `confirmaddress`, `pincode`, `delivery`, `total_amount`, `payment_method`) VALUES
(1, 'pk', ' Tillandsia ionantha Guatemala ', 'pk@gmail.com', '7876543212', 'trichy', 'pllayar kovil street', 'pllayar kovil street', '62001', '2024-03-08 00:00:00', '450.00', 'cash'),
(2, 'comrade', ' Tillandsia ionantha Guatemala ', 'pk@gmail.com', '6383786437', 'Sivakasi', '11,sedan kinatru street thiruthangal', '11,sedan kinatru street thiruthangal', '626130', '2024-03-08 00:00:00', '1350.00', 'cash'),
(3, 'prabha', 'Damascus Rose', 'prabhakarans@anjaconline.org', '9894193212', 'thiruthangal', 'sedan kinatru street', 'sedan kinatru street', '626130', '2024-03-17 00:00:00', '350.00', 'cash'),
(4, 'prabha', 'Damascus Rose', 'karanprabha22668@gmail.com', '6383786437', 'thiruthangal', 'sedan kinatru street', 'sedan kinatru street', '626139', '2024-03-18 00:00:00', '1400.00', 'cash'),
(5, 'prabha', 'Rose (Pink) - Plant', 'karanprabha22668@gmail.com', '6383786437', 'thiruthangal', 'sedan kinatru street', 'sedan kinatru street', '626130', '2024-03-18 00:00:00', '240.00', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(2550) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `name`, `quantity`, `rate`, `amount`, `status`) VALUES
(10, 'priya', '1', '120', '₹120.00', 'success'),
(11, 'priya', '1', '120', '₹120.00', 'success'),
(12, 'priya', '1', '228', '₹228.00', 'success'),
(13, 'priya', '8', '299', '₹2,392.00', 'success'),
(15, 'nursery', '1', '70', '₹70.00', 'success'),
(16, 'nursery', '1', '480', '₹480.00', 'success'),
(17, 'nursery', '1', '340', '₹340.00', 'success'),
(18, 'nursery', '1', '155', '₹155.00', 'success'),
(19, 'nursery', '1', '340', '₹340.00', 'success'),
(20, 'admin', '1', '349', '₹349.00', 'success'),
(21, 'admin', '1', '349', '₹349.00', 'success'),
(22, 'admin', '1', '349', '₹349.00', 'success'),
(23, 'admin', '1', '349', '₹349.00', 'success'),
(24, 'priya', '1', '349', '₹349.00', 'success'),
(25, 'priya', '1', '228', '₹228.00', 'success'),
(26, 'priya', '2', '150', '₹300.00', 'success'),
(27, 'priya', '1', '120', '₹120.00', 'success'),
(28, 'nursery', '1', '400', '₹400.00', 'success'),
(29, 'nursery', '1', '400', '₹400.00', 'success'),
(30, 'nursery', '1', '299', '₹299.00', 'success'),
(31, 'nursery', '1', '299', '₹299.00', 'success'),
(32, 'nursery', '4', '120', '₹480.00', 'success'),
(33, 'nursery', '2', '480', '₹960.00', 'success'),
(34, 'nursery', '2', '480', '₹960.00', 'success'),
(35, 'nursery', '2', '480', '₹960.00', 'success'),
(36, 'nursery', '2', '480', '₹960.00', 'success'),
(37, 'nursery', '2', '480', '₹960.00', 'success'),
(38, 'nursery', '1', '450', '₹450.00', 'success'),
(39, 'nursery', '2', '450', '₹900.00', 'success'),
(40, 'nursery', '1', '200', '₹200.00', 'success'),
(41, 'admin', '1', '350', '₹350.00', 'success'),
(42, 'nursery', '3', '350', '₹1,050.00', 'success'),
(43, 'nursery', '1', '240', '₹240.00', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `availability` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount_amount` varchar(100) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `type`, `description`, `price`, `quantity`, `availability`, `image`, `discount_amount`) VALUES
(1, 'peace lily', 'indoor', 'plants', 'peace lily is  a indoor plant', '₹120', 286, 12, 'C:/xampp/htdocs/nursery/nursery/uploads/peace.png', '0.00'),
(2, 'Elephant bush', 'indoor', 'plants', 'Elephant bush, Portulacaria afra, Jade plant (Green) - Succulent Plant', '₹169', 100, 0, 'C:/xampp/htdocs/nursery/nursery/uploads/elephant.png', '0.00'),
(3, 'Spider Plant', 'indoor', 'plants', 'Chlorophytum, Spider Plant - Plant', '₹259', 119, 19, 'C:/xampp/htdocs/nursery/nursery/uploads/spider.png', '0.00'),
(4, ' Arabian Jasmine - Plant', 'outdoor', 'plants', 'Jasminum sambac, Mogra, Arabian Jasmine - Plant', '₹349', 24, 10, 'C:/xampp/htdocs/nursery/nursery/uploads/jasmine.png', '0.00'),
(5, 'Button Rose ', 'outdoor', 'plants', 'Miniature Rose, Button Rose (Any Color) - Plant', '₹299', 66, 10, 'C:/xampp/htdocs/nursery/nursery/uploads/rose.png', '0.00'),
(6, 'Parijat Tree', 'outdoor', 'plants', 'Parijat Tree, Parijatak, Night Flowering Jasmine - Plant', '₹359', 120, 12, 'C:/xampp/htdocs/nursery/nursery/uploads/panjrat.png', '0.00'),
(7, ' Lucky Bamboo', 'water', 'plants', ' Lucky Bamboo', '₹228', 209, 21, 'C:/xampp/htdocs/nursery/nursery/uploads/water1.png', '0.00'),
(8, 'Money-plant', 'water', 'plants', 'money plant is a water plant', '₹150', 90, 10, 'C:/xampp/htdocs/nursery/nursery/uploads/water2.png', '0.00'),
(9, 'Lotus', 'water', 'plants', 'Lotus is a water plant', '₹110', 110, 11, 'C:/xampp/htdocs/nursery/nursery/uploads/lotus.png', '0.00'),
(11, 'Sorrel Herb ', 'seeds', 'plants', 'Sorrel Herb - Herb Seeds', '₹70', 100, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/seeds1.png', '0.00'),
(12, 'Borage ', 'seeds', 'plants', 'Borage - Herb Seeds', '₹74', 110, 110, 'C:/xampp/htdocs/nursery/nursery/uploads/seeds2.png', '0.00'),
(13, 'Sterculia Foetida', 'seeds', 'plants', 'Sterculia Foetida, Jungli Badam - 0.5 kg Seeds', '₹690', 200, 200, 'C:/xampp/htdocs/nursery/nursery/uploads/seeds3.png', '0.00'),
(14, 'Frosted Ceramic Pot', 'ceramic', 'plants', 'Our Frosted Ceramic Pot is set to be every plant and home decor lover’s favourite ceramic pot', '₹500', 200, 200, 'C:/xampp/htdocs/nursery/nursery/uploads/ceramic1.png', '0.00'),
(15, 'Aurelius Prism Ceramic Pot', 'ceramic', 'plants', 'Introducing Aurelius Prism Pots, where contemporary design and traditional craftsmanship converge', '₹700', 100, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/ceramic2.png', '0.00'),
(17, 'Roma Ceramic Pot', 'Ceramic', 'plants', 'Introducing the exquisite Roma Pot, a stunning ceramic masterpiece inspired by the timeless beauty o', '₹340', 110, 110, 'C:/xampp/htdocs/nursery/nursery/uploads/ceramic3.png', '0.00'),
(18, 'Qubec Planter', 'plastic', 'plants', 'If modern planters has a face, our Quebec planter would be it. As the name suggests, the quebec plan', '₹480', 180, 200, 'C:/xampp/htdocs/nursery/nursery/uploads/plastic1.png', '0.00'),
(19, 'Barca Square Planter', 'plastic', 'plants', 'With its simple design and mimalistic look theBarca Square planter can fit into any space with ease.', '₹640', 90, 90, 'C:/xampp/htdocs/nursery/nursery/uploads/plastic2.png', '0.00'),
(20, 'Verona Planter', 'plastic', 'plants', 'Introducing the Verona Planter, a perfect fusion of style and functionality that will effortlessly ', '₹700', 70, 70, 'C:/xampp/htdocs/nursery/nursery/uploads/plastic3.png', '0.00'),
(21, 'Plastic Hand Trowel', 'trowel', 'tools', 'Plastic Hand Trowel', '₹155', 20, 20, 'C:/xampp/htdocs/nursery/nursery/uploads/sp1.png', '0.00'),
(22, 'Garden Hoe Trowel', 'trowel', 'tools', 'Garden Hoe Trowel with Handle ', '₹300', 30, 30, 'C:/xampp/htdocs/nursery/nursery/uploads/sp2.png', '0.00'),
(23, 'Transplanting Trowel ', 'trowel', 'tools', 'Transplanting Trowel ', '₹100', 70, 70, 'C:/xampp/htdocs/nursery/nursery/uploads/sp3.png', '0.00'),
(25, 'Pressure Sprayer ', 'sprayer', 'tools', 'Pressure Sprayer (1.5 ltr) - Gardening Tool', '₹199', 20, 20, 'C:/xampp/htdocs/new nursery/nursery/uploads/spa1.png', '0.00'),
(27, 'Rock sprayer', 'sprayer', 'tools', 'rock sprayer', '₹340', 10, 10, 'C:/xampp/htdocs/new nursery/nursery/uploads/spra2.jpg', '0.00'),
(30, ' Tillandsia ionantha Guatemala ', 'air', 'plants', 'Air Plant, Tillandsia ionantha Guatemala (Medium) - Plant', '₹450', 95, 100, 'C:/xampp/htdocs/nursery new/nursery/uploads/air.jpg', '0.00'),
(31, 'Tillandsia ionantha var', 'air', 'plants', 'Air Plant, Tillandsia ionantha var. ionantha - Plant', '₹200', 99, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/air2.jpg', '0.00'),
(32, 'Tillandsia Cotton King ', 'air', 'plants', 'Air Plant, Tillandsia Cotton King - Plant', '₹400', 147, 150, 'C:/xampp/htdocs/nursery/nursery/uploads/air3.jpg', '0.00'),
(33, 'Damascus Rose', 'rose', 'plants', 'Damascus Rose, Scented Rose (Any Color) - Plant', '₹350', 93, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/rose1.png', '175'),
(34, 'Rose ', 'rose', 'plants', 'Rose (Peach) - Plant', '₹240', 22, 22, 'C:/xampp/htdocs/nursery/nursery/uploads/rose2.png', '120'),
(35, 'Rose (Peach) - Plant', 'rose', 'plants', 'Rose (Peach) - Plant', '₹250', 100, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/rose3.jpg', '125'),
(36, 'Rose (Yellow) - Plant', 'rose', 'plants', 'Rose (Yellow) - Plant', '₹270', 100, 100, 'C:/xampp/htdocs/nursery/nursery/uploads/rose4.jpg', '135'),
(37, 'Rose (Pink) - Plant', 'rose', 'plants', 'Rose (Pink) - Plant', '₹240', 999, 1000, 'C:/xampp/htdocs/nursery/nursery/uploads/rose5.webp', '120'),
(38, 'Miniature Rose', 'rose', 'plants', 'Miniature Rose, Button Rose (White) - Plant', '₹240', 12, 12, 'C:/xampp/htdocs/nursery/nursery/uploads/rose6.webp', '120');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Username`, `password`, `email`, `address`, `id`) VALUES
('nursery', '$2y$10$65l9E.xkH0VYVUTP9HVclOhJQlnjo1r0qCjnR5PFiEggnyPDsVlaa', 'nursery@gmail.com', 'north', 1),
('pk', '$2y$10$9K40dd7Jys7O8d8DE0wBEOZEIZspDF0Pg0xBQ3RiMr8mMwA..2zhG', 'viperprabhakaran@gmail.com', 'sedan kinatru street', 2),
('dewin', '$2y$10$I89FJSPLHzPKdohudFaU1uAU7b.RBXPz2g2F89uqDK2FI9HlvGFDi', 'dewin@gmail.com', 'hii', 3),
('priya', '$2y$10$P59540YumTjM43yd77oGB.iHhGh8I3phUj/EwXxM0IJLGHZiaIAkS', 'priya@gmail.com', 'hii', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `command` varchar(100) NOT NULL,
  `ratings` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `name`, `email`, `command`, `ratings`, `created_at`) VALUES
(1, 'pk', 'pk@gmail.com', 'super ', 4, '2024-02-04 07:33:16'),
(2, 'pk', 'pk@gmail.com', 'pk1234', 4, '2024-02-20 23:43:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
