-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 16 2015 г., 21:08
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `selfi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `call`
--

CREATE TABLE IF NOT EXISTS `call` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `status` varchar(128) DEFAULT 'новый'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `call`
--

INSERT INTO `call` (`id`, `name`, `phone`, `status`) VALUES
(1, 'рре', '22', 'готово'),
(2, 'fef', '222', 'новый'),
(3, 'dfwf', 'wf', 'новый'),
(4, '11', '22', 'новый'),
(5, '111', '11111', 'новый'),
(6, 'aaa', '222', 'новый'),
(7, 'фф', '111', 'готово'),
(8, 'grgrrg', '11111', 'новый'),
(9, 'aaaa', '222', 'новый'),
(10, '22222', '111', 'новый'),
(11, 'ffefefe', '22222', 'новый'),
(12, 'ауа', '22', 'новый'),
(13, 'fef', '222', 'новый'),
(14, 'aa', '22', 'новый'),
(15, 'fe', '22', 'новый'),
(16, 'Гость', '352355225', 'новый'),
(17, 'grgr', '22222', 'новый'),
(18, 'fefe', '2222', 'новый'),
(19, '22', '222', 'новый'),
(20, '22', '222', 'новый'),
(21, 'feffe', '222', 'новый'),
(22, 'dw', '11', 'новый');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'моноподы '),
(2, 'аксессуары ');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `name`, `alt`) VALUES
(80, '130920151112404248d0fb37dc8543Monopod-selfie-with-wire-pink-3.800x600w.jpg', 'Селфи-монопод со шнуром'),
(81, '130920151112404248d0fb37dc8543TjsBNuJOH9M-273x342.800x600w.jpg', 'Селфи-монопод со шнуром'),
(82, '130920151113109b190167bd018ba4monopod5-600x750.800x600w.png', 'Селфи-монопод со шнуром'),
(89, '1409201518353475597b311b21c8edMonopod-palka-dlya-selfi-Z07-5S-s-provodom-chernyiy1-500x500.300x300.jpg', '1409201518353475597b311b21c8edMonopod-palka-dlya-selfi-Z07-5S-s-provodom-chernyiy1-500x500.300x300.jpg'),
(90, '1409201518353475597b311b21c8edMonopod-selfie-with-wire-pink-3.800x600w.jpg', '1409201518353475597b311b21c8edMonopod-selfie-with-wire-pink-3.800x600w.jpg'),
(91, '1409201518353475597b311b21c8edTjsBNuJOH9M-273x342.800x600w.jpg', '1409201518353475597b311b21c8edTjsBNuJOH9M-273x342.800x600w.jpg'),
(92, '150920151254409b73b57deb18c33e2015-Extendable-Handheld-Self-portrait-Monopod-For-iPhone-Samsung-HTC-SONY-Free-Ship-Black.300x300.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(93, '150920151254409b73b57deb18c33eHTB1J9AmFpXXXXX9apXXq6xXFXXXL.300x300.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(94, '150920151254409b73b57deb18c33emonopod5-600x750.800x600w.png', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(95, '150920151254409b73b57deb18c33eMonopod-palka-dlya-selfi-Z07-5S-s-provodom-chernyiy1-500x500.300x300.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(96, '150920151254409b73b57deb18c33eMonopod-selfie-with-wire-pink-3.800x600w.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(97, '150920151254409b73b57deb18c33eTjsBNuJOH9M-273x342.800x600w.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок'),
(98, '15092015163131c248bf7b78b56ee0Mini mp3 player_3_enl.800x600w.jpg', '15092015163131c248bf7b78b56ee0Mini mp3 player_3_enl.800x600w.jpg'),
(99, '15092015163131c248bf7b78b56ee0mp3-1.800x600w.jpg', '15092015163131c248bf7b78b56ee0mp3-1.800x600w.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `id` int(11) NOT NULL,
  `name` varchar(266) CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ip`
--

