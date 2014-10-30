-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 29 2014 г., 18:10
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
  `title_en` varchar(32) NOT NULL,
  `title_ua` varchar(32) NOT NULL,
  `content_en` text NOT NULL,
  `content_ua` text NOT NULL,
  `author` varchar(32) NOT NULL,
  `date_time` date NOT NULL,
  `raiting` decimal(5,1) NOT NULL,
  `raiting_up` int(5) NOT NULL,
  `raiting_down` int(5) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title_en`, `title_ua`, `content_en`, `content_ua`, `author`, `date_time`, `raiting`, `raiting_up`, `raiting_down`) VALUES
(1, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', '', '0000-00-00', 0.0, 0, 0),
(2, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', '', '0000-00-00', 0.0, 1, 0),
(3, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', '', '0000-00-00', 0.0, 9, -5),
(5, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', 'admin', '2014-10-22', 0.0, 0, 0),
(6, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', '111', '2014-10-22', 0.0, 1, 0),
(7, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br /><br />\r\n<br /><br /><br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', '111', '2014-10-22', 0.0, 0, 0),
(8, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', 'admin', '2014-10-22', 0.0, 0, 0),
(9, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br /><br /><br />\r\n<br /><br /><br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', 'admin', '2014-10-22', 0.0, 0, 0),
(10, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', 'admin', '2014-10-22', 5.0, 1, 0),
(11, 'Lorem Ipsum is', 'Що таке Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.<br /><br />\r\n<br /><br />\r\nВже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з''явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі).', 'admin', '2014-10-26', 5.0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `title_comment` varchar(32) NOT NULL,
  `text_comment` text NOT NULL,
  `lang` varchar(4) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `page_id`, `username`, `title_comment`, `text_comment`, `lang`, `date_time`) VALUES
(1, 10, 'admin', 'sd gds', ' sdsdsdf', 'ua', '2014-10-24 12:17:12'),
(2, 10, 'admin', 'er gwerg df', 'er gwerg df sdfhsfghdfghjdfghj dgj dg gh', 'ua', '2014-10-24 12:17:49'),
(3, 10, 'admin', 'g df', ' dfg dfg df djhfg', 'en', '2014-10-24 12:25:51'),
(4, 10, 'admin', 'ngbh ', ' fcf d df', 'ua', '2014-10-24 12:41:39'),
(5, 10, 'admin', '123', '123', 'en', '2014-10-24 12:51:45'),
(6, 10, 'admin', '123', '123', 'ua', '2014-10-24 12:51:57'),
(7, 11, 'admin', 'sdf,kl', 'kdfkfk', 'en', '2014-10-29 16:08:56');

-- --------------------------------------------------------

--
-- Структура таблицы `lang_int`
--

CREATE TABLE IF NOT EXISTS `lang_int` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `en` text NOT NULL,
  `ua` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `lang_int`
--

INSERT INTO `lang_int` (`id`, `en`, `ua`) VALUES
(1, 'Admin', '&#1040;&#1076;&#1084;&#1110;&#1085;'),
(2, 'Admin panel', '&#1040;&#1076;&#1084;&#1110;&#1085; &#1087;&#1072;&#1085;&#1077;&#1083;&#1100;'),
(3, 'Language', 'Мова'),
(4, 'Login', '&#1051;&#1086;&#1075;&#1110;&#1085;'),
(5, 'Logout', '&#1042;&#1080;&#1081;&#1090;&#1080;'),
(6, 'Home page', 'Головна');

-- --------------------------------------------------------

--
-- Структура таблицы `raiting_art`
--

CREATE TABLE IF NOT EXISTS `raiting_art` (
  `id_raiting` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `vote_up` int(1) NOT NULL,
  `vote_down` int(1) NOT NULL,
  PRIMARY KEY (`id_raiting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `raiting_art`
--

INSERT INTO `raiting_art` (`id_raiting`, `id_user`, `id_article`, `vote_up`, `vote_down`) VALUES
(1, 1, 2, 1, 1),
(2, 2, 2, 1, 1),
(3, 1, 3, 1, 1),
(4, 1, 4, 1, 1),
(5, 4, 6, 1, 0),
(6, 1, 10, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_article` int(5) NOT NULL,
  `user` varchar(32) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(32) NOT NULL,
  `role` enum('0','1','2','3') NOT NULL,
  `last_login` datetime NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `date_time` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `email`, `login`, `password`, `avatar`, `role`, `last_login`, `first_name`, `last_name`, `date_time`) VALUES
(1, '', 'admin', 'b9be11166d72e9e3ae7fd407165e4bd2', 'img_small/images.jpeg', '1', '2014-10-29 17:19:37', '', '', '0000-00-00'),
(2, '123@mail.ru', '123', 'd9b1d7db4cd6e70935368a1efb10e377', 'img_small/images.jpeg', '2', '2014-10-29 05:17:01', '', '', '0000-00-00'),
(3, '222@eee.ru', '222', 'be8fe4c12c4e43217c06098a2595a950', '', '3', '0000-00-00 00:00:00', '', '', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
