-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 08:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpiya`
--

-- --------------------------------------------------------

--
-- Table structure for table `amc_mis`
--

CREATE TABLE `amc_mis` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `warrenty_status` int(4) NOT NULL,
  `warrenty_valid_till` date NOT NULL,
  `extend_warrenty_status` int(4) NOT NULL,
  `extend_warrenty_valid_till` date NOT NULL,
  `amc_status` int(4) NOT NULL,
  `start_date` date NOT NULL,
  `amc_valid_till` date NOT NULL,
  `paid_by` int(4) NOT NULL,
  `amount` float NOT NULL,
  `tax` float NOT NULL,
  `tax_amount` float NOT NULL,
  `total` float NOT NULL,
  `free_service_date` date NOT NULL,
  `paid_service_date` date NOT NULL,
  `next_service_date` date NOT NULL,
  `reminder_date` date NOT NULL,
  `flag` int(4) NOT NULL,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amc_mis`
--

INSERT INTO `amc_mis` (`id`, `customer_id`, `item_id`, `invoice_no`, `invoice_date`, `warrenty_status`, `warrenty_valid_till`, `extend_warrenty_status`, `extend_warrenty_valid_till`, `amc_status`, `start_date`, `amc_valid_till`, `paid_by`, `amount`, `tax`, `tax_amount`, `total`, `free_service_date`, `paid_service_date`, `next_service_date`, `reminder_date`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 3, 10, 'A12JDH46', '2021-09-16', 2, '0000-00-00', 2, '0000-00-00', 1, '2021-09-30', '2022-09-30', 2, 500, 10, 50, 550, '2021-09-30', '2021-09-15', '2022-09-30', '2021-10-07', 1, 1, '2021-09-16', 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Its like company name',
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(10) NOT NULL,
  `pin` int(10) NOT NULL,
  `person_name` varchar(100) NOT NULL COMMENT 'Ex: Hr/ Admin name',
  `phone` int(10) NOT NULL,
  `flag` int(4) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `email`, `address`, `state_id`, `pin`, `person_name`, `phone`, `flag`, `created_by`, `created_on`) VALUES
