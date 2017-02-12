-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "migration" --------------------------------
CREATE TABLE `migration` ( 
	`version` VarChar( 180 ) NOT NULL,
	`apply_time` Int( 11 ) NULL,
	PRIMARY KEY ( `version` ) )
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "week" -------------------------------------
CREATE TABLE `week` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`date` VarChar( 255 ) NOT NULL,
	`tempMin` VarChar( 3 ) NOT NULL,
	`tempMax` VarChar( 3 ) NOT NULL,
	`simbForec` VarChar( 5 ) NOT NULL,
	`rainfall` Float( 12, 0 ) NOT NULL,
	`windSpeedMax` Float( 12, 0 ) NOT NULL,
	`windDirectionMax` VarChar( 2 ) NOT NULL,
	`precipChance` Int( 3 ) NOT NULL,
	`rainChance` Int( 3 ) NOT NULL,
	`sunRise` VarChar( 5 ) NOT NULL,
	`sunSet` VarChar( 5 ) NOT NULL,
	`dayLength` Int( 4 ) NOT NULL,
	`uvIndexMax` VarChar( 2 ) NULL,
	`averageCloud` Int( 3 ) NOT NULL,
	`phaseMoon` Int( 3 ) NOT NULL,
	`moonRise` VarChar( 5 ) NOT NULL,
	`moonSet` VarChar( 5 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `date` UNIQUE( `date` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 65;
-- ---------------------------------------------------------


-- CREATE TABLE "day" --------------------------------------
CREATE TABLE `day` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`date` VarChar( 255 ) NOT NULL,
	`tempAir` VarChar( 3 ) NOT NULL,
	`simbForec` VarChar( 5 ) NOT NULL,
	`tempFeel` VarChar( 3 ) NOT NULL,
	`rainfall` Float( 12, 0 ) NOT NULL,
	`windSpeed` Float( 12, 0 ) NOT NULL,
	`windDirection` VarChar( 2 ) NOT NULL,
	`relativeHumidity` Int( 3 ) NOT NULL,
	`atmospherePressure` Int( 4 ) NOT NULL,
	`precipChance` Int( 3 ) NOT NULL,
	`rainChance` Int( 3 ) NOT NULL,
	`cloudiness` Int( 3 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `date` UNIQUE( `date` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- Dump data of "migration" --------------------------------
INSERT INTO `migration`(`version`,`apply_time`) VALUES ( 'm000000_000000_base', '1486724535' );
INSERT INTO `migration`(`version`,`apply_time`) VALUES ( 'm130524_201442_init', '1486724541' );
INSERT INTO `migration`(`version`,`apply_time`) VALUES ( 'm170210_111334_day', '1486898518' );
INSERT INTO `migration`(`version`,`apply_time`) VALUES ( 'm170211_112423_week', '1486813328' );
-- ---------------------------------------------------------


-- Dump data of "week" -------------------------------------
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '65', '2017-02-12', '-5', '-3', 'd200', '0.3', '2.9', 'NW', '31', '0', '08:46', '17:41', '535', '1', '89', '200', '19:46', '09:12' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '66', '2017-02-13', '0', '2', 'd200', '0.2', '7.9', 'W', '51', '0', '08:43', '17:43', '540', '0', '75', '210', '21:04', '09:30' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '67', '2017-02-14', '-5', '3', 'd200', '0', '6.5', 'N', '2', '0', '08:40', '17:46', '545', '1', '24', '220', '22:19', '09:47' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '68', '2017-02-15', '-6', '-1', 'd200', '0', '3.4', 'N', '2', '0', '08:38', '17:49', '551', '1', '33', '230', '23:34', '10:02' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '69', '2017-02-16', '-1', '0', 'd200', '0.7', '4.7', 'SW', '14', '0', '08:35', '17:51', '556', '', '79', '250', '', '10:18' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '70', '2017-02-17', '-2', '2', 'd421', '3.6', '5.7', 'W', '63', '0', '08:32', '17:54', '561', '', '100', '260', '00:46', '10:36' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '71', '2017-02-18', '0', '2', 'd400', '0.3', '5.3', 'NW', '20', '0', '08:29', '17:57', '567', '', '100', '270', '01:56', '10:56' );
INSERT INTO `week`(`id`,`date`,`tempMin`,`tempMax`,`simbForec`,`rainfall`,`windSpeedMax`,`windDirectionMax`,`precipChance`,`rainChance`,`sunRise`,`sunSet`,`dayLength`,`uvIndexMax`,`averageCloud`,`phaseMoon`,`moonRise`,`moonSet`) VALUES ( '72', '2017-02-19', '2', '4', 'd410', '1.7', '6.5', 'SW', '82', '0', '08:27', '17:59', '572', '', '100', '280', '03:04', '11:22' );
-- ---------------------------------------------------------


-- Dump data of "day" --------------------------------------
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '1', '2017-02-12T13:00', '-5', 'd300', '-5', '0', '1.3', 'NW', '83', '779', '16', '0', '93' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '2', '2017-02-12T14:00', '-5', 'd300', '-7', '0', '1.6', 'W', '81', '778', '15', '0', '86' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '3', '2017-02-12T15:00', '-4', 'd300', '-7', '0', '1.9', 'SW', '78', '778', '14', '0', '79' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '4', '2017-02-12T16:00', '-4', 'd200', '-8', '0', '2.1', 'SW', '80', '777', '13', '0', '72' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '5', '2017-02-12T17:00', '-4', 'd200', '-8', '0', '2.4', 'SW', '81', '777', '12', '0', '66' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '6', '2017-02-12T18:00', '-4', 'n200', '-8', '0', '2.7', 'SW', '82', '776', '11', '0', '59' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '7', '2017-02-12T19:00', '-4', 'n400', '-8', '0', '3.4', 'SW', '83', '776', '10', '0', '71' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '8', '2017-02-12T20:00', '-4', 'n400', '-9', '0', '4.1', 'SW', '84', '775', '9', '0', '83' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '9', '2017-02-12T21:00', '-4', 'n400', '-9', '0', '4.8', 'SW', '84', '775', '7', '0', '94' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '10', '2017-02-12T22:00', '-3', 'n400', '-9', '0', '5.3', 'W', '85', '774', '8', '0', '95' );
INSERT INTO `day`(`id`,`date`,`tempAir`,`simbForec`,`tempFeel`,`rainfall`,`windSpeed`,`windDirection`,`relativeHumidity`,`atmospherePressure`,`precipChance`,`rainChance`,`cloudiness`) VALUES ( '11', '2017-02-12T23:00', '-3', 'n400', '-9', '0', '5.9', 'W', '85', '773', '9', '0', '96' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


