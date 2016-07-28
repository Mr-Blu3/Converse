-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 20 apr 2015 kl 11:59
-- Serverversion: 5.6.21
-- PHP-version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `converse`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
`table_id` int(11) unsigned NOT NULL,
  `subject` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `friend`
--

INSERT INTO `friend` (`table_id`, `subject`, `friend_id`) VALUES
(41, 1, 3),
(42, 3, 1),
(43, 1, 31),
(44, 31, 1),
(45, 1, 7),
(46, 7, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`table_id` int(11) unsigned NOT NULL,
  `sender` int(11) NOT NULL,
  `content` text NOT NULL,
  `receiver` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `unread` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `message`
--

INSERT INTO `message` (`table_id`, `sender`, `content`, `receiver`, `time`, `unread`) VALUES
(1, 8, 'Hej!', 1, '2015-03-23 01:49:31', 1),
(2, 1, 'Hall&aring;!', 8, '2015-03-23 01:51:05', 1),
(3, 1, 'Hej', 6, '2015-04-03 23:24:06', 0),
(4, 26, 'Hej', 1, '2015-04-09 09:45:17', 0),
(5, 27, 'sd', 1, '2015-04-09 14:24:25', 1),
(6, 1, 'Hej', 22, '2015-04-20 11:10:03', 0),
(7, 1, 'Hej', 3, '2015-04-20 11:54:48', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `status` text NOT NULL,
  `status_time` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `status`, `status_time`, `avatar`) VALUES
(1, 'Rebbecca', '123456', 'Rebecca@Hotmail.com', 'I love dancing!!!', '2015-02-26 00:13:33', 'http://localhost/converse/views/img/default_female.png'),
(2, 'Tommy', 'haha', 'tommy@gmail.com', 'tommy is here', '0000-00-00 00:00:00', 'http://localhost/converse/views/img/default_male.png'),
(3, 'Mike', '12345', 'mike@yahoo.se', 'mike''s feet are happy', '0000-00-00 00:00:00', 'http://localhost/converse/views/img/default_male.png'),
(4, 'Emma', 'blablabla', 'emma@gmail.com', 'relaxing on the beach', '2015-02-25 23:54:11', 'http://localhost/converse/views/img/default_female.png'),
(5, 'Erik', 'footbook', 'erik@gmail.com', 'Nothing is better than fluffy shoes!', '2015-02-26 11:29:04', 'http://localhost/converse/views/img/default_none.jpg'),
(6, 'Marcus', '12345', 'marcus@gmail.com', 'marcus is happy', '0000-00-00 00:00:00', 'http://localhost/converse/views/img/default_male.png'),
(7, 'Elin', '12345', 'elin@hotmail.com', '', '0000-00-00 00:00:00', 'http://localhost/converse/views/img/default_female.png'),
(31, 'Pontus', '123456', 'pontusp66@hotmail.com', '', '0000-00-00 00:00:00', 'http://localhost/converse/views/img/default_male.png');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `friend`
--
ALTER TABLE `friend`
 ADD PRIMARY KEY (`table_id`);

--
-- Index för tabell `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`table_id`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `friend`
--
ALTER TABLE `friend`
MODIFY `table_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT för tabell `message`
--
ALTER TABLE `message`
MODIFY `table_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
