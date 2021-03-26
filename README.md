# Travaux d'Héraclès #2 : le sanglier d'Érymanthe
 
Prérequis : cloner ce repository.
 
## État des lieux du projet
 
Héraclès doit maintenant vaincre le sanglier d'Érymanthe 🐗, énorme bête qui terrifie les habitants du mont Erymanthe en Arcadie.
 
Dans ce nouvel atelier, tu as une structure de projet un peu plus complexe que précédemment. 

Tout d'abord, tu vas retrouver un fichier *cli.php* à la racine du projet. C'est une correction de l'atelier précédent. Le fichier a été renommé pour éviter les confusions avec le nouveau fichier *index.php* qui se trouve maintenant dans le dossier *public*. 

Tu vas en effet utiliser cette fois-ci une interface web, tu devras donc lancer un serveur PHP sur le dossier public en utilisant la commande
 
`php -S localhost:8000 -t public`
 
le fichier *public/index.php* contient déjà pas mal de code. La partie du fichier que tu dois toucher est délimitée par des commentaires (en haut du fichier). 
 
> ⛔ Tu ne dois pas toucher au reste du code (même si tu peux le regarder ;-)). Ne t'inquiète pas si tu ne comprends pas tout ce qui s'y passe, dis toi juste que c'est une utilisation des classes que tu crées, afin d'avoir un rendu graphique un peu plus attrayant que dans le terminal.
 
✅ Dans cette zone "autorisée" tu vois qu'il y a déjà deux instances d'objets Fighter, tu retrouves Héraclès ainsi que le sanglier (`$boar`).
 
Dans le fichier *Fighter.php*, une petite modification a également été apportée afin de gérer des images pour tes combattants. Un 4ème paramètre `$image` est ajouté au `__construct()`, avec une image par défaut si tu n'en renseigne pas à l'instanciation. 
 
Quand tu ouvres http://localhost:8000 sur ton navigateur, tu dois voir cette image par défaut pour les deux combattants, ainsi que le déroulé du combat. Le code repris sur cette page est très proche de celui du *cli.php*, à quelques ajustements de mise en forme près. Tu vois ici que le code de ta classe `Fighter` s'adapte parfaitement à des utilisations différentes (terminal ou page web).
 
 
## À toi de jouer
 
Tout d'abord, attribue une image aux deux protagonistes en ajoutant le lien vers l'image à l'instanciation des objets.
Utilise respectivement les images *heracles.svg* et *boar.svg* déjà fournies, ce qui donne par ex :
 
```
$heracles = new Fighter('Heracles', 20, 6, 'heracles.svg');
```
 
Les images devraient s'actualiser en conséquence dans ton navigateur puisque la page *index.php* appelle la méthode `getImage()` qui, comme tu peux le voir dans la classe `Fighter`, renvoie le nom de l'image auquel elle ajoute le chemin vers le répertoire 'assets/images' afin que ton navigateur puisse retrouver correctement celle-ci.
 
## Un peu d'équipement pour attaquer
 
Les caractéristiques de force et de dextérité du sanglier sont bien supérieures aux tiennes, impossible de le battre dans ces conditions, tes poings ne suffiront pas ! Il va falloir que tu t'équipes en conséquences ! 
 
Si tu cliques sur l'image d'Héraclès, tu verras qu'une fenêtre modale s'ouvre. Mis à part ton image et ton nom, cette dernière est bien vide pour le moment, mais affichera à terme ton équipement et tes caractéristiques (attaque, défense, vie...)
 
Tout d'abord, il va falloir t'ajouter une épée.
 
1. Créé une nouvelle classe `Weapon` dans le dossier *src/*.
2. Celle-ci va correspondre à l'arme que tu vas équiper. Elle doit avoir une propriété `$damage`, de type integer, et initialisée à 10.
3. Ajoute une propriété image initialisé avec 'sword.svg'. 

4. Créé également les *getter* et *setter* correspondants. Pour le `getImage()` (comme pour `Fighter`), fait en sorte de concaténer la chaîne retournée avec 'assets/images/' pour renvoyer le chemin complet vers l'image.
 
5. Pour ajouter l'arme au personnage, dans la classe `Fighter`, on crée une propriété `$weapon`. Celle-ci sera cette fois-ci typée avec  `?Weapon`, c'est-à-dire que la valeur assignée à cette propriété devra être un objet, instance de la classe `Weapon`, ou `null` (c'est à cela que sert le point d'interrogation). Par défaut, la propriété sera initialisée à `null`. 

6. Créé là encore le *getter* et *setter* correspondant à cette nouvelle propriété.
 
7. Dans le fichier *index.php*, instancie un objet de type `Weapon` et associe le à Héraclès via la méthode `setWeapon()`. Si tout se passe bien, tu dois voir l'arme apparaître dans l'inventaire du héros, dans la case "Weapon", la première en haut à gauche.
 
8. Pour le moment, l'épée apparaît bien mais elle ne t'apporte aucun avantage. Retourne dans `Fighter`, nous allons modifier un peu le comportement de la méthode `fight()`.
Créé tout d'abord une méthode `getDamage()`. Celle-ci doit retourner la force (*strength*) du Fighter, à laquelle tu vas ajouter les dommages provenant de l'arme (dans le cas où il en porte une).
 
9. Dans la méthode `fight()`, remplace ensuite `getStrength()` par `getDamage()`. Ainsi les dégâts infligés (via le `rand()`) seront compris entre 1 et `getDamage()` (la force + les dégâts de l'arme) et non plus juste la force. 
 
> Tout ce calcul pourrait être réalisé directement dans `fight()`, mais l'utilisation de la méthode `getDamage()` permet de simplifier la méthode `fight()` et de déporter la logique de calcul des dommages ailleurs. De plus, il est maintenant possible d'utiliser `getDamage()` indépendamment de `fight()`, ce qui est fait pour afficher le score d'attaque dans l'inventaire.
 
10. Vérifie donc dans ton inventaire que ton score d'attaque apparaît bien. Il doit afficher 30. (et si tu essaies d'enlever l'arme à Héraclès, il doit afficher 20). Si tu changes la valeur de `$damage` dans la classe `Fighter`, tu verras que ton score d'attaque sera également modifié en conséquence, puisque c'est `getDamage()` qui est utilisé ici pour afficher le score ! 
 
 
## Et la défense dans tout ça ? 
 
Tu vas refaire quasiment la même chose pour gérer cette fois-ci un bouclier. Les étapes sont ici volontairement  données dans les grandes lignes.
 
- Créé une classe `Shield` avec un propriété `$protection` initialisée à 10, et une propriété image utilisant 'shield.svg'.
 
- Dans `Fighter`, ajouter une propriété `$shield`. Puis créé une méthode `getDefense()`, additionnant la dextérité et la protection du bouclier (si le héros en porte un). Cette méthode sera également utilisée dans `fight()` (à la place du simple appel à `getDexterity()`) afin que le bouclier puisse jouer son rôle protecteur. 
 
- Vérifie dans l'inventaire que le bouclier apparaît bien dans la seconde case et que le score de défense du personnage a bien été mis à jour.
 
## Prêt au combat.
 
Réactualise la page, tu fais maintenant beaucoup plus de dégâts et tu es mieux protégé, tu devrais gagner le combat sans trop de difficultés !
 
N'hésite pas à jouer avec ce code pour aller plus loin, une correction te sera fournie pour le prochain atelier.

