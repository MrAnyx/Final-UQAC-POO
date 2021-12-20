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
  - [Manipulations complémentaires](#manipulations-complémentaires)
  - [Lancement du projet](#lancement-du-projet)
  - [Fonctionnalités](#fonctionnalités)
  - [AOP](#aop)
  - [Développement](#développement)
    - [Modifier un composant VueJS existant](#modifier-un-composant-vuejs-existant)
    - [Création d'un nouveau composant VueJS](#création-dun-nouveau-composant-vuejs)
  - [Licence](#licence)

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

## Manipulations complémentaires

Une commande devra être exécuté afin de lier l'espace de stockage des images avec le dossier public. En effet, les images sont stockées dans le dossier `storage`.

Pour ce faire, exécutez la commande suivante : 
```bash
php artisan storage:link
```

Celle-ci créera un lien symbolique dans le dossier `public` qui pointe directement vers le dossier `storage/app/public`.

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

Comme nous avons pu l'évoquer, le but même de ce projet était de montrer qu'il était possible de d'implémenter des aspects dans un projet web. Les aspects, en règles générales, permettent de supprimer, ou du moins de limiter, les préoccupations transversales d'un projet. Les préoccupation transversales sont des portions de code qui se répètent à plusieurs endroits.

Étant un projet de petite envergure, nous n'avons pas pu implémenter de nombreux aspects. C'est pour cette raison que nous n'avons implémenté que 2 aspects :
- Un aspect de Logging
- Un aspect de sécurité

L'aspect de logging permet de journaliser dans des fichiers de log les actions que l'utilisateur réalise sur le site comme par exemple :
- Changer de page
- Ajouter un article à son panier
- Valider une commande
- Effectuer le payement
- Se connecter
- ...

Pour ce qui est de la sécurité, l'aspect sert à sécurisé les pages our lesquelles il est nécessaire d'être connecté. Par exemple, pour toutes les pages relatives au panier, nous avons sécurisé ses pages grâce à un aspect.

Afin d'avoir un contrôle précis sur les endroits où les aspects doivent être exécuté, nous avons décidé d'utiliser les annotation de PHP.

Voici à quoi peut ressembler un aspect.

```php
<?php

namespace App\aop\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Around;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MustBeAuthenticatedAspect implements Aspect {

   /**
    * Method that will be called around real method
    *
    * @param MethodInvocation $invocation Invocation
    * @Around("@execution(App\aop\Annotation\MustBeAuthenticated)", order=-128)
    *
    */
   public function checkAroundMethod(MethodInvocation $invocation) {

      if (Auth::user() === null) {
         Log::info("Anonymous user was redirect to /login page");
         return redirect()->route('login');
      }
   }
}
```

Nous avons ensuite créé une annotation permettant d'indiquer les méthodes pour lesquelles l'aspect devra être exécuté.

```php
<?php

namespace App\aop\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("METHOD")
 */
class MustBeAuthenticated extends Annotation {
}
```

Plutôt que de renseigner une annotation dans notre aspect, nous aurions pu renseigner un pointcut plus traditionnel avec le code suivante

```php
@Around("execution(public App\*->*(*))")
```

Toutefois, cette méthode est torp générique et ne permet pas de restreindre le champ d'action de notre action. Également, notre aspect risque d'être appelé lors de l'appel des fonctions de Laravel. 

Nous avons ensuite enregistré l'ensemble de nos aspects avec la class suivante :

```php
<?php
namespace App\aop;

use App\aop\Aspect\LoggingAspect;
use App\aop\Aspect\MustBeAuthenticatedAspect;
use Go\Core\AspectContainer;
use Go\Core\AspectKernel;

class ApplicationAspectKernel extends AspectKernel {

   /**
    * Configure an AspectContainer with advisors, aspects and pointcuts
    *
    * @param AspectContainer $container
    * @return void
    */
   protected function configureAop(AspectContainer $container) {
      $container->registerAspect(new LoggingAspect());
      $container->registerAspect(new MustBeAuthenticatedAspect());
   }
}
```

Enfin, nous avons créé le Container permettant de gérer le système d'aspect.

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AopServiceProvider extends ServiceProvider {
   /**
    * Register services.
    *
    * @return void
    */
   public function register() {

   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot() {
      $applicationAspectKernel = \App\aop\ApplicationAspectKernel::getInstance();
      $applicationAspectKernel->init([
         'debug' => true,
         'appDir' => base_path(),
         'cacheDir' => storage_path('app\\aspect'),
         'includePaths' => [
            base_path("app\\"),
         ],
      ]);
   }
}
```

Enfin, nous n'avions qu'à utiliser notre annotation afin de renseigner les méthodes pour lesquelles l'aspect devra être exécuté.

```php
<?php

namespace App\Http\Controllers;

use App\aop\Annotation\Logging;
use App\aop\Annotation\MustBeAuthenticated;

class MainController extends Controller {

   /**
    * @Logging
    * @MustBeAuthenticated
    */
   public function payment() {
      return view('payment');
   }
}
```

## Développement

Si vous souhaitez reprendre ce projet et le modifier, vous allez devoir installer de nouvelles librairies. En effet, pour le développement, NodeJS est nécessaire pour mettre à jour les composant VueJS qui sont utilisés à l'aide de Laravel MIX.

1. Dans un premier temps, vous allez devoir installer les librairies nécessaires pour Laravel MIX.
```bash
npm install
```

### Modifier un composant VueJS existant

Après la modification d'un composant VueJS, n'oubliez pas d'exécuter la commande :

```bash
npm run dev
```

Dans le cas ou effectuez plusieurs modifications aux composants VueJS, il est préférable d'utiliser la commande : 
```bash
npm run watch
```

De cette manière, les fichier javascipt dans le dossier `public/js` ainsi que les fichiers de style dans `public/css` seront mis à jour automatiquement dès un changement sont détéctés dans les fichiers `.js` et `.css/.scss` situé dans les dossier `ressources`.

### Création d'un nouveau composant VueJS

La création d'un nouveau composant sera prise en compte automatiquement. Vous n'aurez donc pas besoin d'enregistrer chaque composant.

## Licence

Ce projet est sous licence MIT. Vous trouverez la licence en détail dans le fichier `LICENSE`.