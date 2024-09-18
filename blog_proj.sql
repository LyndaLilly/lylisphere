-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 05:11 AM
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
-- Database: `blog_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 28, 21, 'hello', '2024-09-15 19:41:42'),
(2, 28, 22, 'now', '2024-09-15 19:56:43'),
(3, 32, 20, 'hello', '2024-09-15 21:28:44'),
(4, 17, 20, 'nice post', '2024-09-15 21:52:08'),
(5, 33, 20, 'good', '2024-09-15 21:52:36'),
(6, 17, 20, 'hi', '2024-09-15 22:59:48'),
(7, 17, 20, 'what', '2024-09-15 23:00:52'),
(8, 17, 20, 'you', '2024-09-15 23:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created_at`, `user_ip`) VALUES
(2, 28, NULL, '2024-09-15 19:54:09', '::1'),
(4, 17, 22, '2024-09-15 19:55:59', NULL),
(5, 28, 22, '2024-09-15 19:56:20', NULL),
(11, 32, 20, '2024-09-15 21:28:31', NULL),
(13, 32, NULL, '2024-09-15 21:41:31', '::1'),
(14, 33, NULL, '2024-09-15 21:49:57', '::1'),
(15, 28, 20, '2024-09-15 21:52:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `author` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_edited` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `category`, `img`, `publish`, `date_created`, `date_edited`) VALUES
(17, 'updated', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi maiores, velit accusantium quasi quae dolore qui tempore delectus exercitationem architecto totam et minus possimus ratione? Ipsam officiis animi cum culpa.\r\n    Adipisci optio a autem neque nisi culpa numquam in voluptates nemo sapiente, praesentium ducimus dignissimos minus error corporis vitae beatae ipsum mollitia. Perspiciatis explicabo voluptatum deserunt a, omnis aliquam labore?\r\n    Mollitia cupiditate quam dolorem sapiente quaerat odit repellendus vero fuga consectetur obcaecati iure reiciendis natus, laudantium perferendis dicta minus labore aliquid sint libero vel? Perferendis possimus tempora maiores at in.\r\n    Saepe iusto ducimus odit assumenda, debitis facilis sunt animi architecto. Facilis enim odio eveniet quia ut, necessitatibus magnam adipisci nulla. Deserunt fugit exercitationem vitae nam commodi iusto quisquam quae asperiores?\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam veniam amet quam alias magni autem laudantium corporis sunt tempora. Placeat voluptates cupiditate dolore? Debitis totam laborum dolorem dicta quasi recusandae.\r\nTenetur commodi consequuntur iusto atque quas! Quidem quia facere non ullam, magni rem? Rerum distinctio, rem, iure quia ad neque voluptatem, nisi natus asperiores ullam vero accusamus magnam doloremque recusandae.\r\nLaborum incidunt ut reiciendis repellendus nobis? Iste impedit nulla et enim, perferendis vero corporis eaque voluptate aliquam rem reiciendis nesciunt eum quis voluptas velit, dolores maxime totam doloremque accusamus qui!\r\nQuod sequi omnis, culpa, sed delectus in non doloribus veniam quidem modi error debitis similique nihil repellat. Alias, sapiente! Earum quia doloribus vel blanditiis aliquam nobis minus ipsa quibusdam unde.\r\nEnim consectetur quasi, id maiores suscipit eveniet commodi magnam eius recusandae ratione hic reiciendis corporis adipisci iste? Officiis veritatis temporibus nam, accusantium excepturi minima voluptatem sit cumque ex, deserunt tenetur!\r\nVel, quas consequatur aut debitis odit laborum suscipit quis maxime eius facere quidem iusto accusamus porro quo sequi expedita temporibus accusantium amet dolores, labore culpa explicabo, quasi voluptates. Temporibus, alias!\r\nRem pariatur impedit, asperiores adipisci quidem commodi illo repellat quaerat voluptatem obcaecati odio molestiae et, doloremque harum omnis vel quam atque nostrum. Sunt quaerat laboriosam totam illo sequi cupiditate ipsa.\r\nProvident, ullam. Quo incidunt a dolorem natus ex harum modi sed amet nostrum tempore nihil reiciendis voluptatem saepe dicta blanditiis vero, nulla ipsa veniam earum soluta ducimus, libero tempora. Nisi.\r\nCumque sunt quos illo quibusdam, perspiciatis nam quisquam maxime explicabo quae officiis fugiat dolorem consequatur sequi nisi mollitia reprehenderit harum consectetur assumenda. Atque esse nihil quaerat nobis mollitia veritatis eligendi?\r\nIpsam illum at autem perferendis quaerat rerum nesciunt, beatae aspernatur perspiciatis eligendi natus. Distinctio porro molestiae deserunt accusantium hic necessitatibus delectus, tenetur unde odit? Inventore voluptate ipsum minus quaerat asperiores?', 20, 'News', 'uploads/17259873021725547291post_5.png', 1, '2024-09-15 21:50:41', '0000-00-00 00:00:00'),
(28, 'another post', 'lorem', 21, 'Sports', 'uploads/17258908411725547318single_blog_5.png', 1, '2024-09-15 21:50:38', '0000-00-00 00:00:00'),
(32, 'mypost', 'loremsed', 22, 'News', 'uploads/17264305491722932648laptop-2.webp', 1, '2024-09-15 20:03:32', '0000-00-00 00:00:00'),
(33, 'just today', 'lorems', 20, 'Gossip\r\n', 'uploads/17264349291722418596camera-1.webp', 1, '2024-09-15 21:15:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_blog`
--

CREATE TABLE `user_blog` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `confirm` text NOT NULL,
  `access` varchar(200) NOT NULL DEFAULT 'guest',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_blog`
--

INSERT INTO `user_blog` (`id`, `username`, `email`, `password`, `confirm`, `access`, `created_at`, `reset_token`, `token_expires_at`) VALUES
(20, 'admin', 'admin@gmail.com', '$2y$10$qYV0LIsAPOPByrFN6eU1VOUXuIdX.qYCF7PndCfI/N4Ja92QyLT9G', '', 'admin', '2024-08-27 08:39:02', NULL, NULL),
(21, 'Hannah', 'hannah@gmail.com', '$2y$10$sn.HNPkYjO/hklygpFvSuuPM/GuRCw1xKPcawyj2vNcMGLBYojUWq', '', 'guest', '2024-09-09 13:19:09', NULL, NULL),
(30, 'Ada', 'lilianlynda@gmail.com', '$2y$10$NfLYB/E/PV38oWNhC/7Ew.9uSiXLEStUbaqcE1xzdV8rn8MeBtZ1W', '', 'guest', '2024-09-17 13:05:38', NULL, NULL),
(31, 'Obinna', 'lilianlynda22@gmail.com', '$2y$10$l1uQfd.4eWfkCj7Oh5trUenvBTY8HSRIlaf973EBG./8ZPa9uLlIa', '', 'guest', '2024-09-17 13:06:46', NULL, NULL),
(34, 'Okoye', 'lillylynda2015@gmail.com', '$2y$10$ZKRLtD.4pddn7HIUDiI65...HdhEpoqVdBDTR7JhIAekDjhcPmFtC', '', 'guest', '2024-09-18 02:54:42', '708ecb', '2024-09-18 04:54:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `likes_ibfk_1` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`author`);

--
-- Indexes for table `user_blog`
--
ALTER TABLE `user_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_blog` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_blog` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
