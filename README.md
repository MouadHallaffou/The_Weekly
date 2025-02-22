<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
<!--   <a href="https://github.com/MouadHallaffou/the-weekly/actions"><img src="https://github.com/MouadHallaffou/the-weekly/workflows/tests/badge.svg" alt="Build Status"></a> -->
  <a href="https://packagist.org/packages/MouadHallaffou/the-weekly"><img src="https://img.shields.io/packagist/dt/MouadHallaffou/the-weekly" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/MouadHallaffou/the-weekly"><img src="https://img.shields.io/packagist/v/MouadHallaffou/the-weekly" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/MouadHallaffou/the-weekly"><img src="https://img.shields.io/packagist/l/MouadHallaffou/the-weekly" alt="License"></a>
</p>

## About The Weekly

**The Weekly** est une plateforme web développée avec **Laravel 11** qui permet aux utilisateurs de publier, consulter et commenter des annonces. Cette application est conçue pour offrir une expérience utilisateur fluide et sécurisée, en respectant les meilleures pratiques de développement.

### Fonctionnalités principales

- **Gestion des utilisateurs** : Système d'authentification sécurisé avec **Laravel Breeze**.
- **CRUD complet pour les annonces** : Création, lecture, mise à jour et suppression (avec soft delete) des annonces.
- **Gestion des catégories** : Organisation des annonces par catégories.
- **Commentaires** : Les utilisateurs peuvent commenter les annonces.
- **Pagination** : Affichage paginé des annonces et des commentaires.
- **Seeders et Factories** : Génération de données de test pour le développement.

---

## Technologies et Outils

- **Framework** : Laravel 11
- **Base de données** : MySQL 
- **Frontend** : Blade + Tailwind CSS
- **Authentification** : Laravel Breeze
- **Outils de développement** :
  - `php artisan make:model -mcr` (Modèles, Migrations, Controllers, Requests)
  - `php artisan make:seeder` & `php artisan make:factory` (Données de test)
  - `php artisan tinker` (REPL pour tester les requêtes)
  - **Eloquent ORM** pour manipuler les données

---

## Installation

Suivez ces étapes pour installer et configurer **The Weekly** sur votre machine locale.

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- MySQL ou PostgreSQL
- Node.js et npm (pour le frontend)

### Étapes d'installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/MouadHallaffou/the_weekly.git
   cd the-weekly
   ```

2. **Installer les dépendances PHP** :
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript** :
   ```bash
   npm install
   npm run build
   ```

4. **Configurer l'environnement** :
   - Copiez le fichier `.env.example` en `.env` :
     ```bash
     cp .env.example .env
     ```
   - Configurez les variables d'environnement dans `.env` (base de données, clé d'application, etc.).

5. **Générer la clé d'application** :
   ```bash
   php artisan key:generate
   ```

6. **Exécuter les migrations et seeders** :
   ```bash
   php artisan migrate --seed
   ```

7. **Démarrer le serveur** :
   ```bash
   php artisan serve
   ```

8. **Accéder à l'application** :
   Ouvrez votre navigateur et accédez à `http://localhost:8000`.

---

## Structure du Projet

### Modèles

- **User** : Gestion des utilisateurs.
- **Announcement** : Gestion des annonces.
- **Category** : Gestion des catégories.
- **Comment** : Gestion des commentaires.

### Contrôleurs

- **CategoryController** : Gestion des catégories.
- **AnnouncementController** : Gestion des annonces.
- **CommentController** : Gestion des commentaires.

### Vues

- **Blade Templates** : Utilisation de Tailwind CSS pour le style.
- **Layouts** : Structure commune des pages (en-tête, pied de page, etc.).

### Routes

- **web.php** : Définition des routes pour les catégories, annonces et commentaires.

---

## Bonnes Pratiques

- **Form Requests** : Validation des entrées utilisateurs.
- **Middleware** : Sécurisation des routes.
- **Soft Delete** : Suppression réversible des annonces.
- **Relations Eloquent** : Utilisation des relations entre modèles.

---

## Contribuer

Les contributions sont les bienvenues ! Pour contribuer à **The Weekly**, suivez ces étapes :

1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`).
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`).
4. Pushez la branche (`git push origin feature/AmazingFeature`).
5. Ouvrez une Pull Request.

---

## Licence

**The Weekly** est un logiciel open-source sous licence [MIT](https://opensource.org/licenses/MIT).

---

## Auteur

- **Mouad Hallaffou** - Développeur principal - [GitHub](https://github.com/MouadHallaffou)

---

<p align="center">
  <strong>🚀 Développez avec passion, partagez avec le monde ! 🚀</strong>
</p>
```


