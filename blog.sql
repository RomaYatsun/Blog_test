-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 09 2014 г., 17:30
-- Версия сервера: 5.5.38-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `raiting` int(5) NOT NULL,
  `author` varchar(32) NOT NULL,
  `date_time` date NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `raiting`, `author`, `date_time`) VALUES
(24, 'Lorem Sipsum', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n </p>\r\n<p>\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n</p>\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n</p><p>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 0, '', '0000-00-00'),
(29, 'Ð²Ð°Ñ‹Ð²Ð°', 'Ñ‹Ñ„Ð²Ñ„Ñ‹ Ð°Ñ„ Ñ‹Ð»Ð´Ð¶Ð¾ Ð°Ð´Ð»Ñ†Ð¾ Ð´Ð»Ñ†ÑƒÐ¾ Ð°Ð´Ð»Ñ„Ð¾ Ð´Ð»Ð°Ð¾ Ð´Ð»ÑƒÐ°Ð¾Ð´Ñ†Ð»ÑƒÐ°Ð¾ \r\nÐ´Ð»Ð¾Ð° ÑŒÑ‹Ð²Ñ‚Ð° Ð±ÑŒÑ‚Ñ‹Ð² Ð°Ð±ÑŒÑ‚ÑÐ± ÑŽÐ¼ÑŒÑÑ‚Ñ‡Ð±ÑŽÑÑŒ Ð¼Ñ‚Ð±ÑÑ‡ÑŒÑÐ¼Ñ‚ Ð±\r\nÑŽÑÑ‡ÑŒÑÑ‚Ð¼ ÑŽÐ±ÑÑ‡ÑŒÑÑ‚Ð¼ Ð±ÑŽÑÑ‡ÑŒÑÑ‚Ð¼ Ð±ÑÑ‚ Ð¾Ð²', 0, 'admin', '2014-10-03'),
(30, 'fdg', 'vg dfgh dfgh, dfgh \r\n \r\ndfgh k\r\n \r\ndfg hk;\r\n \r\ndfgh kd\r\n \r\nfghk df''gk h\r\n \r\nd fghk\r\n \r\ndfghk \r\n \r\nfdgh/', 0, 'admin', '2014-10-03'),
(31, 'fd gh', 'sdfsdf sdf sd sdma df;a sdflj as<br />\r\ndf ljasdlf jas<br />\r\ndf jas<br />\r\nd fjasld', 2, 'admin', '2014-10-03'),
(32, 'wqeqw', 'rqwr', 3, 'admin', '2014-10-07');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `text_comment` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `page_id`, `username`, `text_comment`, `date_time`) VALUES
(52, 29, 'admin', 'Ð¹Ñ†Ñƒ', '2014-10-03 18:07:33'),
(53, 29, 'Guest', 'Ð¹Ñ†Ñƒ', '2014-10-03 18:07:38'),
(54, 29, '123', 'Ñ‹Ð²Ð°', '2014-10-03 18:07:47'),
(55, 29, '123', 'Ñ„Ñ‹Ð²', '2014-10-03 18:08:46'),
(56, 29, '123', 'dg', '2014-10-03 18:09:03'),
(57, 31, 'admin', 'df gd ', '2014-10-06 19:23:01'),
(58, 24, '111', 'dfghdfgh', '2014-10-09 17:07:11');

-- --------------------------------------------------------

--
-- Структура таблицы `raiting_art`
--

CREATE TABLE IF NOT EXISTS `raiting_art` (
  `id_raiting` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_raiting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Дамп данных таблицы `raiting_art`
--

INSERT INTO `raiting_art` (`id_raiting`, `id_user`, `id_article`) VALUES
(53, 3, 3),
(54, 3, 2),
(55, 3, 1),
(56, 1, 4),
(57, 1, 9),
(58, 1, 22),
(59, 1, 20),
(60, 8, 22),
(61, 1, 27),
(62, 1, 31),
(63, 20, 32);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(32) NOT NULL,
  `date_time` date NOT NULL,
  `last_login` datetime NOT NULL,
  `role` enum('0','1','2','3') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `login`, `password`, `avatar`, `date_time`, `last_login`, `role`) VALUES
(1, '', '', 'admin@test-blog.loc', 'admin', 'b9be11166d72e9e3ae7fd407165e4bd2', 'img/default-avatar.gif', '2014-07-01', '2014-10-09 17:18:46', '1'),
(20, '', '', '111@mail.ru', '111', '3049a1f0f1c808cdaa4fbed0e01649b1', 'img_small/Nature-dragon.jpg', '2014-10-09', '2014-10-09 17:06:55', '3'),
(21, '', '', '222@mail.ru', '222', 'be8fe4c12c4e43217c06098a2595a950', 'img/default-avatar.gif', '2014-10-09', '2014-10-09 17:00:28', '3'),
(22, '', '', '333@mail.ru', '333', '2b272cbcd91c2d762fcb8261307d295e', 'img/default-avatar.gif', '2014-10-09', '2014-10-09 17:01:16', '3'),
(23, '', '', '444@mail.ru', '444', 'd3d1918bc38437bc1048bd92ddc5b75e', 'img/default-avatar.gif', '2014-10-09', '2014-10-09 17:01:03', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
