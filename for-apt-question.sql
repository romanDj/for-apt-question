-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 17 2019 г., 14:09
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `for-apt-question`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `id_answer_content` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `id_answer_content`, `id_question`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 1, 4),
(8, 2, 4),
(9, 1, 5),
(10, 2, 5),
(11, 1, 6),
(12, 2, 6),
(15, 6, 8),
(16, 7, 8),
(17, 8, 8),
(18, 9, 8),
(19, 3, 7),
(20, 4, 7),
(21, 5, 7),
(22, 6, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `answer_content`
--

CREATE TABLE `answer_content` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answer_content`
--

INSERT INTO `answer_content` (`id`, `name`) VALUES
(1, 'Да'),
(2, 'Нет'),
(3, 'эффективно'),
(4, 'малоэффективно'),
(5, 'неэффективно'),
(6, 'плохая организация практики'),
(7, 'недостаточный контроль за прохождением практики со стороны  мастера производственного обучения '),
(8, 'незаинтересованность студентов в прохождении практики'),
(9, 'загруженность мастера производственного обучения');

-- --------------------------------------------------------

--
-- Структура таблицы `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `id_specialty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `module`
--

INSERT INTO `module` (`id`, `name`, `id_specialty`) VALUES
(7, '1C', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_practice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participant`
--

INSERT INTO `participant` (`id`, `date`, `id_practice`) VALUES
(10, '2019-02-16', 1),
(11, '2019-02-16', 1),
(12, '2019-02-17', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `practice`
--

CREATE TABLE `practice` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `practice`
--

INSERT INTO `practice` (`id`, `name`, `id_module`) VALUES
(1, 'Производственная', 7),
(2, 'Учебная', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `multi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `content`, `multi`) VALUES
(1, 'Удовлетворили ли Вас сроки практики? Достаточны ли они?', 0),
(2, 'Достаточно ли было консультаций?', 0),
(3, 'Предоставляется ли Вам на предприятии необходимая информация (документация, материалы, чертежи)?', 0),
(4, 'Предложено ли Вам руководством предприятия трудоустройство по окончании техникума?', 0),
(5, 'Оказывали ли Вам реальную помощь в период практики руководители от техникума?', 0),
(6, 'Оказался ли теоретический уровень Ваших знаний достаточным для прохождения практики?', 0),
(7, 'Насколько эффективно была организована практика?', 0),
(8, 'Если Вы отметили пункты 2 либо 3 предыдущего вопроса, почему на Ваш взгляд практика была проведена недостаточно эффективно (можно выбрать несколько вариантов ответов)?', 1),
(9, 'Ваши предложения, замечания и пожелания по организации и прохождению практики', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_answer` int(11) DEFAULT NULL,
  `desccription` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `result`
--

INSERT INTO `result` (`id`, `id_participant`, `id_question`, `id_answer`, `desccription`) VALUES
(56, 10, 7, 5, NULL),
(57, 10, 8, 7, NULL),
(58, 10, 8, 8, NULL),
(59, 11, 1, 1, NULL),
(60, 11, 2, 1, NULL),
(61, 11, 3, 1, NULL),
(62, 11, 4, 2, NULL),
(63, 11, 5, 1, NULL),
(64, 11, 6, 1, NULL),
(65, 11, 7, 3, NULL),
(66, 11, 9, NULL, 'дщщщ'),
(67, 12, 1, 2, NULL),
(68, 12, 2, 2, NULL),
(69, 12, 3, 2, NULL),
(70, 12, 4, 2, NULL),
(71, 12, 5, 2, NULL),
(72, 12, 6, 2, NULL),
(73, 12, 7, 5, NULL),
(74, 12, 8, 8, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE `specialty` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`id`, `name`) VALUES
(1, 'Информационные системы'),
(3, 'Автоматизация');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `id_practice` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `id_practice`, `id_question`) VALUES
(19, 1, 1),
(20, 1, 2),
(21, 1, 3),
(22, 1, 4),
(23, 1, 5),
(24, 1, 6),
(25, 1, 7),
(26, 1, 8),
(27, 1, 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_content` (`id_answer_content`),
  ADD KEY `idx_question` (`id_question`);

--
-- Индексы таблицы `answer_content`
--
ALTER TABLE `answer_content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sprecialty` (`id_specialty`);

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_practice` (`id_practice`);

--
-- Индексы таблицы `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_module` (`id_module`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_participant` (`id_participant`),
  ADD KEY `idx_question` (`id_question`),
  ADD KEY `idx_answer` (`id_answer`);

--
-- Индексы таблицы `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_practice` (`id_practice`),
  ADD KEY `idx_question` (`id_question`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `answer_content`
--
ALTER TABLE `answer_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT для таблицы `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`id_answer_content`) REFERENCES `answer_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_specialty`) REFERENCES `specialty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id_practice`) REFERENCES `practice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `practice`
--
ALTER TABLE `practice`
  ADD CONSTRAINT `practice_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`id_answer`) REFERENCES `answer_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`id_practice`) REFERENCES `practice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
