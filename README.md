# Travaux d'Héraclès #3 : les oiseaux du lac Stymphale
 
Prérequis : cloner ce *repository*.

Fais un `composer install`

> Tu remarqueras que les fichiers *composer.json* et *composer.lock* sont déjà présents, et que l'*autoload* est configuré dans *composer.json*. Ainsi, dans *index.php*, les `require` multiples des classes ont été remplacés par un unique `require` de *vendor/autoload.php*. Des *namespaces* ont également été ajoutés sur les classes puisqu'ils servent pour l'*autoload*. 

## Heritage

Un nouvelle épreuve attend notre champion, tuer les oiseaux monstrueux du lac Stymphale. Héraclès (et son équipement) ainsi que trois oiseaux sont déjà instanciés dans *index.php*.

> Pour le moment, les monstres et les héros sont tous deux des instances de la classe `Fighter`. Cependant, s'ils ont des propriétés communes propres aux combattants (name, life, dexterity, strength...) certaines caractéristiques diffèrent. Par exemple, seuls les `Hero` vont pouvoir porter de l'équipement (Shield, Weapon...).
>
> Il ne devrait donc pas être possible d'attribuer une épée à un sanglier, or c'est pour le moment possible. Pour régler ce problème de conception, il faut passer par l'héritage.

- Créé deux classes `Hero` et `Monster`, chacune héritant de `Fighter`. Les propriétés communes aux deux vont rester dans Fighter, celles propres aux `Hero` (`Weapon` et `Shield`) vont passer avec leur *getters* et *setters* dans `Hero`. La classe `Monster` ne fait pour l'instant qu'étendre `Fighter` sans autre modification.
- De plus, les méthodes `getDamage()` et `getDefense()` ont un comportement différent entre un monstre et héros. Dans le premier cas, seules la force et la dextérité sont prises en compte, dans le cas du héros, les valeurs retournées prennent aussi en compte les caractéristiques des armes et armures. Les méthodes `getDamage()` et `getDefense()` doivent donc exister dans `Fighter` pour refléter le cas le plus simple, et être réécrites dans `Hero` pour prendre en compte les équipement (ce qui correspond normalement au code actuel de `Fighter` à la fin de l'atelier précédent).

- Dans *index.php*, modifier les instanciations pour prendre en compte ses nouvelles classes, `Hero` pour Héraclès et `Monster` pour les 3 *birds*.

## Arène

> Un autre changement de conception apparaît avec cette nouvelle épreuve. Ici, Héraclès ne se bat plus contre un unique monstre, mais contre une multitude. Pour l'instant, un Fighter n'a pas de méthode qui lui permette de connaître tous les autres Fighter du combat. Il serait possible de créer une propriété `$adversaries` dans `Fighter`, mais chaque Fighter devrait contenir tous les autres, ce qui serait assez redondant et ne permettrait pas d'avoir facilement une vue d'ensemble. 
>
> Une meilleure solution est de créer une nouvelle classe `Arena` qui contiendrait tous les `Fighter` ainsi que des méthodes pour les manipuler (les faire se combattre, les déplacer dans l'arène, etc.). De plus, cette arène peut servir de carte sur laquelle placer les `Fighter` et ajouter ainsi du positionnement au gameplay de notre jeu. 

- Créé une class `Arena` contenant les propriétés `$monsters` (un tableau d'objets `Monster`) et `$hero` (un objet `Hero`). Par simplification, on partira du principe que nous avons forcément un unique héro dans une arène et un ou plusieurs monstres. 
Ajouter les *getters* et *setters* comme d'habitude. Créé également un `__construct()` qui prendra en paramètre un héros et un tableau de monstres. Ajoute également une propriété `$size` (integer avec la valeur 10 par défaut) qui indiquera la taille de l'arène. 

- On veut positionner des combattants dans l'arène: ajoute les propriétés `$x` et `$y` (+ *getters* / *setters*) dans `Fighter` se qui te permettra de donner une position aux combattants. 

- Dans *index.php*, créé un objet de type `Arena` en lui passant `$heracles` et les trois *birds* que tu auras mis dans un tableau. Donne également des positions (x et y) à ces quatre Fighters. Actualise : tu dois les voir sur une carte représentant ton arène et tes combattants dessus ! Modifies les coordonnées de chacun, ils doivent bouger en conséquence !

## Garder ses distances

> Maintenant que les combattants ont tous une position, essayons d'exploiter cette nouvelle information. Tout d'abord, il serait intéressant de connaître la distance entre le héros et chacun des monstres.

- Rappel : Pour calculer la distance entre deux points A et B sur une carte, cela revient à appliquer la formule suivante (qui n'est ni plus ni moins que le théorème de pythagore).

![](https://wikimedia.org/api/rest_v1/media/math/render/png/b337eb9100bc60a3125751271848230ad2a0d447)

HINT: en PHP, la racine carrée se calcule grace à la [fonction `sqrt()`](https://www.php.net/manual/fr/function.sqrt) et la puissance via l'[opérateur `**`](https://www.php.net/manual/fr/language.operators.arithmetic.php).

Créer une méthode `getDistance()` dans Arena prenant 2 objets `Fighter` en paramètre, qui retournera la distance entre ces deux combattants. Une fois cela réalisé, réactualise. La distance devrait s'afficher sur la carte au survol d'un oiseau par la souris.

- Maintenant que tu peux calculer un éloignement, ajoute la notion de "portée" aux attaques. De base, un combattant sans arme ne devrait pas pouvoir frapper plus loin qu'un adversaire sur une case adjacente. Ajoute à `Fighter` la propriété `$range` (float à 1 par défaut) et la méthode `getRange()`.

- Dans `Arena`, créé une méthode `touchable()` prenant en 1er paramètre l'attaquant et en second l'attaqué. Cette méthode doit renvoyer `true` si l'attaqué est à portée de l'attaquant, c'est-à-dire si ça distance entre les deux combattants est bien inférieure ou égale à la portée (range) de l'attaquant. Une fois cela fait, actualise. Tu devrais voir apparaître en couleur les oiseaux à portée d'Héraclès, et en grisé ceux qui ne le sont pas. N'hésite pas à modifier les coordonnées du héro pour faire varier les distances. 

- Ajoute ensuite une propriété `range` (float à 0.5 par défaut) sur les armes et le *getter* correspondant.

- Dans `Hero` uniquement, ajoute un `getRange()` qui aditionnera la portée de base du combattant à celle de l'arme qu'il porte (pour un `Hero`, c'est donc cette méthode `getRange()` modifiée qui s'exécutera et non plus celle de `Fighter`, fais attention à la visibilité de la propriété `range`). Ainsi Heracles avec une épée devrait avoir une portée de 1.5 (ce qui doit lui permettre d'attaquer maintenant en diagonale). Le *range* s'affiche également dans l'inventaire du héros. Bouge le personnage pour vérifier que cela fonctionne.

- Dans *index.php*, crée une nouvelle arme `$bow`, instance de Weapon, qui possède un range de 5, des dégâts à 8, et l'image 'bow.svg' (ajouter un `__construct` + des *getters* / *setters* serait sans doute une bonne idée à ce stade). Attribue cette arme à Héraclès en remplacement de son actuelle épée. Actualise et vérifie dans l'inventaire que l'arme apparaît bien. 
Sur la carte, tu devrais constater que les oiseaux sont "atteignables" de plus loin puisque cette arme a un *range* bien plus important.
