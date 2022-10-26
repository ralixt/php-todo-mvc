# TP PHP : TODO App MVC

Compétences mobilisées :

- Découpage MVC 
- Utilisation de PHP avec une vision orientée objet
- Gestion de formulaires
- Maximiser une réutilisation de son code





## Contexte

Jean-Michel de la compta avait dit à sa direction qu'il pouvait faire le site parce qu'il savait programmer en HTML. Cependant, une fois les maquettes intégrées, il n'y avait plus personne pour rendre le tout dynamique. 

Vous intervenez pour reprendre les maquettes déjà intégrées et ajouter le support de la gestion de soumission des formulaires, la connexion à la base de données et tout le tintouin. 

Toutes les vues sont stockées dans le dossier `src/Views`. 



## Lancer le projet 

Si vous disposez de docker sur vos postes (lancez un terminal et essayer de taper `docker` pour voir s'il se passe un truc autre qu'une erreur), vous pouvez ouvrir un terminal à la racine du dossier et lancer la commande suivante :

```shell
docker compose up
```

Cela lancera un serveur PHP sur le port 80 pour servir le dossier `src`, ainsi qu'une base de données (login & mdp : root) et PhpMyAdmin sur le port 8080.

Sinon utilisez uwamp. 

S'il y a des erreurs PHP, type classe non-définie, **c'est normal** (yep c'est vous qui allez vous y coller).



## Exercice 

 ![](./class-diagram.png)

1. **Prenez en main le projet**, observez-en la structure, rappelez-vous de l'architecture MVC.

   - `index.php` est le **point d'entrée** (*entry point*) de l'application, **toutes les requêtes passeront par lui**, vous n'aurez pas d'URL directes (`http://localhost/Views/single.php?id=1`) mais des URL correctement formatées, réécrites (`http://localhost/task/1`). Dans l'index, vous trouverez en bas de page le block `switch` qui fait office de routeur (appelle un controller en fonction de l'URL). N'hésitez pas à faire un `var_dump( $uri )` pour voir ce qui se passe.

   - `Common/`, le dossier fourre-tout par excellence. Tout ce qui est commun à l'application s'y trouve plutôt que d'être à la racine, comme par exemple, le fichier de fonctions utilitaires, le singleton de base de données etc...

   - `Controllers/` je ne vous fais pas de dessin. Le contrôlleur est le point d'entrée d'une vue, il s'occupe traiter les données reçues et d'aggréger les données voulues auprès des services avant de donner les données pré-mâchées à la vue qui s'occupe de les afficher. Vous avez un contrôleur pour chaque vue.

   - `Entities/` le dossier où vous metterez les classes d'entités, qui sont les objets que l'on manipule (ici les tâches, mais on pourrait avoir des utilisateurs, recettes, ...).

   - `Services/` le dossier où se trouveront les services qui servent de couche d'abstraction entre un mode de stockage (en mémoire, BDD, API Rest, sur le disque, ...) et les autres composants (principalement les contrôleurs).

   - `Views/` le dossier contenant toutes les vues. C'est le seul endroit où vous trouverez du code HTML. Vous avez également un sous-dossier `fragments` pour les portions d'interfaces qui ne sont pas des pages entières. Chaque vue est affichée depuis la méthode `render()` d'un contrôlleur. Seuls les vues situées dans le sous-dossier `fragments` sont appellées depuis d'autres vues.

   - **Regardez le contenu du fichier `src/Common/functions.php`**, vous pourrez réutiliser les fonctions fournies. Consultez la documentation PHP pour les fonctions que vous ne connaissez pas (au hasard `extract()`).

     

2. **Commencez par résoudre les erreurs PHP qui se présentent à vous en implémentant les classes à partir du diagramme UML**, allez y progressivement, pas à pas et **n'implémentez dans un premier temps que ce qu'il faut pour résoudre les erreurs**. Ne faites que fonctionner la vue d'accueil. 



