-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2019 at 07:58 PM
-- Server version: 5.6.41
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
-- Database: `thomas_infra_plan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(199) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `year_month` varchar(199) NOT NULL,
  `uploaded_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(199) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_name` varchar(199) NOT NULL,
  `receivers` text NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `year_month` varchar(199) NOT NULL,
  `uploaded_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(199) NOT NULL,
  `option_img` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_img`) VALUES
(1, 'Monthly Reporting', 'ic_project_overview.png'),
(2, 'PROGRAMME', 'ic_programming.png'),
(3, 'COMMERICAL', 'ic_commercial.png'),
(4, 'HSQE', 'ic_engineering.png'),
(5, 'ENGINEERING', 'ic_hsqe.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(199) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `order`) VALUES
(3, 'North West Electrification', 6),
(5, 'Southall UTX', 2),
(6, 'Nexus', 3),
(7, 'ATC / Crossrail', 4),
(8, 'Great Western', 5),
(9, 'Birmingham DU', 7),
(10, 'Crown Point', 8),
(11, 'TFL Barking Switching', 9),
(12, 'Wales BBR', 10),
(13, 'Amco Tunnels', 11),
(14, 'Cambridge Sidings', 12),
(15, 'Ardwick', 13),
(16, 'Stevenage Turnback', 14);

-- --------------------------------------------------------

--
-- Table structure for table `project_permissions`
--

DROP TABLE IF EXISTS `project_permissions`;
CREATE TABLE `project_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `project_id` int(4) UNSIGNED NOT NULL,
  `project_name` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_permissions`
--

INSERT INTO `project_permissions` (`id`, `user_id`, `project_id`, `project_name`) VALUES
(17, 14, 3, ''),
(21, 13, 3, 'North West Electrification'),
(24, 12, 3, 'North West Electrification'),
(26, 12, 5, 'Southall UTX'),
(30, 17, 3, 'North West Electrification'),
(31, 17, 5, 'Southall UTX'),
(32, 14, 5, 'Southall UTX'),
(35, 12, 6, 'Nexus'),
(39, 20, 3, 'North West Electrification'),
(41, 20, 5, 'Southall UTX'),
(42, 20, 6, 'Nexus'),
(45, 22, 3, 'North West Electrification'),
(47, 22, 6, 'Nexus'),
(49, 21, 3, 'North West Electrification'),
(51, 21, 5, 'Southall UTX'),
(52, 21, 6, 'Nexus'),
(53, 21, 7, 'ATC / Crossrail'),
(54, 21, 8, 'Great Western'),
(55, 21, 9, 'Birmingham DU'),
(56, 21, 10, 'Crown Point'),
(57, 21, 11, 'TFL Barking Switching'),
(58, 21, 12, 'Wales BBR'),
(59, 21, 13, 'Amco Tunnels'),
(60, 21, 14, 'Cambridge Sidings'),
(61, 21, 15, 'Ardwick'),
(62, 21, 16, 'Stevenage Turnback'),
(65, 20, 7, 'ATC / Crossrail'),
(66, 20, 8, 'Great Western'),
(67, 20, 9, 'Birmingham DU'),
(68, 20, 10, 'Crown Point'),
(69, 20, 11, 'TFL Barking Switching'),
(70, 20, 12, 'Wales BBR'),
(71, 20, 13, 'Amco Tunnels'),
(72, 20, 14, 'Cambridge Sidings'),
(73, 20, 15, 'Ardwick'),
(74, 20, 16, 'Stevenage Turnback');

-- --------------------------------------------------------

--
-- Table structure for table `read_notification`
--

DROP TABLE IF EXISTS `read_notification`;
CREATE TABLE `read_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `read_notification`
--

