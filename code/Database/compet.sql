DROP DATABASE IF EXISTS compets_management;
CREATE DATABASE IF NOT EXISTS compets_management;

USE compets_management;

DROP TABLE IF EXISTS epreuves;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS profil;
DROP TABLE IF EXISTS passages;
DROP TABLE IF EXISTS resultat;


CREATE TABLE IF NOT EXISTS epreuves
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(32) NOT NULL,
    categorie int(11) NOT NULL,
    profil int(11) NOT NULL,
    lieu VARCHAR(32) NOT NULL,
    lifeDate DATE NOT NULL,
    status int(11) NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS categories
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(32) NOT NULL

)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS profils
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    profil VARCHAR(32) NOT NULL

)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS participants
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    
    nom VARCHAR(32) NOT NULL,
    prenom VARCHAR(32) NOT NULL,
    photo VARCHAR(32) NOT NULL,
    categorie int(11) NOT NULL,
    profil int(11) NOT NULL,
    email VARCHAR(32) NOT NULL UNIQUE,
    date_de_naissance DATE NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS resultat
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    epreuve_id INT(11)  NULL,
    participant_id INT(11) NULL,
    nombre_passage INT(11) NULL,
    temps_one TIME NULL,
    temps_two TIME NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS statusTb
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name_status VARCHAR (33) NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO epreuves (nom, categorie, profil, lieu, lifeDate , status)
VALUE
('blogs','6', '2', 'paris','2019-09-24 16:15:54' , 2),
('blog','6', '2', 'paris','2019-09-24 16:15:54', 2);

INSERT INTO resultat (epreuve_id, participant_id, nombre_passage, temps_one, temps_two)
VALUE
('1','1', '2', '15','12');

INSERT INTO categories (categorie)
VALUE
("M1"),
("M2"),
("M3"),
("Senior"),
("V"),
("Snow"),
("Nouvelle Glisse NG");

INSERT INTO profils (profil)
VALUE
("ASVP : ex-pervenches"),
("Open: conjoints et/ou enfants"),
("Gardes-champêtres");



INSERT INTO participants (photo, nom, prenom, categorie, profil, email, date_de_naissance)
VALUE
("flopi.jpg","plopi","flo","6","2","hello@test.fr", "2019-09-24 16:15:54"),
("flopi.jpg","plopi","flo","6","2","hello@tests.fr", "2019-09-24 16:15:54");

INSERT INTO statusTb (name_status)
VALUE
("En cours"),
("Close"),
("Resultat"),
("Annulé");

-- participants
 ALTER TABLE participants
 ADD CONSTRAINT fk_participants_categories
 FOREIGN KEY (categorie) REFERENCES categories(id);
 
 ALTER TABLE participants
 ADD CONSTRAINT fk_participants_profils
 FOREIGN KEY (profil) REFERENCES profils(id);
 
 -- epreuve
 ALTER TABLE epreuves
 ADD CONSTRAINT fk_epreuve_categories
 FOREIGN KEY (categorie) REFERENCES categories(id);
 
 ALTER TABLE epreuves
 ADD CONSTRAINT fk_epreuve_profils
 FOREIGN KEY (profil) REFERENCES profils(id);

-- participant

 ALTER TABLE resultat
 ADD CONSTRAINT fk_participants_resultat
 FOREIGN KEY (participant_id) REFERENCES participants(id);
 
 -- epreuves
 -- CREATE INDEX gt_epreuveID ON epreuves (id);
 ALTER TABLE resultat
 ADD CONSTRAINT fk_epreuves_resultat
 FOREIGN KEY (epreuve_id) REFERENCES epreuves(id);

-- epreuves - status

 ALTER TABLE epreuves
 ADD CONSTRAINT fk_epreuves_status
 FOREIGN KEY (status) REFERENCES statusTb(id);