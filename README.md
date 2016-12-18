FormationOSS
============

Formation OSS de PHP avancé

# Installation

```bash
$ composer install
$ mysql -u root -p < FormationOSS.sql
```

Homepage => /?controller=planning&action=list

# Vues
Creation de la base >
Front controller + Menu >
Formulaire de login >
Formulaire de sign-up (creation de compte)
Consultation de planning
Creation de planning
Edition de planning / suppression

Consultation de user
Edition de user

# Detail des fonctionnalités

Affichage des erreurs du formulaire
Creer une session
Verifier le login
Verifier le login/mot de passe
Redirection vers l'accueil/planning

Affichage du menu
- Accueil
- Logout
- utilisateurs (si admin)
Verifier le role de l'utilisateur

Afficher le formulaire de signup
Afficher les erreurs
Creer l'utilisateur
Creer une session
Rediriger vers l'accueil/planning

Detruire la session
Rediriger vers le login

Verifier si connecté
Verifier le role
Afficher le menu
Aller chercher les formations
Afficher le tableau
Afficher les actions pour l'admin (modifier et delete)
Formulaire de creation de planning
Verifier les erreurs de creation de planning
Creation de planning en BDD
Reaffichage de la page planning


Formulaire de modification de planning
Pre remplissage des champs
Verification des erreurs
Update au niveau BDD
Rediriger vers la page courante

Verifier si connecté
Verifier le role
Afficher le menu
Aller chercher les utilisateurs
Afficher le tableau
Afficher les actions (modifier et delete)
Afficher un lien de creation

Formulaire de creation ou modification de user
Pre remplissage des champs (si modification)
Verification des erreurs
insert ou Update au niveau BDD
Rediriger vers la page users

creer une base
creer les tables
remplir les tables avec des données (planning)

BONUS
cache
