# S&FO - Spécifications du Projet

## Présentation

**Nom du projet :** S&FO

---

## Utilisateurs

Le système distingue trois types d'utilisateurs :

- **Les annonceurs** : Publient et gèrent leurs annonces
- **Les chercheurs** : Consultent et sauvegardent les annonces
- **Les administrateurs** :  Administrent les utilisateurs et les mots-clés

---

## Fonctionnalités principales

- **Création de compte** :  Annonceurs ou chercheurs (login/password simple)
- **Authentification** : Login sur un compte
- **Dépôt d'annonces** : Avec date de publication, média et mots-clés
- **Mise en favoris** : Les chercheurs peuvent "wishlister" une annonce
- **Statistiques** : Nombre de wishlistées par annonce (visible uniquement pour l'annonceur)

---

## Modèle de données

> ⚠️ Modèle de données déjà fourni (à intégrer selon le document existant)

---

## Vues par type d'utilisateur

### Les annonceurs

- Liste de mes annonces
- Ajouter une annonce
- Détail d'une annonce
- Modifier une annonce
- Supprimer une annonce

### Les chercheurs

- Liste des annonces triées par date de publication
- Fonction de recherche
- Détail d'une annonce
- Ajout d'annonces à la wishlist
- Gérer la wishlist

### Les administrateurs

- Gérer les utilisateurs
- Gérer la liste de mots-clés

---

## MVP (Minimum Viable Product)

**Focus principal** : La création et l'affichage d'une annonce sont **absolument essentiels** pour que le projet TPI ait du sens. 

---

## Users Stories

### Utilisateur (général)

- [ ] En tant qu'utilisateur, je dois pouvoir me logger
- [ ] En tant qu'utilisateur, je dois pouvoir créer un compte annonceur/chercheur

### Annonceur

- [ ] En tant qu'annonceur, je dois voir mes annonces
- [ ] En tant qu'annonceur, je dois voir le détail de mes annonces
- [ ] En tant qu'annonceur, je dois pouvoir créer une annonce
- [ ] En tant qu'annonceur, je dois pouvoir modifier une annonce
- [ ] En tant qu'annonceur, je dois pouvoir supprimer une annonce
- [ ] En tant qu'annonceur, je dois pouvoir voir le nombre de wishlistées d'une de mes annonces

### Chercheur

- [ ] En tant que chercheur, je dois voir la liste des annonces
- [ ] En tant que chercheur, je dois voir les détails d'une annonce
- [ ] En tant que chercheur, je dois pouvoir wishlister une annonce
- [ ] En tant que chercheur, je dois pouvoir voir ma wishlist
- [ ] En tant que chercheur, je dois pouvoir faire un filtre pour la recherche des annonces
- [ ] En tant que chercheur, je dois pouvoir gérer la wishlist

### Administrateur

- [ ] En tant qu'administrateur, je dois pouvoir voir la liste des utilisateurs
- [ ] En tant qu'administrateur, je dois pouvoir voir la liste des mots-clés
- [ ] En tant qu'administrateur, je dois pouvoir supprimer un utilisateur
- [ ] En tant qu'administrateur, je dois pouvoir ajouter un mot-clé à la liste
- [ ] En tant qu'administrateur, je dois pouvoir modifier un mot-clé de la liste
- [ ] En tant qu'administrateur, je dois pouvoir supprimer un mot-clé de la liste

---

## Contraintes techniques

### Technologies

- **Backend** : PHP, Slim Framework
- **Frontend** :  HTML, CSS, JavaScript, Bootstrap
- **Base de données** : MariaDB / MySQL
- **Administration BD** : PhpMyAdmin

### Environnement de développement

- **Système** : WSL (Windows Subsystem for Linux)
- **OS** : Windows 11
- **Stockage** : 
  - Disque SSD (développement)
  - Disque dur (sauvegarde projet)

### Outils et services

- **Versioning** : Github
- **Gestion de projet** : Trello
- **Documentation** : Suite Google
- **Stockage cloud** : Google Drive
- **Connexion réseau** : Nécessaire

---
