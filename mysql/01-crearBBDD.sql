CREATE DATABASE IF NOT EXISTS `laquintacaja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laquintacaja`;

CREATE USER 'userCaja'@'%' IDENTIFIED BY'14deOctubre';

GRANT ALL PRIVILEGES ON *.* TO `userCaja`@`%` IDENTIFIED BY'14deOctubre';

GRANT ALL PRIVILEGES ON `laquintacaja`.* TO `userCaja`@`%`;
