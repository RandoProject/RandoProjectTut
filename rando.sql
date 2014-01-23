SET NAMES 'latin1';

DROP DATABASE IF EXISTS site_rando ;

create database `site_rando`;

USE site_rando;
DROP TABLE IF EXISTS `regions`;
DROP TABLE IF EXISTS `departements`;
DROP TABLE IF EXISTS `localiser`;
DROP TABLE IF EXISTS `membre`;
DROP TABLE IF EXISTS `rando`;
DROP TABLE IF EXISTS `commentaire`;
DROP TABLE IF EXISTS `galerie`;
DROP TABLE IF EXISTS `photo`;

-- ____________________ REGION ____________________ --
CREATE TABLE IF NOT EXISTS `regions` (
`num_region` varchar(2) NOT NULL,
`nom` varchar(255) NOT NULL,
PRIMARY KEY  (`num_region`)
);
INSERT INTO `regions` VALUES ('1', 'Alsace');
INSERT INTO `regions` VALUES ('2', 'Aquitaine');
INSERT INTO `regions` VALUES ('3', 'Auvergne');
INSERT INTO `regions` VALUES ('4', 'Basse Normandie');
INSERT INTO `regions` VALUES ('5', 'Bourgogne');
INSERT INTO `regions` VALUES ('6', 'Bretagne');
INSERT INTO `regions` VALUES ('7', 'Centre');
INSERT INTO `regions` VALUES ('8', 'Champagne Ardenne');
INSERT INTO `regions` VALUES ('9', 'Corse');
INSERT INTO `regions` VALUES ('10', 'Franche Comte');
INSERT INTO `regions` VALUES ('11', 'Haute Normandie');
INSERT INTO `regions` VALUES ('12', 'Ile de France');
INSERT INTO `regions` VALUES ('13', 'Languedoc Roussillon');
INSERT INTO `regions` VALUES ('14', 'Limousin');
INSERT INTO `regions` VALUES ('15', 'Lorraine');
INSERT INTO `regions` VALUES ('16', 'Midi-Pyr�n�es');
INSERT INTO `regions` VALUES ('17', 'Nord Pas de Calais');
INSERT INTO `regions` VALUES ('18', 'Pays de la Loire');
INSERT INTO `regions` VALUES ('19', 'Picardie');
INSERT INTO `regions` VALUES ('20', 'Poitou Charente');
INSERT INTO `regions` VALUES ('21', 'Provence Alpes C�te d\'Azur');
INSERT INTO `regions` VALUES ('22', 'Rhone Alpes');

