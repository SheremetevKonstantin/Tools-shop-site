-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 12 2019 г., 10:46
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tool_db`
--
CREATE DATABASE IF NOT EXISTS `tool_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tool_db`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_category` varchar(50) NOT NULL COMMENT 'название категории',
  `category_status` enum('0','1') NOT NULL COMMENT 'ее наличие',
  `category_sub` varchar(4) NOT NULL COMMENT 'название подкатегории',
  `category_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_category`, `category_status`, `category_sub`, `category_image`) VALUES
(1, 'Электроинструмент', '1', 'null', 'img/cats/electro.jpg'),
(2, 'Аккумуляторный инструмент', '1', 'null', 'img\\cats\\accum.jpg'),
(3, 'Водная техника', '1', 'null', 'img\\cats\\waterTech.jpg'),
(4, 'Зарядные и пусковые устройства', '1', 'null', 'img\\cats\\zaradka.jpg'),
(5, 'Измерительная техника', '1', 'null', 'img\\cats\\ruletka.jpg'),
(6, 'Лестницы', '1', 'null', 'img\\cats\\ledder.jpg'),
(7, 'Насосы', '1', 'null', 'img\\cats\\nasus.jpg'),
(8, 'Оборудование для обработки труб', '1', 'null', 'img\\cats\\pipe.jpg'),
(9, 'Ручной инструмент', '1', 'null', 'img\\\\cats\\\\handtool.jpg'),
(10, 'Садовая техника', '1', 'null', 'img\\\\cats\\\\sadTech.jpg'),
(11, 'Садовый инвентарь', '1', 'null', 'img\\\\cats\\\\gardenTech.jpg'),
(12, 'Системы очистки воды', '1', 'null', 'img\\\\cats\\\\filters.jpg'),
(13, 'Стабилизаторы напряжения', '1', 'null', 'img\\\\cats\\\\naprazen.jpg'),
(14, 'Станки', '1', 'null', 'img\\\\cats\\\\stanok.jpg'),
(15, 'Строительная техника', '1', 'null', 'img\\\\cats\\\\buildingTech.jpg'),
(16, 'Тепловое оборудование', '1', 'null', 'img\\\\cats\\\\hotTech.jpg'),
(17, 'Уборочная техника', '1', 'null', 'img\\\\cats\\\\clearTech.jpg'),
(18, 'Принадлежности', '1', 'null', 'img\\\\cats\\\\other.jpg'),
(19, 'Гайковерты', '1', '1', 'img\\\\subcats\\\\gayko.jpg'),
(34, 'Дрели', '1', '1', './img/subcats/drel.jpg'),
(35, 'Аккумуляторные винтоверты', '1', '2', './img/subcats/accumVinto.jpg'),
(39, 'йц', '0', 'null', 'img/cats/5.png'),
(40, 'йцу', '0', '39', 'img/subcats/5.png');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_type` enum('0','1') NOT NULL COMMENT 'Тип(Физ/Юр)',
  `customer_name` varchar(150) NOT NULL COMMENT 'Наименование(Если Физ-Фио, Юр-организация)',
  `customer_adress` varchar(100) NOT NULL COMMENT 'Адресс',
  `customer_phone` varchar(11) NOT NULL COMMENT 'Телефон',
  `customer_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_type`, `customer_name`, `customer_adress`, `customer_phone`, `customer_status`) VALUES
(1, '0', 'Шереметьев Константин Ильич', 'Балахнинский р-он, д.Постниково, д.114', '88314451128', '1'),
(2, '1', 'ОАО ДЖЕНКИНС-РОВИО', 'г.Москва, ул.Родзинского, д.25', '88314452238', '1'),
(4, '0', 'Рыжеков Александр Орестович', 'Балахнинский р-он, п.Совхозный, д.17', '89308124689', '0'),
(5, '1', 'ООО ВИТЯЗЬ', 'г.Самара, ул.Преображенского, д.221', '88316125487', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `deal`
--

CREATE TABLE `deal` (
  `deal_id` int(11) NOT NULL,
  `deal_name_customer` varchar(150) NOT NULL COMMENT 'Id заказчика',
  `deal_product_name` varchar(1024) NOT NULL COMMENT 'Id товара',
  `deal_count` varchar(255) NOT NULL COMMENT 'Количество товара',
  `deal_date` varchar(10) NOT NULL COMMENT 'Дата заказа',
  `deal_delivery_type` enum('0','1') NOT NULL COMMENT 'Тип доставки(0-самовывоз,1-доставка)',
  `deal_cost` int(15) NOT NULL COMMENT 'Стоимость сделки',
  `deal_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deal`
--

INSERT INTO `deal` (`deal_id`, `deal_name_customer`, `deal_product_name`, `deal_count`, `deal_date`, `deal_delivery_type`, `deal_cost`, `deal_status`) VALUES
(1, 'ОАО ДЖЕНКИНС-РОВИО', 'Гайковерт DeWalt DW292', '1', '01.13.19', '1', 25749, '1'),
(4, 'ООО ВИТЯЗЬ', 'Гайковерт DeWalt DW292;Гайковерт DeWalt DW292', '2;3', '01.13.19', '1', 128747, '1'),
(5, 'Шереметьев Константин Ильич', 'Гайковерт DeWalt DW292;Гайковерт DeWalt DW292;Гайковерт DeWalt DW292', '2;1;3', '01.13.19', '0', 129886, '1'),
(7, 'Шереметьев Константин Ильич', 'Гайковерт DeWalt DW292', '1', '24.01.19', '0', 21648, '1'),
(8, 'Шереметьев Константин Ильич', 'Новый', '2', '24.01.19', '0', 2090, '0'),
(9, 'Шереметьев Константин Ильич', 'йцу', '1', '24.01.19', '0', 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `login`
--

CREATE TABLE `login` (
  `login` varchar(50) NOT NULL COMMENT 'логин',
  `password` varchar(100) NOT NULL COMMENT 'пароль',
  `salt` varchar(100) NOT NULL COMMENT 'соль',
  `privilege` enum('0','1','2') NOT NULL COMMENT 'уровень доступа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `login`
--

INSERT INTO `login` (`login`, `password`, `salt`, `privilege`) VALUES
('1', '6284b58f7995abed0809a9bc2ca7c9e9', '883b79c403', '0'),
('2', '79f85fc94465a1e3c0ec97324d2d6179', '930d5a5217', '0'),
('admin', '61d497d17b6ee1ed44364653d274c32a', 'd73a9aa408', '1'),
('root', '242069c120dc18a40ffaef09feb089a8', 'b82c2d6c54', '2'),
('user', '606a0c89c3b136e102c860a391c397ee', '232061d1fe', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL COMMENT 'Наименование',
  `product_cost` int(6) NOT NULL COMMENT 'Цена',
  `product_description` varchar(512) NOT NULL COMMENT 'Описание',
  `product_image` varchar(124) NOT NULL COMMENT 'Картинка',
  `product_count` int(10) NOT NULL COMMENT 'Количество на складе',
  `product_characteristic` varchar(512) NOT NULL COMMENT 'Характеристики',
  `product_category` int(11) NOT NULL COMMENT 'Категория',
  `product_status` enum('0','1') NOT NULL COMMENT 'Статус наличия'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_cost`, `product_description`, `product_image`, `product_count`, `product_characteristic`, `product_category`, `product_status`) VALUES
(1, 'Гайковерт DeWalt DW292', 22787, 'Максимальный крутящий момент 440 Нм в прямом и реверсивном вращениях. \r\nВысокие показатели момента и скорости вращения увеличивают производительность работы. \r\nПрорезиненная рукоятка снижает уровень вибраций и повышает удобство работы. \r\nПрочный дизайн увеличивает надежность инструмента. ', 'img/products/DeWalt292.jpg', 214, 'Производитель-DeWalt;Потребляемая мощность-710 Вт;Макс.размер крепежа(нормальное завинчивание)-М20;Квадратный хвостовик-1/2', 19, '1'),
(6, 'Новый', 1100, 'Описание', 'img/products/5.png', 56, 'первая-3кр', 19, '0'),
(7, 'йцу', 2, '1', 'img/products/5.png', 1, '1-1', 40, '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Индексы таблицы `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`);

--
-- Индексы таблицы `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
