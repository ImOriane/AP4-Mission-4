DROP TABLE IF EXISTS ligue;
DROP TABLE IF EXISTS prestation;
DROP TABLE IF EXISTS facture;
DROP TABLE IF EXISTS ligue_facture;

CREATE TABLE ligue (
    code_ligue VARCHAR(50),
    nom_ligue VARCHAR(50),
    tresorier VARCHAR(50),
    adresse_tresorier VARCHAR(50),
    ville_tresorier VARCHAR(50),
    tresorier VARCHAR(50),
    sport VARCHAR(50),
    PRIMARY KEY (code_ligue)
) ENGINE = InnoDB;

CREATE TABLE prestation (
    Reference VARCHAR(50),
    Designation_du_produit VARCHAR(50),
    pu varchar(50),
    PRIMARY KEY (Reference)
) ENGINE = InnoDB;

CREATE TABLE facture (
    numfacture INT,
    facture_date DATE,
    echeance DATE,
    code_ligue VARCHAR(50),
    PRIMARY KEY (numfacture)
) ENGINE = InnoDB;

CREATE TABLE ligue_facture (
    numfacture INT,
    Reference VARCHAR(50),
    quantite INT,
    PRIMARY KEY (numfacture, Reference)
) ENGINE = InnoDB;
