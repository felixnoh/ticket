ALTER TABLE `user` 
ADD COLUMN `active` INT(11) NOT NULL DEFAULT 1 AFTER `updated_at`,
ADD COLUMN `type` INT(11) NOT NULL DEFAULT 3 AFTER `active`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_user1_idx` (`user_id`),
  CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` int(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `priority` varchar(45) NOT NULL,
  `descripton` text NOT NULL,
  `expiration` date DEFAULT NULL,
  `attached` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_user1_idx` (`user_id`),
  CONSTRAINT `fk_ticket_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tracing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` date NOT NULL,
  `message` text NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tracing_ticket1_idx` (`ticket_id`),
  KEY `fk_tracing_user1_idx` (`user_id`),
  CONSTRAINT `fk_tracing_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tracing_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