INSERT INTO `read_notification` (`id`, `user_id`, `notification_id`, `created_at`, `updated_at`) VALUES
(1, 14, 23, '2018-12-12 16:45:00', '2018-12-12 16:35:08'),
(2, 20, 24, '2018-12-12 19:36:15', '2018-12-12 19:36:15'),
(3, 20, 24, '2018-12-12 19:36:44', '2018-12-12 19:36:44'),
(4, 20, 26, '2018-12-13 06:51:43', '2018-12-13 06:51:43'),
(5, 20, 23, '2018-12-13 06:51:49', '2018-12-13 06:51:49'),
(6, 20, 21, '2018-12-13 06:54:51', '2018-12-13 06:54:51'),
(7, 20, 21, '2018-12-13 06:55:12', '2018-12-13 06:55:12'),
(8, 20, 21, '2018-12-13 06:59:05', '2018-12-13 06:59:05'),
(9, 20, 26, '2018-12-13 21:11:05', '2018-12-13 21:11:05'),
(10, 20, 28, '2018-12-14 13:21:42', '2018-12-14 13:21:42'),
(11, 20, 28, '2018-12-27 21:52:46', '2018-12-27 21:52:46'),
(12, 20, 28, '2018-12-28 09:23:38', '2018-12-28 09:23:38'),
(13, 20, 28, '2019-01-01 09:44:25', '2019-01-01 09:44:25'),
(14, 20, 28, '2019-01-02 17:11:49', '2019-01-02 17:11:49'),
(15, 20, 28, '2019-01-02 17:24:46', '2019-01-02 17:24:46'),
(16, 20, 34, '2019-01-02 21:59:29', '2019-01-02 21:59:29'),
(17, 20, 39, '2019-01-10 02:43:59', '2019-01-10 02:43:59'),
(18, 20, 39, '2019-01-10 16:47:25', '2019-01-10 16:47:25'),
(19, 20, 39, '2019-01-10 17:08:13', '2019-01-10 17:08:13'),
(20, 20, 40, '2019-01-11 06:37:01', '2019-01-11 06:37:01'),
(21, 20, 40, '2019-01-11 06:38:51', '2019-01-11 06:38:51'),
(22, 20, 40, '2019-01-11 06:43:21', '2019-01-11 06:43:21'),
(23, 20, 40, '2019-01-11 06:43:55', '2019-01-11 06:43:55'),
(24, 20, 41, '2019-01-11 16:58:53', '2019-01-11 16:58:53'),
(25, 20, 42, '2019-01-15 07:29:15', '2019-01-15 07:29:15'),
(26, 20, 44, '2019-01-16 01:58:14', '2019-01-16 01:58:14'),
(27, 20, 44, '2019-01-16 02:00:21', '2019-01-16 02:00:21'),
(28, 20, 44, '2019-01-16 02:02:49', '2019-01-16 02:02:49'),
(29, 20, 45, '2019-01-16 02:24:19', '2019-01-16 02:24:19'),
(30, 20, 40, '2019-01-16 02:24:33', '2019-01-16 02:24:33'),
(31, 20, 45, '2019-01-16 02:25:35', '2019-01-16 02:25:35'),
(32, 21, 50, '2019-01-16 16:40:07', '2019-01-16 16:40:07'),
(33, 21, 55, '2019-01-17 08:35:15', '2019-01-17 08:35:15'),
(34, 21, 56, '2019-01-17 19:50:23', '2019-01-17 19:50:23'),
(35, 21, 59, '2019-01-26 08:46:53', '2019-01-26 08:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(199) NOT NULL,
  `setting_value` varchar(199) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'ref_year_month', '2019-01', '2019-01-25 14:21:05', '2019-01-25 14:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `user_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 NOT NULL,
  `company` varchar(191) CHARACTER SET utf8 NOT NULL,
  `password` varchar(191) CHARACTER SET utf8 NOT NULL,
  `encriptp` varchar(191) CHARACTER SET utf8 NOT NULL,
  `user_type` int(11) NOT NULL,
  `isActived` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `company`, `password`, `encriptp`, `user_type`, `isActived`, `remember_token`, `time`) VALUES