(1, 2000000, 'Demo Company', 'demo@spaatech.net', 'Patia, BBSR  assssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 19, 751000, 'Mr. Demo', 1234567890, 1, 1, '2021-08-04'),
(3, 2000001, 'Demo Company', 'arpiyaaircon@spaatech.net', 'bbsr', 19, 111111, 'aaaaa', 1234567890, 1, 1, '2021-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `payment_terms` int(10) DEFAULT NULL COMMENT '1. Payable immediately\r\n2. Payable in 3 partial amounts\r\n3. Payable within 30 days\r\n4. Payable within 60 days\r\n5. Other',
  `credit_period` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_no` int(10) DEFAULT NULL,
  `ifsc_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_id`, `pan`, `payment_terms`, `credit_period`, `bank_name`, `account_no`, `ifsc_code`) VALUES
(1, 1, 'ABCTY1234D', 2, '3 Months', 'SBI', 2147483647, 'SBIN0000041'),
(3, 3, 'ALWPG5809L', 2, '3 Months', 'SBI', 2147483611, 'SBIN0000041');

-- --------------------------------------------------------

--
-- Table structure for table `gis`
--

CREATE TABLE `gis` (
  `id` int(4) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `issued_against` int(4) NOT NULL,
  `issued_by` int(4) NOT NULL,
  `issue_note` text NOT NULL,
  `po_id` int(4) NOT NULL,
  `gr_id` int(4) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `quantity` int(4) NOT NULL,
  `flag` int(4) NOT NULL DEFAULT 1,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gis`
--

INSERT INTO `gis` (`id`, `date`, `time`, `issued_against`, `issued_by`, `issue_note`, `po_id`, `gr_id`, `storage`, `quantity`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '2021-09-01', '13:41 PM', 1, 1, 'Lorem ipsum123', 2, 1, 'Bhubaneswar11', 11, 1, 1, '2021-09-01', 1, '2021-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `grs`
--

CREATE TABLE `grs` (
  `id` int(10) NOT NULL,
  `po_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ordered_qty` int(4) NOT NULL,
  `received_qty` int(10) NOT NULL,
  `remain_qty` int(10) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `challan_date` date NOT NULL,
  `challan_time` time NOT NULL,
  `received_by` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL,
  `flag` int(4) NOT NULL,
  `used` int(4) NOT NULL COMMENT '0-not, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grs`
--

INSERT INTO `grs` (`id`, `po_id`, `date`, `time`, `ordered_qty`, `received_qty`, `remain_qty`, `challan_no`, `challan_date`, `challan_time`, `received_by`, `comment`, `created_by`, `created_on`, `modified_by`, `modified_on`, `flag`, `used`) VALUES
(1, 2, '2021-08-31', '15:42:00', 20, 11, 9, '1234567890', '2021-08-31', '15:42:00', 'Mr. Debasis Das', '', 1, '2021-08-31', 1, '2021-08-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `helptexts`
--

CREATE TABLE `helptexts` (
  `id` int(4) NOT NULL,
  `menu_id` int(4) NOT NULL,
  `text` text NOT NULL,
  `created_by` int(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helptexts`
--

INSERT INTO `helptexts` (`id`, `menu_id`, `text`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, '<p>Material Type needs to be created with the type of material or item which is selected grouped together. These materials are consumable to keep a quantity of on stock or non consumable to have a limited quantity of.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the&nbsp;<strong>+</strong>&nbsp;button to check for addition of the new Material Type with all the required data.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on <strong>View</strong> button to check all the details of the Material Type .<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the<strong> Edit </strong>button to check if the Material Type details can be updated.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the <strong>Delete </strong>button to check if any particular Material Type record can be deleted.</p>\r\n', 1, '2021-08-23 00:00:00', 1, '2021-08-23 00:00:00'),
(2, 2, '<p>Supplier is used to describe any supplier of goods or services. A Supplier</p>\r\n\r\n<p>sells products or services to another company or individual.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Click on the + button to check for addition of a new Supplier with all the required data<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on View button to check all the details of the Supplier.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the Edit button to check if the Supplier details can be updated.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the Delete button to check if any particular Supplier record can be deleted.<br />\r\n&nbsp;</p>\r\n\r\n<p>Enter any Supplier code on Search by Supplier code option to check any particular Supplier details directly from the search list.</p>\r\n', 1, '2021-09-02 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 3, '<p>Customer is used to describe any Customer who receives the goods or services. A Customer</p>\r\n\r\n<p>buys products or services form the company.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Click on the <strong>+ </strong>button to check for addition of a new Customer with all the required data.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on <strong>View </strong>button to check all the details of the Customer.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the <strong>Edit</strong> button to check if the Customer details can be updated.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the <strong>Delete</strong> button to check if any particular Customer record can be deleted.<br />\r\n&nbsp;</p>\r\n\r\n<p>Enter any <strong>Customer code</strong> on Search by Customer code option to check any particular Customer details directly from the search list.</p>\r\n', 1, '2021-09-02 00:00:00', 1, '2021-09-02 00:00:00'),
(4, 4, '<p>Service is used to describe any service that company provides to their customers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Click on the + button to check for addition of a new Service with all the required data.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Click on View button to check all the details of the Service.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the Edit button to check if the Service details can be updated.<br />\r\n&nbsp;</p>\r\n\r\n<p>Click on the Delete button to check if any particular Service record can be deleted.<br />\r\n&nbsp;</p>\r\n\r\n<p>Enter any Supplier code on Search by Service code option to check any particular Service details directly from the search list.</p>\r\n', 1, '2021-09-02 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 5, '<p>A purchase order (PO) is a commercial document and first official offer issued by a buyer to a seller indicating types, quantities, and agreed prices for products or services. It is used to control the purchasing of products and services from external suppliers. Purchase orders can be an essential part of enterprise resource planning system orders.<br />\r\n<br />\r\nAfter creating and approving purchase request go to purchase order module -&gt;<br />\r\n<br />\r\nClick on the&nbsp;<strong>+</strong>&nbsp;button to check for addition of new Purchase Order with all the required data -&gt; PO needs to be created.<br />\r\n<br />\r\nPurchase Order Number needs to be created with a unique number assigned to a purchase order form to authorize a purchase transaction. It should be numeric digit.<br />\r\n<br />\r\nClick on&nbsp;<strong>View</strong>&nbsp;button to check all the details of the Purchase Order.<br />\r\n<br />\r\nClick on the&nbsp;<strong>Edit</strong>&nbsp;button to check if the Purchase Order details can be updated.<br />\r\n<br />\r\nClick on the&nbsp;<strong>Activate/Deactivate</strong>&nbsp;button to check if any particular Purchase Order record can be deactivated and again activated as required.<br />\r\n<br />\r\nEnter any Purchase Order Number on&nbsp;<strong>Search by Purchase Order</strong>&nbsp;Number option to check any particular Purchase Order details directly from the search list.<br />\r\n<br />\r\nPO Date will be created with the date on which a purchase order for a product is issued. It will take the system date automatically at the time of issue. It should follow the format DD/MM/YY.<br />\r\n<br />\r\nTotal Amount is a calculative field which will generate the value as ((PO Base Amount + Tax Amount + Freight Charges + Insurance Charges + Custom Charges + Packaging Charges + Extra Charges) - Discount Value)<br />\r\n<br />\r\nGo to Main screen -&gt; Click on&nbsp;<strong>Print</strong>&nbsp;button to get printed version of the PO generating a hard copy of the electronic data being printed.</p>\r\n', 1, '2021-09-02 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 6, '<p>Goods Receipt (GR) is generated after a PO is approved. It is a confirmation, that the item/material mentioned in the Purchase Order has been received, updates the quantities, and creates an accounting journal entry. It is issued to acknowledge the receipt of the items listed in it. Goods receive usually take place with reference to purchase orders, which have been arranged by the purchasing department.<br />\r\n<br />\r\n<br />\r\nClick on the + button to check for addition of new GR with all the required data -&gt; Select the activated PO number for which the GR needs to be created<br />\r\n<br />\r\nHere in GR only those Purchase order numbers can be added which are in active status.<br />\r\n<br />\r\nGoods Receive Number needs to be created with a unique number assigned to a purchase order form to authorize a purchase transaction. It should be numeric digit.<br />\r\n<br />\r\nClick on&nbsp;<strong>View</strong>&nbsp;button to check all the details of the GR.<br />\r\n<br />\r\nClick on the&nbsp;<strong>Edit</strong>&nbsp;button to check if the GR details can be updated.<br />\r\n<br />\r\nClick on the&nbsp;<strong>Activate/Deactivate</strong>&nbsp;button to check if any particular GR record can be deactivated and again activated as required.<br />\r\n<br />\r\n<br />\r\nEnter any GR Number on Search by GR Number option to check any particular GR details directly from the search list.</p>\r\n', 1, '2021-09-02 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 7, '<p>Goods Issue will be generated to issue the goods which has been reserved. The quantity for goods issue cannot be greater than the stock quantity and goods reservation quantity. The quantity which has been sent for procurement, cannot be issued.</p>\r\n\r\n<p>Click on + to create Goods Issue for the active GR.<br />\r\n<br />\r\nClick on View button to check all the details of the Goods Issue.<br />\r\n<br />\r\nClick on the Edit button to check if the Goods Issue details can be updated.<br />\r\n<br />\r\nClick on the&nbsp;<strong>Activate/Deactivate</strong>&nbsp;button to check if any particular GI record can be deactivated and again activated as required.<br />\r\n<br />\r\nEnter any Goods Issue Number on Search by Goods Issue Number option to check any particular Goods Issue details directly from the search list.</p>\r\n', 1, '2021-09-02 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mis`
--

CREATE TABLE `inventory_mis` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` float NOT NULL,
  `currency` varchar(50) NOT NULL,
  `opening_stock` int(10) NOT NULL,
  `closing_stock` int(10) NOT NULL,
  `opening_stock_value` float NOT NULL,
  `closing_stock_value` float NOT NULL,
  `difference` int(11) NOT NULL,
  `flag` int(4) NOT NULL DEFAULT 1,
  `created_by` int(10) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_mis`
--

INSERT INTO `inventory_mis` (`id`, `date`, `item_id`, `quantity`, `total`, `currency`, `opening_stock`, `closing_stock`, `opening_stock_value`, `closing_stock_value`, `difference`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '2021-09-12', 9, 9000, 999000, 'INR', 20, 100, 2220, 11100, 8880, 0, 1, '2021-09-13', 1, '2021-09-14'),
(2, '2021-09-12', 9, 900, 99900, 'INR', 20, 100, 2220, 11100, 8880, 1, 1, '2021-09-13', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `material_id` int(10) NOT NULL,
  `UoM_id` int(10) NOT NULL,
  `safety_stock` int(10) NOT NULL,
  `price` float NOT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `part_no` varchar(100) DEFAULT NULL,
  `drawing_no` varchar(100) DEFAULT NULL,
  `short_desc` varchar(100) DEFAULT NULL,
  `long_desc` varchar(100) DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `flag` int(4) NOT NULL COMMENT '0-Deactive, 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `name`, `manufacturer_id`, `storage`, `material_id`, `UoM_id`, `safety_stock`, `price`, `hsn`, `part_no`, `drawing_no`, `short_desc`, `long_desc`, `created_by`, `created_on`, `flag`) VALUES
(5, 10000001, 'Demo', 2, 'bbsr', 2, 21, 200, 500, '', '0', '0', '', '', 1, '2021-08-02 12:40:20', 0),
(7, 10000002, 'Demo3', 2, 'bbsr', 2, 21, 50, 200, 'BS0011', '123555', '0', 'Lorem ipsum', 'Lorem ipsum Lorem ipsum', 1, '2021-08-06 11:39:46', 1),
(9, 10000003, 'Demo', 2, 'bbsr', 2, 1, 120, 111, '', '0', '0', 'Lorem ipsum', '', 1, '2021-08-09 08:42:41', 1),
(10, 10000004, 'Demo', 3, 'zzX', 5, 15, 75, 111, '', '0', '0', 'Lorem ipsum', '', 1, '2021-08-09 08:43:35', 1),
(11, 10000005, 'Demo', 2, 'bbsr', 3, 17, 110, 600, '', '0', '0', 'Lorem ipsum', '', 1, '2021-08-09 08:57:59', 1),
(12, 10000006, 'Demo', 6, 'bbsr', 4, 18, 500, 550, '', '0', '0', 'zX', 'zxz', 1, '2021-08-09 10:43:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(4) NOT NULL COMMENT '0-Deactive, 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `status`) VALUES
(1, 'Voltas', 1),
(2, 'Blue Star', 1),
(3, 'LG India', 1),
(4, 'Amber Enterprises India', 1),
(5, 'Hitachi Air Condition India', 1),
(6, 'Lloyd ', 1),
(7, 'Samsung India', 1),
(8, 'Onida', 1),
(9, 'Daikin', 1),
(12, 'Videocon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE `material_types` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(4) NOT NULL COMMENT '0-Dective, 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`id`, `code`, `name`, `status`) VALUES
(1, 101, 'Raw Material', 1),
(2, 102, 'Consumable Material', 1),
(3, 103, 'Capital Material', 1),
(4, 104, 'Finished Material', 1),
(5, 105, 'Semi-finished Material', 1),
(6, 0, 'Machinary Parts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(4) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`) VALUES
(1, 'Items'),
(2, 'Suppliers'),
(3, 'Customers'),
(4, 'Services'),
(5, 'POs'),
(6, 'GRs'),
(7, 'GIs');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `flag` int(4) NOT NULL DEFAULT 1,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `code`, `heading`, `vendor_id`, `item_id`, `currency`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1000, 'Testing PO', 1, 9, 'INR', 0, 1, '2021-08-12', 1, '2021-08-16'),
(2, 1001, 'Testing PO', 2, 7, 'INR', 1, 1, '2021-08-13', 1, '2021-08-27'),
(5, 1003, 'Testing PO', 1, 9, 'INR', 1, 1, '2021-08-16', 0, '0000-00-00'),
(11, 1004, 'Testing PO123', 3, 4, 'INR', 1, 1, '2021-08-24', 0, '0000-00-00'),
(12, 1005, 'Testing POO', 3, 7, 'INR', 1, 1, '2021-08-24', 0, '0000-00-00'),
(13, 1006, 'Latest PO', 1, 5, 'INR', 1, 1, '2021-08-26', 1, '2021-08-27'),
(14, 1007, 'PO Testing', 3, 5, 'INR', 1, 1, '2021-09-02', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `po_details`
--

CREATE TABLE `po_details` (
  `id` int(10) NOT NULL,
  `po_id` int(10) NOT NULL,
  `base_amount` float NOT NULL,
  `tax_type` int(4) NOT NULL COMMENT '1-GST, 2-IGST',
  `tax_percentage` int(10) NOT NULL,
  `tax_amount` float NOT NULL,
  `discount` int(10) NOT NULL,
  `insurance` float NOT NULL,
  `freight` float NOT NULL,
  `custom` float NOT NULL,
  `packaging` float NOT NULL,
  `extra` float NOT NULL,
  `total_po_amount` float NOT NULL,
  `quantity` float NOT NULL,
  `delivery_qty1` int(10) NOT NULL,
  `delivery_qty2` int(10) NOT NULL,
  `delivery_qty3` int(10) NOT NULL,
  `amount` float NOT NULL,
  `storage` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_date2` date DEFAULT NULL,
  `delivery_date3` date DEFAULT NULL,
  `ppu` varchar(100) NOT NULL COMMENT 'price per unit',
  `hsn` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_details`
--

INSERT INTO `po_details` (`id`, `po_id`, `base_amount`, `tax_type`, `tax_percentage`, `tax_amount`, `discount`, `insurance`, `freight`, `custom`, `packaging`, `extra`, `total_po_amount`, `quantity`, `delivery_qty1`, `delivery_qty2`, `delivery_qty3`, `amount`, `storage`, `delivery_date`, `delivery_date2`, `delivery_date3`, `ppu`, `hsn`, `recipient`) VALUES
(1, 1, 2000, 1, 7, 140, 5, 0, 0, 0, 0, 0, 2040, 50, 0, 0, 0, 2000, 'bbsr', '2021-08-25', NULL, NULL, '40', 'VT0012', 'Mr. Abc'),
(2, 2, 3000, 1, 18, 540, 7, 0, 0, 0, 0, 0, 3292.2, 10, 0, 10, 10, 3000, 'bbsr', '2021-08-26', '2021-08-28', '2021-08-27', '100', 'VT0012', 'Mr. Abcx'),
(3, 5, 2000, 1, 6, 120, 5, 0, 0, 0, 0, 0, 2120, 200, 0, 0, 0, 2000, 'bbsr', '2021-08-23', NULL, NULL, '10', 'VT0012', 'Mr. Abc'),
(5, 11, 3100, 1, 18, 558, 7, 100, 100, 100, 100, 0, 3866.94, 20, 10, 10, 0, 3100, 'Bhubaneswar', '2021-08-26', '2021-08-27', '2021-08-28', '100', 'VT0012', 'Mr. XYZ'),
(6, 12, 16758, 1, 18, 3016.44, 7, 0, 100, 100, 100, 0, 18762.2, 20, 0, 20, 2, 16758, 'Bhubaneswar', '2021-09-02', '2021-09-03', '2021-09-04', '399', 'BS0011', 'Dasssssss'),
(7, 13, 20000, 1, 18, 3600, 5, 100, 100, 100, 100, 0, 22800, 200, 100, 100, 0, 20000, 'bbsr', '2021-08-31', '2021-09-01', NULL, '100', 'VT0012', 'Mr. Abc'),
(8, 14, 1000, 1, 18, 180, 7, 100, 100, 100, 100, 0, 1562.4, 200, 100, 0, 0, 1000, 'Bhubaneswar', '2021-09-05', NULL, NULL, '10', 'VT0012', 'Mr. Abc');

-- --------------------------------------------------------

--
-- Table structure for table `po_qty_details`
--

CREATE TABLE `po_qty_details` (
  `id` int(4) NOT NULL,
  `po_id` int(4) NOT NULL,
  `gr_id` int(4) NOT NULL,
  `ordered_qty` int(4) NOT NULL,
  `received_qty` int(4) NOT NULL,
  `remain_qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_qty_details`
--

INSERT INTO `po_qty_details` (`id`, `po_id`, `gr_id`, `ordered_qty`, `received_qty`, `remain_qty`) VALUES
(4, 2, 1, 9, 11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sales_mis`
--

CREATE TABLE `sales_mis` (
  `id` int(4) NOT NULL,
  `quote_no` varchar(100) NOT NULL,
  `quote_date` date NOT NULL,
  `sales_order` varchar(100) NOT NULL,
  `sales_date` date NOT NULL,
  `sales_person` varchar(100) NOT NULL,
  `item_id` int(4) NOT NULL,
  `item_serial` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_price` float NOT NULL,
  `tax_amount` float NOT NULL,
  `total` float NOT NULL,
  `customer_id` int(4) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `paid_by` int(4) NOT NULL,
  `amount_paid` float NOT NULL,
  `remain_amount` float NOT NULL,
  `flag` int(4) NOT NULL DEFAULT 1,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_mis`
--

INSERT INTO `sales_mis` (`id`, `quote_no`, `quote_date`, `sales_order`, `sales_date`, `sales_person`, `item_id`, `item_serial`, `quantity`, `unit_price`, `tax_amount`, `total`, `customer_id`, `invoice_no`, `invoice_date`, `paid_by`, `amount_paid`, `remain_amount`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '1ASSJ22', '2021-09-09', '1231JSJS222', '2021-09-09', 'Mr. Das', 9, '100011', 200, 111, 200, 22400, 1, 'AAS11', '2021-09-09', 2, 22400, 0, 1, 1, '2021-09-08', 1, '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `done_by` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `payment_mode` int(4) NOT NULL,
  `details` text NOT NULL,
  `additional_items` text NOT NULL,
  `flag` int(4) NOT NULL DEFAULT 1,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `code`, `customer_id`, `date`, `done_by`, `amount`, `paid_amount`, `payment_mode`, `details`, `additional_items`, `flag`, `created_by`, `created_on`) VALUES
(1, 1000, 1, '2021-08-20', 'Mr.  Xyz', 1000, 1000, 2, '', '', 1, 1, '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chattisgarh'),
(6, 'Goa'),
(7, 'Gujrat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `phone1` int(10) NOT NULL,
  `phone2` int(10) NOT NULL,
  `person1` varchar(100) NOT NULL,
  `person2` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin` int(10) NOT NULL,
  `flag` int(4) NOT NULL,
  `created_by` int(4) NOT NULL,
  `created_on` date NOT NULL,
  `modified_by` int(4) NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `code`, `name`, `email`, `mobile`, `phone1`, `phone2`, `person1`, `person2`, `address1`, `address2`, `city`, `state`, `country`, `pin`, `flag`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 2000000, 'Demo', 'demo@spaatech.net', 1111111111, 0, 0, '', '', '', '', 'bbsr', 'Odisha', 'India', 751000, 0, 1, '2021-08-09', 0, '0000-00-00'),
(2, 2000001, 'Demo', 'info@spaatech.net', 1111111111, 0, 0, '', '', 'bbsr', '', 'bbsr', 'Odisha', 'India', 751000, 1, 1, '2021-08-09', 0, '0000-00-00'),
(3, 2000002, 'Reliance Jio', 'jio@gmail.com', 1111122222, 0, 0, 'Mr Jio', '', 'bbsr', '', 'bbsr', 'Odisha', 'India', 751000, 1, 1, '2021-08-18', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `payment_terms` varchar(100) NOT NULL,
  `payment_terms_other` varchar(100) NOT NULL,
  `type` int(4) NOT NULL COMMENT '1.Regular\r\n2.One Time\r\n3.Blocked',
  `gstin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `msme` varchar(100) NOT NULL,
  `account_no` int(10) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `cash_mgmt_group` int(4) NOT NULL,
  `keyword1` varchar(100) NOT NULL,
  `keyword2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `supplier_id`, `currency`, `payment_terms`, `payment_terms_other`, `type`, `gstin`, `pan`, `msme`, `account_no`, `bank_name`, `branch`, `ifsc_code`, `cash_mgmt_group`, `keyword1`, `keyword2`) VALUES
(1, 1, 'INR', 'Others', 'Asdasdasdasd', 1, '24AAACC1206D1ZM', 'ALWPG5809L', '24AAACC1206D1ZM', 2147483647, 'SBI', 'Mancheswar', 'SBIN0000041', 1, '', ''),
(2, 2, 'INR', 'Payable immediately', '', 1, '24AAACC1206D1ZM', 'ALWPG5809L', '24AAACC1206D', 2147483647, 'SBI', 'Mancheswar', 'SBIN0000041', 2, '', ''),
(3, 3, 'INR', 'Payable in 3 partial amounts2', '', 2, '24AAACC1206D1ZM', 'ALWPG5809L', '24AAACC1206D', 2147483647, 'HDFC', 'Mancheswar', 'SBIN0000737', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `code`, `name`, `created_at`) VALUES
(1, '%', 'Percentage', NULL),
(2, '/MI', '/min', NULL),
(3, '/NL', '/Nanoliter', NULL),
(4, '/PL', '/Pikoliter', NULL),
(5, 'U/L', 'U/Liter', NULL),
(6, 'GDL', 'g/dl', NULL),
(7, 'MGD', 'mg/dl', NULL),
(8, '/L', '/Liter', NULL),
(9, 'ONE', 'One', NULL),
(10, 'D', 'Days', NULL),
(11, '15M', '15 minutes', NULL),
(12, '22S', 'mm2/s', NULL),
(13, 'CMS', 'cm/s', NULL),
(14, 'IB', 'pF', NULL),
(15, 'A', 'Ampere', NULL),
(16, 'GOH', 'GOHm', NULL),
(17, 'GM3', 'g/m3', NULL),
(18, 'ACR', 'ACRe', NULL),
(19, 'KD3', 'kg/dm3', NULL),
(20, 'QML', 'kmol', NULL),
(21, 'NI', 'ND', NULL),
(22, 'MN', 'MN', NULL),
(23, 'MGO', 'MOhm', NULL),
(24, 'BAG', 'BAG', NULL),
(25, 'BAR', 'bar', NULL),
(26, 'BBL', 'Barrel', NULL),
(27, 'BBW', 'Barrel WTI', NULL),
(28, 'BKG', 'KG/BAG', NULL),
(29, 'BL', 'Barrel', NULL),
(30, 'BLI', '10^9/l', NULL),
(31, 'BOX', 'Box', NULL),
(32, 'BQK', 'Bq/kg', NULL),
(33, 'BRL', 'Barrel', NULL),
(34, 'BT', 'Bottle', NULL),
(35, 'bt3', 'MBTU (IT)', NULL),
(36, 'bt6', 'MMBTU (IT)', NULL),
(37, 'btu', 'BTU (IT)', NULL),
(38, 'BU', 'Bushel', NULL),
(39, 'BUC', 'BU Corn', NULL),
(40, 'BUS', 'Bushel soy', NULL),
(41, 'BUW', 'BU Wheat', NULL),
(42, 'C', 'Celsius', NULL),
(43, 'RF', 'mF', NULL),
(44, 'M/M', 'Mol/m3', NULL),
(45, 'M/L', 'Mol/Liter', NULL),
(46, 'C3S', 'cm3/s', NULL),
(47, 'R-U', 'nF', NULL),
(48, 'NMM', 'N/mm2', NULL),
(49, 'CCM', 'cm3', NULL),
(50, 'CD', 'Candela', NULL),
(51, 'CDM', 'Cubic dec.', NULL),
(52, 'CFU', 'CFU', NULL),
(53, 'CM', 'Centimeter', NULL),
(54, 'CM2', 'cm2', NULL),
(55, 'CMH', 'cm/h', NULL),
(56, 'COP', 'Copies', NULL),
(57, 'CP', 'Centipoise', NULL),
(58, 'CV', 'Case', NULL),
(59, 'CSE', 'CSE', NULL),
(60, 'CL', 'centiliter', NULL),
(61, 'A/V', 'Siemens/m', NULL),
(62, 'TOM', 't/m3', NULL),
(63, 'VAM', 'VA', NULL),
(64, 'DEG', 'Degree', NULL),
(65, 'DIE', 'Die', NULL),
(66, 'DM', 'Decimeter', NULL),
(67, 'DR', 'drum', NULL),
(68, 'DZ', 'Dozen', NULL),
(69, 'EA', 'Each', NULL),
(70, 'EU', 'Enzyme Uni', NULL),
(71, 'UN', 'Unit', NULL),
(72, 'EML', 'Enzyme/ml', NULL),
(73, 'FT', 'Footer', NULL),
(74, 'FT2', 'Square ft', NULL),
(75, 'FT3', 'Cubic foot', NULL),
(76, 'FTE', 'Con. Day', NULL),
(77, 'FTL', 'Femtoliter', NULL),
(78, 'FUM', 'FU Measure', NULL),
(79, 'G', 'gram', NULL),
(80, 'g/T', 'gm. per ton', NULL),
(81, 'GAD', 'GAL Diesel', NULL),
(82, 'GAE', 'GAL Ethan', NULL),
(83, 'GAG', 'g Silver', NULL),
(84, 'GAU', 'g Gold', NULL),
(85, 'GB', 'gigabyte', NULL),
(86, 'FYR', 'Fiscal yr', NULL),
(87, 'GKG', 'g/kg', NULL),
(88, 'GLI', 'g/l', NULL),
(89, 'GAL', 'US gallon', NULL),
(90, 'GM', 'g/mol', NULL),
(91, 'GM2', 'g/m2', NULL),
(92, 'GPM', 'gal./min', NULL),
(93, 'GRO', 'GROss', NULL),
(94, 'GC3', 'g/ccm', NULL),
(95, 'GAI', 'g act.ing.', NULL),
(96, 'H', 'Hour', NULL),
(97, 'HA', 'Hectare', NULL),
(98, 'HL', 'Hectolitre', NULL),
(99, 'HPA', 'hPa', NULL),
(100, 'HR', 'Hours', NULL),
(101, 'HZ', 'Hertz', NULL),
(102, 'IN', 'Inch', NULL),
(103, 'IN2', 'Squar.inch', NULL),
(104, 'IN3', 'Cubic inch', NULL),
(105, 'J', 'Joule', NULL),
(106, 'KJ', 'Kilojoule', NULL),
(107, 'YR', 'Years', NULL),
(108, 'JKG', 'J/kg', NULL),
(109, 'JKK', 'J/kgK', NULL),
(110, 'JMO', 'J/mol', NULL),
(111, 'JT', 'Joint', NULL),
(112, 'K', 'Kelvin', NULL),
(113, 'KA', 'kA', NULL),
(114, 'CAN', 'Canister', NULL),
(115, 'CAR', 'Carton', NULL),
(116, 'KBK', 'kBq/kg', NULL),
(117, 'KG', 'kilogram', NULL),
(118, 'KGF', 'kg/m2', NULL),
(119, 'kgh', 'kg/h', NULL),
(120, 'KGK', 'kg/kg', NULL),
(121, 'KGM', 'kg/mol', NULL),
(122, 'KGS', 'kg/s', NULL),
(123, 'PGL', 'kg/m3', NULL),
(124, 'KAI', 'KGA', NULL),
(125, 'KHL', 'kg/hl', NULL),
(126, 'KHZ', 'kHz', NULL),
(127, 'CRT', 'Crate', NULL),
(128, 'KJ', 'Kilojoule', NULL),
(129, 'KJG', 'KJ/g', NULL),
(130, 'KJK', 'KJ/kg', NULL),
(131, 'KJM', 'KJ/mol', NULL),
(132, 'KM', 'Kilometer', NULL),
(133, 'KM2', 'KM2', NULL),
(134, 'kmb', 'kg/MMBtu', NULL),
(135, 'KMH', 'km/h', NULL),
(136, 'KMK', 'm3/m3', NULL),
(137, 'KMN', 'K/min', NULL),
(138, 'KMS', 'K/s', NULL),
(139, 'KOH', 'kOhm', NULL),
(140, 'KPA', 'kPa', NULL),
(141, 'K/m', 'Kg per met', NULL),
(142, 'KT', 'KG (theo)', NULL),
(143, 'KV', 'kV', NULL),
(144, 'kVA', 'kVA', NULL),
(145, 'KW', 'Kilowatt', NULL),
(146, 'KI1', 'KG ActIng1', NULL),
(147, 'KI2', 'KI ActIng2', NULL),
(148, 'KWH', 'Kilowatt h', NULL),
(149, 'KIK', 'kai/kg', NULL),
(150, 'KWN', 'KWH 15 C', NULL),
(151, 'LMI', 'l/min', NULL),
(152, 'LAG', 'Layer', NULL),
(153, 'LB', 'US pound', NULL),
(154, 'LBC', 'LB Corn', NULL),
(155, 'LBO', 'Lb Soy Oil', NULL),
(156, 'LBS', 'Lb Sugar', NULL),
(157, 'lbt', 'lb/ton', NULL),
(158, 'LBW', 'LB Wheat', NULL),
(159, 'AU', 'Act. unit', NULL),
(160, 'LF', 'L Fruit', NULL),
(161, 'L/H', 'Liter / h', NULL),
(162, 'LHK', 'l/100 km', NULL),
(163, 'LMS', 'l/mol.s', NULL),
(164, 'LOT', 'Lot', NULL),
(165, 'LPL', 'l/l', NULL),
(166, 'LS', 'L Acid', NULL),
(167, 'LIL', 'L ActIng/L', NULL),
(168, 'LI1', 'L ActIng 1', NULL),
(169, 'M', 'Meter', NULL),
(170, 'M%', '%(m)', NULL),
(171, 'M%O', '%0(mass)', NULL),
(172, 'M/S', 'm/s', NULL),
(173, 'M2', 'm2', NULL),
(174, 'M2H', 'mm/1h', NULL),
(175, 'M-2', '1/M2', NULL),
(176, 'M2S', 'm2/s', NULL),
(177, 'M3', 'Cubic.mtr', NULL),
(178, 'm3d', 'm3/day', NULL),
(179, 'M3S', 'm3/s', NULL),
(180, 'MA', 'mA', NULL),
(181, 'MB', 'megabyte', NULL),
(182, 'MBA', 'mbar', NULL),
(183, 'MBB', 'MMBtu/bbl', NULL),
(184, 'MBG', 'MMBtu/gal', NULL),
(185, 'MBS', 'MMBtu/scf', NULL),
(186, 'MBT', 'MMBTU/t', NULL),
(187, 'MBZ', 'm.bar/s', NULL),
(188, 'MEJ', 'MJ', NULL),
(189, 'MET', 'Meter', NULL),
(190, 'MG', 'milligram', NULL),
(191, 'MGE', 'mg/cm2', NULL),
(192, 'MGG', 'mg/g', NULL),
(193, 'MGK', 'mg/kg', NULL),
(194, 'MGL', 'mg/l', NULL),
(195, 'MGQ', 'mg/m3', NULL),
(196, 'MGW', 'Megawatt', NULL),
(197, 'MHG', 'mm/HG', NULL),
(198, 'MHZ', 'MHz', NULL),
(199, 'MI', 'Mile', NULL),
(200, 'MI2', 'Square mil', NULL),
(201, 'MIL', '1/1000 in', NULL),
(202, 'MIN', 'Minutes', NULL),
(203, 'MIJ', 'mJ', NULL),
(204, 'mjk', 'MJ/kg', NULL),
(205, 'MJN', 'MJ/kg', NULL),
(206, 'Mjt', 'MJ/t', NULL),
(207, 'ML', 'Milliliter', NULL),
(208, 'MLK', 'ml/m3', NULL),
(209, 'MLM', 'ml/min', NULL),
(210, 'MLI', 'ml act.in.', NULL),
(211, 'MM', 'Millimeter', NULL),
(212, 'MM2', 'mm2', NULL),
(213, 'MMA', 'mm/a', NULL),
(214, 'MMG', 'mmol/g', NULL),
(215, 'MMH', 'mm/h', NULL),
(216, 'MMK', 'mmol/kg', NULL),
(217, 'MML', 'mmol/l', NULL),
(218, 'MMO', 'Millimol', NULL),
(219, 'MM3', 'mm3', NULL),
(220, 'MMS', 'mm/s', NULL),
(221, 'MNM', 'mN/m', NULL),
(222, 'MOK', 'mol/kg', NULL),
(223, 'MOL', 'Mol', NULL),
(224, 'MON', 'Months', NULL),
(225, 'MPB', 'ppb(m)', NULL),
(226, 'MPG', 'Mi/Gal(US)', NULL),
(227, 'MPM', 'ppm(m)', NULL),
(228, 'MPS', 'mPa.s', NULL),
(229, 'MPT', 'ppt(m)', NULL),
(230, 'MPZ', 'm.Pa/s', NULL),
(231, 'M3H', 'm3/h', NULL),
(232, 'MS', 'ms', NULL),
(233, 'MS2', 'm/s2', NULL),
(234, 'MT', 'Metric Ton', NULL),
(235, 'MTB', 'MT Bitumen', NULL),
(236, 'MTE', 'mT', NULL),
(237, 'M/H', 'm/h', NULL),
(238, 'MV', 'mV', NULL),
(239, 'MW', 'Milliwatt', NULL),
(240, 'MWH', 'mwh', NULL),
(241, 'N', 'Newton', NULL),
(242, 'NAM', 'nm', NULL),
(243, 'NM', 'N/m', NULL),
(244, 'NO', 'no unit', NULL),
(245, 'NS', 'ns', NULL),
(246, 'OCM', 'Ohm*cm', NULL),
(247, 'OHM', 'Ohm', NULL),
(248, 'OM', 'Ohm*m', NULL),
(249, 'OPH', 'Opr. hrs.', NULL),
(250, 'Oz', 'ounce', NULL),
(251, 'FOZ', 'Fld.oz US', NULL),
(252, 'OZT', 'Troy Ounce', NULL),
(253, 'P', 'Points', NULL),
(254, 'PA', 'Pascal', NULL),
(255, 'PAI', 'Pair', NULL),
(256, 'PAC', 'Pack', NULL),
(257, 'PAL', 'Pallet', NULL),
(258, 'PAS', 'Pascal sec', NULL),
(259, 'pc', 'Piece', NULL),
(260, 'PRC', 'Group prop', NULL),
(261, 'PDA', 'PersDay 8H', NULL),
(262, 'PER', 'Persons', NULL),
(263, 'PGR', 'Pikogram', NULL),
(264, 'PH', 'pH value', NULL),
(265, 'PKT', 'Point', NULL),
(266, 'PMI', '1/min', NULL),
(267, 'PMR', 'kg/m2*s', NULL),
(268, 'PPB', 'ppb(parts per ton)', NULL),
(269, 'PPM', 'ppm(parts per million)', NULL),
(270, 'PPT', 'ppt(parts per ton)', NULL),
(271, 'PRM', 'ug/cm2*min', NULL),
(272, 'PRS', 'Persons', NULL),
(273, 'PS', 'ps', NULL),
(274, 'PSI', 'psi', NULL),
(275, 'PT', 'Pint US l', NULL),
(276, 'QT', 'Quart US l', NULL),
(277, 'REP', 'Rep', NULL),
(278, 'RHO', 'g/cm3', NULL),
(279, 'RL', 'Reel', NULL),
(280, 'RM', 'Running Meter', NULL),
(281, 'ROL', 'Role', NULL),
(282, 'RPM', 'RPM', NULL),
(283, 'S', 'Second', NULL),
(284, 'scf', 'scf', NULL),
(285, 'sch', 'scf/h', NULL),
(286, 'scy', 'scf/y', NULL),
(287, 'SET', 'SET', NULL),
(288, 'SHT', 'Sheet', NULL),
(289, 'sMb', 'scf/MMbbl', NULL),
(290, 'PC', 'Piece', NULL),
(291, 'HR', 'Hours', NULL),
(292, 'T/P', 'TO / PC', NULL),
(293, 'TAG', 'Days', NULL),
(294, 'TAL', 'to Alu', NULL),
(295, 'TAS', 'to Arsenic', NULL),
(296, 'tbl', 't/bbl', NULL),
(297, 'TBS', 'Tablespoon', NULL),
(298, 'TC3', '1/cm3', NULL),
(299, 'TCB', 'to Cocoa', NULL),
(300, 'TCO', 'to coal', NULL),
(301, 'TCU', 'to Copper', NULL),
(302, 'TES', 'D', NULL),
(303, 'TEU', '20\' Contr.', NULL),
(304, 'TS', 'Thousands', NULL),
(305, 'TP', 'Tank pal.', NULL),
(306, 'TM3', '1/m3', NULL),
(307, 'tMb', 't/MMbbl', NULL),
(308, 'tMs', 't/Mscf', NULL),
(309, 'TNI', 'to Nickel', NULL),
(310, 'TO', 'ton', NULL),
(311, 'TOG', 'oz tr gold', NULL),
(312, 'TON', 'US ton', NULL),
(313, 'TOS', 'oz silver', NULL),
(314, 'TOT', 'oz per to', NULL),
(315, 'TPK', 'to Kernals', NULL),
(316, 'TPO', 'to Olean', NULL),
(317, 'TPS', 'to Stearin', NULL),
(318, 'TSC', 'to Scrap', NULL),
(319, 'TSP', 'Tea Spoon', NULL),
(320, 'TST', 'to Steel', NULL),
(321, 'TSU', 'to Sulphur', NULL),
(322, 'tt', 't/t', NULL),
(323, 'TWT', 'to Wheat', NULL),
(324, 'TZN', 'To Zinc', NULL),
(325, 'UK', 'Carton box', NULL),
(326, 'UMB', 'MMBTU(IT)', NULL),
(327, 'UMJ', 'Megajoule', NULL),
(328, 'V', 'Volts', NULL),
(329, 'V%', '%(V)', NULL),
(330, 'V%O', '%O(V)', NULL),
(331, 'MPL', 'Millimol/l', NULL),
(332, 'VAL', 'Value', NULL),
(333, 'VPB', 'ppb(V)', NULL),
(334, 'VPM', 'ppm(V)', NULL),
(335, 'VPT', 'ppt(V)', NULL),
(336, 'W', 'Watt', NULL),
(337, 'WK', 'Weeks', NULL),
(338, 'WD', 'Workday(s)', NULL),
(339, 'WFR', 'Wafer', NULL),
(340, 'WMK', 'W/(m*K)', NULL),
(341, 'WKY', 'kg/sm2', NULL),
(342, 'YAL', 'To AL', NULL),
(343, 'YD', 'Yards', NULL),
(344, 'YD2', 'Squar.yard', NULL),
(345, 'YD3', 'Cubic yard', NULL),
(346, 'YSI', 'To Si', NULL),
(347, 'YTD', 'to Dry', NULL),
(348, 'YTF', 'TO Dry Fe', NULL),
(349, 'YTM', 'to Moist.', NULL),
(350, 'YTP', 'To Ph', NULL),
(351, 'YTU', 'Dry TOUnit', NULL),
(352, 'ZAB', 'Big Bus', NULL),
(353, 'zam', 'Mini Bus', NULL),
(354, 'ZPD', 'Person Day', NULL),
(355, 'kgj', 'kg/J', NULL),
(356, 'kgm', 'kg/MMBtu', NULL),
(357, 'mbb', 'MMBtu/bbl', NULL),
(358, 'mbg', 'MMBtu/gal', NULL),
(359, 'mbm', 'MMBtu/Mscf', NULL),
(360, 'mbs', 'MMBtu/scf', NULL),
(361, 'mjm', 'MJ/m3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`) VALUES
(1, 'arpiyaaircon@spaatech.net', '210b48b542659fb951a80a15c5997513', 'Arpiya Aircon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amc_mis`
--
ALTER TABLE `amc_mis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gis`
--
ALTER TABLE `gis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grs`
--
ALTER TABLE `grs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helptexts`
--
ALTER TABLE `helptexts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_mis`
--
ALTER TABLE `inventory_mis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_types`
--
ALTER TABLE `material_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_details`
--
ALTER TABLE `po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_qty_details`
--
ALTER TABLE `po_qty_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_mis`
--
ALTER TABLE `sales_mis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
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
-- AUTO_INCREMENT for table `amc_mis`
--
ALTER TABLE `amc_mis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gis`
--
ALTER TABLE `gis`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grs`
--
ALTER TABLE `grs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `helptexts`
--
ALTER TABLE `helptexts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory_mis`
--
ALTER TABLE `inventory_mis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `material_types`
--
ALTER TABLE `material_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `po_details`
--
ALTER TABLE `po_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `po_qty_details`
--
ALTER TABLE `po_qty_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_mis`
--
ALTER TABLE `sales_mis`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
