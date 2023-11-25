-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2019 г., 22:50
-- Версия сервера: 8.0.12
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
-- База данных: `test_auto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `mileage` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `brand_id`, `mileage`, `price`, `phone`, `model_id`) VALUES
(33, 1, 1500, 3500000, '+79520003565', 2),
(35, 2, 5000, 1800000, '+75869596859', 6),
(37, 2, 500, 1300000, '+95565655554', 4),
(38, 1, 6500, 2300000, '+12415646844', 1),
(39, 1, 900, 2500000, '+96558454545', 2),
(40, 1, 2365, 3200000, '+78529634521', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `auto_exterior`
--

CREATE TABLE `auto_exterior` (
  `auto_id` int(11) NOT NULL,
  `exterior_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_safety`
--

CREATE TABLE `auto_safety` (
  `auto_id` int(11) NOT NULL,
  `safety_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auto_safety`
--

INSERT INTO `auto_safety` (`auto_id`, `safety_id`) VALUES
(33, 5),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 3),
(39, 4),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(1, 'Audi'),
(2, 'Toyota');

-- --------------------------------------------------------

--
-- Структура таблицы `exterior`
--

CREATE TABLE `exterior` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `auto_id` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `auto_id`, `path`) VALUES
(47, 33, 'Audi_A6_3_1552240553.jpg'),
(48, 33, 'Audi_A6_2_1552240554.jpg'),
(49, 33, 'Audi_A6_1552240555.jpg'),
(50, 35, 'Toyota_Hilander3_1552243791.jpg'),
(51, 35, 'Toyota_Hilander2_1552243791.jpg'),
(52, 35, 'Toyota_Hilander_1552243792.jpg'),
(53, 37, 'Toyota_Corolla3_1552244034.jpg'),
(54, 37, 'Toyota_Corolla2_1552244035.jpg'),
(55, 37, 'Toyota_Corolla_1552244035.jpg'),
(56, 38, '1920x1080_ATT_D_151010_1_1552244264.jpg'),
(57, 38, '1920x1080_0020_ATT_151002_1552244265.jpg'),
(58, 38, '1920x1080_0018_ATT_151004_1552244265.jpg'),
(59, 39, 'Audi_A6_3_1552244312.jpg'),
(60, 39, 'Audi_A6_2_1552244312.jpg'),
(61, 39, 'Audi_A6_1552244313.jpg'),
(62, 40, '1920x1080_InlineMediaGallery_AA8_D_171017_1552244359.jpg'),
(63, 40, '1920x1080_InlineMediaGallery_AA8_171007_1552244359.jpg'),
(64, 40, '1920x1080_InlineMediaGallery_AA8_171002_1552244360.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1551349714),
('m190227_125237_create_brand_table', 1551349716),
('m190227_125343_create_model_table', 1551349716),
('m190227_125431_create_auto_table', 1551349717),
('m190227_134924_create_safety_table', 1551349717),
('m190227_134949_create_exterior_table', 1551349718),
('m190227_142231_create_junction_table_for_auto_and_safety_tables', 1551349719),
('m190227_142433_create_junction_table_for_auto_and_exterior_tables', 1551349720),
('m190228_122818_alter_auto_table', 1551357121),
('m190309_124320_create_images_table', 1552135899);

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `model_name`, `brand_id`) VALUES
(1, 'TT', 1),
(2, 'A6', 1),
(3, 'A8', 1),
(4, 'Corolla', 2),
(5, 'Camry', 2),
(6, 'HighLander', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `safety`
--

CREATE TABLE `safety` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `safety`
--

INSERT INTO `safety` (`id`, `name`) VALUES
(1, 'Крепление детского сидения ISOFIX'),
(2, 'Парктроник'),
(3, 'Подушка безопасности водителя'),
(4, 'Подушка безопасности переднего пассажира'),
(5, 'Сигнализация');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auto_brand` (`brand_id`);

--
-- Индексы таблицы `auto_exterior`
--
ALTER TABLE `auto_exterior`
  ADD PRIMARY KEY (`auto_id`,`exterior_id`),
  ADD KEY `idx-auto_exterior-auto_id` (`auto_id`),
  ADD KEY `idx-auto_exterior-exterior_id` (`exterior_id`);

--
-- Индексы таблицы `auto_safety`
--
ALTER TABLE `auto_safety`
  ADD PRIMARY KEY (`auto_id`,`safety_id`),
  ADD KEY `idx-auto_safety-auto_id` (`auto_id`),
  ADD KEY `idx-auto_safety-safety_id` (`safety_id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `exterior`
--
ALTER TABLE `exterior`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_auto` (`auto_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_model_brand` (`brand_id`);

--
-- Индексы таблицы `safety`
--
ALTER TABLE `safety`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `exterior`
--
ALTER TABLE `exterior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `safety`
--
ALTER TABLE `safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `fk_auto_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_exterior`
--
ALTER TABLE `auto_exterior`
  ADD CONSTRAINT `fk-auto_exterior-auto_id` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-auto_exterior-exterior_id` FOREIGN KEY (`exterior_id`) REFERENCES `exterior` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_safety`
--
ALTER TABLE `auto_safety`
  ADD CONSTRAINT `fk-auto_safety-auto_id` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-auto_safety-safety_id` FOREIGN KEY (`safety_id`) REFERENCES `safety` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_auto` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `fk_model_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
