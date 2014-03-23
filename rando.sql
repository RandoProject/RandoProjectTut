SET NAMES 'latin1';

DROP DATABASE IF EXISTS site_rando ;

create database `site_rando`;

USE site_rando;
DROP TABLE IF EXISTS `regions`;
DROP TABLE IF EXISTS `departements`;
DROP TABLE IF EXISTS `galerie`;
DROP TABLE IF EXISTS `photo`;
DROP TABLE IF EXISTS `membre`;
DROP TABLE IF EXISTS `parcours`;
DROP TABLE IF EXISTS `rando`;
DROP TABLE IF EXISTS `localiser`;
DROP TABLE IF EXISTS `commentaire`;
DROP TABLE IF EXISTS `connectes`;

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
INSERT INTO `regions` VALUES ('16', 'Midi-Pyrénées');
INSERT INTO `regions` VALUES ('17', 'Nord Pas de Calais');
INSERT INTO `regions` VALUES ('18', 'Pays de la Loire');
INSERT INTO `regions` VALUES ('19', 'Picardie');
INSERT INTO `regions` VALUES ('20', 'Poitou Charente');
INSERT INTO `regions` VALUES ('21', 'Provence Alpes Côte d\'Azur');
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
INSERT INTO `departements` VALUES ('7', '22', 'Ardèche');
INSERT INTO `departements` VALUES ('8', '8', 'Ardennes');
INSERT INTO `departements` VALUES ('9', '16', 'Ariège');
INSERT INTO `departements` VALUES ('10', '8', 'Aube');
INSERT INTO `departements` VALUES ('11', '13', 'Aude');
INSERT INTO `departements` VALUES ('12', '16', 'Aveyron');
INSERT INTO `departements` VALUES ('13', '21', 'Bouches du rhône');
INSERT INTO `departements` VALUES ('14', '4', 'Calvados');
INSERT INTO `departements` VALUES ('15', '3', 'Cantal');
INSERT INTO `departements` VALUES ('16', '20', 'Charente');
INSERT INTO `departements` VALUES ('17', '20', 'Charente maritime');
INSERT INTO `departements` VALUES ('18', '7', 'Cher');
INSERT INTO `departements` VALUES ('19', '14', 'Corrèze');
INSERT INTO `departements` VALUES ('21', '5', 'Côte d\'or');
INSERT INTO `departements` VALUES ('22', '6', 'Côtes d\'Armor');
INSERT INTO `departements` VALUES ('23', '14', 'Creuse');
INSERT INTO `departements` VALUES ('24', '2', 'Dordogne');
INSERT INTO `departements` VALUES ('25', '10', 'Doubs');
INSERT INTO `departements` VALUES ('26', '22', 'Drôme');
INSERT INTO `departements` VALUES ('27', '11', 'Eure');
INSERT INTO `departements` VALUES ('28', '7', 'Eure et Loir');
INSERT INTO `departements` VALUES ('29', '6', 'Finistère');
INSERT INTO `departements` VALUES ('30', '13', 'Gard');
INSERT INTO `departements` VALUES ('31', '16', 'Haute garonne');
INSERT INTO `departements` VALUES ('32', '16', 'Gers');
INSERT INTO `departements` VALUES ('33', '2', 'Gironde');
INSERT INTO `departements` VALUES ('34', '13', 'Hérault');
INSERT INTO `departements` VALUES ('35', '6', 'Ile et Vilaine');
INSERT INTO `departements` VALUES ('36', '7', 'Indre');
INSERT INTO `departements` VALUES ('37', '7', 'Indre et Loire');
INSERT INTO `departements` VALUES ('38', '22', 'Isère');
INSERT INTO `departements` VALUES ('39', '10', 'Jura');
INSERT INTO `departements` VALUES ('40', '2', 'Landes');
INSERT INTO `departements` VALUES ('41', '7', 'Loir et Cher');
INSERT INTO `departements` VALUES ('42', '22', 'Loire');
INSERT INTO `departements` VALUES ('43', '3', 'Haute Loire');
INSERT INTO `departements` VALUES ('44', '18', 'Loire Atlantique');
INSERT INTO `departements` VALUES ('45', '7', 'Loiret');
INSERT INTO `departements` VALUES ('46', '16', 'Lot');
INSERT INTO `departements` VALUES ('47', '2', 'Lot et Garonne');
INSERT INTO `departements` VALUES ('48', '13', 'Lozère');
INSERT INTO `departements` VALUES ('49', '18', 'Maine et Loire');
INSERT INTO `departements` VALUES ('50', '4', 'Manche');
INSERT INTO `departements` VALUES ('51', '8', 'Marne');
INSERT INTO `departements` VALUES ('52', '8', 'Haute Marne');
INSERT INTO `departements` VALUES ('53', '18', 'Mayenne');
INSERT INTO `departements` VALUES ('54', '15', 'Meurthe et Moselle');
INSERT INTO `departements` VALUES ('55', '15', 'Meuse');
INSERT INTO `departements` VALUES ('56', '6', 'Morbihan');
INSERT INTO `departements` VALUES ('57', '15', 'Moselle');
INSERT INTO `departements` VALUES ('58', '5', 'Nièvre');
INSERT INTO `departements` VALUES ('59', '17', 'Nord');
INSERT INTO `departements` VALUES ('60', '19', 'Oise');
INSERT INTO `departements` VALUES ('61', '4', 'Orne');
INSERT INTO `departements` VALUES ('62', '17', 'Pas de Calais');
INSERT INTO `departements` VALUES ('63', '3', 'Puy de Dôme');
INSERT INTO `departements` VALUES ('64', '2', 'Pyrénées Atlantiques');
INSERT INTO `departements` VALUES ('65', '16', 'Hautes Pyrénées');
INSERT INTO `departements` VALUES ('66', '13', 'Pyrénées Orientales');
INSERT INTO `departements` VALUES ('67', '1', 'Bas Rhin');
INSERT INTO `departements` VALUES ('68', '1', 'Haut Rhin');
INSERT INTO `departements` VALUES ('69', '22', 'Rhône');
INSERT INTO `departements` VALUES ('70', '10', 'Haute Saône');
INSERT INTO `departements` VALUES ('71', '5', 'Saône et Loire');
INSERT INTO `departements` VALUES ('72', '18', 'Sarthe');
INSERT INTO `departements` VALUES ('73', '22', 'Savoie');
INSERT INTO `departements` VALUES ('74', '22', 'Haute Savoie');
INSERT INTO `departements` VALUES ('75', '12', 'Paris');
INSERT INTO `departements` VALUES ('76', '11', 'Seine Maritime');
INSERT INTO `departements` VALUES ('77', '12', 'Seine et Marne');
INSERT INTO `departements` VALUES ('78', '12', 'Yvelines');
INSERT INTO `departements` VALUES ('79', '20', 'Deux Sèvres');
INSERT INTO `departements` VALUES ('80', '19', 'Somme');
INSERT INTO `departements` VALUES ('81', '16', 'Tarn');
INSERT INTO `departements` VALUES ('82', '16', 'Tarn et Garonne');
INSERT INTO `departements` VALUES ('83', '21', 'Var');
INSERT INTO `departements` VALUES ('84', '21', 'Vaucluse');
INSERT INTO `departements` VALUES ('85', '18', 'Vendée');
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
	`nom` varchar(150) NOT NULL,
	PRIMARY KEY (`numero`)
);

