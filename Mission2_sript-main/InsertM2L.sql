-- Suppression des données existantes
DELETE FROM ligue_facture;
DELETE FROM facture;
DELETE FROM prestation;
DELETE FROM ligue;

INSERT INTO ligue (code_ligue, nom_ligue, tresorier, adresse_tresorier, ville_tresorier, sport)
VALUES
    ('411007', "Ligue Lorraine d'Escrime", 'Valerie LAHEURTE',null,null, 'Escrime'),
    ('411008', "Ligue Lorraine de Football", 'Pierre LENOIR',null,null, 'Football'),
    ('411009', "Ligue Lorraine de Basket", 'Mohamed BOURGARD',null,null, 'Basket'),
    ('411010', "Ligue Lorraine de Baby-Foot", 'Sylvain DELAHOUSSE',null,null, 'Baby-Foot');

INSERT INTO prestation (Reference, Designation_du_produit, pu)
VALUES
    ('AFFRAN', 'Affranchissement', '3,330'),
    ('PHOTOCOULEUR', 'Photocopies couleur', '0,240'),
    ('PHOTON&B', 'Photocopies Noir et Blanc', '0,055'),
    ('TRACEUR', 'Utilisation du traceur', '0,356');

INSERT INTO facture (numfacture, facture_date, echeance, code_ligue)
VALUES
    (5207, '2012-02-12', '2012-02-29', '411007'),
    (5208, '2012-02-12', '2012-02-29', '411008'),
    (5209, '2012-02-12', '2012-02-29', '411009'),
    (5210, '2012-02-12', '2012-02-29', '411010');

INSERT INTO ligue_facture (numfacture, Reference, quantite)
VALUES
    (5209, 'AFFRAN', 1),
    (5209, 'PHOTOCOULEUR', 166),
    (5209, 'PHOTON&B', 889),
    (5210, 'TRACEUR', 1),
    (5210, 'PHOTOCOULEUR', 300),
    (5210, 'PHOTON&B', 552);
