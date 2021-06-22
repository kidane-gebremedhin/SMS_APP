-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 12:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toff_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Commercial Bank of Ethiopia(CBE)', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:08:16', '2020-06-02 22:08:16'),
(2, 'Lion International Bank', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:08:30', '2020-06-02 22:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `remark`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Brand 1', NULL, 'active', 'false', NULL, '2020-06-02 21:57:46', '2020-06-02 21:57:46'),
(2, 'Brand 2', NULL, 'active', 'false', NULL, '2020-06-02 21:57:59', '2020-06-02 21:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'ኢትዮጵያ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:17', '2020-06-02 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `currencytypes`
--

CREATE TABLE `currencytypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regionId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `subCityId` int(11) NOT NULL,
  `tabyaId` int(11) DEFAULT NULL,
  `streetAddress_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetAddress_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homePhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workPhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentProfessionId` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/customer.jpg',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `toffID`, `firstName`, `lastName`, `middleName`, `gender`, `birthDate`, `regionId`, `cityId`, `subCityId`, `tabyaId`, `streetAddress_1`, `streetAddress_2`, `phoneNumber_1`, `phoneNumber_2`, `homePhoneNumber`, `workPhoneNumber`, `email`, `currentProfessionId`, `photo`, `remark`, `date`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'TOFF/C/2012-001', 'ww', 'w', 'w', 'Male', '26/09/2012', 1, 1, 1, 1, 'a', 'a', '095646848', NULL, NULL, NULL, NULL, 1, 'images/customers/1591135776.jpg', NULL, '26/9/2012 1:9:37', 1, NULL, 'active', 'false', NULL, '2020-06-02 22:09:37', '2020-06-02 22:09:37'),
(2, 'TOFF/C/2012-002', 'dd', 'w', 'w', 'Male', '26/09/2012', 1, 1, 1, 1, NULL, NULL, '356373456', NULL, NULL, NULL, NULL, 2, 'images/customer.jpg', NULL, '26/9/2012 1:11:18', 1, 1, 'active', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bank_accounts`
--

CREATE TABLE `customer_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `accountName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_bank_accounts`
--

INSERT INTO `customer_bank_accounts` (`id`, `customerId`, `bankId`, `accountName`, `accountNumber`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dd', '45748568', 1, 'active', 'false', NULL, '2020-06-02 22:09:37', '2020-06-02 22:09:37'),
(2, 2, 2, 'fhs', 'hsjsjg', 1, 'active', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:18'),
(3, 2, 2, 'fhsfhs', '46347', 1, 'active', 'false', NULL, '2020-06-02 22:11:48', '2020-06-02 22:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `customer_deposits`
--

CREATE TABLE `customer_deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `amount` double(50,2) NOT NULL,
  `ref_amount` double(50,2) NOT NULL,
  `transactionNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_deposit_allowed_members`
--

CREATE TABLE `customer_deposit_allowed_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `ownerCustomerId` int(11) NOT NULL,
  `depositId` int(11) NOT NULL,
  `allowedMemberId` int(11) NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_social_medias`
--

CREATE TABLE `customer_social_medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `socialMediaId` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_social_medias`
--

INSERT INTO `customer_social_medias` (`id`, `customerId`, `socialMediaId`, `url`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'www.facebook.com/me', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:18'),
(2, 2, 2, 'www.twitter.com/me', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:18'),
(3, 2, 3, 'www.linkedin.com/me', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:18'),
(4, 2, 4, 'www.google.com/me', 'false', NULL, '2020-06-02 22:11:18', '2020-06-02 22:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `educational_levels`
--

CREATE TABLE `educational_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/employees/employee.jpg',
  `idCard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CV` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `toffID`, `firstName`, `lastName`, `middleName`, `gender`, `birthDate`, `phoneNumber_1`, `phoneNumber_2`, `date`, `photo`, `idCard`, `CV`, `remark`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'TOFF/T/2012-001', 'Emplo', 'w', 'w', 'Female', '26/09/2012', '0945635735', NULL, '26/9/2012 1:33:30', 'images/employees/employee.jpg', 'images/employees/1591137210-chooseImage.jpg', 'images/employees/1591137210-item.png', NULL, 1, NULL, 'active', 'false', NULL, '2020-06-02 22:33:30', '2020-06-02 22:33:30'),
(2, 'TOFF/T/2012-002', 'vb', 'dd', 'mm', 'Female', '26/09/2012', '094563537', NULL, '26/9/2012 1:34:2', 'images/employees/employee.jpg', 'images/employees/1591137242-list2.png', NULL, NULL, 1, NULL, 'active', 'false', NULL, '2020-06-02 22:34:02', '2020-06-02 22:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `backgroundImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logoImage.jpg',
  `logoImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logoImage.jpg',
  `logoText` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `backgroundImage`, `logoImage`, `logoText`, `created_at`, `updated_at`) VALUES
(1, 'logoImage.jpg', '1591134599.jpg', 'Toff Delivery', '2020-06-02 21:33:17', '2020-06-02 21:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_measure_types`
--

CREATE TABLE `item_measure_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_measure_types`
--

INSERT INTO `item_measure_types` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Kilogram', NULL, 1, 'active', 'false', NULL, '2020-06-02 21:58:19', '2020-06-02 21:58:19'),
(2, 'Litter', NULL, 1, 'active', 'false', NULL, '2020-06-02 21:58:39', '2020-06-02 21:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Profession 1', NULL, 1, 'active', 'false', NULL, '2020-06-02 21:59:10', '2020-06-02 21:59:10'),
(2, 'Profession 2', NULL, 1, 'active', 'false', NULL, '2020-06-02 21:59:53', '2020-06-02 21:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `kebelles`
--

CREATE TABLE `kebelles` (
  `id` int(10) UNSIGNED NOT NULL,
  `tabyaId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `weredaId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `zoneId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `regionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kebelles`
--

INSERT INTO `kebelles` (`id`, `tabyaId`, `weredaId`, `zoneId`, `regionId`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', 'ሓርጉሸ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:18', '2020-06-02 21:33:18'),
(2, '1', '1', '1', '1', 'ዳግያ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(3, '1', '1', '1', '1', 'ሻፋት', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(4, '2', '2', '2', '1', 'ንሕቢ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(5, '2', '2', '2', '1', 'ማይ ኣብኣ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(6, '2', '2', '2', '1', 'ብኮት', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(7, '3', '2', '2', '1', 'ኣረጋ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20'),
(8, '3', '2', '2', '1', 'ሓጓ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20'),
(9, '3', '2', '2', '1', 'ቆላ ኣረጋ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:02:54', '2020-06-02 22:02:54'),
(2, 'Amharic', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:03:07', '2020-06-02 22:03:07'),
(3, 'Tigrigna', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:03:19', '2020-06-02 22:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `language_strings`
--

CREATE TABLE `language_strings` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyWord` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tig` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000001_create_user_zone_wereda_kebelles_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_11_06_220534_create_roles_table', 1),
(5, '2017_11_12_151824_create_about_table', 1),
(6, '2017_11_12_162223_create_generals_table', 1),
(7, '2017_11_19_163542_create_resources_table', 1),
(8, '2017_11_19_214927_create_role_resource_table', 1),
(9, '2017_11_19_214929_create_role_actions_table', 1),
(10, '2017_11_19_214930_create_role_document_permissions_table', 1),
(11, '2017_12_04_115319_create_settings_table', 1),
(12, '2017_12_04_115329_create_zones_table', 1),
(13, '2017_12_04_115331_create_weredas_table', 1),
(14, '2017_12_04_115332_create_tabyas_table', 1),
(15, '2017_12_04_115333_create_kebelles_table', 1),
(16, '2017_12_04_115380_create_countries_table', 1),
(17, '2017_12_04_115381_create_regions_table', 1),
(18, '2017_12_04_115404_create_currencyTypes_table', 1),
(19, '2017_12_04_115425_create_language_strings_table', 1),
(20, '2017_12_04_115442_create_logs_table', 1),
(21, '2017_12_04_115470_create_messages_table', 1),
(22, '2017_12_04_115472_create_user_messages_table', 1),
(23, '2017_12_04_115473_create_customer_social_medias_table', 1),
(24, '2017_12_04_115474_create_customer_bank_accounts_table', 1),
(25, '2017_12_04_115475_create_vendor_bank_accounts_table', 1),
(26, '2017_12_04_115478_create_toffegna_languages_table', 1),
(27, '2017_12_04_115480_create_toffegna_social_medias_table', 1),
(28, '2018_09_12_99999_create_backupverify_table', 1),
(29, '2020_05_20_000001_create_educational_levels_table', 1),
(30, '2020_05_20_000002_create_vendor_items_table', 1),
(31, '2020_05_20_000003_create_vendor_types_table', 1),
(32, '2020_05_20_000004_create_customers_table', 1),
(33, '2020_05_20_000005_create_vendors_merchants_table', 1),
(34, '2020_05_20_000006_create_toffegnas_table', 1),
(35, '2020_05_20_000007_create_vendor_branchs_table', 1),
(36, '2020_05_20_000008_create_property_types_table', 1),
(37, '2020_05_20_000009_create_truck_types_table', 1),
(38, '2020_05_20_000010_create_customer_deposits_table', 1),
(39, '2020_05_20_000011_create_properties_table', 1),
(40, '2020_05_20_000012_create_languages_table', 1),
(41, '2020_05_20_000013_create_vehicle_types_table', 1),
(42, '2020_05_20_000014_create_vehicles_table', 1),
(43, '2020_05_20_000015_create_vehicle_daily_kilometers_table', 1),
(44, '2020_05_20_000016_create_brands_table', 1),
(45, '2020_05_20_000017_create_customer_deposit_allowed_members_table', 1),
(46, '2020_05_20_000018_create_feedbacks_table', 1),
(47, '2020_05_20_000019_create_jobs_table', 1),
(48, '2020_05_20_000020_create_item_measure_types_table', 1),
(49, '2020_05_20_000021_create_social_medias_table', 1),
(50, '2020_05_20_000025_create_toff_messages_table', 1),
(51, '2020_05_20_000026_create_banks_table', 1),
(52, '2020_05_20_000028_create_employees_table', 1),
(53, '2020_05_20_000038_create_weather_types_table', 1),
(54, '2020_05_20_000040_create_toff_meadis_table', 1),
(55, '2020_05_20_000042_create_toff_meadi_purchases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `propertyTypeId` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniqueNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measureTypeId` int(11) NOT NULL,
  `quantityPerMeasure` double(8,2) NOT NULL,
  `costPerMeasure` double(8,2) NOT NULL,
  `inventoryMeasure` double(8,2) DEFAULT NULL,
  `registerdByTheNameOf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toffegnaId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `propertyTypeId`, `name`, `uniqueNumber`, `location`, `supplier`, `measureTypeId`, `quantityPerMeasure`, `costPerMeasure`, `inventoryMeasure`, `registerdByTheNameOf`, `toffegnaId`, `fullName`, `phoneNumber`, `date`, `remark`, `status`, `createdByUserId`, `updatedByUserId`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 'nnn', '1', 'll', 'sss', 1, 5.00, 30.00, 5.00, 'Toffegna', '1', NULL, NULL, '26/9/2012 1:30:15', 'fjdtutryu', 'active', 1, NULL, 'false', NULL, '2020-06-02 22:30:15', '2020-06-02 22:30:15'),
(2, 2, 'gg', '2', 'e', 'sw', 2, 6.00, 63.00, 56.00, 'Employee', NULL, 'd', '094563566', '26/9/2012 1:31:20', NULL, 'active', 1, NULL, 'false', NULL, '2020-06-02 22:31:20', '2020-06-02 22:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Property Type1', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:00:21', '2020-06-02 22:00:21'),
(2, 'Property Type2', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:00:31', '2020-06-02 22:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryId` int(11) NOT NULL DEFAULT '1',
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `countryId`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'ትግራይ', 1, NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:17', '2020-06-02 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `entityName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `routeName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_crud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `menuLevel` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `entityName`, `routeName`, `is_crud`, `menuLevel`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(2, 'roles', 'roles', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(3, 'business_categories', 'business_categories', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(4, 'companies', 'companies', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(5, 'tenders', 'tenders', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(6, 'subscription_plans', 'subscription_plans', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(7, 'classes', 'classes', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(8, 'countries', 'countries', 'true', 2, '2020-06-02 21:33:15', '2020-06-02 21:33:15'),
(9, 'regions', 'regions', 'true', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(10, 'zones', 'zones', 'true', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(11, 'weredas', 'weredas', 'true', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(12, 'language_strings', 'language_strings', 'true', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(13, 'settings', 'settings', 'true', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(14, 'approve_new_user', 'users.approveNewUser', 'false', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(15, 'approve_new_document', 'documents.approveNewDocument', 'false', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(16, 'change_user_status', 'users.changeStatus', 'false', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(17, 'permissions_save', 'permissions.save', 'false', 2, '2020-06-02 21:33:16', '2020-06-02 21:33:16'),
(18, 'logs_all', 'logs.logsAll', 'false', 2, '2020-06-02 21:33:17', '2020-06-02 21:33:17'),
(19, 'logo_update', 'logo.logo_update', 'false', 2, '2020-06-02 21:33:17', '2020-06-02 21:33:17'),
(20, 'Total_documents_report', 'Total_documents_report', 'false', 2, '2020-06-02 21:33:17', '2020-06-02 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `remark`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'System Admin', 0, NULL, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20'),
(2, 'Viewer', 'Viewer', 0, NULL, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_actions`
--

CREATE TABLE `role_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleId` int(10) UNSIGNED NOT NULL,
  `resourceId` int(11) NOT NULL,
  `allow_action` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_document_permissions`
--

CREATE TABLE `role_document_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleId` int(11) NOT NULL,
  `documentId` int(11) NOT NULL,
  `show` int(11) NOT NULL DEFAULT '0',
  `share` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `destroy` int(11) NOT NULL DEFAULT '0',
  `download` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_resource`
--

CREATE TABLE `role_resource` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleId` int(10) UNSIGNED NOT NULL,
  `resourceId` int(11) NOT NULL,
  `show` int(11) NOT NULL DEFAULT '0',
  `index` int(11) NOT NULL DEFAULT '0',
  `store` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `destroy` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `countViewsAllowedIntervalInHours` int(11) NOT NULL DEFAULT '1',
  `paginationSize` int(11) NOT NULL DEFAULT '10',
  `reportGenerationDate` int(11) NOT NULL DEFAULT '1',
  `reportIntervalInMonths` int(11) NOT NULL DEFAULT '6',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `countViewsAllowedIntervalInHours`, `paginationSize`, `reportGenerationDate`, `reportIntervalInMonths`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 1, 6, '2020-06-02 21:33:17', '2020-06-02 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:00:51', '2020-06-02 22:00:51'),
(2, 'Twitter', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:00:58', '2020-06-02 22:00:58'),
(3, 'LinkedIn', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:01:08', '2020-06-02 22:01:08'),
(4, 'Google+', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:01:18', '2020-06-02 22:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `tabyas`
--

CREATE TABLE `tabyas` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `weredaId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `zoneId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `regionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabyas`
--

INSERT INTO `tabyas` (`id`, `code`, `weredaId`, `zoneId`, `regionId`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', 'ኣይናለም', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:18', '2020-06-02 21:33:18'),
(2, '1', '2', '2', '1', 'ብኮት', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19'),
(3, '1', '2', '2', '1', 'ሓጓ ኣረጋ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:20', '2020-06-02 21:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `toffegnas`
--

CREATE TABLE `toffegnas` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regionId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `subCityId` int(11) NOT NULL,
  `tabyaId` int(11) DEFAULT NULL,
  `phoneNumber_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/toffegna.jpg',
  `idCard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCardExprationDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverLicenseNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverLicenseExprationDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `healthConfirmation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneConfirmation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workExpriance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `innocenceConfirmation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingerPrint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educationalCirtificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankId` int(11) DEFAULT NULL,
  `salaryAccountName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaryAccountNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeOfTruckId` int(11) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toffegnas`
--

INSERT INTO `toffegnas` (`id`, `toffID`, `firstName`, `lastName`, `middleName`, `gender`, `birthDate`, `regionId`, `cityId`, `subCityId`, `tabyaId`, `phoneNumber_1`, `phoneNumber_2`, `email`, `date`, `photo`, `idCard`, `idCardExprationDate`, `driverLicenseNumber`, `driverLicenseExprationDate`, `healthConfirmation`, `phoneConfirmation`, `workExpriance`, `innocenceConfirmation`, `fingerPrint`, `educationalCirtificate`, `bankId`, `salaryAccountName`, `salaryAccountNumber`, `typeOfTruckId`, `remark`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'TOFF/T/2012-001', 'tt', 'q', 'q', 'Male', '26/09/2012', 1, 1, 1, 1, '057737354', NULL, NULL, '26/9/2012 1:27:22', 'images/toffegna.jpg', 'images/toffegnas/1591136842-fm_img1.jpg', '26/09/2012', 'images/toffegnas/1591136842-fmlogo.png', '26/09/2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'yrtye', '47457485', 1, NULL, 1, NULL, 'active', 'false', NULL, '2020-06-02 22:27:22', '2020-06-02 22:27:22'),
(2, 'TOFF/T/2012-002', 'dd', 'd', 'd', 'Male', '19/09/2012', 1, 1, 1, 1, '096345354', NULL, NULL, '26/9/2012 1:28:22', 'images/toffegna.jpg', 'images/toffegnas/1591136902-chooseImage.jpg', '26/09/2012', 'images/toffegnas/1591136902-item.png', '26/09/2012', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'rr', '4367457', 2, NULL, 1, NULL, 'active', 'false', NULL, '2020-06-02 22:28:22', '2020-06-02 22:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `toffegna_languages`
--

CREATE TABLE `toffegna_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffegnaId` int(11) NOT NULL,
  `languageId` int(11) NOT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toffegna_languages`
--

INSERT INTO `toffegna_languages` (`id`, `toffegnaId`, `languageId`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'false', NULL, '2020-06-02 22:27:22', '2020-06-02 22:27:22'),
(2, 1, 3, 'false', NULL, '2020-06-02 22:27:22', '2020-06-02 22:27:22'),
(3, 2, 2, 'false', NULL, '2020-06-02 22:28:22', '2020-06-02 22:28:22'),
(4, 2, 3, 'false', NULL, '2020-06-02 22:28:22', '2020-06-02 22:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `toffegna_social_medias`
--

CREATE TABLE `toffegna_social_medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffegnaId` int(11) NOT NULL,
  `socialMediaId` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toffegna_social_medias`
--

INSERT INTO `toffegna_social_medias` (`id`, `toffegnaId`, `socialMediaId`, `url`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'www.faceook.com/mm', 'false', NULL, '2020-06-02 22:27:22', '2020-06-02 22:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `toff_meadis`
--

CREATE TABLE `toff_meadis` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerId` int(11) NOT NULL,
  `typeOfTruckId` int(11) NOT NULL,
  `toffegnaId` int(11) NOT NULL,
  `distanceInKilometer` double(8,2) NOT NULL,
  `weatherTypeId` int(11) NOT NULL,
  `pricePerKilometer` double(8,2) NOT NULL,
  `paymentMethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toff_meadis`
--

INSERT INTO `toff_meadis` (`id`, `toffID`, `customerId`, `typeOfTruckId`, `toffegnaId`, `distanceInKilometer`, `weatherTypeId`, `pricePerKilometer`, `paymentMethod`, `date`, `remark`, `createdByUserId`, `updatedByUserId`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'TOFF/E/2012-001', 1, 1, 1, 5.00, 2, 100.00, 'Cash', '26/9/2012 1:36:19', NULL, 1, NULL, 'false', NULL, '2020-06-02 22:36:19', '2020-06-02 22:36:19'),
(2, 'TOFF/E/2012-002', 2, 1, 1, 2.00, 2, 100.00, 'Cash', '26/9/2012 1:37:19', NULL, 1, NULL, 'false', NULL, '2020-06-02 22:37:19', '2020-06-02 22:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `toff_meadi_purchases`
--

CREATE TABLE `toff_meadi_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffMeadiId` int(11) NOT NULL,
  `vendorTypeId` int(11) NOT NULL,
  `fromVendorId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `singlePrice` double(8,2) NOT NULL,
  `isDelivered` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toff_meadi_purchases`
--

INSERT INTO `toff_meadi_purchases` (`id`, `toffMeadiId`, `vendorTypeId`, `fromVendorId`, `itemId`, `quantity`, `singlePrice`, `isDelivered`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 1, 4.00, 250.00, 'false', NULL, '2020-06-02 22:36:19', '2020-06-02 22:36:19'),
(2, 1, 2, 2, 1, 3.00, 500.00, 'false', NULL, '2020-06-02 22:36:19', '2020-06-02 22:36:19'),
(3, 2, 2, 2, 1, 2.00, 6786.00, 'false', NULL, '2020-06-02 22:37:20', '2020-06-02 22:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `toff_messages`
--

CREATE TABLE `toff_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `fromCustomerId` int(11) NOT NULL,
  `toCustomerId` int(11) NOT NULL,
  `callerFullName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callerAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callerPhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeOfTruckId` int(11) NOT NULL,
  `toffegnaId` int(11) NOT NULL,
  `distanceInKilometer` double(8,2) NOT NULL,
  `weatherTypeId` int(11) NOT NULL,
  `pricePerKilometer` double(8,2) NOT NULL,
  `paymentMethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toff_messages`
--

INSERT INTO `toff_messages` (`id`, `fromCustomerId`, `toCustomerId`, `callerFullName`, `callerAddress`, `callerPhoneNumber`, `typeOfTruckId`, `toffegnaId`, `distanceInKilometer`, `weatherTypeId`, `pricePerKilometer`, `paymentMethod`, `remark`, `date`, `createdByUserId`, `updatedByUserId`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'dd', 'd', '096868545', 2, 2, 6.00, 2, 100.00, 'Cash', NULL, '26/9/2012 1:38:19', 1, NULL, 'false', NULL, '2020-06-02 22:38:19', '2020-06-02 22:38:19'),
(2, 1, 2, NULL, NULL, NULL, 2, 2, 6.00, 2, 100.00, 'Cash', 'fgjdt', '26/9/2012 1:39:0', 1, NULL, 'false', NULL, '2020-06-02 22:39:00', '2020-06-02 22:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `truck_types`
--

CREATE TABLE `truck_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truck_types`
--

INSERT INTO `truck_types` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Truck Type1', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:02:24', '2020-06-02 22:02:24'),
(2, 'Truck Type2', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:02:34', '2020-06-02 22:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleId` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `changedPassword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `isApproved` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `approvedByUserId` int(11) DEFAULT NULL,
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userName`, `phoneNumber`, `email`, `password`, `roleId`, `remember_token`, `createdByUserId`, `updatedByUserId`, `changedPassword`, `status`, `isApproved`, `approvedByUserId`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 'admin@gmail.com', '$2y$10$I1cKD.lKlz9c2xFMpHLVTu7tQImwAleesq3kws2tngk9FMD3s.iMK', 1, 'KQHZMFLrJv5CKaAOzXkNmbJwJ1a3mOSG3TgXDtaN1MgxJkZQC21irfCr8eyX', 0, NULL, 'false', 'active', 'true', NULL, 'false', NULL, '2020-06-02 21:33:21', '2020-06-02 21:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `messageId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `recipientId` int(11) NOT NULL,
  `isViewed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_zone_wereda_kebelles`
--

CREATE TABLE `user_zone_wereda_kebelles` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `regionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `zoneId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weredaId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabyaId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebelleId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicleTypeId` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandId` int(11) NOT NULL,
  `uniqueNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `serviceStartDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicePeriodInDays` int(11) NOT NULL,
  `kilometersPerLitter` double(8,2) NOT NULL,
  `capacityInLitter` double(8,2) NOT NULL,
  `registerdByTheNameOf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toffegnaId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicleTypeId`, `name`, `brandId`, `uniqueNumber`, `cost`, `serviceStartDate`, `servicePeriodInDays`, `kilometersPerLitter`, `capacityInLitter`, `registerdByTheNameOf`, `toffegnaId`, `fullName`, `phoneNumber`, `remark`, `date`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 'df', 1, '1', 45.00, '26/09/2012', 30, 10.00, 20.00, 'Toffegna', '1', NULL, NULL, NULL, '26/9/2012 1:32:8', 1, NULL, 'active', 'false', NULL, '2020-06-02 22:32:08', '2020-06-02 22:32:08'),
(2, 2, 'dss', 2, '3', 45.00, '26/09/2012', 3, 5.00, 21.00, 'Employee', NULL, 'rre', '098978756', NULL, '26/9/2012 1:32:50', 1, NULL, 'active', 'false', NULL, '2020-06-02 22:32:50', '2020-06-02 22:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_daily_kilometers`
--

CREATE TABLE `vehicle_daily_kilometers` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `traveledKilometers` double(8,2) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `remark`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Vehicle Type1', NULL, 'active', 'false', NULL, '2020-06-02 22:03:47', '2020-06-02 22:03:47'),
(2, 'Truck Type2', NULL, 'active', 'false', NULL, '2020-06-02 22:03:53', '2020-06-02 22:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_merchants`
--

CREATE TABLE `vendors_merchants` (
  `id` int(10) UNSIGNED NOT NULL,
  `toffID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendorTypeId` int(11) NOT NULL,
  `companyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `streetAddress_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetAddress_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentCompany` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearOfEstablishment` int(11) NOT NULL,
  `numberOfFulltimeEmployees` int(11) NOT NULL,
  `commissionInPercent` double(8,2) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/vendor.jpg',
  `agreementAttachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_merchants`
--

INSERT INTO `vendors_merchants` (`id`, `toffID`, `vendorTypeId`, `companyName`, `phoneNumber_1`, `phoneNumber_2`, `countryId`, `cityId`, `streetAddress_1`, `streetAddress_2`, `p_o_box`, `fax`, `website`, `email`, `parentCompany`, `licenseNumber`, `yearOfEstablishment`, `numberOfFulltimeEmployees`, `commissionInPercent`, `photo`, `agreementAttachment`, `remark`, `date`, `createdByUserId`, `updatedByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'TOFF/V/2012-001', 1, 'Vendor 1', '0466856867', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2467745', 1913, 3, 10.00, 'images/vendor.jpg', 'images/vendors/1591136152-bid.jpg', NULL, '26/9/2012 1:16:2', 1, 1, 'active', 'false', NULL, '2020-06-02 22:15:52', '2020-06-02 22:16:02'),
(2, 'TOFF/V/2012-002', 2, 'vvv', '095869798', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5758', 1915, 5, 6.00, 'images/vendors/1591136225.png', 'images/vendors/1591136225-list3.jpg', NULL, '26/9/2012 1:17:5', 1, NULL, 'active', 'false', NULL, '2020-06-02 22:17:05', '2020-06-02 22:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_accounts`
--

CREATE TABLE `vendor_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendorId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `accountName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_bank_accounts`
--

INSERT INTO `vendor_bank_accounts` (`id`, `vendorId`, `bankId`, `accountName`, `accountNumber`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'ghdfj', '4574', 1, 'active', 'false', NULL, '2020-06-02 22:15:52', '2020-06-02 22:15:52'),
(2, 2, 2, 'dfs', '35326', 1, 'active', 'false', NULL, '2020-06-02 22:17:05', '2020-06-02 22:17:05'),
(3, 2, 1, 'fhs', '57848', 1, 'active', 'false', NULL, '2020-06-02 22:18:14', '2020-06-02 22:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_branchs`
--

CREATE TABLE `vendor_branchs` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendorId` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `phoneNumber_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetAddress_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetAddress_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_branchs`
--

INSERT INTO `vendor_branchs` (`id`, `vendorId`, `name`, `countryId`, `cityId`, `phoneNumber_1`, `phoneNumber_2`, `streetAddress_1`, `streetAddress_2`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 2, 'Branch 1', 1, 1, '095674746', NULL, 'hs', 'dhdfh', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:17:56', '2020-06-02 22:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items`
--

CREATE TABLE `vendor_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendorId` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_items`
--

INSERT INTO `vendor_items` (`id`, `vendorId`, `name`, `price`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 2, 'Item 1', 6786.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:21:48', '2020-06-02 22:24:56'),
(2, 2, 'Item 2', 34.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:21:59', '2020-06-02 22:21:59'),
(3, 2, 'a', 8.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:22:41', '2020-06-02 22:22:41'),
(4, 2, 'g', 454.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:23:48', '2020-06-02 22:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_types`
--

CREATE TABLE `vendor_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_types`
--

INSERT INTO `vendor_types` (`id`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:04:17', '2020-06-02 22:04:17'),
(2, 'Shop', NULL, 1, 'active', 'false', NULL, '2020-06-02 22:04:44', '2020-06-02 22:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `verifybackup`
--

CREATE TABLE `verifybackup` (
  `id` int(10) UNSIGNED NOT NULL,
  `verify_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather_types`
--

CREATE TABLE `weather_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricePerKilometer` double(8,2) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather_types`
--

INSERT INTO `weather_types` (`id`, `name`, `pricePerKilometer`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 'Day', 50.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:01:39', '2020-06-02 22:01:39'),
(2, 'Night', 100.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:01:50', '2020-06-02 22:01:50'),
(3, 'Rain', 75.00, NULL, 1, 'active', 'false', NULL, '2020-06-02 22:02:01', '2020-06-02 22:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `weredas`
--

CREATE TABLE `weredas` (
  `id` int(10) UNSIGNED NOT NULL,
  `regionId` int(11) NOT NULL DEFAULT '1',
  `zoneId` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officeHead` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weredas`
--

INSERT INTO `weredas` (`id`, `regionId`, `zoneId`, `name`, `officeHead`, `phoneNumber`, `email`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ሓድነት', NULL, NULL, NULL, NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:18', '2020-06-02 21:33:18'),
(2, 1, 2, 'ጋንታ ኣፈሹም', NULL, NULL, NULL, NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `regionId` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdByUserId` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `isDeleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deletedByUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `regionId`, `name`, `remark`, `createdByUserId`, `status`, `isDeleted`, `deletedByUserId`, `created_at`, `updated_at`) VALUES
(1, 1, 'መቐለ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:17', '2020-06-02 21:33:17'),
(2, 1, 'ምብራቕ', NULL, 0, 'active', 'false', NULL, '2020-06-02 21:33:19', '2020-06-02 21:33:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banks_name_unique` (`name`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `currencytypes`
--
ALTER TABLE `currencytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencytypes_icon_unique` (`icon`),
  ADD UNIQUE KEY `currencytypes_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_toffid_unique` (`toffID`),
  ADD UNIQUE KEY `customers_phonenumber_1_unique` (`phoneNumber_1`);

--
-- Indexes for table `customer_bank_accounts`
--
ALTER TABLE `customer_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_deposits`
--
ALTER TABLE `customer_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_deposit_allowed_members`
--
ALTER TABLE `customer_deposit_allowed_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_social_medias`
--
ALTER TABLE `customer_social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_levels`
--
ALTER TABLE `educational_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `educational_levels_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_toffid_unique` (`toffID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_measure_types`
--
ALTER TABLE `item_measure_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_measure_types_name_unique` (`name`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_name_unique` (`name`);

--
-- Indexes for table `kebelles`
--
ALTER TABLE `kebelles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`);

--
-- Indexes for table `language_strings`
--
ALTER TABLE `language_strings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_uniquenumber_unique` (`uniqueNumber`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `property_types_name_unique` (`name`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_rolename_unique` (`roleName`);

--
-- Indexes for table `role_actions`
--
ALTER TABLE `role_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_document_permissions`
--
ALTER TABLE `role_document_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_resource`
--
ALTER TABLE `role_resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_medias_name_unique` (`name`);

--
-- Indexes for table `tabyas`
--
ALTER TABLE `tabyas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toffegnas`
--
ALTER TABLE `toffegnas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `toffegnas_toffid_unique` (`toffID`),
  ADD UNIQUE KEY `toffegnas_phonenumber_1_unique` (`phoneNumber_1`);

--
-- Indexes for table `toffegna_languages`
--
ALTER TABLE `toffegna_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toffegna_social_medias`
--
ALTER TABLE `toffegna_social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toff_meadis`
--
ALTER TABLE `toff_meadis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `toff_meadis_toffid_unique` (`toffID`);

--
-- Indexes for table `toff_meadi_purchases`
--
ALTER TABLE `toff_meadi_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toff_messages`
--
ALTER TABLE `toff_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck_types`
--
ALTER TABLE `truck_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `truck_types_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_zone_wereda_kebelles`
--
ALTER TABLE `user_zone_wereda_kebelles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicles_uniquenumber_unique` (`uniqueNumber`);

--
-- Indexes for table `vehicle_daily_kilometers`
--
ALTER TABLE `vehicle_daily_kilometers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_merchants`
--
ALTER TABLE `vendors_merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_merchants_toffid_unique` (`toffID`),
  ADD UNIQUE KEY `vendors_merchants_companyname_unique` (`companyName`),
  ADD UNIQUE KEY `vendors_merchants_phonenumber_1_unique` (`phoneNumber_1`);

--
-- Indexes for table `vendor_bank_accounts`
--
ALTER TABLE `vendor_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_branchs`
--
ALTER TABLE `vendor_branchs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_branchs_phonenumber_1_unique` (`phoneNumber_1`);

--
-- Indexes for table `vendor_items`
--
ALTER TABLE `vendor_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_types`
--
ALTER TABLE `vendor_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_types_name_unique` (`name`);

--
-- Indexes for table `verifybackup`
--
ALTER TABLE `verifybackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather_types`
--
ALTER TABLE `weather_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `weather_types_name_unique` (`name`);

--
-- Indexes for table `weredas`
--
ALTER TABLE `weredas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `weredas_name_unique` (`name`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zones_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencytypes`
--
ALTER TABLE `currencytypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_bank_accounts`
--
ALTER TABLE `customer_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_deposits`
--
ALTER TABLE `customer_deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_deposit_allowed_members`
--
ALTER TABLE `customer_deposit_allowed_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_social_medias`
--
ALTER TABLE `customer_social_medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `educational_levels`
--
ALTER TABLE `educational_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_measure_types`
--
ALTER TABLE `item_measure_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebelles`
--
ALTER TABLE `kebelles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_strings`
--
ALTER TABLE `language_strings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_actions`
--
ALTER TABLE `role_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_document_permissions`
--
ALTER TABLE `role_document_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_resource`
--
ALTER TABLE `role_resource`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabyas`
--
ALTER TABLE `tabyas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toffegnas`
--
ALTER TABLE `toffegnas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toffegna_languages`
--
ALTER TABLE `toffegna_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toffegna_social_medias`
--
ALTER TABLE `toffegna_social_medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toff_meadis`
--
ALTER TABLE `toff_meadis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toff_meadi_purchases`
--
ALTER TABLE `toff_meadi_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toff_messages`
--
ALTER TABLE `toff_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_zone_wereda_kebelles`
--
ALTER TABLE `user_zone_wereda_kebelles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_daily_kilometers`
--
ALTER TABLE `vehicle_daily_kilometers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors_merchants`
--
ALTER TABLE `vendors_merchants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_bank_accounts`
--
ALTER TABLE `vendor_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_branchs`
--
ALTER TABLE `vendor_branchs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_items`
--
ALTER TABLE `vendor_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_types`
--
ALTER TABLE `vendor_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verifybackup`
--
ALTER TABLE `verifybackup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather_types`
--
ALTER TABLE `weather_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weredas`
--
ALTER TABLE `weredas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