-- ____________________ DEPARTEMENT ____________________ --
CREATE TABLE IF NOT EXISTS `departements` (
`num_departement` varchar(2) NOT NULL,
`num_region` varchar(2) NOT NULL,
`nom` char(32) NOT NULL,
PRIMARY KEY  (`num_departement`),
FOREIGN KEY (`num_region`) REFERENCES `regions`(`num_region`)
);
INSERT INTO `departements` VALUES ('1', '22', 'Ain');
INSERT INTO `departements` VALUES ('2', '19', 'Aisne');
INSERT INTO `departements` VALUES ('3', '3', 'Allier');
INSERT INTO `departements` VALUES ('4', '21', 'Alpes de haute provence');
INSERT INTO `departements` VALUES ('5', '21', 'Hautes alpes');
INSERT INTO `departements` VALUES ('6', '21', 'Alpes maritimes');
INSERT INTO `departements` VALUES ('7', '22', 'Ard�che');
INSERT INTO `departements` VALUES ('8', '8', 'Ardennes');
INSERT INTO `departements` VALUES ('9', '16', 'Ari�ge');
INSERT INTO `departements` VALUES ('10', '8', 'Aube');
INSERT INTO `departements` VALUES ('11', '13', 'Aude');
INSERT INTO `departements` VALUES ('12', '16', 'Aveyron');
INSERT INTO `departements` VALUES ('13', '21', 'Bouches du rh�ne');
INSERT INTO `departements` VALUES ('14', '4', 'Calvados');
INSERT INTO `departements` VALUES ('15', '3', 'Cantal');
INSERT INTO `departements` VALUES ('16', '20', 'Charente');
INSERT INTO `departements` VALUES ('17', '20', 'Charente maritime');
INSERT INTO `departements` VALUES ('18', '7', 'Cher');
INSERT INTO `departements` VALUES ('19', '14', 'Corr�ze');
INSERT INTO `departements` VALUES ('21', '5', 'C�te d\'or');
INSERT INTO `departements` VALUES ('22', '6', 'C�tes d\'Armor');
INSERT INTO `departements` VALUES ('23', '14', 'Creuse');
INSERT INTO `departements` VALUES ('24', '2', 'Dordogne');
INSERT INTO `departements` VALUES ('25', '10', 'Doubs');
INSERT INTO `departements` VALUES ('26', '22', 'Dr�me');
INSERT INTO `departements` VALUES ('27', '11', 'Eure');
INSERT INTO `departements` VALUES ('28', '7', 'Eure et Loir');
INSERT INTO `departements` VALUES ('29', '6', 'Finist�re');
INSERT INTO `departements` VALUES ('30', '13', 'Gard');
INSERT INTO `departements` VALUES ('31', '16', 'Haute garonne');
INSERT INTO `departements` VALUES ('32', '16', 'Gers');
INSERT INTO `departements` VALUES ('33', '2', 'Gironde');
INSERT INTO `departements` VALUES ('34', '13', 'H�rault');
INSERT INTO `departements` VALUES ('35', '6', 'Ile et Vilaine');
INSERT INTO `departements` VALUES ('36', '7', 'Indre');
INSERT INTO `departements` VALUES ('37', '7', 'Indre et Loire');
INSERT INTO `departements` VALUES ('38', '22', 'Is�re');
INSERT INTO `departements` VALUES ('39', '10', 'Jura');
INSERT INTO `departements` VALUES ('40', '2', 'Landes');
INSERT INTO `departements` VALUES ('41', '7', 'Loir et Cher');
INSERT INTO `departements` VALUES ('42', '22', 'Loire');
INSERT INTO `departements` VALUES ('43', '3', 'Haute Loire');
INSERT INTO `departements` VALUES ('44', '18', 'Loire Atlantique');
INSERT INTO `departements` VALUES ('45', '7', 'Loiret');
INSERT INTO `departements` VALUES ('46', '16', 'Lot');
INSERT INTO `departements` VALUES ('47', '2', 'Lot et Garonne');
INSERT INTO `departements` VALUES ('48', '13', 'Loz�re');
INSERT INTO `departements` VALUES ('49', '18', 'Maine et Loire');
INSERT INTO `departements` VALUES ('50', '4', 'Manche');
INSERT INTO `departements` VALUES ('51', '8', 'Marne');
INSERT INTO `departements` VALUES ('52', '8', 'Haute Marne');
INSERT INTO `departements` VALUES ('53', '18', 'Mayenne');
INSERT INTO `departements` VALUES ('54', '15', 'Meurthe et Moselle');
INSERT INTO `departements` VALUES ('55', '15', 'Meuse');
INSERT INTO `departements` VALUES ('56', '6', 'Morbihan');
INSERT INTO `departements` VALUES ('57', '15', 'Moselle');
INSERT INTO `departements` VALUES ('58', '5', 'Ni�vre');
INSERT INTO `departements` VALUES ('59', '17', 'Nord');
INSERT INTO `departements` VALUES ('60', '19', 'Oise');
INSERT INTO `departements` VALUES ('61', '4', 'Orne');
INSERT INTO `departements` VALUES ('62', '17', 'Pas de Calais');
INSERT INTO `departements` VALUES ('63', '3', 'Puy de D�me');
INSERT INTO `departements` VALUES ('64', '2', 'Pyr�n�es Atlantiques');
INSERT INTO `departements` VALUES ('65', '16', 'Hautes Pyr�n�es');
INSERT INTO `departements` VALUES ('66', '13', 'Pyr�n�es Orientales');
INSERT INTO `departements` VALUES ('67', '1', 'Bas Rhin');
INSERT INTO `departements` VALUES ('68', '1', 'Haut Rhin');
INSERT INTO `departements` VALUES ('69', '22', 'Rh�ne');
INSERT INTO `departements` VALUES ('70', '10', 'Haute Sa�ne');
INSERT INTO `departements` VALUES ('71', '5', 'Sa�ne et Loire');
INSERT INTO `departements` VALUES ('72', '18', 'Sarthe');
INSERT INTO `departements` VALUES ('73', '22', 'Savoie');
INSERT INTO `departements` VALUES ('74', '22', 'Haute Savoie');
INSERT INTO `departements` VALUES ('75', '12', 'Paris');
INSERT INTO `departements` VALUES ('76', '11', 'Seine Maritime');
INSERT INTO `departements` VALUES ('77', '12', 'Seine et Marne');
INSERT INTO `departements` VALUES ('78', '12', 'Yvelines');
INSERT INTO `departements` VALUES ('79', '20', 'Deux S�vres');
INSERT INTO `departements` VALUES ('80', '19', 'Somme');
INSERT INTO `departements` VALUES ('81', '16', 'Tarn');
INSERT INTO `departements` VALUES ('82', '16', 'Tarn et Garonne');
INSERT INTO `departements` VALUES ('83', '21', 'Var');
INSERT INTO `departements` VALUES ('84', '21', 'Vaucluse');
INSERT INTO `departements` VALUES ('85', '18', 'Vend�e');
INSERT INTO `departements` VALUES ('86', '20', 'Vienne');
INSERT INTO `departements` VALUES ('87', '14', 'Haute Vienne');
INSERT INTO `departements` VALUES ('88', '15', 'Vosges');
INSERT INTO `departements` VALUES ('89', '5', 'Yonne');
INSERT INTO `departements` VALUES ('90', '10', 'Territoire de Belfort');
INSERT INTO `departements` VALUES ('91', '12', 'Essonne');
INSERT INTO `departements` VALUES ('92', '12', 'Hauts de Seine');
INSERT INTO `departements` VALUES ('93', '12', 'Seine Saint Denis');
INSERT INTO `departements` VALUES ('94', '12', 'Val de Marne');
INSERT INTO `departements` VALUES ('95', '12', 'Val d\'Oise');
INSERT INTO `departements` VALUES ('2a', '9', 'Corse du Sud');
INSERT INTO `departements` VALUES ('2b', '9', 'Haute Corse');