INSERT INTO `galerie` VALUES ('0',	'défaut');
INSERT INTO `galerie` VALUES ('1',	'a');
INSERT INTO `galerie` VALUES ('2',	'b');
INSERT INTO `galerie` VALUES ('3',	'c');
INSERT INTO `galerie` VALUES ('4',	'd');
INSERT INTO `galerie` VALUES ('5',	'e');
INSERT INTO `galerie` VALUES ('6',	'f');
INSERT INTO `galerie` VALUES ('7',	'g');
INSERT INTO `galerie` VALUES ('8',	'h');

-- ____________________ PHOTO ____________________ --
CREATE TABLE IF NOT EXISTS `photo` (
	`numero` int(10) NOT NULL AUTO_INCREMENT,
	`nom` blob NOT NULL,
	`galerie` int(10) NOT NULL,
	`descriptif` text DEFAULT NULL,
	`valide` tinyint(1) NOT NULL,
	PRIMARY KEY (`numero`),
	FOREIGN KEY (`galerie`) REFERENCES `galerie`(`numero`)
);

INSERT INTO `photo` VALUES ('0', 'défaut.png', '0', '', '0');
INSERT INTO `photo` VALUES ('1', 'PR1.jpg', '1', '', '0');
INSERT INTO `photo` VALUES ('2', 'PR11.jpg', '2', '', '0');
INSERT INTO `photo` VALUES ('3', 'saut-mounine-pr19.jpg', '3', '', '0');
INSERT INTO `photo` VALUES ('4', '6b87c7b2d1e3436170a1dc0527b0cdc9.jpg', '4', '', '0');
INSERT INTO `photo` VALUES ('5', '4733f897fda3d0b9dcec0805c049f02f.jpg', '5', '', '0');
INSERT INTO `photo` VALUES ('6', '127782b1036c50e8266f0b434d0bc1e6.jpg', '6', '', '0');
INSERT INTO `photo` VALUES ('7', 'Golfe-Morbihan-2.jpg', '7', '', '0');
INSERT INTO `photo` VALUES ('8', 'IMG_0253.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('9', 'IMG_0240.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('10', 'IMG_0242.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('11', 'IMG_0244.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('12', 'IMG_0245.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('13', 'IMG_0246.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('14', 'IMG_0247.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('15', 'IMG_0250.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('16', 'IMG_0252.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('17', 'IMG_0255.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('18', 'IMG_0257.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('19', 'IMG_0258.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('20', 'IMG_0259.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('21', 'IMG_0261.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('22', 'IMG_0263.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('23', 'IMG_0264.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('24', 'IMG_0265.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('25', 'IMG_0266.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('26', 'IMG_0268.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('27', 'IMG_0445.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('28', 'IMG_0447.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('29', 'IMG_0448.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('30', 'IMG_0449.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('31', 'IMG_0451.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('32', 'IMG_0452.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('33', 'IMG_0453.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('34', 'IMG_0468.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('35', 'IMG_0469.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('36', 'IMG_0472.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('37', 'IMG_0474.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('38', 'IMG_0475.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('39', 'IMG_0476.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('40', 'IMG_0477.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('41', 'IMG_0479.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('42', 'IMG_0489.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('43', 'IMG_0490.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('44', 'IMG_0493.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('45', 'IMG_0495.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('46', 'IMG_0497.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('47', 'IMG_0499.jpg', '8', '', '0');
INSERT INTO `photo` VALUES ('48', 'IMG_0505.jpg', '8', '', '0');

-- ____________________ MEMBRE ____________________ --
CREATE TABLE IF NOT EXISTS `membre` (
	`pseudo` varchar(30) NOT NULL,
	`mdp` varchar(100) NOT NULL,
	`statut` varchar(20) NOT NULL,
	`nom` varchar(30) NOT NULL,
	`prenom` varchar(30) NOT NULL,
	`date_naiss` date DEFAULT NULL,
	`adresse` varchar(70) DEFAULT NULL,
	`code_postal` varchar(5) DEFAULT NULL, 
	`ville` varchar(30) DEFAULT NULL,
	`mail` varchar(70) NOT NULL,
	`description` text DEFAULT NULL,
	`photo` int(10) DEFAULT NULL,
	PRIMARY KEY(`pseudo`),
	FOREIGN KEY (`photo`) REFERENCES `photo`(`numero`),
	CONSTRAINT C_STATUT CHECK (statut = 'membre' OR statut = 'administrateur' OR statut = 'modérateur')
);

INSERT INTO `membre` VALUES (
	'Pat',
	'336ef0314691374761c51e0d278cd06c64548d74',
	'administrateur',
	'Paturaux',
	'Florian',
	'1993-09-28',
	'60 rue du Solon',
	'42410',
	'Saint Michel sur Rhône',
	'florian.paturaux@univ-lyon1.fr',
	'',
	''
);
INSERT INTO `membre` VALUES (
	'Benoit',
	'336ef0314691374761c51e0d278cd06c64548d74',
	'administrateur',
	'Rongeard',
	'Benoit',
	'1994-03-30',
	'',
	'',
	'',
	'benoit.rongeard@univ-lyon1.fr',
	'',
	''
);
INSERT INTO `membre` VALUES (
	'Sylvio',
	'336ef0314691374761c51e0d278cd06c64548d74',
	'administrateur',
	'Menubarbe',
	'Sylvio',
	'1994-01-11',
	'',
	'',
	'',
	'sylvio.menubarbe@univ-lyon1.fr',
	'',
	''
);
INSERT INTO `membre` VALUES (
	'modo',
	'336ef0314691374761c51e0d278cd06c64548d74',
	'moderateur',
	'modo',
	'modo',
	'1994-01-11',
	'',
	'',
	'',
	'sylvio.menubarbe@univ-lyon1.fr',
	'',
	''
);

-- ____________________ PARCOURS ____________________ --
CREATE TABLE IF NOT EXISTS `parcours` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`nom` blob NOT NULL,
	`depart_lat` double NOT NULL,
	`depart_lon` double NOT NULL,
	`nb_point` int NOT NULL,
	
	PRIMARY KEY (`id`)
);

INSERT INTO `parcours` VALUES ('1',	'a.gpx', '44.8958571850001', '2.75850228700006', '0');
INSERT INTO `parcours` VALUES ('2', 'b.gpx', '44.599227581', '2.39757743600006', '0');
INSERT INTO `parcours` VALUES ('3', 'c.gpx', '44.4381417130001', '1.93000135300002','0');
INSERT INTO `parcours` VALUES ('4', 'pr-le-sentier-du-loup-garou-9737.gpx', '0', '0','0');
INSERT INTO `parcours` VALUES ('5', 'ped30003-le-sentier-des-etangs-920-9720.gpx', '0', '0','0');
INSERT INTO `parcours` VALUES ('6', 'pr-sentier-du-guepier-9741.gpx', '0', '0','0');
INSERT INTO `parcours` VALUES ('7', 'point-info-tourisme-Ambon__Circuit_Killig_Ar_Mor.gpx', '0', '0','0');
INSERT INTO `parcours` VALUES ('8', '650783.gpx', '0', '0','0');

-- ____________________ RANDO ____________________ --
CREATE TABLE IF NOT EXISTS `rando` (
	`code` int(10) NOT NULL AUTO_INCREMENT,
	`titre` varchar(150) NOT NULL,
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
	`parcours` int(10) DEFAULT NULL,
	`departement` varchar(2) DEFAULT NULL,
	`photo_principale` int(10) NOT NULL,
	`auteur` varchar(30) NOT NULL,
	`galerie` int(10) DEFAULT NULL,
	PRIMARY KEY (`code`),
	FOREIGN KEY (`parcours`) REFERENCES `parcours`(`id`),
	FOREIGN KEY (`departement`) REFERENCES `departements`(`num_departement`),
	FOREIGN KEY (`photo_principale`) REFERENCES `photo`(`numero`),
	FOREIGN KEY (`auteur`) REFERENCES `membre`(`pseudo`),
	FOREIGN KEY (`galerie`) REFERENCES `galerie`(`numero`),
	CHECK (difficulte BETWEEN 0 and 5),
	CHECK (note BETWEEN 0 and 5)
);

INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Randonnée à Thérondels',
	'15,5',
	'4:45',
	'2',
	'La presqu’île de Laussac, depuis le village de Thérondels, tout proche des monts du Cantal : une approche facile des gorges sauvages de la Truyère et du plan d’eau de Sarrans, avec des points de vue exceptionnels.',
	'',
	'1',
	'',
	'',
	'2014-01-15 14:30:00',
	'1',
	'1',
	'12',
	'1',
	'Pat',
	'1'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Randonnée à Conques',
	'7',
	'2:30',
	'1',
	'Dans cet austère et sauvage paysage, au confluent des gorges creusées par l’Ouche et de la vallée du Dourdou, se niche le site de Conques, rayonnant de lumière et semblant figé par le temps.',
	'',
	'1',
	'',
	'',
	'2014-01-15 14:35:00',
	'1',
	'2',
	'12',
	'2',
	'Pat',
	'2'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Randonnée à La Capelle-Balaguier',
	'15',
	'3:45',
	'2',
	'A l’ouest de Villeneuve, le causse de Salvagnac offre aux randonneurs des chemins ancestraux, marqués de l’usure des charrois d’antan, bordés de murettes en pierres sèches et de buis épaiset parfumés.',
	'',
	'1',
	'',
	'',
	'2014-01-15 14:40:00',
	'1',
	'3',
	'12',
	'3',
	'Pat',
	'3'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Le sentier du Loup-Garoup',
	'4,5',
	'2:00',
	'1',
	'Partez découvrir le massif de la Serre et le village d\'Amange en vous plongeant dans l\'histoire du loup garou... Quand a lieu la fête du Loup-Garou (fin juin, début juillet), les spectateurs deviennent acteurs.',
	'',
	'1',
	'',
	'',
	'2014-02-02 15:30:00',
	'1',
	'4',
	'39',
	'4',
	'Pat',
	'4'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Le sentier des étangs',
	'7',
	'2:30',
	'2',
	'Les étangs de la Bresse ont été créés et exploités par l\'homme depuis le Moyen-Âge. Tour à tour asséchés ou en eau, les étangs et leur écosystème évoluent au fil des saisons et donnent vie au paysage.',
	'',
	'1',
	'',
	'',
	'2014-02-02 15:45:00',
	'1',
	'5',
	'39',
	'5',
	'Pat',
	'5'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Le sentier du guêpier',
	'10',
	'2:30',
	'2',
	'En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n\'en finit pas".',
	'',
	'1',
	'',
	'',
	'2014-02-02 16:00:00',
	'1',
	'6',
	'39',
	'6',
	'Pat',
	'6'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'Circuit Killig Ar Mor',
	'16,3',
	'4:30',
	'2',
	'Ce Circuit, au départ du bourg d\'Ambon, traverse St Mamers avec sa chapelle et Bétahon, villages face aux marais maritimes de Billiers . En suivant le sentier côtier, il traverse les villages de Cromenac\'h avec sa chapelle et Tréhervé avec son amer. Son cheminement est en partie commun avec le GR 34 et 349 Rhuys-Vilaine.',
	'',
	'1',
	'',
	'',
	'2014-02-02 16:15:00',
	'1',
	'7',
	'56',
	'7',
	'Pat',
	'7'
);
INSERT INTO `rando` (`titre`, `longueur`, `duree`, `difficulte`, `descriptif`, `note`,`point_eau`, `denivele`, `equipement`,`date_insertion`,`valide`, `parcours`, `departement`, `photo_principale`, `auteur`, `galerie`)
VALUES (
	'La Montagne Verte',
	'13,4',
	'4:00',
	'2',
	'Circuit autour de la Montagne Verte au dessus du village des Eaux-Bonnes. Ce circuit permet de visiter les villages autour de la montagne verte et de découvrir l\'arrière pays. Belle vue sur le village des Eaux-Bonnes depuis la Montagne Verte.',
	'',
	'0',
	'',
	'',
	'2014-02-02 16:30:00',
	'1',
	'8',
	'64',
	'8',
	'Pat',
	'8'
);

-- ____________________ COMMENTAIRE ____________________ --
CREATE TABLE IF NOT EXISTS `commentaire` (
	`numero` int(10) NOT NULL AUTO_INCREMENT,
	`date` datetime NOT NULL,
	`auteur` varchar(30) NOT NULL,
	`code_rando` int(10) NOT NULL,
	`commentaire` text NOT NULL,
	`note` int(1) DEFAULT NULL,
	`valide` tinyint(1) DEFAULT NULL,
	PRIMARY KEY (`numero`),
	FOREIGN KEY (`code_rando`) REFERENCES `rando`(`code`),
	FOREIGN KEY (`auteur`) REFERENCES `membre`(`pseudo`),
	CHECK (note BETWEEN 0 and 5)
);

INSERT INTO `commentaire` VALUES (
	'0',
	'2014-01-27 09:00:00',
	'Pat',
	'1',
	'Bonne rando !',
	'',
	''
);

-- ____________________ CONNECTES ____________________ --
CREATE TABLE IF NOT EXISTS `connectes` (
	`ip` varchar(15) NOT NULL,
	`timestamp` int NOT NULL,
	PRIMARY KEY (`ip`, `timestamp`)
);