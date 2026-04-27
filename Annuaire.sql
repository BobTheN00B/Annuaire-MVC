use annuaire;
/*CREATE TABLE Categorie(
   Id_Categorie INT,
   Libelle VARCHAR(50),
   PRIMARY KEY(Id_Categorie)
);

CREATE TABLE Utilisateur(
   Id_Utilisateur INT,
   Mail VARCHAR(50),
   MDP VARCHAR(50),
   Params JSON,
   PRIMARY KEY(Id_Utilisateur)
);

CREATE TABLE Sites(
   Id_Sites INT,
   Titre VARCHAR(50),
   URL VARCHAR(50),
   Description VARCHAR(100),
   Id_Categorie INT NOT NULL,
   Id_Utilisateur INT NOT NULL,
   PRIMARY KEY(Id_Sites),
   FOREIGN KEY(Id_Categorie) REFERENCES Categorie(Id_Categorie),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);

insert into Categorie(Id_Categorie, Libelle)
values (1, 'Anime'), (2, 'Jeu Vidéos'), (3, 'Comic');*/
