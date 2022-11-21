-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 18 2022 г., 14:50
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `post` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id_user`, `id_post`, `post`) VALUES
(55, 2, 'Publish'),
(55, 3, 'Пришел, увидел, победил!'),
(56, 92, 'EnQ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `photo`) VALUES
(51, 'Ivan', 'ceff7b0d27bd91d559fdcc86c3f5c617', 0x4e554c4c),
(52, 'Grigorii', '8f3871a62b85e349291607eeb9a3f057', 0x4e554c4c),
(53, 'Bob', '98954d2db76a13e9837558213b1ae78a', 0x4e554c4c),
(54, 'Zina', '925c08c61f3b83f0d1535a2a9b28bd5b', 0x4e554c4c),
(55, 'q', '5482722b361b6e36c36ea10f4b3c1731', 0x4e554c4c),
(56, 'a', '76d424393aee7c535e1d444560506425', 0x4e554c4c),
(60, 'Ким', '97ed7a851ece111afb9825406dae95d0', 0x4e554c4c),
(61, 'jjj', '86a21d6572786a6519ec52014ca8b52e', 0x4e554c4c),
(76, 'w', '882bb6c4f1b3a463d36ff577819f4eb2', 0x4e554c4c),
(78, 'k', '2d20ba8f1706ec4f4ce657e7bed1acde', 0x4e554c4c),
(79, '1', '7a9a87227c0dd23000f757b4ba1ef2a7', 0x4e554c4c),
(81, 'm', 'de524b673acb26e1890ac9e82731b258', 0x4e554c4c),
(82, 'p', '1263a221f60d74f51dad820d1f8aec33', 0x70686f746f5f75736572732f31613737303165303463373864346261386166313630333839623036653461362e6a706567),
(84, 'm,m', 'cd0bac961d983d461f398a194479a289', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
