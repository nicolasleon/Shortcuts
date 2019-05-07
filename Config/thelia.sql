
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- shortcuts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shortcuts`;

CREATE TABLE `shortcuts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `position` INTEGER DEFAULT 0 NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `admin_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `FI_admin_id` (`admin_id`),
    CONSTRAINT `fk_admin_id`
        FOREIGN KEY (`admin_id`)
        REFERENCES `admin` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- shortcuts_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shortcuts_i18n`;

CREATE TABLE `shortcuts_i18n`
(
    `id` INTEGER NOT NULL,
    `locale` VARCHAR(5) DEFAULT 'en_US' NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`,`locale`),
    CONSTRAINT `shortcuts_i18n_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `shortcuts` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
