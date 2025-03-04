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
    sport VARCHAR(50),
    PRIMARY KEY (code_ligue)
) ENGINE = InnoDB;

CREATE TABLE prestation (
    code_prestation VARCHAR(50),
    reference VARCHAR(50),
    Désignation_du_produit varchar(50),
    pu varchar(50),
    PRIMARY KEY (code_prestation)
) ENGINE = InnoDB;

CREATE TABLE facture (
    code_prestation VARCHAR(50),
    code_ligue VARCHAR(50),
    numfacture INT,
    facture_date DATE,
    echeance DATE,    
    quantite INT,
    PRIMARY KEY (numfacture)
) ENGINE = InnoDB;
