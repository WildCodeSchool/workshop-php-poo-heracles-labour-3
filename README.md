# Workshop 2 : Le taureau ...

Prérequis : cloner ce repository.

## Préparation

Heraclès doit maintenant vaincre le sanglier d'Érymanthe, énorme bête qui terrifie les habitants du mont Érymanthe en Arcadie.

Dans ce nouvel atelier, tu as une structure de projet un peu plus complexe que précédemment. 
Tout d'abord, tu vas retrouver un fichier *cli.php* à la racine du projet. C'est une correction de l'atelier précédent. Le fichier a été renommé en pour éviter les confusion avec le nouveau fichier *index.php* qui se trouve maintenant dans le dossier *public*. 

Tu vas en effet utiliser cette fois-ci une interface web, tu devras donc lancer un serveur PHP sur le dossier public en utilisant la commande

`php -S localhost:8000 -t public`

le fichier *public/index.php* contient déjà pas mal de code. La partie du fichier que tu dois toucher est délimiter par des commentaires (en haut du fichier). Dans cette zone "authorisée" tu vois qu'il y a déjà deux instaces d'objets Fighter, tu retrouves heracles ainsi que le sanglier

Dans le fichier *Fighter.php*, une petite modification a également été apporté pour permettre de gérer des images pour tes combattants. Un 4èmer paramètre $image est ajouté au __construct(), avec une image par défaut si tu n'en renseigne pas à l'instanciation. 

Quand tu ouvres http://localhost:8000 sur ton navigateur, tu dois voir deux images pour les fighters, ainsi que le déroulé du combat. Le code repris sur cette page est très proche de celui du *cli.php*, à quelques ajustement de mise en forme près. Tu vois ici que le code des ta classe s'adapte parfaitement à des utilisations différentes (terminal ou page web).

Attribue une image aux deux protagoniste en ajoutant le lien vers l'image à l'instanciation des objets.
Utilise respectivement les images *hercules.svg* et *boar.svg* déjà fournies.

Les images devraient s'actualiser en conséquence dans ton navigateur puisque la page *index.php* appelle la méthode `getImage()` qui, comme tu peux le voir dans la classe Fighter, renvoie le nom de l'image auquel elle ajoute le chemin vers le répertoire 'assets/images' afin que ton navigateur puisse retrouver correctement celle-ci.

## Un peu d'équipement pour attaquer
Le sanglier est plus fort que toi. Ses statistiques de force et dexterité sont bien supérieures aux tiennes, impossible de le battre dans ces conditions. Il va falloir que tu t'équipes en conséquences ! 

Si tu cliques sur l'image d'Heracles, tu verras qu'une fenêtre modale s'ouvre. Cette dernière affiche ton image, ton équipement (vide pour le moment) et tes statistiques (attaque, défense, vie...)

Il va falloir t'ajouter une épée. Créé une nouvelle classe que tu appeleras Weapon.php dans le dossier *src/*.
Cette classe Weapon va correspondre à l'arme que tu vas équiper. Elle doit avoir une propriété `$damage`, de type integer, et initialisée à 10. Ajouter une propriété image initialisé avec 'sword.svg'. Créé également les getter et setter correspondants. Pour le `getImage()`, comme pour Fighter, fait en sorte de concatener avec 'assets/images/' pour renvoyer le chemin complet vers l'image. 

Pour ajouter l'arme au personnage, dans la classe Fighter, ajouter une propriété `$weapon`. Celle-ci sera cette fois de type 'Weapon', c'est-à-dire que la valeur assignée à cette propriété devra être un objet, instace de la class Weapon. Pour rappel, tu peux utilise n'importe quelle classe en tant que "type". 
Créé la encore le getter et setter correspondant.

Dans le fichier *index.php*, instancie un objet de type Weapon et associe le à Heracles via la méthode `setWeapon()`. Si tout se passe bien, tu dois voir l'arme apparaître dans l'inventaire du héros, dans la case "Weapon", la première en haut à gauche.

Pour le moment, l'épée apparaît bien mais elle ne t'apporte aucun avantage. Retourne dans Fighter, nous allons modifier un peu le comportement de la méthode `fight()`.
Créé tout d'abord une méthode `getDamage()`. Celle-ci doit récupérer la force du Fighter, à laquelle tu vas ajouter les dommage provenant de l'arme (dans le cas où il en porte une). 
Dans la méthode fight(), remplace ensuite getStrength() par getDamage(). Ainsi les dégats maximum infligés (via le rand()) seront égaux à getDamage() (la force + les dégats de l'arme) et non plus juste à la force. Tout ce calcul pourrait être réalisé directement dans fight(), mais l'utilisation de la méthode getDamage() permet de simplifier la méthode fight() et de déporter la logique de calcul des dommages ailleurs, car ce dernier peut-être amené à se complexifier plus tard (ajout d'une autre arme, potion de force, etc.).

Vérifie dans ton inventaire, ton score d'attaque doit être modifié pour afficher 30 au lieu de 20. Si tu changes la valeur de $damage dans la classe Fighter, tu verras que ton score d'attaque sera modifié en conséquence, car c'est getDamage() qui est utilisé ici pour afficher le score ! 

## Et la défense dans tout ça ? 
Tu vas refaire quasiment la même chose pour gérer un bouclier.
- Créé une classe Shield avec un propriété $protection à 10, et une propriété image utilisant 'shield.svg'.
- Dans Fighter, créé une classe getDefense(), additionnant dexterité et la protection du bouclier (si le héros en porte un). Cette méthode sera également utilisée dans fight() (à la place du simple appel à getDexterity()) afin que le bouclier puisse jouer son rôle protecteur. 
- Vérifie dans l'inventaire que le bouclier apparaît bien dans la seconde case et que le score de défense du personnage a bien été modifié.

## Prêt au combat.
Réactualise la page, tu es maintenant beaucoup plus fort et mieux protégé, tu devrais gagner le combat beaucoup plus facilement !

N'hésite pas à jouer avec ce code pour apprendre et aller plus loin. 