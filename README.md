# Currency converter

Ce projet est une application Web permettant de faire la convertion entre devises.

## Prérequis

Avant de commencer, assurez-vous que votre environnement de développement répond aux exigences suivantes :

- PHP >= 8.1
- Composer
- Node.js >= 14.x
- NPM ou Yarn

## Installation

Suivez les étapes ci-dessous pour installer et exécuter l'application localement sur votre machine :

1. Clonez le projet à partir du référentiel Git :

```bash
git clone <https://github.com/Jaures277/bitChest.git>
```

2. Installez les dépendances PHP en utilisant Composer :

```bash
composer install
```

3. Copiez le fichier .env.example en tant que .env et configurez les variables d'environnement, notamment la configuration de la base de données et les informations de connexion.

```bash
cp .env.example .env
```

4. Assurez-vous de générer une clé d'application unique :

```bash
php artisan key:generate

```

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

```bash
php artisan migrate
```

Exécutez le seeder pour pré-remplir la table des paires de devises avec des données de test :

```bash
php artisan db:seed
```

## Utilisation
Une fois l'installation terminée, vous pouvez exécuter l'application en utilisant la commande suivante :

```bash
php artisan serve
```

## Technologie utilisée

-Laravel 10.x - Framework PHP pour le backend.
-Vue JS 3.3.4 - Framework JavaScript pour le frontend.


## Parametre d'acces
username : root \
passeword : root

## Auteurs
Ce projet a été développé par James NYAMSI.
