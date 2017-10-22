CREATE DATABASE atividade;
USE atividade;

CREATE TABLE status  (
  idstatus INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  status  VARCHAR(255) NULL,
  PRIMARY KEY(idstatus)
);


INSERT INTO `status` (`idstatus`, `status`) VALUES
(1, 'Pendente'),
(2, 'Em Desenvolvimento'),
(3, 'Em Teste'),
(4, 'Concluído');

CREATE TABLE controle (
  idcontrole INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  status_idstatus INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  descricao VARCHAR(600) NULL,
  data_inicio DATE NULL,
  data_fim DATE NULL,
  situacao INTEGER UNSIGNED NULL,
  PRIMARY KEY(idcontrole),
  INDEX controle_FKIndex1(status_idstatus),
  FOREIGN KEY(status_idstatus)
    REFERENCES status (idstatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


