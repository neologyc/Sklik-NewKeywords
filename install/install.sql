-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `seed_keyword` varchar(128) COLLATE utf8_bin NOT NULL,
  `keyword` varchar(100) COLLATE utf8_bin NOT NULL,
  `search_count` int(11) NOT NULL,
  `cpc` double NOT NULL,
  `solved` tinyint(4) DEFAULT NULL,
  `2018-01` int(8) NOT NULL,
  `2018-02` int(8) NOT NULL,
  `2018-03` int(8) NOT NULL,
  `2018-04` int(8) NOT NULL,
  `2018-05` int(8) NOT NULL,
  `2018-06` int(8) NOT NULL,
  `2018-07` int(8) NOT NULL,
  `2018-08` int(8) NOT NULL,
  `2018-09` int(8) NOT NULL,
  `2018-10` int(8) NOT NULL,
  `2018-11` int(8) NOT NULL,
  `2018-12` int(8) NOT NULL,
  `2019-01` int(8) NOT NULL,
  `2019-02` int(8) NOT NULL,
  `2019-03` int(8) NOT NULL,
  `2019-04` int(8) NOT NULL,
  `2019-05` int(8) NOT NULL,
  `2019-06` int(8) NOT NULL,
  `2019-07` int(8) NOT NULL,
  `2019-08` int(8) NOT NULL,
  `2019-09` int(8) NOT NULL,
  `2019-10` int(8) NOT NULL,
  `2019-11` int(8) NOT NULL,
  `2019-12` int(8) NOT NULL,
  `diff-2018-01` int(8) NOT NULL,
  `diff-2018-02` int(8) NOT NULL,
  `diff-2018-03` int(8) NOT NULL,
  `diff-2018-04` int(8) NOT NULL,
  `diff-2018-05` int(8) NOT NULL,
  `diff-2018-06` int(8) NOT NULL,
  `diff-2018-07` int(8) NOT NULL,
  `diff-2018-08` int(8) NOT NULL,
  `diff-2018-09` int(8) NOT NULL,
  `diff-2018-10` int(8) NOT NULL,
  `diff-2018-11` int(8) NOT NULL,
  `diff-2018-12` int(8) NOT NULL,
  `diff-2019-01` int(8) NOT NULL,
  `diff-2019-02` int(8) NOT NULL,
  `diff-2019-03` int(8) NOT NULL,
  `diff-2019-04` int(8) NOT NULL,
  `diff-2019-05` int(8) NOT NULL,
  `diff-2019-06` int(8) NOT NULL,
  `diff-2019-07` int(8) NOT NULL,
  `diff-2019-08` int(8) NOT NULL,
  `diff-2019-09` int(8) NOT NULL,
  `diff-2019-10` int(8) NOT NULL,
  `diff-2019-11` int(8) NOT NULL,
  `diff-2019-12` int(8) NOT NULL,
  PRIMARY KEY (`seed_keyword`,`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `data_for_export`;
CREATE TABLE `data_for_export` (
  `seed_keyword` varchar(128) COLLATE utf8_bin NOT NULL,
  `keyword` varchar(100) COLLATE utf8_bin NOT NULL,
  `search_count` int(11) NOT NULL,
  `cpc` double NOT NULL,
  `solved` tinyint(4) DEFAULT NULL,
  `2018-01` int(8) NOT NULL,
  `2018-02` int(8) NOT NULL,
  `2018-03` int(8) NOT NULL,
  `2018-04` int(8) NOT NULL,
  `2018-05` int(8) NOT NULL,
  `2018-06` int(8) NOT NULL,
  `2018-07` int(8) NOT NULL,
  `2018-08` int(8) NOT NULL,
  `2018-09` int(8) NOT NULL,
  `2018-10` int(8) NOT NULL,
  `2018-11` int(8) NOT NULL,
  `2018-12` int(8) NOT NULL,
  `2019-01` int(8) NOT NULL,
  `2019-02` int(8) NOT NULL,
  `2019-03` int(8) NOT NULL,
  `2019-04` int(8) NOT NULL,
  `2019-05` int(8) NOT NULL,
  `2019-06` int(8) NOT NULL,
  `2019-07` int(8) NOT NULL,
  `2019-08` int(8) NOT NULL,
  `2019-09` int(8) NOT NULL,
  `2019-10` int(8) NOT NULL,
  `2019-11` int(8) NOT NULL,
  `2019-12` int(8) NOT NULL,
  `diff-2018-01` int(8) NOT NULL,
  `diff-2018-02` int(8) NOT NULL,
  `diff-2018-03` int(8) NOT NULL,
  `diff-2018-04` int(8) NOT NULL,
  `diff-2018-05` int(8) NOT NULL,
  `diff-2018-06` int(8) NOT NULL,
  `diff-2018-07` int(8) NOT NULL,
  `diff-2018-08` int(8) NOT NULL,
  `diff-2018-09` int(8) NOT NULL,
  `diff-2018-10` int(8) NOT NULL,
  `diff-2018-11` int(8) NOT NULL,
  `diff-2018-12` int(8) NOT NULL,
  `diff-2019-01` int(8) NOT NULL,
  `diff-2019-02` int(8) NOT NULL,
  `diff-2019-03` int(8) NOT NULL,
  `diff-2019-04` int(8) NOT NULL,
  `diff-2019-05` int(8) NOT NULL,
  `diff-2019-06` int(8) NOT NULL,
  `diff-2019-07` int(8) NOT NULL,
  `diff-2019-08` int(8) NOT NULL,
  `diff-2019-09` int(8) NOT NULL,
  `diff-2019-10` int(8) NOT NULL,
  `diff-2019-11` int(8) NOT NULL,
  `diff-2019-12` int(8) NOT NULL,
  PRIMARY KEY (`seed_keyword`,`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `seed_keywords`;
CREATE TABLE `seed_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- 2019-01-18 23:26:13
