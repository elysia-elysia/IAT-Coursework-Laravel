-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ISBN_no` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT 9.99,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorfirstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorlastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishyear` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `ISBN_no`, `created_at`, `updated_at`, `title`, `price`, `category`, `authorfirstname`, `authorlastname`, `publishyear`, `stock`, `description`, `image`) VALUES
(4, '9780241461877', '2020-07-24 14:55:04', '2020-07-24 14:55:04', 'Mrs Hinch: The Little Book of Lists', '6.49', 'Business', 'Mrs', 'Hinch', 2020, 15, 'A whole book filled with just lists! Notebook goals!\r\nMy idea of absolute heaven! As you all know, nothing helps me feel more organised than putting pen to paper and getting everything that\'s buzzing around my head down on to the page.', 'mrshinch_1595606104.jpg'),
(5, '9781760630720', '2020-07-24 14:57:20', '2020-07-24 14:57:20', 'The Courage To Be Disliked: How to free yourself, change your life and achieve real happiness', '8.79', 'Business,Languages', 'Ichiro', 'Kishimi', 2018, 36, 'The Japanese phenomenon that teaches us the simple yet profound lessons required to liberate our real selves and find lasting happiness.', 'thecouragetobedisliked_1595606240.jpg'),
(6, '9780141988511', '2020-07-24 14:59:26', '2020-07-24 14:59:26', '12 Rules for Life: An Antidote to Chaos', '8.99', 'Business,Languages', 'Jordan B.', 'Peterson', 2019, 12, 'How should we live properly in a world of chaos and uncertainty? Drawing on his own work as a clinical psychologist and on lessons from humanity\'s oldest myths and stories, Peterson offers twelve profound and realistic principles to live by.', '12rulesforlife_1595606366.jpg'),
(7, '9780091906818', '2020-07-24 15:01:11', '2020-07-25 12:55:45', 'How to Win Friends and Influence People', '7.71', 'Business', 'Dale', 'Carnegie', 2006, 5, 'The most famous confidence-boosting book ever published; with sales of over 16 million copies worldwide. Millions of people around the world have improved their lives based on the teachings of Dale Carnegie.', 'howtowinfriends_1595606471.jpg'),
(8, '9781847941497', '2020-07-24 15:03:12', '2020-07-24 15:03:12', 'Never Split the Difference: Negotiating as if Your Life Depended on It', '7.97', 'Business,Languages', 'Chris', 'Voss', 2017, 5, 'A former FBI hostage negotiator offers a new, field-tested approach to negotiating – effective in any situation.', 'neversplitthedifference_1595606592.jpg'),
(9, '9780367276881', '2020-07-24 15:05:30', '2020-07-24 15:05:30', 'Closing the Reading Gap', '14.72', 'Languages', 'Alex', 'Quigley', 2020, 25, 'Our pupils’ success will be defined by their ability to read fluently and skilfully. But despite universal acceptance of reading’s vital importance, the reading gap in our classroom remains.', 'readinggap_1595606730.jpg'),
(10, '9781426302862', '2020-07-24 15:10:37', '2020-07-24 15:10:37', 'Sharks (National Geographic Readers) (National Geographic Kids Readers: Level 2)', '3.96', 'Languages', 'Anne', 'Schreiber', 2008, 76, 'He’s quick. He’s silent. He has five rows of deadly teeth. Chomp! Meet the shark―the fish who ruled the deep before dinosaurs roamed the Earth!', 'sharks_1595607037.jpg'),
(11, '9780192764768', '2020-07-24 15:58:58', '2020-07-24 16:39:39', 'Read with Oxford: Stage 1: Julia Donaldson\'s Songbirds: Bob Bug and Other Stories', '8.30', 'Languages', 'Julia', 'Donaldson', 2018, 3, 'NoteWith a focus on building phonics skills, this collection includes twelve fun stories with colourful illustrations. It is ideal for children who are taking their first steps in reading.', 'phonicskills_1595610027.jpg'),
(12, '9781977749659', '2020-07-24 16:08:03', '2020-07-24 16:08:03', 'Unicorn Handwriting Practice: Letter Tracing Workbook (Little Learner Workbooks)', '5.99', 'Languages', 'Little Learner', 'Workbooks', 2017, 24, 'Are you looking for a fun way to improve your child\'s handwriting?\r\nParents and teachers agree that workbooks help to give children the skills that they need to be successful at school.', 'unicornhandwriting_1595610483.jpg'),
(13, '9780008134303', '2020-07-24 16:11:37', '2020-07-25 12:55:17', 'Comprehension Ages 5-7: Prepare for school with easy home learning (Collins Easy Learning KS1)', '2.64', 'Languages', 'Collins Easy', 'Learning', 2015, 0, 'An engaging Comprehension activity book to really help boost your child’s progress at every stage of their learning!', 'comprehension_1595611003.jpg'),
(14, '9781848549562', '2020-07-24 16:24:03', '2020-07-24 16:24:03', 'What If?: Serious Scientific Answers to Absurd Hypothetical Questions Kindle Edition', '8.19', 'Computing', 'Randall', 'Munroe', 2015, 8, 'From the creator of the wildly popular xkcd.com, hilarious and informative answers to important questions you probably never thought to ask.', 'whatif_1595611443.jpg'),
(15, '9781405288552', '2020-07-24 16:27:12', '2020-07-24 16:27:12', 'Minecraft Survival Sticker Book: An Official Minecraft Book From Mojang Paperback', '3.99', 'Computing', 'Mojang', 'AB', 2017, 105, 'The only official sticker book created in collaboration with Mojang! Take your first steps into the Overworld, and learn all about the perils that await with this official Mojang activity book, filled with survival tips, secret tricks and hundreds of stick', 'minecraft_1595611632.jpg'),
(16, '9780670921607', '2020-07-24 16:28:23', '2020-07-24 16:28:23', 'The Lean Startup: How Constant Innovation Creates Radically Successful Businesses', '10.32', 'Computing,Business', 'Eric', 'Ries', 2011, 32, 'Most new businesses fail. But most of those failures are preventable.\r\nThe Lean Startup is the approach to business that\'s being adopted around the world. It is changing the way companies are built and new products are launched.', 'leanstartup_1595611703.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_06_16_161545_create_books_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(7, '2020_07_19_100346_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardno` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderprice` double(8,2) NOT NULL,
  `orderquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `userid`, `username`, `address`, `cardno`, `orderprice`, `orderquantity`) VALUES
(1, '2020-07-25 11:01:05', '2020-07-25 11:01:05', 4, 'Elysia Moore', 'My address', '1234567891234567', 15.48, 2),
(2, '2020-07-25 11:07:35', '2020-07-25 11:07:35', 4, 'Chloe Wesley', 'dred', '1234567891234567', 7.71, 1),
(3, '2019-12-31 08:59:04', NULL, 5, 'Aaron Murphy', '34717 Stephan Trafficway\nNorth Damien, WI 17024', '2431613763980286', 59.62, 15),
(4, '2019-10-20 16:52:19', NULL, 4, 'Arnoldo Kuhlman', '56681 Ila Forks\nDuBuqueberg, KS 60499', '2656253403112715', 68.77, 9),
(5, '2020-04-11 11:51:44', NULL, 4, 'Reuben Boyer', '886 Abagail Groves Suite 540\nZanderfort, WI 12483', '5125139601010080', 50.72, 6),
(6, '2019-10-22 05:02:10', NULL, 5, 'Edwardo Bins V', '19982 Raheem Gateway Suite 686\nCarlosberg, TN 08136-3519', '5307062868830398', 30.81, 2),
(7, '2019-10-18 17:26:38', NULL, 5, 'Elta Mitchell', '7635 Elton View Suite 379\nEusebiofort, NV 91796', '4556614243423298', 29.23, 1),
(8, '2020-05-17 12:36:56', NULL, 4, 'Wilton Kilback', '106 Sidney Road\nTiatown, MO 51497', '2367259402249580', 67.29, 3),
(9, '2020-05-09 09:50:59', NULL, 5, 'Neal Will', '149 Dicki Spur\nLake Roxanneville, NV 06390-9823', '4485207083233301', 33.93, 13),
(10, '2019-11-01 21:38:58', NULL, 5, 'Santa Keebler', '176 Mraz Prairie\nSouth Shanel, ID 11575', '2432187344792063', 4.02, 7),
(11, '2019-12-18 17:49:28', NULL, 4, 'Miss Katrine King', '252 Swaniawski Shoal Apt. 765\nCartwrightview, AL 42654-4203', '2720682933095911', 43.39, 6),
(12, '2020-04-18 20:02:30', NULL, 5, 'Nikita Parisian', '5622 Delta Fall\nNorth Casey, ME 80541-6874', '5434335966914462', 60.67, 6),
(13, '2019-10-09 00:52:15', NULL, 4, 'Albina Mosciski', '99601 O\'Kon Skyway Apt. 044\nNew Allisonland, WA 59396', '2720690320749057', 29.74, 1),
(14, '2020-02-18 03:40:04', NULL, 4, 'Gudrun Marquardt', '445 Yvonne Stream Apt. 331\nGusikowskiview, NJ 29901-1530', '4556527902061110', 27.32, 12),
(15, '2020-02-13 06:17:31', NULL, 5, 'Garett O\'Connell', '51140 Gerhold Keys\nColliertown, PA 85437', '4125281819545011', 8.17, 14),
(16, '2020-03-22 15:10:32', NULL, 5, 'Miss Mellie Auer', '832 Shaylee Harbor Suite 618\nWest Freeman, NM 58396-5470', '6011045436272941', 30.55, 9),
(17, '2019-12-29 06:08:55', NULL, 5, 'Mr. Tobin Schoen', '8177 Torp Trail\nKulasberg, NE 40668', '6011127793429627', 17.46, 13),
(18, '2020-07-25 11:36:51', '2020-07-25 11:36:51', 4, 'Dave H', 'Thhe Burrows', '1234567891234567', 21.21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@astonbookstore.com', NULL, '$2y$10$8lsdTU9LoaxVe5fvVLleUuXOpkCCdHp4fNwWnBKfBmP01lqkSuGwC', 1, NULL, '2020-07-18 13:20:41', '2020-07-18 13:20:41'),
(3, 'libraryadmin', 'ladmin@astonbookstore.com', NULL, '$2y$10$Pm5MAyYkFDt1KnmJpubS4eyBOHeIP0W9K6QOSGNXp6L8VMHEanqAK', 1, NULL, '2020-07-18 14:01:45', '2020-07-18 14:01:45'),
(4, 'Dave', 'dave@aston.com', NULL, '$2y$10$oxcnD1FyedzZ/lXALtcXqepVj4F8/otm0S6iIC/SaIuZjtTTgyHf2', 0, NULL, '2020-07-18 14:01:45', '2020-07-18 14:01:45'),
(5, 'Alice', 'alice@aston.com', NULL, '$2y$10$B5OpooFbY0PvQD1ilv.IOOuQbo54wtDMC2z6qr72Yu/nh2aB7YJoS', 0, NULL, '2020-07-18 14:01:46', '2020-07-18 14:01:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_no_unique` (`ISBN_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