INSERT INTO `ip` (`id`, `name`, `product_id`) VALUES
(5, '127.0.0.1', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1442053129),
('m130524_201442_init', 1442053280);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `department` varchar(128) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT '0',
  `total_price` decimal(10,2) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at_date` date NOT NULL,
  `updated_at_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `city`, `phone`, `department`, `note`, `status`, `total_price`, `created_at`, `updated_at`, `created_at_date`, `updated_at_date`) VALUES
(12, 'лолка', 'лолыч', 'Москва', '33к3к3к', 'хз какое', 'балабалалаб', 10, '645.00', 1442258815, 1442259032, '2015-09-14', '2015-09-14'),
(13, 'bomjke', 'bob', 'London', '334344334', '', '', 20, '175.00', 1442258892, 1442259121, '2015-09-14', '2015-09-14'),
(14, 'пупкин', 'вася', 'Москва', '424224', '', '', 0, '700.00', 1442259078, 1442339366, '2015-09-14', '2015-09-15'),
(15, 'fef', 'feef', 'fefe', '22', '', '', 0, '240.00', 1442423766, 1442423766, '2015-09-16', '2015-09-16'),
(16, 'fef', 'feef', 'fefefeefef', '222', '', '', 0, '240.00', 1442423962, 1442423962, '2015-09-16', '2015-09-16'),
(17, 'ауау', 'ауау', 'ауау', '222', '', '', 0, '240.00', 1442424120, 1442424120, '2015-09-16', '2015-09-16'),
(18, 'fe', 'fefe', 'Moscow', '2222', '', '', 0, '240.00', 1442424299, 1442424299, '2015-09-16', '2015-09-16'),
(19, 'fe', 'fefe', 'Moscow', '22', '', '', 0, '240.00', 1442424419, 1442424419, '2015-09-16', '2015-09-16'),
(20, 'fe', 'ау', 'Moscow', '22', '', '', 0, '480.00', 1442424714, 1442424714, '2015-09-16', '2015-09-16'),
(21, 'fef', 'feef', 'fefe', '222', '', '', 0, '480.00', 1442424842, 1442424842, '2015-09-16', '2015-09-16'),
(22, 'Vova', 'Vovan', 'Kiev', '2222', 'Kiev New potcha', 'Мое примечание ', 0, '480.00', 1442424934, 1442424934, '2015-09-16', '2015-09-16'),
(23, 'Маша', 'Машина', 'Moscow', '223234', '', 'Fast buy', 0, '710.00', 1442425227, 1442425227, '2015-09-16', '2015-09-16'),
(24, 'Катя', 'Катина', 'Киев', '22234', '', '', 0, '240.00', 1442425371, 1442425371, '2015-09-16', '2015-09-16'),
(25, 'fee', 'fefe', 'fee', '22', '', '', 0, '240.00', 1442425463, 1442425463, '2015-09-16', '2015-09-16'),
(26, 'ffe', 'fefe', 'fef', '22', '', '', 0, '240.00', 1442427191, 1442427191, '2015-09-16', '2015-09-16'),
(27, 'fef', 'ffe', 'feef', 'feef', '', '', 0, '240.00', 1442427315, 1442427315, '2015-09-16', '2015-09-16');

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` smallint(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`id`, `title`, `price`, `quantity`, `order_id`, `product_id`) VALUES
(14, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 12, 30),
(15, 'Селфи-монопод со шнуром', '230.00', 1, 12, 31),
(16, 'Компактный монопод с выдвижной ручкой', '175.00', 1, 12, 36),
(17, 'Компактный монопод с выдвижной ручкой', '175.00', 1, 13, 36),
(18, 'Селфи-монопод со шнуром', '230.00', 2, 14, 31),
(19, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 14, 30),
(20, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 15, 30),
(21, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 16, 30),
(22, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 17, 30),
(23, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 18, 30),
(24, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 19, 30),
(25, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 2, 20, 30),
(26, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 2, 21, 30),
(27, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 2, 22, 30),
(28, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 2, 23, 30),
(29, 'Селфи-монопод со шнуром', '230.00', 1, 23, 31),
(30, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 24, 30),
(31, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 25, 30),
(32, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 26, 30),
(33, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '240.00', 1, 27, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `name`, `body`) VALUES
(1, 'Доставка и оплата', 'Доставка\r\n\r\n1. По Украине Новой Почтой\r\n\r\n\r\n\r\nВозможна пересылка по Украине службой "Новая Почта" по предварительной оплате на карту приватбанка либо наложенным платежом. Узнать стоимость для вашего города.\r\n\r\nПримерная стоимость доставки 25 грн.\r\n\r\n2. Самовывоз\r\n\r\nУдобный, бесплатный и быстрый способ получения заказа.\r\n\r\nАдрес: г. Днепропетровск, ул. Харьковская, 3, оф. 18\r\n\r\nОплата\r\n\r\n1. На карту Приватбанка\r\n\r\nОплата на карту Приватбанка. Реквизиты карты будут отправлены вместе с информацией о заказе.\r\n\r\n2. Наложенный платеж\r\n\r\nНаложенный платеж при отправке Новой почтой.\r\n\r\n3. Наличными при получении\r\n\r\nОплата наличными при получении в пункте самовывоза.'),
(2, 'FAQ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis laoreet lacus nec enim consectetur, a eleifend erat cursus. Donec lorem mauris, porttitor eget faucibus vel, faucibus vel tortor. Praesent nunc tortor, ultricies vitae orci ac, bibendum pharetra magna. Aliquam vitae lectus hendrerit, sagittis est luctus, porttitor dui. Proin in sodales sapien. Phasellus a faucibus eros. Curabitur ut lobortis ante, vitae eleifend arcu. Nullam vitae consequat magna, et mollis lacus.\r\n\r\nIn semper, neque vel egestas gravida, mi enim iaculis ipsum, ac accumsan justo metus cursus sapien. Nunc non ornare lorem. Maecenas vitae ipsum consequat tortor ultricies ultrices. Cras vel maximus ex, ut accumsan nulla. Proin facilisis lectus et turpis sollicitudin sollicitudin. Integer ut finibus ante, a congue tortor. Sed facilisis mauris et hendrerit convallis. Etiam imperdiet, lectus sed rhoncus posuere, ipsum erat placerat turpis, sit amet luctus neque mauris a eros. Curabitur finibus quis eros sit amet tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas aliquam ullamcorper imperdiet. Aenean sed dolor at nibh malesuada laoreet iaculis in quam. Donec facilisis mi malesuada ex ultrices mollis.\r\n\r\nNunc sagittis ante mi. Suspendisse facilisis, est in ullamcorper finibus, velit magna porttitor nunc, vel commodo erat massa facilisis turpis. Quisque hendrerit ornare nulla, ut semper enim suscipit in. Duis mollis augue a lectus pellentesque eleifend. Phasellus rhoncus vestibulum mauris, imperdiet hendrerit diam sodales in. Donec semper mauris tortor. Aliquam fermentum arcu a erat bibendum maximus. Cras iaculis nunc sit amet rutrum efficitur.\r\n\r\nDuis interdum laoreet mi, a luctus dui interdum in. Nunc bibendum finibus nulla. Sed vitae velit turpis. Ut vehicula non metus placerat faucibus. Sed et dictum velit, sit amet mollis nisl. Morbi sed erat fermentum, ultrices magna in, imperdiet augue. Nullam vel nisi nec nunc gravida fringilla. Vivamus molestie nulla id eros vulputate cursus. Curabitur congue est vel nulla ultrices, a blandit arcu dapibus. Suspendisse consectetur non dolor a rhoncus. Donec pellentesque risus sit amet orci porta, id consequat est porttitor. Vestibulum ut eleifend nunc.\r\n\r\nCurabitur lobortis, ligula bibendum dapibus cursus, mauris libero mattis ante, et hendrerit diam ex faucibus neque. Integer laoreet sit amet purus non consequat. Fusce et sagittis ex. Phasellus condimentum laoreet ante, ut rhoncus purus. Quisque ultrices nisi orci, eget laoreet metus interdum non. Aliquam commodo in dui sed pretium. Nunc fringilla arcu faucibus libero facilisis, quis volutpat nulla vehicula. Fusce bibendum tellus et risus aliquam blandit. Vivamus eget magna non sem convallis fermentum. Nam ultricies vestibulum pulvinar. In sagittis nec magna sed auctor. Nunc fringilla enim ut urna consequat rutrum. Aliquam imperdiet enim sed velit condimentum vehicula. Phasellus dignissim ultrices ante.');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `brand` varchar(128) DEFAULT NULL,
  `description` text NOT NULL,
  `short_description` text,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `slug_ru` varchar(255) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '10',
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT '0.00',
  `currency` varchar(64) NOT NULL DEFAULT 'грн.',
  `vendor` varchar(128) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `top` smallint(6) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `brand`, `description`, `short_description`, `image`, `image_alt`, `slug`, `slug_ru`, `availability`, `price`, `old_price`, `currency`, `vendor`, `rating`, `rating_count`, `top`, `user_id`, `category_id`) VALUES
(30, 'Монопод для Android, Iphone смартфона + Bluetooth брелок', '', 'Палка для селфи (монопод для селфи) с адаптером для мобильного телефона. \r\nПодходит к большинству современных смартфонов и фотокамер весом до 500г.\r\nBluetooth адаптер позволяет делать снимки нажатием кнопки брелка.\r\nВы - всегда в самом центре кадра!\r\n\r\nХарактеристики штатива:\r\n\r\nЦвет: черный\r\nМодель: Z07-1\r\nматериал - алюминиевый сплав\r\nкрепление - стандартный болт на 1/4 + адаптер для мобильного телефона (в комплекте)\r\n7 сегментов для удлинения\r\nМинимальная длина 22,9 см\r\nМаксимальная длина 110 см\r\nДопустимая ширина телефона 55 - 85 мм.\r\nЦвет ручки черный.\r\nВес штатива: 130 г\r\nМаксимальный вес камеры - до 500 г\r\nАнтискользящая ручка, покрытая пенкой быстрое и удобное крепление камеры крепление выставляется под любым углом легкий, портативный в сложеном состоянии помещается в карман.\r\n\r\nХарактеристики Bluetooth брелка:\r\n\r\nЦвет: черный\r\nМодель: iShutter.\r\nИнтерфейс связи: Bluetooth 3.0\r\nЧастота передачи данных: 2.4ГГц - 2,4835ГГц\r\nРасстояние передачи данных: до 10 метров\r\nБатарея: 1хСR2032 срок действия в устройстве 6 месяцев при 10 селфи в день.\r\nРазмеры: 48мм х 30мм х 10 мм\r\nВес: 8 г\r\nМонопод совместим со всеми моделями телефонов Iphone и Android.\r\nДоставка по Украине. \r\n\r\nВ наличии разные цвета.\r\nПалка для селфи (монопод для селфи) с адаптером для мобильного телефона. \r\nПодходит к большинству современных смартфонов и фотокамер весом до 500г.\r\nBluetooth адаптер позволяет делать снимки нажатием кнопки брелка.\r\nВы - всегда в самом центре кадра!\r\n\r\nХарактеристики штатива:\r\n\r\nЦвет: черный\r\nМодель: Z07-1\r\nматериал - алюминиевый сплав\r\nкрепление - стандартный болт на 1/4 + адаптер для мобильного телефона (в комплекте)\r\n7 сегментов для удлинения\r\nМинимальная длина 22,9 см\r\nМаксимальная длина 110 см\r\nДопустимая ширина телефона 55 - 85 мм.\r\nЦвет ручки черный.\r\nВес штатива: 130 г\r\nМаксимальный вес камеры - до 500 г\r\nАнтискользящая ручка, покрытая пенкой быстрое и удобное крепление камеры крепление выставляется под любым углом легкий, портативный в сложеном состоянии помещается в карман.\r\n\r\nХарактеристики Bluetooth брелка:\r\n\r\nЦвет: черный\r\nМодель: iShutter.\r\nИнтерфейс связи: Bluetooth 3.0\r\nЧастота передачи данных: 2.4ГГц - 2,4835ГГц\r\nРасстояние передачи данных: до 10 метров\r\nБатарея: 1хСR2032 срок действия в устройстве 6 месяцев при 10 селфи в день.\r\nРазмеры: 48мм х 30мм х 10 мм\r\nВес: 8 г\r\nМонопод совместим со всеми моделями телефонов Iphone и Android.\r\nДоставка по Украине. \r\n\r\nВ наличии разные цвета.', 'Палка для селфи (монопод для селфи) с адаптером для мобильного телефона. \r\nПодходит к большинству современных смартфонов и фотокамер весом до 500г.\r\nBluetooth адаптер позволяет делать снимки нажатием кнопки брелка.\r\nВы - всегда в самом центре кадра!', '130920151106015d369e249abda062HTB1J9AmFpXXXXX9apXXq6xXFXXXL.300x300.jpg', 'Монопод для Android, Iphone смартфона + Bluetooth брелок', 'monopod-dla-android-iphone-smartfona-bluetooth-brelok', 'монопод-для-android-iphone-смартфона-bluetooth-брелок', 0, '240.00', '0.00', 'грн.', '', 4, 30, 10, NULL, 1),
(31, 'Селфи-монопод со шнуром', '', 'Тип головки: 2D\r\nМаксимальная высота съемки - 118 см\r\nМинимальная высота съемки - 23 см\r\nМаксимальная нагрузка - 0.5 кг\r\nРекомендуемая нагрузка - 0.2 кг\r\nКоличество секций - 7\r\nДлина в сложенном состоянии - 21.5 см\r\nСовместимость: Andriod 3.0 и выше, iOS 5.0 и выше\r\nПодходит для: смартфонов, фотоаппаратов, камер GoPro\r\nПодключение к смартфону: через кабель 3.5 мм\r\nВес - 0.162 кг\r\nЦвет - черный\r\nНе нуждается в зарядке!\r\nГарантия - 1 месяц', 'Тип головки: 2D\r\nМаксимальная высота съемки - 118 см\r\nМинимальная высота съемки - 23 см\r\nМаксимальная нагрузка - 0.5 кг\r\nРекомендуемая нагрузка - 0.2 кг\r\nКоличество секций - 7', '13092015110834f438f831be6745a1Monopod-palka-dlya-selfi-Z07-5S-s-provodom-chernyiy1-500x500.300x300.jpg', 'Селфи-монопод со шнуром', 'selfi-monopod-so-snurom', 'селфи-монопод-со-шнуром', 10, '230.00', '0.00', 'грн.', '', 2.1, 6, 10, NULL, 1),
(36, 'Компактный монопод с выдвижной ручкой', '', 'Вес: 150 г\r\nДлина в разобранном виде - 48 см\r\nДлина в сложенном виде: 13,8 см\r\nМатериал: алюминий\r\nТип: - компактный монопод\r\nСовместимость - Android, IOS\r\nНе требует зарядки!\r\nКак сделать фото \r\n1.   Соедитение телефон и монопод с помощью кабеля \r\n2.   Нажмите кнопку на палке  и сделайте фото', 'Вес: 150 г\r\nДлина в разобранном виде - 48 см\r\nДлина в сложенном виде: 13,8 см\r\nМатериал: алюминий\r\nТип: - компактный монопод\r\nСовместимость - Android, IOS\r\nНе требует зарядки!\r\nКак сделать фото \r\n1.   Соедитение телефон и монопод с помощью кабеля \r\n2.   Нажмите кнопку на палке  и сделайте фото', '1409201518353475597b311b21c8ed2015-Extendable-Handheld-Self-portrait-Monopod-For-iPhone-Samsung-HTC-SONY-Free-Ship-Black.300x300.jpg', 'Компактный монопод с выдвижной ручкой', 'kompaktnyj-monopod-s-vydviznoj-ruckoj', 'компактный-монопод-с-выдвижной-ручкой', 10, '175.00', '200.55', 'грн.', '', 0, 0, 10, NULL, 1),
(37, 'Портативный mini mp3 плеер с поддержкой MicroSD', '', 'Удобный и компактный mp3 плеер для занятия спортом и активного образа жизни.\r\n\r\nХарактеристики:\r\nЖидкокристаллический дисплей;\r\nУправление громкостью звучания;\r\nКлипсообразное крепление на одежду либо иной предмет;\r\nСистемная память: нет;\r\nПоддержка карт памяти: microSD объемом до 8 гигабайт;\r\nСвязь с другими устройствами: USB 2.0;\r\nВремя общей работы устройства: до 4-х часов;\r\nВремя полной зарядки устройства: 2 часа;\r\nЗарядка: с помощью USB шнура (шнур+компьютер, шнур+блок питания);\r\nРазмер входа для наушников: стандартный (3,5 мм);\r\nРазмеры: 2,2 см х 4,1 см х 1,2 см;\r\nВес: 119,84 г;\r\nКорпус: металлический;\r\n\r\nКарта Micro SD в комплект не входит.\r\nЦвет: уточняйте у менеджера', 'Удобный и компактный mp3 плеер для занятия спортом и активного образа жизни.\r\n\r\nХарактеристики:\r\nЖидкокристаллический дисплей;\r\nУправление громкостью звучания;\r\nКлипсообразное крепление на одежду либо иной предмет;\r\nСистемная память: нет;\r\nПоддержка карт памяти: microSD объемом до 8 гигабайт;\r\nСвязь с другими устройствами: USB 2.0;\r\nВремя общей работы устройства: до 4-х часов;', '15092015163131c248bf7b78b56ee0IPOD-007.300x300.jpg', 'Портативный mini mp3 плеер с поддержкой MicroSD', 'portativnyj-mini-mp3-pleer-s-podderzkoj-microsd', 'портативный-mini-mp3-плеер-с-поддержкой-microsd', 10, '100.00', NULL, 'грн.', '', 0, 0, 10, NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_id`) VALUES
(71, 31, 80),
(72, 31, 81),
(73, 31, 82),
(79, 36, 89),
(80, 36, 90),
(81, 36, 91),
(82, 30, 92),
(83, 30, 93),
(84, 30, 94),
(85, 30, 95),
(86, 30, 96),
(87, 30, 97),
(88, 37, 98),
(89, 37, 99);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT 'новый'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `first_name`, `last_name`, `body`, `status`) VALUES
(1, 'ауау', 'аау', 'уаауауауауауауау', 'отклонен'),
(2, 'Вовка', 'Вовкин', 'Ниче так магаз.', 'готово'),
(3, 'Майк', 'Тайсон', 'Крутые цены!', 'готово'),
(4, 'фа', 'афу', 'афуа', 'новый'),
(5, 'кк3', 'к3к3', 'кк3к3', 'новый'),
(6, 'ау', 'ауу', 'ауау', 'новый'),
(7, 'вася', 'васин', 'плохой магазин!', 'новый');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at_date` date DEFAULT NULL,
  `updated_at_date` date DEFAULT NULL,
  `role_id` int(11) DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `created_at_date`, `updated_at_date`, `role_id`) VALUES
(6, 'root', '-NwG9Kheru2FpXGUnRA7C2M5GVqI71hX', '$2y$13$60iPoIQ4jGar0PNHgItUjewQEQd6FM2YDCg.CoRu7NRftcFvrawiW', NULL, 'root@email.com', 10, 1442422196, 1442422196, '2015-09-16', '2015-09-16', 1),
(7, 'vova', 'e8S0FK0A0N2hfme7T3Kc6pJkFtnm2Za5', '$2y$13$etkScJ1/D.VZwPCM48SDPOSJuiKH1aPkwuYgDEx4QfrC06UBbeFve', NULL, 'vova@email.com', 10, 1442422675, 1442422902, '2015-09-16', '2015-09-16', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `call`
--
ALTER TABLE `call`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ip_product` (`product_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_order` (`order_id`),
  ADD KEY `fk_order_product` (`product_id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_user` (`user_id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Индексы таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_image_product` (`product_id`),
  ADD KEY `fk_product_image_image` (`image_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `call`
--
ALTER TABLE `call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT для таблицы `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `fk_ip_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_product_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
