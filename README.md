# Gestion Soutenance

Application web en **PHP / MySQL** pour gérer les soutenances : étudiants, enseignants (membres de jury), soutenances et administrateurs.

## Fonctionnalités

- Authentification des administrateurs (mots de passe hachés avec `password_hash`)
- Gestion des étudiants : ajouter, lister, consulter, modifier, supprimer
- Gestion des enseignants : ajouter
- Gestion des soutenances : ajouter, rechercher
- Interface en français avec Bootstrap

## Prérequis

- PHP 8.x
- MySQL / MariaDB (WAMP, XAMPP, Laragon…)
- Un serveur web Apache

## Installation

1. Cloner le dépôt dans le dossier web de votre serveur, par exemple :
   `C:\wamp64\www\gestion-soutenance`
2. Démarrer Apache et MySQL.
3. Créer la base de données et les tables :
   - ouvrir phpMyAdmin, puis importer `sql/create.sql` ;
   - importer ensuite les données de démonstration `sql/insert.sql`.
4. Configurer la connexion dans `src/utils/dbconfig.php` :

   ```php
   define('host', 'localhost');
   define('dbname', 'stages');
   define('username', 'root');
   define('password', '');
   ```

   La base s'appelle `stages` car le schéma SQL utilise `stages.Etudiant`, `stages.Enseignant`, etc.
5. Ouvrir l'application : `http://localhost/gestion-soutenance/src/index.php`

## Connexion de démonstration

Les comptes créés par `sql/insert.sql` utilisent tous le mot de passe **`password`** :

| Login    | Rôle          |
| -------- | ------------- |
| Imene    | Administrateur |
| Oussama  | Administrateur |
| Rayen    | Administrateur |
| Youssef  | Administrateur |
| Ahmed    | Administrateur |

> Pensez à changer ces mots de passe après l'installation.

## Structure du projet

```text
.
├── css/                  # Feuilles de style (login, navbar, main)
├── js/                   # Scripts (navbar)
├── sql/
│   ├── create.sql        # Création des tables
│   └── insert.sql        # Données de démonstration
├── src/
│   ├── index.php         # Point d'entrée
│   ├── layout.phtml      # Layout principal
│   ├── authentication/   # Connexion / déconnexion
│   ├── inscription/      # Inscription
│   ├── etudiant/         # CRUD étudiants
│   ├── enseignant/       # Ajout enseignants
│   ├── soutenance/       # Ajout / recherche de soutenances
│   └── utils/            # Connexion PDO et configuration
└── update_passwords.php  # Script utilitaire de réinitialisation des mots de passe
```

## Remarques

- Le projet est prévu pour un environnement local (WAMP/XAMPP). Aucun déploiement en production n'est configuré.
- `update_passwords.php` réinitialise tous les mots de passe administrateurs à `password` ; à supprimer ou protéger en production.
- Les identifiants de `dbconfig.php` sont ceux par défaut de WAMP (`root` sans mot de passe) ; adaptez-les à votre environnement.
