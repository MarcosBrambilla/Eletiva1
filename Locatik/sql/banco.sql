-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema locatik
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema locatik
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locatik` DEFAULT CHARACTER SET utf8 ;
USE `locatik` ;

-- -----------------------------------------------------
-- Table `locatik`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locatik`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatik`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locatik`.`setor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatik`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locatik`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `setor_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcionario_setor_idx` (`setor_id` ASC),
  CONSTRAINT `fk_funcionario_setor`
    FOREIGN KEY (`setor_id`)
    REFERENCES `locatik`.`setor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatik`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locatik`.`equipamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `patrimonio` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatik`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locatik`.`emprestimo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipamento_id` INT NOT NULL,
  `funcionario_id` INT NOT NULL,
  `setor_id` INT NOT NULL,
  `data_emprestimo` DATE NOT NULL,
  `data_devolucao` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_emprestimo_equipamento_idx` (`equipamento_id` ASC),
  INDEX `fk_emprestimo_funcionario_idx` (`funcionario_id` ASC),
  INDEX `fk_emprestimo_setor_idx` (`setor_id` ASC),
  CONSTRAINT `fk_emprestimo_equipamento`
    FOREIGN KEY (`equipamento_id`)
    REFERENCES `locatik`.`equipamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_funcionario`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `locatik`.`funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_setor`
    FOREIGN KEY (`setor_id`)
    REFERENCES `locatik`.`setor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
