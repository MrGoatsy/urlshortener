CREATE TABLE url(
    `id` int(10) NOT NULL auto_increment,
    `url` varchar(255) NOT NULL,
    `short` varchar(255) NOt NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`short`)
) ENGINE=InnoDB;