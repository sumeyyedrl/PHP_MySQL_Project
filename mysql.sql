CREATE DATABASE `donation`;

CREATE TABLE `donation`.`author` ( `author_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `surname` VARCHAR(50) NOT NULL , `mail` VARCHAR(150) NOT NULL , `pass` VARCHAR(128) NOT NULL , `phone` VARCHAR(15) NOT NULL , PRIMARY KEY (`author_id`));


CREATE TABLE `donation`.`donate` ( `donate_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , `user_id` BIGINT UNSIGNED NOT NULL , `amount` INT UNSIGNED NOT NULL , `org_id` BIGINT UNSIGNED NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`donate_id`));


CREATE TABLE `donation`.`organizations` ( `org_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `about` VARCHAR(500) NOT NULL , PRIMARY KEY (`org_id`));


CREATE TABLE `donation`.`user` ( `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `surname` VARCHAR(50) NOT NULL , `mail` VARCHAR(150) NOT NULL , `pass` VARCHAR(128) NOT NULL , `phone` VARCHAR(15) NOT NULL , PRIMARY KEY (`user_id`));