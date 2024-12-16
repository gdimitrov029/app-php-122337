-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 16 дек 2024 в 20:56
-- Версия на сървъра: 10.4.32-MariaDB
-- Версия на PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `travel_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `average_cost` decimal(10,2) DEFAULT NULL,
  `best_season` varchar(50) DEFAULT NULL,
  `popular_attractions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `destinations`
--

INSERT INTO `destinations` (`destination_id`, `name`, `country`, `description`, `average_cost`, `best_season`, `popular_attractions`, `created_at`, `updated_at`, `image_path`, `image_url`) VALUES
(1, 'Париж', 'Франция', 'Столицата, известна с Айфеловата кула и музеите на изкуството.', 1500.00, 'Пролет', 'Айфеловата кула, Лувърът, катедралата Нотр Дам', '2024-11-10 09:36:34', '2024-11-12 15:41:11', '\'images/Paris1.jpg\'', '/Trip/Images/Paris1.jpg'),
(2, 'Токио', 'Япония', 'Оживен град със смесица от традиционни и модерни атракции.', 2000.00, 'Пролет', 'Прелез Шибуя, Токийска кула, светилище Мейджи', '2024-11-10 09:36:34', '2024-12-06 12:35:39', '\'images/tokyo.jpg\'', '/Trip/Images/tokyo.jpg'),
(3, 'Ню Йорк', 'САЩ', 'Известен със своя хоризонт, Таймс Скуеър и културно многообразие.', 1800.00, 'Есен', 'Статуя на свободата, Сентръл Парк, Емпайър Стейт Билдинг', '2024-11-10 09:36:34', '2024-12-06 12:35:21', '\'images/new_yourk.jpg\'', '/Trip/Images/new_york.jpg'),
(4, 'Рим', 'Италия', 'Дом на древната римска архитектура и Ватикана.', 1200.00, 'Есен', 'Колизеум, базиликата Св. Петър, фонтан Треви', '2024-11-10 09:36:34', '2024-12-06 12:34:58', '\'images/rome.jpg\'', '/Trip/Images/rome.jpg'),
(5, 'Буенос Айрес ', 'Аржентина ', 'Столицата, известна с тансинга танго и колониалната си архитектура.', 1600.00, ' Пролет', 'Пласа де Майо, обсерватория Ла Палма, квартал Ла Бока', '2024-12-06 12:49:50', '2024-12-06 12:52:12', '\'images/bueno.jpg\'', '/Trip/Images/bueno.jpg');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
