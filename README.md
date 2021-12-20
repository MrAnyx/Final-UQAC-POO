# Projet final - Programmation objet avancée UQAC 2021

Le but de ce projet était d'appliquer les principes de la programmation orientée aspects dans une application web. Pour ce faire, nous avons créé une site factice d'e-commerce dans lequel nous avons implémenté des aspects à l'aide du langage PHP.

## Table des matières

- [Projet final - Programmation objet avancée UQAC 2021](#projet-final---programmation-objet-avancée-uqac-2021)
  - [Table des matières](#table-des-matières)
  - [Prérequis](#prérequis)
  - [Récupération du projet](#récupération-du-projet)
  - [Installation des librairies](#installation-des-librairies)
  - [Modification de certaines librairies](#modification-de-certaines-librairies)
  - [Création de la base de données](#création-de-la-base-de-données)
  - [Lancement du projet](#lancement-du-projet)
  - [Fonctionnalités](#fonctionnalités)
  - [AOP](#aop)
  - [Développement](#développement)

## Prérequis

Ce projet nécessite l'installation et l'utilisation de plusieurs outils :
- [Git](https://git-scm.com/)
- MySQL (Si vous utilisez WSL, voici comment installer MySQL : [lien](https://needlify.com/post/install-and-configure-a-fully-functionnal-web-server-on-wsl-2-b1aa0954))
- [PHP](https://www.php.net/downloads) 7.4 (Voici un article qui explique comment l'installer sur Windows : [lien](https://needlify.com/post/how-to-install-and-configure-php-on-windows-10-a7af093a))
- [Composer](https://getcomposer.org/) (Composer est optionel car il sera possible d'utiliser le fichier `composer.phar` disponible à la racine du projet)

Pour le développement ou l'amélioration de ce projet, les outils suivants sont également nécessaires :
- [NodeJS](https://nodejs.org/en/) (Une version récente fera l'affaire)

## Récupération du projet

Pour récupérer ce projet, plusieurs méthodes sont possible. Avec ou sans l'utilitaire Git.

En utilisant Git :
```bash
git clone https://github.com/MrAnyx/Final-UQAC-POO
```

Sans utiliser Git, vous n'aurez qu'à télécharger le projet en cliquant sur le bouton `Code` puis dans l'onglet `local` et enfin le bouton `Download Zip`. Vous n'aurez alors qu'à déziper l'archive.

## Installation des librairies

Ce projet fonctionne à l'aide du framework Laravel. Afin de tout fonctionne convenablement, plusieurs librairies devrons être installées dans le projet.


1. Ouvrez un terminal et vérifiez que vous êtes bien dans le répertoire du projet.
2. Installation des librairies

Si vous utiliser l'utilitaire Composer, vous n'avez qu'à exécuter la commande suivante :
```bash
composer install
```

Si vous n'avez pas Composer d'installé, vous n'avez qu'à utiliser le fichier `composer.phar` et utiliser la commande suivante :
```bash
php composer.phar install
```

De cette manière les librairies nécessaires au bon fonctionnement du projet seront installées dans le dossier `/vendor`. Parmis ces librairies, on retrouve celles de Laravel ainsi que pour l'utilisation des aspects.

Malheureusement, une des librairies utilisée par las aspects devra être modifiée. En effet, pendant le développement de ce projet, nous nous sommes rendu compte que une des librairies était défaillante et néccessitait une petite modification afin que tout fonctionnement convenablement.

## Modification de certaines librairies

Comme nous l'avons évoqué précédemment, une des librairies nécessaire pour utiliser les aspects doit être modifiée.

Pour ce faire, vous allez devoir :

1. Naviguer dans le dossier `/vendor` afin de trouver le fichier suivant : `\vendor\laminas\laminas-code\src\Generator\ParameterGenerator.php`.
2. Une fois fait, nous n'avez qu'à supprimer ou commenter les lignes 242 à 244.

Vous devriez ainsi obtenir le résultat suivant : 
```php
/**
 * @param bool $variadic
 * @return ParameterGenerator
 */
public function setVariadic($variadic) {
   // if (isset($this->defaultValue)) {
   //     throw new Exception\InvalidArgumentException('Variadic parameter cannot have a default value');
   // }

   $this->variadic = (bool) $variadic;

   return $this;
}
```

## Création de la base de données

Notre projet est un site factice d'e-commerce. De ce fait, les différents articles disponibles sur le site doivent être stockés en base de données.

1. Vous allez tout d'abord devoir créer une base de données MySQL. Vous pouvez la nommer comme vous le souhaitez mais si vous voulez réutiliser le même nom dans le projet, vous devez la nommer `poo_project`. 
> ⚠ Si vous n'utilisez pas le même nom que celui du projet, n'oubliez pas le mettre à jour le champ `DB_DATABASE` dans le fichier `.env`.

2. La deuxième étape consiste à renseigner les identifiants de votre base de données. Vous n'aurez qu'à changer les champs `DB_USERNAME` et `DB_PASSWORD` dans le fichier `.env`.

3. L'étape suivante consiste à créer les différentes tables dans notre base de données. Heureusement, nous avons créé les différents fichier de migrations qui correspondent aux entités PHP. Pour ce faire, vous n'avez qu'à exécuter la commande suivante :

```bash
php artisan migrate
```

4. Enfin, la dernière étape consiste à remplir notre base de données. Heureusement, nous avons créé une commande afin de faciliter l'ajout des éléments. Vous n'avez qu'à exécuter la commande suivante :

```bash
php artisan fixtures:load
```

Votre base de données devrait à présent être configurée et fonctionnelle.

## Lancement du projet

Deux méthodes sont possibles pour lancer un serveur de développement et ainsi visualiser le résultat du projet.

1. En utilisant le serveur web interne proposé par PHP. Voici la commande pour le lancer : 
```bash
php -S localhost:8000 -t public
```

2. En utilisant la CLI de Laravel. Voici la commande : 
```bash
php artisan serve
```

Maintenant, si vous vous rendez sur l'url `http://localhost:8000`, vous devriez voir le site d'e-commerce.

## Fonctionnalités

Nous avons essayé de rendre ce projet réaliste en ajoutant quelques fonctionnalités. Parmis celles-ci, nous avons ajouté lla possibilité :
- De créer un compte
- De se connecter
- De visualiser l'ensembles des articles disponibles
- De seulement visualiser les articles dans un secteur particulier
- D'ajouter des articles à votre panier
- De visualiser votre le nombre d'éléments dans votre panier
- De voir le contenu de votre panier
- De vider votre panier
- De valider son panier
- De simuler le payement des articles

De cette manière, nous avons un projet réaliste dans lequel plusieurs fonctionnalités sont disponibles.

## AOP

## Développement

