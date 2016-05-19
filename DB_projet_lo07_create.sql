-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-05-12 13:06:13.74

-- tables
-- Table: Auteur
CREATE TABLE Auteur (
    id int NOT NULL,
    organisation varchar(50) NOT NULL,
    equipe varchar(25) NOT NULL,
    nom varchar(25) NOT NULL,
    prenom varchar(25) NOT NULL,
    CONSTRAINT Auteur_pk PRIMARY KEY (id)
);

-- Table: Comptes
CREATE TABLE Comptes (
    Auteur_id int NULL,
    statut varchar(25) NOT NULL,
    login varchar(50) NOT NULL,
    mdp varchar(50) NOT NULL,
    CONSTRAINT Comptes_pk PRIMARY KEY (login)
);

-- Table: Publication
CREATE TABLE Publication (
    id int NOT NULL,
    titre_article varchar(25) NOT NULL,
    reference_publication varchar(25) NOT NULL,
    annee int NOT NULL,
    categorie varchar(25) NOT NULL,
    lieu varchar(25) NULL,
    statut varchar(12) NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
);

-- Table: redige
CREATE TABLE redige (
    Publication_id int NOT NULL,
    Auteur_id int NOT NULL,
    CONSTRAINT redige_pk PRIMARY KEY (Publication_id,Auteur_id)
);

-- foreign keys
-- Reference: Comptes_Auteur (table: Comptes)
ALTER TABLE Comptes ADD CONSTRAINT Comptes_Auteur FOREIGN KEY Comptes_Auteur (Auteur_id)
    REFERENCES Auteur (id);

-- Reference: redige_Auteur (table: redige)
ALTER TABLE redige ADD CONSTRAINT redige_Auteur FOREIGN KEY redige_Auteur (Auteur_id)
    REFERENCES Auteur (id);

-- Reference: redige_Publication (table: redige)
ALTER TABLE redige ADD CONSTRAINT redige_Publication FOREIGN KEY redige_Publication (Publication_id)
    REFERENCES Publication (id);

-- End of file.