(12, 'jci', 'jci', 'jci@outlook.com', 'Jinung', '$2y$10$oK9mZQ31cEFn700iwioZFOZa8in8S8Fv6rzdP7UeIklHDVn7XHf.C', 'c360fe775245342e74a483edc97831fa', 1, 0, NULL, '2018-11-29 13:44:11'),
(13, 'kwj', 'kwj', 'kwj@outlook.com', 'Jinung', '$2y$10$Go9wke2LX8.Tulw4aX87rONxyrBz6Gv8xc7uo.HblpejSewDAxZQS', '8566f841ee7e0ace2ba6cfae98e3a87e', 2, 1, 'McDsRUtxjrDXaZ57RUVNINdUPkhdQighMrCAMenO6kBYUuGxqq2TSLdmA5UO', '2018-11-29 13:44:29'),
(14, 'ksy', 'ksy', 'ksy@outlook.com', 'Jinung', '$2y$10$wg7WUthF66J7XowIMZjVNuI771nzTKby.j1y8qGrScycbVfvCwmMy', 'dd9e5ceb62872be3c3cfbf9b083eb75a', 1, 1, NULL, '2018-11-29 13:44:48'),
(16, 'xxx', 'xxx', 'xxx@outlook.com', 'Jinung', '$2y$10$tTe/8i1e8WM8XKrPEJ98WugXM.O.aZlQi69czrh4g72DH8/KGg7aW', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 1, 1, NULL, '2018-11-29 18:41:34'),
(17, 'xxx1', 'xxx1', 'xxx1@outlook.com', 'Jinung', '$2y$10$1cBk4o/5VTNDA/XsYggVJ.ms0qNr4P9JyEcjNv3o5Za5lvqXN2a3a', '945220b105cb4c8af2f829c1b25f2069', 1, 1, NULL, '2018-11-30 02:53:21'),
(18, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$S4FbZbhcMoQbznGO5L4GCeOPIQCf20wIQyVXgNumX4XHuH3Zeehlm', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 'YdgUKzyiBHfmLpoPiihoAFHsoO8tITUDwMeezb7ZHjX1l0uMVvrUljkiFF0v', '2018-12-04 08:56:51'),
(19, 'alex', 'alex', 'alex@gamil.com', 'alex', '$2y$10$jj4NEZcPh.5TZsu8RPSiDe4H397xzk36kF40N0bpPj17Q/nOXN8ii', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2018-12-04 18:55:08'),
(20, 'Alex', 'Alex', 'tester@gmail.com', 'jdx', '$2y$10$xQe2au1/ptemi7JOzG5rguX/0MgqOjd3IA6Pe011sYRpyIfIfc7jm', '47bce5c74f589f4867dbd57e9ca9f808', 1, 1, NULL, '2018-12-12 01:30:11'),
(21, 'Tom', 'Gouldburntom', 'Gouldburntom@googlemail.com', 'infraplan', '$2y$10$W1JO9ThF4KkjCRHhDuE8De0T9Q21nbqD/VN/M21.D.JYp1nA6.EcW', '29aa7acafb73866d6571e1a72f46c146', 1, 1, NULL, '2019-01-03 11:21:30'),
(22, 'mark brookes', 'brookesm', 'markbrookes91@gmail.com', 'keltbray', '$2y$10$YRbXZMKn.sZZ0ynleSUg5.UAFtCLkaTEN3zV6ah1V0/KDNwnjz5Oe', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1, 1, NULL, '2019-01-04 11:20:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_noti` (`project_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_permissions`
--
ALTER TABLE `project_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_permission` (`project_id`);

--
-- Indexes for table `read_notification`
--
ALTER TABLE `read_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_permissions`
--
ALTER TABLE `project_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `read_notification`
--
ALTER TABLE `read_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `project_noti` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_permissions`
--
ALTER TABLE `project_permissions`
  ADD CONSTRAINT `project_permission` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
