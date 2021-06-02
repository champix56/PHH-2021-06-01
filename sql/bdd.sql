CREATE DATABASE IF NOT EXISTS magasin;
USE magasin;

CREATE TABLE categories (
    idcat INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    titre  VARCHAR (45) NOT NULL, 
    description VARCHAR(128)
);

CREATE TABLE produits (
    idpr INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    titre  VARCHAR(45) NOT NULL,
    prix FLOAT,
    description VARCHAR(128),
    ref VARCHAR(15),
    photo VARCHAR(256), 
    idcat INTEGER NOT NULL references categories(idcat)
);

CREATE TABLE clients (
    idcl INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nom VARCHAR(32), 
    pnom VARCHAR(32), 
    adresse VARCHAR (64), 
    mail VARCHAR(128), 
    login VARCHAR(64), 
    mdp VARCHAR(128)
);

CREATE TABLE paniers( 
    idpa INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    date DATETIME DEFAULT now(), 
    idcl INTEGER NOT NULL references clients(idcl)
);

CREATE TABLE etre_dans(
    idpr INTEGER NOT NULL references produits(idpr), 
    idpa INTEGER NOT NULL references paniers(idpa),
    quantite INTEGER,
    PRIMARY KEY(idpr,idpa)
);

INSERT INTO `categories` (titre,description) 
		values 	('patisseries', 'patisseries maison de la boutique'),
        		('produits locaux', 'produits locaux divers produit en BZH'),
				('laitier', 'produits laitiers'),
        		('souvenirs', 'attrape touristes');
INSERT INTO `clients` ( `nom`, `pnom`, `adresse`, `mail`, `login`, `mdp`) 
        VALUES  ( 'DESORBAIX', 'Alexandre', '10 kerdelam 56410 ERDEVEN', 'desorbaix@free.fr', 'champix56', MD5('alex')),
                ( 'GANDREY', 'Stephane', 'qqpart en france', 'g.stephane@yahoo.fr', 'g.steph', MD5('steph'));
INSERT INTO `produits` ( `titre`, `prix`, `description`, `ref`, `photo`, `idcat`) 
        VALUES  ('gwenadhu', '15.0', 'drapeau breton', 'REF-DRAPO', 'https://drapeau-breton.net/wp-content/uploads/2020/04/drapeau-breton-1024x682.jpg', '4'),
                ('kouign aman', '5.0', 'Kouign Aman', 'REF-KOUING', 'https://france3-regions.francetvinfo.fr/image/Kk6ClkVYMSXS4lvxgy2cqa7G_MY/1200x1200/regions/2020/06/09/5edf5ec750517_kouign_amann-3815992.jpg', '1'),
INSERT INTO `paniers` ( `idcl`) VALUES ('2');
INSERT INTO `etre_dans` (`idpr`, `idpa`, `quantite`) VALUES ('2', '1', '10'),(1,1,1);
-- selects --
SELECT `idcat`, `titre`, `description` FROM `categories`;
SELECT `idpr`, `titre`, `prix`, `description`, `ref`, `photo`, `idcat` FROM `produits`

--avec jointures--
SELECT 
		`idpr`, 
    	PR.`titre` AS titre, 
        `prix`, 
        PR.`description` AS decription, 
        `ref`, 
        `photo`, 	
        PR.`idcat` AS idcat,
        CA.`titre` AS cat_titre,
        CA.`description` AS cat_desc
FROM 
	`produit` PR, 
    `categories` CA 
WHERE 
	CA.`idcat`=PR.`idcat`;


SELECT 
		PR.`idpr`, 
    	PR.`titre` AS titre, 
        `prix`, 
        `ref`, 
        `photo`, 	
        CA.`titre` AS cat_titre,
        CL.`nom`,
        `quantite`,
        PA.`idpa`,
        `date`
FROM 
	`produits` PR, 
    `categories` CA,
    `paniers` PA,
    `clients` CL,
    `etre_dans` ED
WHERE 
	CA.`idcat`= PR.`idcat`
    AND ED.`idpa` = PA.`idpa`
    AND ED.`idpr` = PR.`idpr`
    AND PA.`idcl` = CL.`idcl`
    AND PA.`idpa` = 1
    
-- updt --
UPDATE `etre_dans` SET `quantite`=1 WHERE idpr=2 AND idpa=1;