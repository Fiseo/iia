DROP DATABASE IF EXISTS iia ;
CREATE DATABASE iia DEFAULT CHARSET UTF8MB4;

USE iia;

CREATE TABLE Promotions
(
Identifiant INT AUTO_INCREMENT NOT NULL,
libelle VARCHAR(20) NOT NULL,
PRIMARY KEY(Identifiant)
) ENGINE = INNODB;

CREATE TABLE Etudiant
(
Identifiant  INT  AUTO_INCREMENT NOT NULL,
Nom VARCHAR(20) NOT NULL,
Prenom VARCHAR(20) NOT NULL,
IdentifiantPromotions INT NOT NULL,
PRIMARY KEY(Identifiant),
CONSTRAINT fk_promotions FOREIGN KEY (IdentifiantPromotions) REFERENCES Promotions(Identifiant) ON DELETE CASCADE
) ENGINE = INNODB;


Lien du GitHub : https://github.com/Fiseo/iia

