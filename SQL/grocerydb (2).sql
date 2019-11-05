-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2019 at 11:59 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `gms_address`
--

DROP TABLE IF EXISTS `gms_address`;
CREATE TABLE IF NOT EXISTS `gms_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `address_type_iD` int(11) NOT NULL,
  `street` text NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_address_type`
--

DROP TABLE IF EXISTS `gms_address_type`;
CREATE TABLE IF NOT EXISTS `gms_address_type` (
  `address_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_type` varchar(100) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`address_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_address_type`
--

INSERT INTO `gms_address_type` (`address_type_id`, `address_type`, `created`, `modified`) VALUES
(1, 'Home', '2019-10-30 06:38:40', '2019-10-30 06:38:40'),
(3, 'Office', '2019-10-30 06:39:17', '2019-10-30 06:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `gms_admin_user`
--

DROP TABLE IF EXISTS `gms_admin_user`;
CREATE TABLE IF NOT EXISTS `gms_admin_user` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_brand`
--

DROP TABLE IF EXISTS `gms_brand`;
CREATE TABLE IF NOT EXISTS `gms_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `brand_logo` text NOT NULL,
  `brand_desc` text NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_brand`
--

INSERT INTO `gms_brand` (`brand_id`, `brand`, `brand_logo`, `brand_desc`, `created`, `modified`) VALUES
(17, 'Parle', 'fHNWLoECrYchild.jpg', 'Universal Brand for Griocery', '2019-10-31 11:08:05', '2019-10-31 11:08:47'),
(16, 'India Gate', 'r5vxX6WudVchild.jpg', 'This Is Rice Brand', '2019-10-30 12:25:49', '2019-10-30 12:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `gms_card_detail`
--

DROP TABLE IF EXISTS `gms_card_detail`;
CREATE TABLE IF NOT EXISTS `gms_card_detail` (
  `card_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_holder_name` varchar(50) NOT NULL,
  `card_number` int(11) NOT NULL,
  `expire_month` int(11) NOT NULL,
  `expire_year` int(11) NOT NULL,
  PRIMARY KEY (`card_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_cart`
--

DROP TABLE IF EXISTS `gms_cart`;
CREATE TABLE IF NOT EXISTS `gms_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_cart_order`
--

DROP TABLE IF EXISTS `gms_cart_order`;
CREATE TABLE IF NOT EXISTS `gms_cart_order` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`co_id`),
  KEY `cart_id` (`cart_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_city`
--

DROP TABLE IF EXISTS `gms_city`;
CREATE TABLE IF NOT EXISTS `gms_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_city`
--

INSERT INTO `gms_city` (`city_id`, `city_name`, `state_id`, `created`, `modified`) VALUES
(1, 'Surat', 1, '2019-10-30 10:48:06', '2019-10-30 10:48:06'),
(2, 'Lucknow', 2, '2019-10-30 10:48:22', '2019-10-30 10:48:22'),
(4, 'Amethi', 2, '2019-10-30 10:49:12', '2019-10-30 10:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `gms_countries`
--

DROP TABLE IF EXISTS `gms_countries`;
CREATE TABLE IF NOT EXISTS `gms_countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gms_coupon`
--

DROP TABLE IF EXISTS `gms_coupon`;
CREATE TABLE IF NOT EXISTS `gms_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`coupon_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_feedback`
--

DROP TABLE IF EXISTS `gms_feedback`;
CREATE TABLE IF NOT EXISTS `gms_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_invoice`
--

DROP TABLE IF EXISTS `gms_invoice`;
CREATE TABLE IF NOT EXISTS `gms_invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_on` timestamp NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `order_id` (`order_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_main_category`
--

DROP TABLE IF EXISTS `gms_main_category`;
CREATE TABLE IF NOT EXISTS `gms_main_category` (
  `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gms_main_category`
--

INSERT INTO `gms_main_category` (`cat_id`, `cat_name`, `cat_logo`, `created_at`, `updated_at`) VALUES
(60, 'cxcxcxsdsdsdsdsds', '1CfOmYB9YFchild.jpg', '2019-11-05 03:47:34', '2019-11-05 03:47:42'),
(59, 'Vegetables', 'HYWKbiJbzAfruit-veg01-lg.jpg', '2019-11-05 03:06:27', '2019-11-05 03:06:27'),
(57, 'Dairy', '3AINO3a2HBfruit-veg01-lg.jpg', '2019-10-30 04:25:46', '2019-10-30 04:25:46'),
(58, 'Rice', 'AwXsCc1YjVchildren-reading-book-png_100047.jpg', '2019-10-30 04:26:01', '2019-10-30 04:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `gms_offer`
--

DROP TABLE IF EXISTS `gms_offer`;
CREATE TABLE IF NOT EXISTS `gms_offer` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `cat_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`offer_id`),
  KEY `product_id` (`product_id`),
  KEY `shope_id` (`shop_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_order`
--

DROP TABLE IF EXISTS `gms_order`;
CREATE TABLE IF NOT EXISTS `gms_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_payment`
--

DROP TABLE IF EXISTS `gms_payment`;
CREATE TABLE IF NOT EXISTS `gms_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payment_type` (`payment_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_payment_type`
--

DROP TABLE IF EXISTS `gms_payment_type`;
CREATE TABLE IF NOT EXISTS `gms_payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_product-images`
--

DROP TABLE IF EXISTS `gms_product-images`;
CREATE TABLE IF NOT EXISTS `gms_product-images` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_image` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `ismain` varchar(5) NOT NULL,
  PRIMARY KEY (`product_image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_products`
--

DROP TABLE IF EXISTS `gms_products`;
CREATE TABLE IF NOT EXISTS `gms_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `descr` varchar(500) NOT NULL,
  `qty` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `mini_sub_category_id` int(11) NOT NULL DEFAULT '0',
  `weight` varchar(20) NOT NULL,
  `weight_unit_id` int(10) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_products`
--

INSERT INTO `gms_products` (`product_id`, `product_name`, `price`, `photo`, `descr`, `qty`, `is_active`, `brand_id`, `cat_id`, `sub_cat_id`, `mini_sub_category_id`, `weight`, `weight_unit_id`, `created`, `modified`) VALUES
(9, 'sdasd', '2332', 'ezfe9RlLEzfruit-veg01-lg.jpg', '																															ssdsada																																	', 233, 0, 16, 58, 0, 0, '233', 1, '2019-11-05 06:00:59', '2019-11-05 06:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `gms_product_details`
--

DROP TABLE IF EXISTS `gms_product_details`;
CREATE TABLE IF NOT EXISTS `gms_product_details` (
  `product_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `mini_sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_detail_id`),
  KEY `cat_id` (`cat_id`),
  KEY `weight_id` (`weight_id`),
  KEY `brand_id` (`brand_id`),
  KEY `product_id` (`product_id`),
  KEY `mini_sub_cat_id` (`mini_sub_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_product_review`
--

DROP TABLE IF EXISTS `gms_product_review`;
CREATE TABLE IF NOT EXISTS `gms_product_review` (
  `product_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `review_star` int(11) NOT NULL,
  `desc` text NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`product_review_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_product_weight`
--

DROP TABLE IF EXISTS `gms_product_weight`;
CREATE TABLE IF NOT EXISTS `gms_product_weight` (
  `product_weight_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `weight_type_id` int(11) NOT NULL,
  `weight_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`product_weight_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_purchase_return`
--

DROP TABLE IF EXISTS `gms_purchase_return`;
CREATE TABLE IF NOT EXISTS `gms_purchase_return` (
  `purchase_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `reason_type_id` int(11) NOT NULL,
  `descr` varchar(100) NOT NULL,
  PRIMARY KEY (`purchase_return_id`),
  KEY `order_id` (`order_id`),
  KEY `reason_type_id` (`reason_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_reason-type`
--

DROP TABLE IF EXISTS `gms_reason-type`;
CREATE TABLE IF NOT EXISTS `gms_reason-type` (
  `reason_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(100) NOT NULL,
  PRIMARY KEY (`reason_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_role`
--

DROP TABLE IF EXISTS `gms_role`;
CREATE TABLE IF NOT EXISTS `gms_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `modified` timestamp NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_role`
--

INSERT INTO `gms_role` (`role_id`, `role`, `modified`, `created`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'saller', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gms_shipping`
--

DROP TABLE IF EXISTS `gms_shipping`;
CREATE TABLE IF NOT EXISTS `gms_shipping` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`shipping_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_shopekipper`
--

DROP TABLE IF EXISTS `gms_shopekipper`;
CREATE TABLE IF NOT EXISTS `gms_shopekipper` (
  `shopekipper_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_pic` text NOT NULL,
  PRIMARY KEY (`shopekipper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_shops`
--

DROP TABLE IF EXISTS `gms_shops`;
CREATE TABLE IF NOT EXISTS `gms_shops` (
  `shopid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_owner_id` bigint(20) DEFAULT NULL,
  `shop_type_id` bigint(20) NOT NULL,
  `shop_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shopid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gms_shop_type`
--

DROP TABLE IF EXISTS `gms_shop_type`;
CREATE TABLE IF NOT EXISTS `gms_shop_type` (
  `shop_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_type` varchar(100) NOT NULL,
  PRIMARY KEY (`shop_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_shop_type`
--

INSERT INTO `gms_shop_type` (`shop_type_id`, `shop_type`) VALUES
(1, 'Dairy'),
(2, 'Holl Shaller\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gms_state`
--

DROP TABLE IF EXISTS `gms_state`;
CREATE TABLE IF NOT EXISTS `gms_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_state`
--

INSERT INTO `gms_state` (`state_id`, `state_name`, `country_id`, `created`, `modified`) VALUES
(1, 'Gujarat', 0, '2019-10-30 10:47:25', '2019-10-30 10:47:25'),
(2, 'Uttar Pradesh', 0, '2019-10-30 10:47:47', '2019-10-30 10:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `gms_sub_category`
--

DROP TABLE IF EXISTS `gms_sub_category`;
CREATE TABLE IF NOT EXISTS `gms_sub_category` (
  `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `cat_logo` text NOT NULL,
  `created` timestamp NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`sub_cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_sub_category`
--

INSERT INTO `gms_sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `cat_logo`, `created`, `modified`) VALUES
(18, 58, 'Basmati', 'kv9Gn3WZt9fruit-veg01-lg.jpg', '2019-10-30 04:52:22', 2019),
(21, 0, 'yhytfrd', 'PQsLqPVHltfruit-veg01-lg.jpg', '2019-11-05 03:10:54', 2019),
(22, 0, 'ikjhgfd', 'PnhL3KtW3Bchildren-reading-book-png_100047.jpg', '2019-11-05 03:14:03', 2019),
(23, 0, 'kfjshf', 'Xfdre7W7l0child.jpg', '2019-11-05 03:19:36', 2019),
(24, 58, 'Ashirwad', 'xLy8v0UOKichildren-reading-book-png_100047.jpg', '2019-11-05 03:26:52', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `gms_users`
--

DROP TABLE IF EXISTS `gms_users`;
CREATE TABLE IF NOT EXISTS `gms_users` (
  `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleid` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gms_users`
--

INSERT INTO `gms_users` (`userid`, `email`, `username`, `password`, `firstname`, `lastname`, `mobno`, `status`, `role`, `roleid`, `created`, `modified`) VALUES
(1, 'dhiraj.chauhan1997@gmail.com', 'dhiraj', '432639de2357c9d560a9c3d022d3fc8a', 'dhiraj', 'chauhan', '9904750956', 1, 'user', 3, NULL, NULL),
(3, 'suraj@d.com', 'suraj', '432639de2357c9d560a9c3d022d3fc8a', 'Suraj', 'Chauhan', '89898989', 1, 'saller', 2, '2019-10-24 18:30:00', '2019-10-24 18:30:00'),
(4, 'yogesh@d.com', 'yogesh', '432639de2357c9d560a9c3d022d3fc8a', 'Yogesh', 'Gamit', '89898989', 1, 'admin', 1, '2019-10-24 18:30:00', '2019-10-24 18:30:00'),
(8, 'sandip@d.com', 'sandip', '432639de2357c9d560a9c3d022d3fc8a', 'Sandip', 'Valvi', '8956322389', 1, 'user', 3, '2019-10-25 11:14:12', '2019-10-25 11:14:12'),
(9, 'jhsdjshd@d.com', 'djhsjdh', '432639de2357c9d560a9c3d022d3fc8a', 'kamal', 'chauhan', '78787878787878', 1, 'user', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'hgfhdg@d.com', 'sjdhsdjhs', '2a9f1ffa74a27f88b8853a343621e146', 'sdfsdhfg', 'hhdfghfg', '98652374', 0, 'saller', 0, '2019-11-05 02:51:29', '2019-11-05 02:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `gms_weight`
--

DROP TABLE IF EXISTS `gms_weight`;
CREATE TABLE IF NOT EXISTS `gms_weight` (
  `weight_id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` float NOT NULL,
  `weight_type_id` int(11) NOT NULL,
  PRIMARY KEY (`weight_id`),
  KEY `weight_type_id` (`weight_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_weight_type`
--

DROP TABLE IF EXISTS `gms_weight_type`;
CREATE TABLE IF NOT EXISTS `gms_weight_type` (
  `weight_type-id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`weight_type-id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gms_weight_unit`
--

DROP TABLE IF EXISTS `gms_weight_unit`;
CREATE TABLE IF NOT EXISTS `gms_weight_unit` (
  `weight_unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`weight_unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_weight_unit`
--

INSERT INTO `gms_weight_unit` (`weight_unit_id`, `unit`, `descr`, `created`, `modified`) VALUES
(1, 'KG', '', '2019-10-30 12:50:23', '2019-10-30 12:50:23'),
(3, 'Gram', '', '2019-10-30 13:05:57', '2019-11-02 00:19:09'),
(4, 'ML', '', '2019-11-02 00:12:41', '2019-11-02 00:18:57'),
(5, 'Liter', '', '2019-11-02 00:19:19', '2019-11-02 00:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `keyid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`keyid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`keyid`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'CODEX@123', 0, 0, 0, NULL, '2018-10-11 13:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
