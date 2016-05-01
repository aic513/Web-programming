-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2016 г., 22:24
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `main_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privat` int(11) DEFAULT NULL,
  `seller_name` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `allow_mails` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`, `parent_id`) VALUES
(1, 'Транспорт', NULL),
(2, 'Недвижимость', NULL),
(3, 'Работа', NULL),
(4, 'Услуги', NULL),
(5, 'Личные вещи', NULL),
(6, 'Для дома и дачи', NULL),
(7, 'Бытовая электроника', NULL),
(8, 'Хобби и отдых', NULL),
(9, 'Животные', NULL),
(10, 'Для бизнеса', NULL),
(12, 'Автомобили с пробегом', 1),
(109, 'Новые автомобили', 1),
(14, 'Мотоциклы и мототехника', 1),
(81, 'Грузовики и спецтехника', 1),
(11, 'Водный транспорт', 1),
(13, 'Запчасти и аксессуары', 1),
(24, 'Квартиры', 2),
(23, 'Комнаты', 2),
(25, 'Дома, дачи, коттеджи', 2),
(26, 'Земельные участки', 2),
(85, 'Гаражи и машиноместа', 2),
(42, 'Коммерческая недвижимость', 2),
(86, 'Недвижимость за рубежом', 2),
(111, 'Вакансии', 3),
(112, 'Резюме', 3),
(114, 'Предложения услуг', 4),
(115, 'Запросы на услуги', 4),
(27, 'Одежда, обувь, аксессуары', 5),
(29, 'Детская одежда и обувь', 5),
(30, 'Товары для детей и игрушки', 5),
(28, 'Часы и украшения', 5),
(88, 'Красота и здоровье', 5),
(21, 'Бытовая техника', 6),
(20, 'Мебель и интерьер', 6),
(87, 'Посуда и товары для кухни', 6),
(82, 'Продукты питания', 6),
(19, 'Ремонт и строительство', 6),
(106, 'Растения', 6),
(32, 'Аудио и видео', 7),
(97, 'Игры, приставки и программы', 7),
(31, 'Настольные компьютеры', 7),
(98, 'Ноутбуки', 7),
(99, 'Оргтехника и расходники', 7),
(96, 'Планшеты и электронные книги', 7),
(84, 'Телефоны', 7),
(101, 'Товары для компьютера', 7),
(105, 'Фототехника', 7),
(33, 'Билеты и путешествия', 8),
(34, 'Велосипеды', 8),
(83, 'Книги и журналы', 8),
(36, 'Коллекционирование', 8),
(38, 'Музыкальные инструменты', 8),
(102, 'Охота и рыбалка', 8),
(39, 'Спорт и отдых', 8),
(103, 'Знакомства', 8),
(89, 'Собаки', 9),
(90, 'Кошки', 9),
(91, 'Птицы', 9),
(92, 'Аквариум', 9),
(93, 'Другие животные', 9),
(94, 'Товары для животных', 9),
(116, 'Готовый бизнес', 10),
(40, 'Оборудование для бизнеса', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=641971 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(641780, 'Новосибирск'),
(641490, 'Барабинск'),
(641510, 'Бердск'),
(641600, 'Искитим'),
(641630, 'Колывань'),
(641680, 'Краснообск'),
(641710, 'Куйбышев'),
(641760, 'Мошково'),
(641790, 'Обь'),
(641800, 'Ордынское'),
(641970, 'Черепаново');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
