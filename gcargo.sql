-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Окт 21 2024 г., 16:34
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gcargo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '\r\n                    <p>Компания <b>ООО «Дженерал Карго»</b> предлагает Вашему вниманию услуги по доставке <b>Сборных\r\n                            Грузов</b>,\r\n                        требующих особых температурных условий хранения и перевозки, по регионам Российской Федерации.\r\n                    </p>\r\n                    <p>Наши преимущества:</p>\r\n                    <p>Современный Распределительный Центр, расположенный на Юге Санкт-Петербурга — <a\r\n                            href=\"https://yandex.ru/maps/-/CCBaVUlN\"><b>Московское шоссе 82 Б</b></a>.</p>\r\n                    <ul>\r\n                        <li>Наличие собственного рефрижераторного парка грузоподъемностью 20 тонн.</li>\r\n                        <li>Работа с грузами весом <b>от 1 кг</b>;</li>\r\n                        <li>Перевозка грузов в двух температурных режимах <b>-18 и +2 +4</b> градуса Цельсия.</li>\r\n                        <li>Отправки продукции в более чем 80 городов России.</li>\r\n                        <li>Поставки «точно в срок»;</li>\r\n                        <li>Качественное оформление и возврат товарно-сопроводительной документации.</li>\r\n                    </ul>\r\n                    <p>С нами удобно:</p>\r\n                    <p>Индивидуальный подход к каждому Клиенту. С Вами работает персональный менеджер;</p>\r\n                    <ul>\r\n                        <li>Возможность обеспечить прием груза у Вас на складе, доставка возвратной продукции на Ваш\r\n                            склад;</li>\r\n                        <li>Оперативное информирование Клиента по всем вопросам, возникающим в процессе доставки и сдаче\r\n                            товара, посредством телефонной связи и электронной почты;</li>\r\n                        <li>Доступность сервиса <b>24 часа</b> в сутки.</li>\r\n                    </ul>');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`) VALUES
(1, 'РОССИЯ, 196626, г Санкт-Петербург, п Шушары, ш Московское,<br>дом 82, лит.А, оф.№301', '+7 (921) 775 14 07');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sourse` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `date`, `description`, `content`, `sourse`, `image`) VALUES
(1, 'X5 Retail Group вместе с PickPoint установит в супермаркетах 1,5 тысячи постаматов', 'Дженерал Карго', '2019-04-05 00:00:00', 'X5 Retail Group (управляет сетями «Пятерочка», «Перекресток» и «Карусель») создаст совместное предприятие (СП) с сервисом доставки через постаматы PickPoint, сообщается на сайте ретейлера. Партнеры планируют развивать сеть постаматов в магазинах Х5. К концу 2019 года число боксов под управлением СП должно достичь 1,5 тыс. Новая совместная компания будет создана путем регистрации нового юридического лица на …', '<img src=\'../images/PP.png\'/>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis massa ac nisl consectetur facilisis. Praesent rutrum ac mauris sit amet hendrerit. Integer quis ultrices lorem. Proin commodo ullamcorper neque ac consequat. Aliquam tempor iaculis augue ac maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nisl metus. Pellentesque euismod, libero non sagittis aliquet, erat nibh tincidunt dui, quis lacinia nisi mauris non urna. Sed vestibulum scelerisque lectus a tincidunt. Morbi sit amet neque at massa ullamcorper egestas. Etiam a enim nunc. Duis at egestas eros. Sed orci massa, viverra at maximus eget, maximus ut diam. Morbi ultrices, diam vel pellentesque consectetur, libero libero hendrerit odio, sed iaculis lorem ex non arcu.</p>', 'https://www.dp.ru/a/2019/02/19/X5_Retail_Group_vmeste_s', ''),
(2, 'Эксперт: управление тарифом для загрузки простаивающей инфраструктуры – перспективное решение', 'Дженерал Карго', '2019-04-05 23:56:22', 'Идея РЖД о предоставлении скидок грузоотправителям на малозагруженных направлениях – здравая, считает директор группы корпоративных рейтингов АКРА Максим Худалов. И ее реализация может стать первым шагом на пути к расширению диспетчеризации в рамках монополии. – Возможность гибко управлять тарифом, чтобы загрузить простаивающую инфраструктуру – это перспективное решение. К сожалению, основной проблемы российской железной дороги – …', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis massa ac nisl consectetur facilisis. Praesent rutrum ac mauris sit amet hendrerit. Integer quis ultrices lorem. Proin commodo ullamcorper neque ac consequat. Aliquam tempor iaculis augue ac maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nisl metus. Pellentesque euismod, libero non sagittis aliquet, erat nibh tincidunt dui, quis lacinia nisi mauris non urna. Sed vestibulum scelerisque lectus a tincidunt. Morbi sit amet neque at massa ullamcorper egestas. Etiam a enim nunc. Duis at egestas eros. Sed orci massa, viverra at maximus eget, maximus ut diam. Morbi ultrices, diam vel pellentesque consectetur, libero libero hendrerit odio, sed iaculis lorem ex non arcu.</p>', 'http://logirus.ru/news/transport/ekspert-_upravlenie_tarifom_dlya_zagruzki_prostaivayushchey_infrastruktury_-_perspektivnoe_reshenie.html', '../images/TH.jpg'),
(3, 'Транспортная накладная (ТН или ТрН) 2021', 'Дженерал Карго', '2021-02-21 00:00:00', 'Транспортная накладная заполняется только при заказе перевозки у компании, оказывающей услуги по грузоперевозкам. Согласно п. 6 Постановления Правительства РФ от 15 апреля 2011 г. № 272 «Об утверждении Правил перевозок грузов автомобильным транспортом» заключение договора перевозки груза подтверждается транспортной накладной, составленной грузоотправителем.В соответствии с Постановлением Правительства РФ от 21.12.20 № 2200 внесены изменения в форму …', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis massa ac nisl consectetur facilisis. Praesent rutrum ac mauris sit amet hendrerit. Integer quis ultrices lorem. Proin commodo ullamcorper neque ac consequat. Aliquam tempor iaculis augue ac maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nisl metus. Pellentesque euismod, libero non sagittis aliquet, erat nibh tincidunt dui, quis lacinia nisi mauris non urna. Sed vestibulum scelerisque lectus a tincidunt. Morbi sit amet neque at massa ullamcorper egestas. Etiam a enim nunc. Duis at egestas eros. Sed orci massa, viverra at maximus eget, maximus ut diam. Morbi ultrices, diam vel pellentesque consectetur, libero libero hendrerit odio, sed iaculis lorem ex non arcu.</p>', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
