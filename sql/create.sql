CREATE TABLE stages.Etudiant (
    NCE INT NOT NULL,
    nom VARCHAR(64) NOT NULL,
    prenom VARCHAR(64) NOT NULL,
    classe VARCHAR(64) NOT NULL,
    PRIMARY KEY (NCE)
);

CREATE TABLE stages.Enseignant (
    Matricule INT NOT NULL,
    nom_Ens VARCHAR(64) NOT NULL,
    prenom_Ens VARCHAR(64) NOT NULL,
    PRIMARY KEY (Matricule)
);

CREATE TABLE stages.Soutenance (
    Numjury INT NOT NULL,
    date_soutenance VARCHAR(10) NOT NULL,
    note DECIMAL(4,2) NOT NULL,  
    Nce INT NOT NULL,
    Matricule INT NOT NULL,
    PRIMARY KEY (Numjury)
);

CREATE TABLE stages.Administrateur (
    id_admin INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(64) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_admin)
);