-- ____________________ GALERIE ____________________ --
CREATE TABLE IF NOT EXISTS `galerie` (
`numero` int(10) NOT NULL AUTO_INCREMENT,
`nom` varchar(100) NOT NULL,
PRIMARY KEY (`numero`)
);

INSERT INTO `galerie` VALUES ('0',	'd�faut');
INSERT INTO `galerie` VALUES ('1',	'a');
INSERT INTO `galerie` VALUES ('2',	'b');
INSERT INTO `galerie` VALUES ('3',	'c');

-- ____________________ PHOTO ____________________ --
CREATE TABLE IF NOT EXISTS `photo` (
`numero` int(10) NOT NULL AUTO_INCREMENT,
`nom` blob NOT NULL,
`galerie` int(10) NOT NULL,
`descriptif` text DEFAULT NULL,
PRIMARY KEY (`numero`),
FOREIGN KEY (`galerie`) REFERENCES `galerie`(`numero`)
);

INSERT INTO `photo` VALUES ('0', 'd�faut.png', '0', '');
INSERT INTO `photo` VALUES ('1', 'PR1.jpg', '1', '');
INSERT INTO `photo` VALUES ('2', 'PR11.jpg', '2', '');
INSERT INTO `photo` VALUES ('3', 'saut-mounine-pr19.jpg', '3', '');

-- ____________________ MEMBRE ____________________ --
CREATE TABLE IF NOT EXISTS `membre` (
`pseudo` varchar(30) NOT NULL,
`mdp` varchar(30) NOT NULL,
`statut` varchar(20) NOT NULL,
`nom` varchar(30) NOT NULL,
`pr�nom` varchar(30) NOT NULL,
`date_naiss` date DEFAULT NULL,
`adresse` varchar(70) DEFAULT NULL,
`ville` varchar(30) DEFAULT NULL,
`code_postal` varchar(5) DEFAULT NULL, 
`mail` varchar(70) NOT NULL,
`description` text DEFAULT NULL,
`galerie` int(10) DEFAULT NULL,
`photo` int(10) DEFAULT NULL,
PRIMARY KEY(`pseudo`),
FOREIGN KEY (`galerie`) REFERENCES `galerie`(`numero`),
FOREIGN KEY (`photo`) REFERENCES `photo`(`numero`),
CONSTRAINT C_STATUT CHECK (statut = 'membre' OR statut = 'administrateur' OR statut = 'mod�rateur')
);

INSERT INTO `membre` VALUES ('Pat',
				'0000',
				'administrateur',
				'Paturaux',
				'Florian',
				'1993-09-28',
				'',
				'',
				'',
				'florian.paturaux@univ-lyon1.fr',
				'',
				'',
				'');
INSERT INTO `membre` VALUES ('Benoit',
				'0000',
				'administrateur',
				'Rongeard',
				'Benoit',
				'1994-03-30',
				'',
				'',
				'',
				'benoit.rongeard@univ-lyon1.fr',
				'',
				'',
				'');
INSERT INTO `membre` VALUES ('Sylvio',
				'0000',
				'administrateur',
				'Menubarbe',
				'Sylvio',
				'1994-01-11',
				'',
				'',
				'',
				'sylvio.menubarbe@univ-lyon1.fr',
				'',
				'',
				'');

