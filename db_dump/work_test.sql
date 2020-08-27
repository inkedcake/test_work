-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 27 2020 г., 20:47
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `text_task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `created_by`, `manager_id`, `client_id`, `date_time`, `text_task`) VALUES
(3, 0, 5, 13, '2020-08-30 06:01:00', 'test'),
(4, 5, 16, 14, '2020-08-22 22:58:00', 'gvkgvj'),
(5, 5, 5, 12, '2020-08-14 23:03:00', 'etsefscf'),
(6, 5, 5, 15, '2020-08-27 00:32:00', 'dzvsdv');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `position`, `phone`) VALUES
(5, 'test test  tset', 'etst', '098f6bcd4621d373cade4e832627b4f6', 'manager', 'test@e.g'),
(6, 'rg', 'erg', '75fe57ec4a047a300cac5f27223df81a', 'customer', 'sef@sef.gy'),
(12, 'test Testovich', '+38 (050) 660-63-94', 'f93c488106cd8085077f3e41de08d904', 'customer', '+38 (050) 660-63-94'),
(15, 'test test  tset', '+3 (805) 066 06 39 4', 'c79504b4a3059bcee3822c2f8fa63b66', 'customer', '+3 (805) 066 06 39 4'),
(16, 'new test', 'etstttt', '098f6bcd4621d373cade4e832627b4f6', 'manager', 'test@e.g');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
