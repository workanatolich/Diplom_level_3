-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2021 г., 04:49
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--
CREATE DATABASE IF NOT EXISTS `project_level_3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_level_3`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'no_category'),
(2, 'example_category');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `text`, `image`, `category_id`, `user_id`, `status_id`) VALUES
(1, 'Martina Connelly', 'Incidunt cupiditate incidunt dolor et libero.', 'Expedita consequatur quia reiciendis. Numquam est sed consequuntur nihil natus autem perspiciatis.', '/img/default/product.png', 1, 1, 1),
(2, 'Miss Marietta Rosenbaum MD', 'Tempora reiciendis sit reprehenderit animi aut modi enim.', 'Voluptatem omnis cumque eaque quia. Eos et sequi qui. Vero sed et sed voluptatum hic velit minus.', '/img/default/product2.png', 2, 1, 1),
(3, 'Dale Christiansen', 'Necessitatibus itaque recusandae consequatur ratione.', 'Voluptate ad non culpa. Eligendi a aut ad neque quos.', '/img/default/product1.png', 1, 1, 1),
(4, 'Caroline Pollich', 'Possimus ratione repellendus eveniet et eius ipsa.', 'Aspernatur iure excepturi sunt et unde. Commodi architecto reiciendis aliquam vel aut perferendis.', '/img/default/product2.png', 1, 1, 2),
(5, 'Rod Volkman', 'Aut et numquam fuga ea sint.', 'Culpa non earum sed officia. Eius qui eos quasi.', '/img/default/product.png', 1, 1, 1),
(6, 'Abby Windler', 'Eum minus deleniti esse iste et ducimus.', 'Ab quas aut autem dignissimos. Perspiciatis repellat quaerat provident enim. Ut aliquam ut quo.', '/img/default/product2.png', 2, 1, 1),
(7, 'Tatyana Emmerich', 'Consequatur sed quo aut ut eum dolor deserunt.', 'Odio et sint amet excepturi. Molestiae nemo quaerat quos. Quo commodi dolores dolorem illo libero.', '/img/default/product.png', 1, 1, 1),
(8, 'Rene Pfannerstill', 'Ab illo rem recusandae aspernatur nobis.', 'Rerum nostrum quo voluptates eos. Qui dolores quas minima. Iusto nemo autem in.', '/img/default/product2.png', 1, 1, 2),
(9, 'Theodora Rice', 'Libero in eos ipsa voluptatibus dolore ut.', 'Tenetur ut perspiciatis rerum perferendis ut. Aut voluptatibus omnis sed odio.', '/img/default/product1.png', 2, 1, 1),
(10, 'Jonatan Hoeger', 'Non repellendus sit delectus repellendus vitae rerum.', 'Repellendus ut qui veniam voluptatem. Maiores illo et pariatur nostrum voluptas.', '/img/default/product2.png', 1, 1, 1),
(11, 'Michaela Cartwright', 'Quos nam id veniam eum.', 'Consequatur sed quis dolor quisquam et perspiciatis eaque. Voluptatem est voluptatem architecto ex.', '/img/default/product.png', 2, 1, 1),
(12, 'Toy Rutherford', 'Quos qui enim quo illum.', 'Quia aut voluptas perspiciatis fugit. In facere aut voluptatum nesciunt accusantium ut.', '/img/default/product2.png', 1, 1, 1),
(13, 'Nick Quigley', 'Ea laudantium omnis mollitia sunt amet animi non molestiae.', 'Explicabo vel quia amet ut. Odio unde ut nulla dolor cupiditate.', '/img/default/product.png', 1, 1, 1),
(14, 'Margaret Terry', 'Possimus quia rerum a a et ipsum.', 'Quis voluptates esse facilis dicta fugit quos ea. Molestiae quas eos dolorum assumenda consectetur.', '/img/default/product2.png', 1, 1, 1),
(15, 'Richmond Reichert', 'Alias natus dicta illum aut saepe.', 'Quo provident et quos et quos corrupti error. Dicta quo recusandae id unde.', '/img/default/product1.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `text`, `product_id`, `user_id`, `status_id`) VALUES
(1, 'Amet dolores provident quia laborum quisquam aut.', 1, 1, 1),
(3, 'Optio ipsam rem excepturi consequatur.', 1, 3, 1),
(4, 'Saepe consequatur ex voluptatem exercitationem autem quia.', 1, 4, 1),
(5, 'Est necessitatibus ut minima rem. Facere nemo sint quo.', 1, 5, 1),
(6, 'Quia excepturi laborum cumque. Quo error enim non fugiat.', 1, 6, 1),
(7, 'Quo dolorum non magni dolores dolor.', 2, 1, 1),
(8, 'Doloremque adipisci maiores nostrum in est et.', 2, 1, 1),
(9, 'Quasi vel sit fugiat velit reprehenderit enim.', 2, 1, 1),
(10, 'Quia eum ut quos nulla in.', 2, 1, 1),
(11, 'Aut magni ut assumenda molestiae hic id placeat.', 2, 1, 1),
(12, 'Aut corporis omnis libero nisi.', 2, 1, 1),
(13, 'Ut qui impedit beatae consequatur vero.', 3, 1, 1),
(14, 'Magnam eaque quo assumenda itaque recusandae.', 3, 1, 1),
(15, 'Minus esse totam sit sed cum aut tempora impedit.', 3, 1, 1),
(16, 'Quos et sequi voluptatem odit error.', 3, 1, 1),
(17, 'Dolorum sed dolorem dolorum iure eum.', 3, 1, 1),
(18, 'Unde quo eos sed officiis quo.', 3, 1, 1),
(19, 'Hic dignissimos dolore qui.', 4, 1, 1),
(20, 'Doloribus magni soluta possimus porro ea officia sed sint.', 4, 1, 1),
(21, 'Incidunt esse rerum ut excepturi.', 4, 1, 1),
(22, 'Et iste id rem.', 4, 1, 1),
(23, 'Expedita in voluptatem et dolorum temporibus.', 4, 1, 1),
(24, 'Aliquid sunt aut officiis accusamus cupiditate dolor porro.', 4, 1, 1),
(25, 'Magni est laboriosam maiores et excepturi eaque.', 5, 1, 1),
(26, 'Incidunt ullam numquam voluptatem aspernatur enim.', 5, 1, 1),
(27, 'Magni est ut a consequatur ipsam eveniet.', 5, 1, 1),
(28, 'Quia debitis ab aut ea.', 5, 1, 1),
(29, 'Ducimus sapiente possimus dolor.', 5, 1, 1),
(30, 'Aliquid libero officia ut atque consequuntur ipsum.', 5, 1, 1),
(31, 'Consequuntur voluptatem qui cum ipsa.', 6, 1, 1),
(32, 'Sint autem id vel officia laudantium.', 6, 1, 1),
(33, 'Aut iste sunt veritatis eos omnis.', 6, 1, 1),
(34, 'Praesentium blanditiis sunt sint ut distinctio.', 6, 1, 1),
(35, 'Quam sunt aliquid aperiam ea ipsum.', 6, 1, 1),
(36, 'Voluptas eaque sed mollitia provident facere ea.', 6, 1, 1),
(37, 'Et praesentium deserunt et quod soluta enim incidunt.', 7, 1, 1),
(38, 'Modi similique illo illum est eos.', 7, 1, 1),
(39, 'Beatae quas voluptatum vel eos. Esse ab quas est maxime.', 7, 1, 1),
(40, 'Eveniet eos ut ab officia omnis. Ad esse earum rerum enim.', 7, 1, 1),
(41, 'Aut voluptas quia consectetur quos numquam quaerat est.', 7, 1, 1),
(42, 'Itaque asperiores autem ratione et.', 7, 1, 1),
(43, 'Quidem minus architecto velit fugit corrupti.', 8, 1, 1),
(44, 'Et et quis architecto numquam aspernatur.', 8, 1, 1),
(45, 'Ut voluptatibus praesentium perferendis voluptatem.', 8, 1, 1),
(46, 'Quis autem impedit tenetur. Excepturi id illo repudiandae.', 8, 1, 1),
(47, 'Quidem placeat animi molestias accusamus nesciunt itaque.', 8, 1, 1),
(48, 'Rerum veniam esse et minus.', 8, 1, 1),
(49, 'Autem a natus aperiam optio. Et voluptas aut vero sed.', 9, 1, 1),
(50, 'Perspiciatis quia temporibus et sit quod.', 9, 1, 1),
(51, 'Nostrum qui ut harum est nam dolor impedit architecto.', 9, 1, 1),
(52, 'Tempora aperiam ut expedita maiores dicta odio.', 9, 1, 1),
(53, 'Aut ut sed animi neque impedit soluta.', 9, 1, 1),
(54, 'Recusandae labore nostrum aut eos non.', 9, 1, 1),
(55, 'Earum nobis quo vel id et dicta distinctio incidunt.', 10, 1, 1),
(56, 'Perspiciatis sed sed eos minima ut delectus commodi hic.', 10, 1, 1),
(57, 'Laboriosam ea at quisquam non sint.', 10, 1, 1),
(58, 'Consequuntur aut ducimus soluta ea dignissimos inventore.', 10, 1, 1),
(59, 'Qui aut ut eveniet sint.', 10, 1, 1),
(60, 'Ipsam qui corporis est qui nobis dolorum non.', 10, 1, 1),
(61, 'Libero qui illo delectus. Et et consequatur in dolor.', 11, 1, 1),
(62, 'Sequi aperiam architecto omnis aliquam voluptatem sit.', 11, 1, 1),
(63, 'Voluptas nulla ut alias voluptatibus nihil.', 11, 1, 1),
(64, 'Fugiat at saepe incidunt consectetur autem repellat optio.', 11, 1, 1),
(65, 'Molestiae corporis quis mollitia est.', 11, 1, 1),
(66, 'Eligendi voluptas vero rerum sed quo quaerat incidunt.', 11, 1, 1),
(67, 'Illum veniam ea iste itaque quis.', 12, 1, 1),
(68, 'Eum sint reprehenderit ab ducimus.', 12, 1, 1),
(69, 'Error nostrum cumque similique illum repellendus in natus.', 12, 1, 1),
(70, 'Incidunt inventore veniam voluptatem id qui a qui.', 12, 1, 1),
(71, 'Vitae et est qui.', 12, 1, 1),
(72, 'Autem nisi sunt minus perferendis.', 12, 1, 1),
(73, 'Maiores ea voluptas exercitationem adipisci ea incidunt.', 13, 1, 1),
(74, 'Aut recusandae atque et.', 13, 1, 1),
(75, 'Eaque quaerat ab natus et blanditiis.', 13, 1, 1),
(76, 'Fugit rerum vel est fuga.', 13, 1, 1),
(77, 'Consequatur sit temporibus magni dicta nam inventore et.', 13, 1, 1),
(78, 'Quia numquam natus et.', 13, 1, 1),
(79, 'Nesciunt sequi ut assumenda assumenda.', 14, 1, 1),
(80, 'Pariatur quia et rem ex provident iste.', 14, 1, 1),
(81, 'Quidem rerum ex quia sint similique.', 14, 1, 1),
(82, 'Odio rerum laudantium vitae id qui aut.', 14, 1, 1),
(83, 'Molestiae facere ad aut sit minus.', 14, 1, 1),
(84, 'Aut provident natus eaque sit aut laborum.', 14, 1, 1),
(85, 'Voluptatem molestias dolore impedit possimus asperiores.', 15, 1, 1),
(86, 'Aliquam fuga qui velit eius velit.', 15, 1, 1),
(87, 'Soluta nihil aut voluptas qui eos nihil.', 15, 1, 1),
(88, 'Dolores possimus accusamus debitis facilis.', 15, 1, 1),
(89, 'Ut officia fuga ut sunt quisquam.', 15, 1, 1),
(90, 'Beatae et et architecto sequi repellendus a.', 15, 1, 1),
(91, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ipsum dolor sit amet consectetur adipiscing elit duis tristique sollicitudin. Vitae turpis massa sed elementum tempus. Sapien pellentesque habitant morbi tristique senectus.', 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `title`) VALUES
(1, 'active'),
(2, 'hidden');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'admin@test.com', '$2y$10$ZqBX85sqNkP2KTpSgFRTFezd/9c9aMaGZhTNE9IqZOO5OdNg2Eysm', 'admin', 0, 1, 1, 1, 1633137970, 1633139159, 2),
(2, 'user1@test.com', '$2y$10$m5fPLtVVOl8jU4ajV5gAt.Pbsmi5imLld8tME1614aMwoReD0zxEu', 'user1', 0, 1, 1, 0, 1633138550, 1633138576, 1),
(3, 'user2@test.com', '$2y$10$eOgXhS0DvjBF.ZZaPf8IoOtIAhumR0BVl/6UjQ5jLMcYIGI8dTnzK', 'user2', 0, 1, 1, 0, 1633139186, NULL, 0),
(4, 'user3@test.com', '$2y$10$2pUHIKqisM4UkRi.VTOE8ujcau102xUXVmWR1dw0VhzbRKiJbXyUW', 'user3', 0, 1, 1, 0, 1633139201, NULL, 0),
(5, 'user4@test.com', '$2y$10$2WdSZUxtApELtXVvpezFvu/8bDqXzz5kA0y6PtEp/oSmDNn.c2RJO', 'user4', 0, 1, 1, 0, 1633139215, NULL, 0),
(6, 'user5@test.com', '$2y$10$TjxMguuFxk26JptSRhoGAeN2N26rjhdE0lRyqb7w3B.2swqnLDp3e', 'user5', 0, 1, 1, 0, 1633139231, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 70.3302, 1633139159, 1633679159),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 4, 1633137972, 1633569972),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1633137999, 1633209999),
('c_kz7WrpGYAf-trkwbRcxrvTbgcw23kMo08AAv-_Swg', 29, 1633137999, 1633209999),
('AgPPKVKLWltMsKXWnrlmmZ9bs3NOWYHElpU6pFIKEzA', 29, 1633137999, 1633209999);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
