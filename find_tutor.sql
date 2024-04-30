-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 11:03 AM
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
-- Database: `find_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Physics', 1, NULL, NULL),
(2, 'Chemistry', 1, NULL, NULL),
(3, 'Math', 1, NULL, NULL),
(4, 'Biology', 1, NULL, NULL),
(5, 'Higer Math', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'One', 1, NULL, NULL),
(2, 'Two', 1, NULL, NULL),
(3, 'Three', 1, NULL, NULL),
(4, 'Four', 1, NULL, NULL),
(5, 'Five', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_01_141329_create_categories_tabel', 1),
(5, '2024_04_01_141503_create_class_types_tabel', 1),
(6, '2024_04_01_142205_create_tutions', 1),
(7, '2024_04_02_081241_alter_jobs_table', 1),
(8, '2024_04_02_100558_alter_jobs_table', 1),
(9, '2024_04_03_080925_create_tution_applications_table', 2),
(10, '2024_04_04_060547_create_saved_tutions_table', 3),
(11, '2024_04_29_080814_alter_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_tutions`
--

CREATE TABLE `saved_tutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tution_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_tutions`
--

INSERT INTO `saved_tutions` (`id`, `tution_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 27, 7, '2024-04-04 00:31:26', '2024-04-04 00:31:26'),
(3, 24, 7, '2024-04-04 00:43:16', '2024-04-04 00:43:16'),
(4, 25, 7, '2024-04-04 00:44:22', '2024-04-04 00:44:22'),
(5, 21, 7, '2024-04-04 01:09:24', '2024-04-04 01:09:24'),
(6, 19, 7, '2024-04-04 01:09:40', '2024-04-04 01:09:40'),
(7, 14, 3, '2024-04-04 02:34:30', '2024-04-04 02:34:30'),
(8, 27, 3, '2024-04-29 05:38:42', '2024-04-29 05:38:42'),
(9, 27, 10, '2024-04-29 05:40:49', '2024-04-29 05:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bozmEUd7HCliuPmauFetUj3GVfJFSHUB6zPGb5Cg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnlpTGtYV1JRQXBMZ2hPeERPZFVSZ1cwcnQ0Y3FNNnV1aGlqYkZ6OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2xvZ2luIjt9fQ==', 1714391065);

-- --------------------------------------------------------

--
-- Table structure for table `tutions`
--

CREATE TABLE `tutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `class_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_stu` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `gurdian_name` varchar(255) NOT NULL,
  `gurdian_location` varchar(255) DEFAULT NULL,
  `gurdian_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutions`
--

INSERT INTO `tutions` (`id`, `title`, `category_id`, `class_type_id`, `user_id`, `no_of_stu`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `experience`, `gurdian_name`, `gurdian_location`, `gurdian_number`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(2, 'German Lebsack', 1, 3, 3, 3, '9597', 'Port Jake', 'Delectus aut laborum ullam et sapiente quia. Beatae sint officia porro amet porro aut in.', NULL, 'Dignissimos amet ipsam hic soluta illo recusandae quae. Et mollitia reprehenderit tempora molestiae. At alias quia aspernatur a nihil libero architecto recusandae.', 'Et quod nisi aut enim beatae quasi. Dolor rerum rem perspiciatis quo voluptatem aut. Officiis nemo nostrum reprehenderit sed. Dolor incidunt enim quasi eos sunt dicta tenetur.', '2', 'Chet Howe Sr.', NULL, 'Qui natus quisquam nostrum corrupti dolorem explicabo. Id quia aliquid delectus. Dolorum ducimus quae ipsa porro dolor quis eos.', 1, 1, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(3, 'Zora Toy', 5, 2, 3, 4, '4592', 'Port Leoraburgh', 'Deleniti et eveniet impedit aut qui aut voluptatem. Distinctio similique odit alias cum. Ea similique cupiditate eaque est est voluptate. Nesciunt facilis praesentium aut nostrum.', NULL, 'Magnam est aut vitae cumque in iusto. Tenetur sint rerum atque voluptatum ut maxime. Consequuntur qui nemo quam.', 'Vel quam eos et quo occaecati rerum. Nobis quo quo eos dolorem modi eos. Illo ut expedita labore sapiente rem aut. Qui quibusdam dolorem molestiae ipsa.', '1', 'Mathew Schuster', NULL, 'Sunt dolor saepe omnis esse qui ut et ea. Qui mollitia expedita natus tempora corporis ut debitis. Expedita et quo facere repudiandae sint rerum.', 1, 1, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(4, 'Miss Frances Von', 2, 5, 3, 1, '3152', 'New Alexandrea', 'Quas impedit impedit vel perspiciatis repellendus. Quia ad repudiandae assumenda omnis molestiae. Alias ut eos sit omnis soluta expedita non sint.', NULL, 'Eum consequatur et tempora ab quam aut atque. Natus aut nesciunt aut. Accusantium enim beatae nam et enim dignissimos tempora qui.', 'Deleniti quis pariatur est sed. Sapiente in dolore molestias vel.', '1', 'Izaiah Hills', NULL, 'Magnam et suscipit dolorem. Odit voluptatem adipisci voluptatibus et sit. Aut doloribus porro quibusdam in alias.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(5, 'Prof. Chelsey Bashirian V', 3, 3, 3, 2, '3889', 'South Aric', 'Eius molestias consequuntur iure quibusdam. Magni ut impedit qui laboriosam animi ipsa iste error. Magni qui eveniet enim eum.', NULL, 'Rerum ea nisi voluptatem quod. Aut odio consectetur tempora voluptatem. Dolore vitae quia ut tempora illo.', 'In et et at. Possimus alias totam magni officia eius velit voluptatem. Corrupti iure animi maiores molestiae. Vel ratione est aut et nulla laborum.', '5', 'Leopoldo Becker', NULL, 'Nihil tempora quidem aspernatur tempore consequatur laudantium. Et aut consectetur quos ut. Magni earum quidem debitis aliquid fuga rerum minus. Minima laudantium a qui autem id.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(6, 'Dewayne Boehm DDS', 5, 1, 3, 4, '7139', 'Port Henrichester', 'Esse autem aut earum ab. Eum voluptates sed ut aut. Modi omnis eum aliquam aut quidem omnis. Nostrum quisquam tempora sequi dolorum dolores eos. Autem nihil et ut rem quaerat natus natus.', NULL, 'Commodi omnis nemo officiis accusantium vero. Alias aut dolores expedita et quas sit amet.', 'Et soluta id aliquam nostrum non error quos. Assumenda eligendi quae iusto. Reprehenderit aliquam accusamus ut. Quos ut hic numquam nulla corporis.', '4', 'Rachael Hodkiewicz', NULL, 'Ut molestiae excepturi in atque. Expedita ea et explicabo sint voluptatem. Placeat minima dignissimos voluptatem id enim enim ut et. Deleniti est eum ut. Fuga doloremque impedit dolorem ab.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(7, 'Braden Blanda', 1, 5, 3, 2, '4580', 'Skilesbury', 'Vel eveniet officia quod. Quas dolore excepturi nulla autem quia. Qui veniam odit soluta exercitationem aut accusantium ex.', NULL, 'Quidem praesentium quis laboriosam nihil voluptatem veritatis. Numquam mollitia consequuntur sequi et sunt. Ex adipisci et libero dolor accusantium. Eum libero ab eaque ipsa nihil enim.', 'Tempore rerum fugiat repellendus qui consequatur mollitia. Quae dolorum sed atque voluptatibus eum. Enim ea aut sunt quae eum iusto totam.', '5', 'Lelia Hegmann', NULL, 'Aut eum quaerat voluptas aliquam in sed veritatis. Et qui ipsa eum assumenda et dolorum. Et occaecati laudantium doloribus reiciendis porro voluptate laudantium.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(8, 'Sister Auer', 3, 5, 3, 2, '5834', 'East Rociomouth', 'Recusandae accusamus eligendi adipisci vel. Nulla dolorum distinctio quaerat asperiores. Consectetur aut sunt fuga illo dolores. Reprehenderit asperiores qui non illo maiores.', NULL, 'Odit est consequatur modi adipisci mollitia laborum rerum illo. Omnis rerum dignissimos voluptatem. Rerum labore libero perspiciatis explicabo.', 'Reprehenderit deserunt assumenda recusandae accusantium iusto unde aut. Repudiandae occaecati unde ab officiis exercitationem placeat. Nihil ex ad quia quo cum.', '5', 'Aliza Ziemann', NULL, 'Qui sed ut in et. Sit voluptas non enim quisquam rerum magnam dignissimos. Ut doloremque labore in est magnam aspernatur unde eveniet. Et molestiae necessitatibus quis ut nisi occaecati beatae.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(9, 'Rogelio O\'Reilly', 1, 3, 3, 1, '8456', 'Stoltenbergland', 'Eveniet rerum ut aut odio et. Quo quia itaque nostrum minus explicabo et et.', NULL, 'Et ea a commodi eligendi quisquam. Sed excepturi modi et quis quia. Officiis consequatur ex laborum quas nisi sequi. Sit dolores non qui rerum nihil. In reiciendis perferendis quasi dolores et.', 'Ipsam dolorem animi enim voluptas alias. Consequatur dolores molestiae ipsum et voluptatem. Eaque velit expedita facilis eaque. Numquam id est consequatur iure molestias et.', '2', 'Aubrey Prohaska', NULL, 'Quod impedit necessitatibus cupiditate. Qui libero voluptatem autem placeat incidunt voluptatibus laudantium. Omnis magnam velit est eum est esse.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(10, 'Gianni Wuckert Sr.', 2, 1, 3, 3, '9472', 'Haleyfurt', 'Dolores nostrum aperiam quia repudiandae sit. Labore vel a quidem dolorem error velit necessitatibus aperiam. Non quia voluptates repudiandae. Placeat sit veniam natus sunt eum aut.', NULL, 'Explicabo dolore rerum qui. Praesentium libero voluptatem asperiores excepturi nisi minus amet tempora. Cum voluptatem et alias nihil officiis.', 'Consequatur repellat possimus dolores dolor vero. Alias atque quas aperiam qui est consequatur. Molestiae aut quia harum molestias quis labore.', '5', 'Jarrod Quitzon', NULL, 'Consequatur soluta voluptatem velit ratione quidem id. In assumenda fugit voluptas a non voluptatibus blanditiis. Sint velit aliquid vitae recusandae dignissimos ut reprehenderit.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(12, 'Prof. Leo Kuvalis IV', 2, 3, 3, 3, '3832', 'New Melyna', 'Molestias adipisci sequi ab voluptatem nostrum quia quisquam asperiores. Et iusto et tempore voluptatem. Quo corporis porro dolorem est omnis temporibus nemo sequi.', NULL, 'Quae quis ex accusamus sit ea quis quia voluptatem. Totam et molestiae molestias repudiandae eum repellat blanditiis. Eaque nostrum placeat ab a esse impedit officia qui.', 'Asperiores similique at sequi atque. Repudiandae minima quis architecto nihil minima quo. Ratione esse iusto quisquam deleniti. Saepe neque cumque sint repellendus in.', '3', 'Lawson Kling DVM', NULL, 'Accusantium rerum qui cum praesentium voluptatem praesentium alias itaque. Ut autem iusto voluptatum laudantium molestiae id sint ipsum. Animi non perferendis tempore sint.', 1, 1, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(13, 'Christ Hills', 5, 2, 3, 1, '8527', 'East Elodymouth', 'Consequatur earum placeat ut repellat voluptatum. Et sunt eos nostrum qui officia aut.', NULL, 'Id quia aut id commodi. Minus culpa fuga tempore et aut minus ipsam maiores. Atque sed accusantium maxime maxime nihil. Nihil quidem at possimus et porro voluptas aut praesentium.', 'Fuga magnam itaque animi perspiciatis ab. Sed natus autem voluptatem alias iure provident. Qui ipsum mollitia soluta earum.', '3', 'Dr. Juliana Emmerich', NULL, 'Dolor porro eveniet nemo. Consequatur assumenda eaque ut eos error qui blanditiis. Accusantium iusto qui harum soluta.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(14, 'Arvid Murray', 3, 3, 3, 4, '9973', 'Lolitamouth', 'Est molestiae esse recusandae quas rem laudantium. Et et molestiae qui excepturi error esse a. Ipsam occaecati error debitis ea.', NULL, 'Earum enim nihil et consequatur commodi. Dolore tempora exercitationem sunt excepturi quis iure quo.', 'Iure placeat a possimus modi velit earum soluta autem. Expedita voluptatem sapiente reiciendis dolorem voluptatem libero dolor. Earum hic minima vel quibusdam incidunt.', '1', 'Kaelyn O\'Hara Sr.', NULL, 'Unde error ipsum velit voluptas rerum. Tenetur harum est sit quia minus porro voluptatem quia. Id dolores velit odio explicabo. Quidem ratione enim quod soluta.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(15, 'Dr. Kristoffer Fisher', 4, 5, 3, 1, '6597', 'Elainatown', 'Velit ullam sunt exercitationem adipisci iste ut. Qui sed labore ut aliquid rerum quidem fugiat.', NULL, 'Aut fugit non consequatur et. Sit tempora in corrupti. Praesentium aspernatur voluptates aut asperiores quasi officiis.', 'Velit temporibus ea molestiae quam in. A minima rerum vitae. Sed est porro sint sunt mollitia nobis. Voluptatem est aut hic quis.', '5', 'Jesus Dooley', NULL, 'Vel velit odio corrupti dolor ut ducimus inventore. Autem voluptates voluptatibus sit reiciendis autem aut iure. Sint maxime quod ut est perferendis reprehenderit officia rem.', 1, 1, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(16, 'Dr. Walter Herzog', 2, 2, 3, 3, '4689', 'Hellerchester', 'Et temporibus est in porro. Cumque in optio sunt in est voluptatem exercitationem. Explicabo quia non autem vel sequi. Maiores eveniet accusantium et incidunt quo minus maiores.', NULL, 'Perspiciatis nisi enim quia sapiente quia aliquam. Quasi velit consequatur sequi ex autem. Odio quos quaerat ratione adipisci qui maxime a. Molestias tempora facere officia culpa.', 'Itaque eius enim ut ratione at reprehenderit illo. Expedita enim quo delectus unde asperiores sit. Reprehenderit eveniet ex animi commodi est vitae accusantium eum.', '1', 'Jed Stiedemann Jr.', NULL, 'Asperiores porro non omnis vero rem. Sit cupiditate adipisci ipsa vero iure labore in possimus. Itaque dolor eum dolore nihil corporis.', 1, 0, '2024-04-02 06:01:36', '2024-04-02 06:01:36'),
(17, 'Home Tutor Best', 3, 1, 3, 3, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS,BsC', '3', 'Abul AA', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:15:04', '2024-04-02 09:15:04'),
(18, 'Home Tutor Best', 3, 1, 3, 3, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS,BsC', '3', 'Abul AA', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:15:13', '2024-04-02 09:15:13'),
(19, 'Home Tutor Best', 3, 1, 3, 3, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS,BsC', '3', 'Abul AA', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:15:14', '2024-04-02 09:15:14'),
(20, 'Home Tutor Best', 3, 1, 3, 3, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS,BsC', '3', 'Abul AA', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:15:15', '2024-04-02 09:15:15'),
(21, 'Home Tutor Best', 3, 1, 3, 3, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS,BsC', '3', 'Abul AA', 'Shibbari', '12345678909', 1, 1, '2024-04-02 09:15:19', '2024-04-02 09:15:19'),
(22, 'Home Tutor', 3, 1, 3, 1, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS', '3', 'Abul', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:16:53', '2024-04-02 09:16:53'),
(23, 'Home Tutor', 3, 1, 3, 1, '5000Tk', 'Khulna', 'too week in math', 'Nothisb', '3 days per week, 1 hour per day', 'HCS', '3', 'Abul', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:16:54', '2024-04-29 05:26:12'),
(24, 'Home Tutor', 3, 1, 3, 1, '5000Tk', 'Khulna', 'too week in math', NULL, '3 days per week, 1 hour per day', 'HCS', '3', 'Abul', 'Shibbari', '12345678909', 1, 0, '2024-04-02 09:18:24', '2024-04-02 09:18:24'),
(25, 'Admission Tution', 5, 1, 3, 3, '10K', 'ModernMore,Khulna', 'There is the three andmission candidate .', NULL, '3 days in week, 1 hour per day', 'Must be KUETina', '3', 'Mr x', 'Shibbari', '017777777777', 1, 1, '2024-04-02 13:45:46', '2024-04-02 13:47:07'),
(27, 'Tirtho Mondal (Updated)', 1, 5, 3, 1, '5000Tk', 'Moylapota', 'Tr  djfnerk fijjdfn efjn fdiufd iofhsad fn dahufbasduhfbd fuihfasf ddsjfbds fjisdf dfidsj fnds fiuds fsdfdnf dsiuv', 'adsmf dkjsfdfjd fd fiud fdsjjbfa jdsbfah oi sdfsjdbf saidbfdshbf asjdnfjsd f adsjnfiuasdfds', 'dsdkofdogbhgd bvxiudfudjuy7ewf hudgwne dewidhqew qhgefq kfjqiuifadsf', 'reter feroriren retryytrh', '4', 'CSEEE', 'KUET, Khulna', '12345678909', 1, 1, '2024-04-02 23:44:53', '2024-04-29 05:30:33'),
(28, 'Admiss09876', 4, 1, 3, 5, '5000Tk', 'Khulna', 'sdfghjkjhgfdsert56 trtyjhgfd ssrttytyjtrefwd reer\r\ncv cm \r\ndiofjid diufhd  djfn oidfn', 'djfnd dijfn iu eruifr aej \r\na fdsjfiua diuuf \r\na fjiaf eiuf d\r\n adsjifads', 'sdfkodkf\r\n\r\n fkomeomf', 'rkfmowerf \r\n\r\nerofkr foerf', '3', 'Khlaaaaaaa', 'thre main tne diof djnfd af', '121212121212', 1, 0, '2024-04-02 23:59:01', '2024-04-29 05:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `tution_applications`
--

CREATE TABLE `tution_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tution_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tution_applications`
--

INSERT INTO `tution_applications` (`id`, `tution_id`, `user_id`, `tutor_id`, `applied_date`, `created_at`, `updated_at`) VALUES
(13, 23, 7, 3, '2024-04-03 04:03:42', '2024-04-03 04:03:42', '2024-04-03 04:03:42'),
(14, 28, 7, 3, '2024-04-03 04:04:13', '2024-04-03 04:04:13', '2024-04-03 04:04:13'),
(15, 3, 7, 3, '2024-04-03 22:35:51', '2024-04-03 22:35:51', '2024-04-03 22:35:51'),
(17, 27, 7, 3, '2024-04-03 23:48:03', '2024-04-03 23:48:03', '2024-04-03 23:48:03'),
(18, 27, 8, 3, '2024-04-04 02:16:35', '2024-04-04 02:16:35', '2024-04-04 02:16:35'),
(19, 27, 10, 3, '2024-04-29 05:40:56', '2024-04-29 05:40:56', '2024-04-29 05:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'aassdj', 'xu@gmail.com', NULL, '$2y$12$1u5wDsZo9Kr8oa/XUwP8..IoeuNiYyUAJ2uVTPBaO4Uin6w/yXOeq', '3-1712067910.png', 'wertyu', '98y4635', 'admin', NULL, '2024-04-02 04:51:14', '2024-04-29 03:39:34'),
(5, 'Tirtho Mondal', 'tirthomondal.201@gmail.com', NULL, '$2y$12$uHvel.qRaKnAKiAX4c3WmOr4jjAFfz5qi.Gdxbb9JLWDsapQkj0yu', NULL, NULL, '01571421684', 'user', NULL, '2024-04-02 04:55:54', '2024-04-02 04:55:54'),
(6, 'cse <<< AAAA', 'cse@kuet', NULL, '$2y$12$qul/6el5JMTJr4Qadpxecu5qPHcC5J0.uGVwNIVfjnANKPuzVwVOS', NULL, 'khulns', 'asdfgh121212', 'user', NULL, '2024-04-02 10:02:46', '2024-04-02 10:14:59'),
(7, 'aassdj', 'x@gmail.com', NULL, '$2y$12$f7UJU5hKuMBsgdqAD6Pp7OvBUPFzdbu0ytE.3ctuFgUV4KxvZHtbG', NULL, 'wertyu', '012332824434', 'user', NULL, '2024-04-02 13:52:18', '2024-04-05 23:55:39'),
(10, 'xyz', 'xyz@gmail.com', NULL, '$2y$12$QJyJvVQt2hfod4rY.JdiQuzaIM/ZjqDKoppPPjX5iy034qw6JJ3PG', NULL, NULL, NULL, 'user', NULL, '2024-04-29 05:40:18', '2024-04-29 05:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `saved_tutions`
--
ALTER TABLE `saved_tutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_tutions_tution_id_foreign` (`tution_id`),
  ADD KEY `saved_tutions_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tutions`
--
ALTER TABLE `tutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutions_category_id_foreign` (`category_id`),
  ADD KEY `tutions_class_type_id_foreign` (`class_type_id`),
  ADD KEY `tutions_user_id_foreign` (`user_id`);

--
-- Indexes for table `tution_applications`
--
ALTER TABLE `tution_applications`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saved_tutions`
--
ALTER TABLE `saved_tutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tutions`
--
ALTER TABLE `tutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tution_applications`
--
ALTER TABLE `tution_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_tutions`
--
ALTER TABLE `saved_tutions`
  ADD CONSTRAINT `saved_tutions_tution_id_foreign` FOREIGN KEY (`tution_id`) REFERENCES `tutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_tutions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutions`
--
ALTER TABLE `tutions`
  ADD CONSTRAINT `tutions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutions_class_type_id_foreign` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
