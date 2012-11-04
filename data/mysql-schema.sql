CREATE TABLE IF NOT EXISTS `rating` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `typeId` varchar(255) NOT NULL,
    `userId` int(11) DEFAULT NULL,
    `rating` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;