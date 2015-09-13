-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.22-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных dbSPKKolizei
CREATE DATABASE IF NOT EXISTS `dbSPKKolizei` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbSPKKolizei`;


-- Дамп структуры для таблица dbSPKKolizei.tbAсzia
CREATE TABLE IF NOT EXISTS `tbAсzia` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sZagolovok` varchar(50) NOT NULL,
  `sYakar` varchar(50) DEFAULT NULL COMMENT 'Якорная ссылка на пост',
  `tOpisanie` text NOT NULL,
  `tUslovie` text,
  `tPriz` text,
  `dPostPublic` date NOT NULL COMMENT 'Дата публикации',
  `iPrioritet` smallint(6) unsigned NOT NULL COMMENT 'Чем выше приоритет тем выше пост',
  `dAkziaEnd` date DEFAULT NULL COMMENT 'Дата окончания акции',
  `bDeistvitelna` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Действительна ли ещё акция',
  `sImg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `unPrioritet` (`iPrioritet`),
  UNIQUE KEY `unYakor` (`sYakar`),
  KEY `inDeistvitelna` (`bDeistvitelna`),
  KEY `inPrioritet` (`iPrioritet`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbSPKKolizei.tbAсzia: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `tbAсzia` DISABLE KEYS */;
INSERT INTO `tbAсzia` (`ID`, `sZagolovok`, `sYakar`, `tOpisanie`, `tUslovie`, `tPriz`, `dPostPublic`, `iPrioritet`, `dAkziaEnd`, `bDeistvitelna`, `sImg`) VALUES
	(1, '10% всем имининикам', 'akzImininik', 'Спортивный пейнтбольный клуб Колизей будет рад видеть иминиников неделт.Имининик недели и его друзья получат скидку 10% на игру.Так же имининка будет ждать небольшой подарок на память от СПК Колизей.', '-Быть иминиником недели\r\n-Показать перед игрой паспорт или свидетельство о рождение\r\n-Сообщить при регистрации что будет  имининик', 'Скидка 10% на одну игру для имининика и его друзей', '2015-09-03', 1, NULL, 1, 'akz1.jpeg'),
	(2, '10% скидки при многочисленной игре', 'akzChelovek15', 'Спортивный пейнтбольный клуб Колизей очень любит многочисленные пейнтбольные баталии. Если в одной игре учавствуют 15 и больше игроков, то каждого ждёт скидка!', '-Количество одновременно играющих людей 15 или более\r\n-Сообщить при регистрации что будет  15 или более игроков\r\n', 'Скидка 10% игру для всех игроков', '2015-09-03', 2, NULL, 1, 'akz2.jpg'),
	(3, 'Чем чаще играешь, тем выше скидка', 'akzSvoiChelovek', 'Спортивный пейнтбольный клуб Колизей рад видеть постоянных игроков в своих рядах. Чем дольше ты с СПК Колизей, тем выше будет твоя скидка на игру и тренировку. Размер скидки зависет от колличества балов которые ты набераешь в СПК Колизей.\r\n\r\nБалы начисляються за:\r\n-Игру-5 балов\r\n-Участие в соревнованиях-25 балов\r\n-Участие в маневрах-25 балов\r\n-Месяц тренировок-50 балов', '-Набрать 100 балов что бы стать бывалым игроком СПК Колизей\r\n-Набрать 500 балов что бы стать своим для СПК Колизей\r\n-Набрать 1500 балов что бы стать членом СПК Колизей', '-Бывалым скидка 5% на любую игру и тренировку\r\n-Своим скидка 7% на любую игру и тренировку\r\n-Членам СПК скидка 10% на любую игру и тренировку\r\n', '2015-09-03', 3, NULL, 1, 'akz3.jpg');
/*!40000 ALTER TABLE `tbAсzia` ENABLE KEYS */;


-- Дамп структуры для таблица dbSPKKolizei.tbDesk
CREATE TABLE IF NOT EXISTS `tbDesk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sName` varchar(50) NOT NULL,
  `sUrl` varchar(50) DEFAULT NULL,
  `sHref` varchar(50) DEFAULT NULL,
  `imgBackground` varchar(50) NOT NULL DEFAULT 'BoardNone.jpg',
  `iPoriadok` tinyint(4) NOT NULL,
  `bShow` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `iPoriadok` (`iPoriadok`),
  KEY `inPoriadok` (`iPoriadok`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbSPKKolizei.tbDesk: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `tbDesk` DISABLE KEYS */;
INSERT INTO `tbDesk` (`id`, `sName`, `sUrl`, `sHref`, `imgBackground`, `iPoriadok`, `bShow`) VALUES
	(2, 'Проведение тренеровок', 'BoardNone.jpg', 'Узнать подробнее', 'BoardNone.jpg', 1, 1),
	(4, 'Проведение тренеровок', 'BoardNone.jpg', 'Узнать подробнее', 'BoardNone.jpg', 2, 1),
	(6, 'Проведение тренеровок', 'BoardNone.jpg', 'Узнать подробнее', 'BoardNone.jpg', 3, 1);
/*!40000 ALTER TABLE `tbDesk` ENABLE KEYS */;


-- Дамп структуры для таблица dbSPKKolizei.tbSlaider
CREATE TABLE IF NOT EXISTS `tbSlaider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sName` varchar(50) DEFAULT NULL,
  `sUrl` varchar(50) DEFAULT NULL,
  `sHref` varchar(50) DEFAULT NULL,
  `imgSlaid` varchar(50) DEFAULT 'notSlaid.jpg',
  `iPoriadok` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iPoriadok` (`iPoriadok`),
  KEY `inPoriadok` (`iPoriadok`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbSPKKolizei.tbSlaider: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `tbSlaider` DISABLE KEYS */;
INSERT INTO `tbSlaider` (`id`, `sName`, `sUrl`, `sHref`, `imgSlaid`, `iPoriadok`) VALUES
	(1, 'Тренировки', 'uslugi.php#trenirovki', 'ПН-ПТ с 17:00 до 19:00', 'slaid1.jpg', 1),
	(2, 'Чем больше народу, тем больше скидка', 'akzii.php#skidkaZaNarod', 'Узнай подробнее', 'slaid2.jpg', 2),
	(3, 'Кубак томата', 'sobitia.php?sobitiaID=2', 'Узнай подробнее', 'slaid3.jpg', 3);
/*!40000 ALTER TABLE `tbSlaider` ENABLE KEYS */;


-- Дамп структуры для таблица dbSPKKolizei.tbUser
CREATE TABLE IF NOT EXISTS `tbUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sLogin` varchar(50) NOT NULL,
  `sPas` varchar(150) NOT NULL,
  `sEmail` varchar(50) DEFAULT NULL,
  `sPhone` varchar(50) DEFAULT NULL,
  `sName` varchar(50) DEFAULT NULL,
  `sFam` varchar(50) DEFAULT '',
  `bAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sLogin` (`sLogin`),
  UNIQUE KEY `sEmail` (`sEmail`),
  UNIQUE KEY `sPhone` (`sPhone`),
  KEY `inLogin` (`sLogin`),
  KEY `inEmail` (`sEmail`),
  KEY `inPhone` (`sPhone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbSPKKolizei.tbUser: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `tbUser` DISABLE KEYS */;
INSERT INTO `tbUser` (`id`, `sLogin`, `sPas`, `sEmail`, `sPhone`, `sName`, `sFam`, `bAdmin`) VALUES
	(1, 'admin', 'db5420bf488c677661e505373b316580', 'pkkolizey@yandex.ru', '9143607706', 'Анатолий', 'Коцеруба', 1);
/*!40000 ALTER TABLE `tbUser` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