3. **Développez l'interface de listing des tâches**, la page d'accueil. Dans un premier temps, tirez parti de la classe `MemoryTaskService` pour lister les tâches d'exemples. 

   - Première étape, créez la classe `TaskEntity` (dans le bon dossier !) à partir des specs fournies dans l'UML. N'oubliez pas de charger votre fichier dans le `index.php` ensuite, sinon ça marche moins bien.

   - Vous dégagerez une structure commune pour l'affichage des tâches et l'isolerez dans un fichier vue dédié. Vous ré-emploierez ce template dans une boucle d'affichage au sein du template de liste de base. Vous pouvez utiliser la fonction fournie `get_template()` pour cela. 
     Pour aider votre IDE à autocompléter, vous pouvez utiliser PHPDoc (tout pareil que JSDoc, aucune originalité) en haut du document pour lui indiquer quelles variables sont disponibles et quel est leur type : 

     ```php+HTML
     <?php 
     /**
      * @var TaskEntity $task
      */
     ?>
     <!-- Code HTML du template -->
     ```

   - Vous afficherez une liste des tâches groupées par leur **jour** de création

   - Vous implémenterez un système de pagination fonctionel (coloration du bouton de page actif, changement de page, ...) en limitant l'affichage à **10 tâches par page**.

   - Vous rendrez le formulaire de filtre fonctionnel (gérez-le dans votre controller !). Pour cela, **consultez la documentation disponible dans les commentaires du code de `src/Services/TaskServiceInterface.php`** 

     

4. **Implémentez maintenant une nouvelle classe `DatabaseTaskService.php`** (par pitié placez-la dans le bon dossier) qui récupérera non plus les tâches depuis la mémoire, mais depuis une base de données MariaDB. **Pour cela, vous vous baserez sur les specs du diagramme UML.** Créez la table en base de données au préalable. 

   **Attention** : 

   - `createdAt` doit être remplis par défaut avec le timestamp actuel
   - `updatedAt` doit être remplis par défaut avec le timestamp actuel et mis à jour à chaque modification de la ligne (c'est en SQL que ça se passe !)
   - `completedAt` doit être remplis avec le timestamp actuel lors d'une création ou d'une mise à jour **si la tâche est terminée** (bon ok là vous pouvez le faire en PHP)



5. **Rendez fonctionnelle la vue de création/suppression d'une tâche**. Vous devez utiliser la même vue et le même controlleur pour les opérations de création, modification, suppression. Pour la modification, vous devrez pré-remplir les champs du formulaire avec les valeurs existantes de la tâche. 

   <detail>

   <summary>**Indice**</summary>

   Rien ne vous interdit d'initialiser une `TaskEntity` vide :man_shrugging: 

   </detail>

   

6. **Permutez le service `MemoryTaskService` avec `DatabaseTaskService` pour l'affichage de l'accueil (listing des tâches)** 



## Notions Utiles

- **Singleton** : design pattern qui permet qu'une classe ne soit instanciée qu'une seule fois. La démarche à suivre :

  - Ajoutez une propriété statique sur votre classe qui contiendra l'instance de cette classe

  - Passez le constructeur en visibilité protected ou public pour empêcher à la classe d'être instanciée avec le mot clé `new`

  - Créez une méthode statique telle que `getInstance()` qui aura la logique suivante : si l'instance n'est pas instanciée, je l'instancie et je la retourne, sinon je la retourne directement.

  - Tada !

    > **Pro tips de gamer** : en PHP vous pouvez utiliser des [Trait](https://www.php.net/manual/fr/language.oop5.traits.php) (forme d'héritage multiple) pour gérer la création des singleton et centraliser la logique (vu qu'on a plusieurs singleton dans ce projet). Pour instancier une classe enfant sans connaitre son nom, vous pouvez faire `self::$instance = new static();` (attention ce n'est possible que dans les versions récentes de PHP, je dirais >=7.4)

- Convertir des valeurs dans un autre type 

  - `strval()`
- `intval()`
  - `floatval()`
- `boolval()`