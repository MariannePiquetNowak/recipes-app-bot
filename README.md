# recipes-app-bot

Application Web de recettes de cuisine relié qui sera relié à un bot Discord. 

## Edit : Explications 

Le projet se découpe en 3 parties :

### Partie 1 : Création d'un bot Discord
Le but de ce bot (@link https://github.com/Noloxe-Fred/bot-discord-fiona/tree/kitchen-command) était de tester Discord.js. Différentes commandes ont été créées, et à force de pratiquer. Lors du confinement, il m'est venu l'idée de créer une commande qui permettrait à des utilisateurs Discord de pouvoir rentrer leur propre recettes (la commande se trouve dans `/commands/ajout-recette.js`) dans un tableau JSON. 
Le but final est de faire de ce tableau une base de données qui serait relié à un simple Wordpress, pour créer un site de cuisine. Ainsi, la commande serait reliée directement au WP.

### Partie 2 : Wordpress

Réaliser le back en full Wordpress afin d'utiliser son API Rest. 
Une fois la commande reliée au WP, celui-ci aurait généré de simples articles de recettes. Une création de taxonomies est prévu, dans la mesure du possible.

### Partie 3 : React.js
Réaliser le front avec React.js en réalisant des appels API avec la Rest de WP. 

### Goal
Le but de ce projet n'est pas d'être joli (enfin, par la suite, si. Et puis je suis tatillon sur le design) mais de pouvoir réaliser un lien entre une commande Discord et un site Worpress. 
