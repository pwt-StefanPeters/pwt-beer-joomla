DROP TABLE IF EXISTS `#__beers`;

CREATE TABLE `#__beers` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`tagline` VARCHAR(255) NOT NULL,
	`description` TEXT(500) NOT NULL,
	`alcohol_percentage` DECIMAL(2,1) NOT NULL,
	`rating` INT(11) NULL
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
