DROP TABLE IF EXISTS ligue;
DROP TABLE IF EXISTS prestation;
DROP TABLE IF EXISTS facture;
DROP TABLE IF EXISTS ligue_facture;

CREATE TABLE ligue (
    compte_ligue VARCHAR(50),
    intitule VARCHAR(50),
    tresorier VARCHAR(50),
    sport VARCHAR(50),
    PRIMARY KEY (compte_ligue)
) ENGINE = InnoDB;

CREATE TABLE prestation (
    code_prestation VARCHAR(50),
    libelle VARCHAR(50),
    pu varchar(50),
    PRIMARY KEY (code_prestation)
) ENGINE = InnoDB;

CREATE TABLE facture (
    numfacture INT,
    facture_date DATE,
    echeance DATE,
    compte_ligue VARCHAR(50),
    PRIMARY KEY (numfacture)
) ENGINE = InnoDB;

CREATE TABLE ligue_facture (
    numfacture INT,
    code_prestation VARCHAR(50),
    quantite INT,
    PRIMARY KEY (numfacture, code_prestation)
) ENGINE = InnoDB;
