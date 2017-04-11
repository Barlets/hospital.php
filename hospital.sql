-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2016 г., 14:58
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(255) NOT NULL,
  `doc_position` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `doc_position`, `first_name`, `last_name`, `patronymic`) VALUES
(1, 'Терапаевт', 'Инокентий', 'Хрыч', 'Харламович'),
(2, 'Травматолог', 'Сергей', 'Бубенцов', 'Анатольевич'),
(3, 'Окулист', 'Валерий', 'Коваль', 'Александрович'),
(4, 'Хирург', 'Александр', 'Лейбенко', 'Анатольевич'),
(5, 'Психоневролог', 'Василий', 'Вальцман', 'Пантелеймонович'),
(6, 'Стоматолог', 'Артем', 'Мамочкин', 'Вениаминович');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors_patients`
--

CREATE TABLE IF NOT EXISTS `doctors_patients` (
  `id` int(255) NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `patient_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctors_patients`
--

INSERT INTO `doctors_patients` (`id`, `doctor_id`, `patient_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 2, 1),
(5, 2, 3),
(6, 2, 5),
(7, 3, 3),
(8, 3, 5),
(9, 3, 6),
(10, 4, 6),
(11, 4, 5),
(12, 4, 1),
(13, 5, 3),
(14, 5, 5),
(15, 6, 2),
(16, 6, 6),
(17, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `patronymic`, `birthday`) VALUES
(1, 'Валерия', 'Дяденко', 'Александровна', '2001-01-25'),
(2, 'Александра', 'Шоган', 'Валерьевна', '1979-02-11'),
(3, 'Ирина', 'Мышь', 'Антоновна', '1999-10-22'),
(4, 'Зинаида', 'Азатян', 'Поликарповна', '1992-08-06'),
(5, 'Елена', 'Ткаченко', 'Артемовна', '1988-02-18'),
(6, 'Галина', 'Канарейко', 'Ивановна', '1975-09-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctors_patients`
--
ALTER TABLE `doctors_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_doctors_patients_doctors` (`doctor_id`),
  ADD KEY `FK_doctors_patients_patients` (`patient_id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `doctors_patients`
--
ALTER TABLE `doctors_patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors_patients`
--
ALTER TABLE `doctors_patients`
  ADD CONSTRAINT `FK_doctors_patients_doctors` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `FK_doctors_patients_patients` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
