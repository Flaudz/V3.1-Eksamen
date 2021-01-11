-- Users table
-- id - int
-- username - VarChar
-- Password - VarChar
-- AccessLevel - int
-- Email - VarChar
-- Addresse - VarChar
-- PostNummer - int
CREATE TABLE `fancyclothes`.`users` ( `userId` INT(11) NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `accesslevel` INT(3) NOT NULL , `email` VARCHAR(255) NULL , `addresse` VARCHAR(255) NULL , `postnummer` INT(4) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Product table
-- productId - int
-- headline - VarChar
-- imgSrc - VarChar
-- imgAlt - VarChar
-- dateMade - Date
-- bodyText - VarChar
-- madeBy - int
-- stars - int
-- category - VarChar
-- gender - int
CREATE TABLE `fancyclothes`.`products` ( `productId` INT(11) NOT NULL AUTO_INCREMENT , `headline` VARCHAR(255) NOT NULL , `imgSrc` VARCHAR(255) NOT NULL , `imgAlt` VARCHAR(255) NOT NULL , `dateMade` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP , `bodyText` VARCHAR(255) NOT NULL , `madeBy` INT(11) NOT NULL , `stars` INT(4) NOT NULL , `category` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `products` ADD `gender` INT(2) NOT NULL AFTER `category`;

-- Category table
-- categoryId - int
-- categoryName - VarChar
CREATE TABLE `fancyclothes`.`category` ( `categoryId` INT(11) NOT NULL AUTO_INCREMENT , `categoryName` VARCHAR(255) NOT NULL , PRIMARY KEY (`categoryId`)) ENGINE = InnoDB;