ALTER TABLE facture
DROP FOREIGN KEY FK_Facture_Ligue;

ALTER TABLE ligue_facture
DROP FOREIGN KEY FK_Ligue_Facture_Facture;

ALTER TABLE ligue_facture
DROP FOREIGN KEY FK_Ligue_Facture_Prestation;


ALTER TABLE facture
ADD CONSTRAINT FK_Facture_Ligue
FOREIGN KEY (code_ligue) REFERENCES ligue(code_ligue);

ALTER TABLE ligue_facture
ADD CONSTRAINT FK_Ligue_Facture_Facture
FOREIGN KEY (numfacture) REFERENCES facture(numfacture);

ALTER TABLE ligue_facture
ADD CONSTRAINT FK_Ligue_Facture_Prestation
FOREIGN KEY (Reference) REFERENCES prestation(Reference);