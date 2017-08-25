-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4998
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Dumping data for table test.comments: ~20 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`cid`, `userid`, `comment_user`, `comment`, `likes`, `commenter`) VALUES
	(48, 4, 4, 'Hello', 0, 'BillM'),
	(49, 1, 4, 'Hello', 0, 'BillM'),
	(50, 2, 4, 'Hello', 0, 'BillM'),
	(51, 3, 4, 'Hello', 0, 'BillM'),
	(52, 5, 4, 'Hello', 0, 'BillM'),
	(53, 6, 4, 'Hello', 0, 'BillM'),
	(54, 1, 1, 'Hello', 1, 'KyleG'),
	(55, 2, 1, 'Hello', 0, 'KyleG'),
	(56, 3, 1, 'Hello', 0, 'KyleG'),
	(57, 4, 1, 'Hello', 1, 'KyleG'),
	(58, 5, 1, 'Hello', 0, 'KyleG'),
	(59, 6, 1, 'i dont know you', 0, 'KyleG'),
	(60, 5, 5, 'Whoopie!!!!', 1, 'KevinB'),
	(61, 1, 5, 'Herro', 1, 'KevinB'),
	(62, 2, 5, 'Herro', 0, 'KevinB'),
	(63, 3, 5, 'Herro', 0, 'KevinB'),
	(64, 4, 5, 'DUuuuuuude!', 1, 'KevinB'),
	(65, 6, 5, 'Sgt. Peppers\' Lonely Hearts Club Baaaannndd', 0, 'KevinB'),
	(66, 3, 3, 'Hello', 0, 'YassinT'),
	(67, 1, 3, 'Hello', 0, 'YassinT'),
	(68, 2, 3, 'Hello', 0, 'YassinT'),
	(69, 3, 3, 'Hello', 0, 'YassinT'),
	(70, 4, 3, 'Yoyoyo', 2, 'YassinT'),
	(71, 5, 3, 'Shalom', 1, 'YassinT'),
	(72, 6, 3, 'I can\'t do it Captain, I don\'t have the power!', 0, 'YassinT'),
	(73, 2, 2, 'I dont understand', 0, 'TyroneL'),
	(74, 1, 2, 'I dont understand', 1, 'TyroneL'),
	(75, 3, 2, 'I dont understand', 0, 'TyroneL'),
	(76, 4, 2, 'I dont understand', 2, 'TyroneL'),
	(77, 5, 2, 'I dont understand', 0, 'TyroneL'),
	(78, 6, 2, 'I dont understand', 0, 'TyroneL'),
	(79, 6, 6, 'Here\'s the pulse...', 0, 'SuzanneC'),
	(80, 4, 6, 'You shall not pass!', 1, 'SuzanneC'),
	(81, 1, 6, 'Hello', 0, 'SuzanneC'),
	(82, 5, 6, 'I am a robot', 1, 'SuzanneC'),
	(83, 2, 6, 'Get it together Tyrone!', 5, 'SuzanneC');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping data for table test.forgotpassword: ~0 rows (approximately)
/*!40000 ALTER TABLE `forgotpassword` DISABLE KEYS */;
/*!40000 ALTER TABLE `forgotpassword` ENABLE KEYS */;

-- Dumping data for table test.users_table: ~6 rows (approximately)
/*!40000 ALTER TABLE `users_table` DISABLE KEYS */;
INSERT INTO `users_table` (`id`, `username`, `password`, `fname`, `lname`, `tel`, `email`) VALUES
	(1, 'KyleG', '12345678', 'Kyle', 'G', '8222666', 'kyle@cct.ie'),
	(2, 'TyroneL', 'password', 'Tyrone', 'Longenhaven', '4444444', 'tyrone@gmail.com'),
	(3, 'YassinT', 'password', 'Yassin', 'Ting', '5555555', 'yassin@gmail.com'),
	(4, 'BillM', 'password', 'Bill', 'Malone', '4159103', 'w.malone@ymail.com'),
	(5, 'KevinB', 'password', 'Kevin', 'Brunacini', '6666666', 'kevin@gmail.com'),
	(6, 'SuzanneC', 'password', 'Suzanne', 'Carvalho', '7777777', 'suz@gmail.com');
/*!40000 ALTER TABLE `users_table` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
