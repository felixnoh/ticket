<?php

use yii\db\Migration;

/**
 * Class m180207_002105_create_tables
 */
class m180207_002105_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

USE ticket;

ALTER TABLE ticket.user ADD `active` VARCHAR(45) NOT NULL DEFAULT '1', 
`type` VARCHAR(45) NULL DEFAULT '3' ;  



CREATE TABLE IF NOT EXISTS `profile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `avatar` VARCHAR(60) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_profile_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_profile_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `ticket`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `folio` INT(20) NOT NULL,
  `subject` VARCHAR(100) NOT NULL,
  `created_at` DATE NOT NULL,
  `state` INT(11) NOT NULL DEFAULT 1,
  `priority` VARCHAR(45) NOT NULL,
  `descripton` TEXT(2000) NOT NULL,
  `expiration` DATE NULL,
  `attached` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ticket_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ticket_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ticket`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tracing` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_at` DATE NOT NULL,
  `message` TEXT(2000) NOT NULL,
  `ticket_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tracing_ticket1_idx` (`ticket_id` ASC),
  INDEX `fk_tracing_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_tracing_ticket1`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `ticket`.`ticket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tracing_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ticket`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `system` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `folio` INT(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_002105_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
