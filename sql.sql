CREATE TABLE url(
    `id` int(10) NOT NULL auto_increment,
    `longlink` varchar(255) NOT NULL,
    `shortlink` varchar(255) NOt NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`shortlink`)
) ENGINE=InnoDB;