-- ____________________ RANDO ____________________ --
CREATE TABLE IF NOT EXISTS `rando` (
`code` int(10) NOT NULL AUTO_INCREMENT,
`titre` varchar(150) NOT NULL,
`parcour` point DEFAULT NULL,
`longueur` float unsigned NOT NULL,
`duree` time NOT NULL,
`difficulte` int(1) NOT NULL,
`descriptif` text NOT NULL,
`note` int(1) DEFAULT NULL,
`point_eau` tinyint(1) DEFAULT NULL,
`denivele` int(4) DEFAULT NULL,
`equipement` varchar(150) DEFAULT NULL,
`date_insertion` datetime NOT NULL,
`valide` tinyint(1) NOT NULL,
`parcours` blob NOT NULL,
`region` varchar(2) NOT NULL,
`photo_principale` int(10) NOT NULL,
`auteur` varchar(30) NOT NULL,
`galerie` int(10) DEFAULT NULL,
PRIMARY KEY (`code`),
FOREIGN KEY (`region`) REFERENCES `regions`(`num_region`),
FOREIGN KEY (`photo_principale`) REFERENCES `photo`(`numero`),
FOREIGN KEY (`auteur`) REFERENCES `membre`(`pseudo`),
FOREIGN KEY (`galerie`) REFERENCES `galerie`(`numero`),
CHECK (difficult� BETWEEN 0 and 5),
CHECK (note BETWEEN 0 and 5)
);

INSERT INTO `rando` (`titre`, `parcour`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `region`, `photo_principale`, `auteur`, `galerie`)
VALUES ('Randonn�e � Th�rondels', 
		'',
		'15,5',
		'4:45',
		'2',
		'La presqu��le de Laussac, depuis le village de Th�rondels, tout proche des monts du Cantal : une approche facile des gorges sauvages de la Truy�re et du plan d�eau de Sarrans, avec des points de vue exceptionnels.',
		'',
		'1',
		'',
		'',
		'2014-01-15 14:30:00',
		'1',
		'a.gpx',
		'16',
		'1',
		'Pat',
		'1');
INSERT INTO `rando` (`titre`, `parcour`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `region`, `photo_principale`, `auteur`, `galerie`)
VALUES ('Randonn�e � Conques', 
		'',
		'7',
		'2:30',
		'1',
		'Dans cet aust�re et sauvage paysage, au confluent des gorges creus�es par l�Ouche et de la vall�e du Dourdou, se niche le site de Conques, rayonnant de lumi�re et semblant fig� par le temps.',
		'',
		'1',
		'',
		'',
		'2014-01-15 14:35:00',
		'1',
		'b.gpx',
		'16',
		'2',
		'Pat',
		'2');
INSERT INTO `rando` (`titre`, `parcour`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `region`, `photo_principale`, `auteur`, `galerie`)
VALUES ('Randonn�e � La Capelle-Balaguier', 
		'',
		'15',
		'3:45',
		'2',
		'A l�ouest de Villeneuve, le causse de Salvagnac offre aux randonneurs des chemins ancestraux, marqu�s de l�usure des charrois d�antan, bord�s de murettes en pierres s�ches et de buis �paiset parfum�s.',
		'',
		'1',
		'',
		'',
		'2014-01-15 14:40:00',
		'1',
		'c.gpx',
		'16',
		'3',
		'Pat',
		'3');

-- ____________________ LOCALISER ____________________ --
CREATE TABLE IF NOT EXISTS `localiser` (
`code_rando` int(10) NOT NULL,
`num_dept` varchar(2) NOT NULL,
PRIMARY KEY (`code_rando`,`num_dept`),
FOREIGN KEY (`code_rando`) REFERENCES `rando`(`code`),
FOREIGN KEY (`num_dept`) REFERENCES `departements`(`num_departement`)
); 

-- ____________________ COMMENTAIRE ____________________ --
CREATE TABLE IF NOT EXISTS `commentaire` (
`numero` int(10) NOT NULL AUTO_INCREMENT,
`date` datetime NOT NULL,
`auteur` varchar(30) NOT NULL,
`code_rando` int(10) NOT NULL,
`commentaire` text NOT NULL,
`note` int(1) DEFAULT NULL,
PRIMARY KEY (`numero`),
FOREIGN KEY (`code_rando`) REFERENCES `rando`(`code`),
FOREIGN KEY (`auteur`) REFERENCES `membre`(`pseudo`),
CHECK (note BETWEEN 0 and 5)
);