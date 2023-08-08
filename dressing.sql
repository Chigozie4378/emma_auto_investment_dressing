-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 04:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dressing`
--

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_address` varchar(120) NOT NULL,
  `total` varchar(120) NOT NULL,
  `deposit` varchar(120) NOT NULL,
  `balance` varchar(120) NOT NULL,
  `staff` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_histories`
--

CREATE TABLE `debit_histories` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_address` varchar(120) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `total` varchar(120) NOT NULL,
  `deposit` varchar(120) NOT NULL,
  `balance` varchar(120) NOT NULL,
  `comments` text NOT NULL,
  `staff` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_address` varchar(120) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `staff` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(11) NOT NULL,
  `pos_type` varchar(120) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `pos_charges` varchar(120) NOT NULL,
  `staff` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_each_goods`
--

CREATE TABLE `return_each_goods` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_goods`
--

CREATE TABLE `return_goods` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `transfer` varchar(255) NOT NULL,
  `deposit` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_goods_details`
--

CREATE TABLE `return_goods_details` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_address` varchar(120) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `customer_type` varchar(120) NOT NULL,
  `payment_type` varchar(120) NOT NULL,
  `total` varchar(120) NOT NULL,
  `cash` varchar(120) NOT NULL,
  `transfer` varchar(120) NOT NULL,
  `pos` varchar(120) NOT NULL,
  `old_deposit` varchar(120) NOT NULL,
  `total_payment` varchar(120) NOT NULL,
  `transport` varchar(120) NOT NULL,
  `balance` varchar(120) NOT NULL,
  `staff` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `productname` varchar(120) NOT NULL,
  `quantity` varchar(120) NOT NULL,
  `price` varchar(120) NOT NULL,
  `amount` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `filepath` varchar(250) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rprice` varchar(255) NOT NULL,
  `wprice` varchar(255) NOT NULL,
  `cprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplied`
--

CREATE TABLE `supplied` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `inovice_no` varchar(255) NOT NULL,
  `supplied_by` varchar(255) NOT NULL,
  `checked_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `bank` varchar(120) NOT NULL,
  `invoice_no` varchar(120) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `staff` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `passport`, `status`) VALUES
(1, 'Mummy', 'Ezeh', 'mummy', 'bc7cb81f38de98e4446c2b7ce72824c7', 'admin', '../../assets/passport/', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_histories`
--
ALTER TABLE `debit_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_each_goods`
--
ALTER TABLE `return_each_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_goods`
--
ALTER TABLE `return_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_goods_details`
--
ALTER TABLE `return_goods_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplied`
--
ALTER TABLE `supplied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_histories`
--
ALTER TABLE `debit_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_each_goods`
--
ALTER TABLE `return_each_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_goods`
--
ALTER TABLE `return_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_goods_details`
--
ALTER TABLE `return_goods_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplied`
--
ALTER TABLE `supplied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
